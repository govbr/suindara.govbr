<?php 
 /*
 * @copyright Copyright (c) 2014 BRASIL. (http://www.softwarepublico.gov.br/)
 *
 * This file is part of CMS Suindara.
 *
 * CMS Suindara is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * The CMS Suindara is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with CMS Suindara.  If not, see the oficial website 
 * <http://www.gnu.org/licenses/> or the Brazilian Public Software
 * Portal <www.softwarepublico.gov.br>
 *
 * *********************
 *
 * Direitos Autorais Reservados (c) 2014 BRASIL. (http://www.softwarepublico.gov.br/)
 *
 * Este arquivo é parte do programa CMS Suindara.
 *
 * CMS Suindara é um software livre; você pode redistribui-lo e/ou
 * modifica-lo dentro dos termos da Licença Pública Geral GNU como
 * publicada pela Fundação do Software Livre (FSF); na versão 2 da
 * Licença, ou qualquer versão posterior
 *
 * O CMS Suindara é distribuido na esperança que possa ser útil,
 * porém, SEM NENHUMA GARANTIA; nem mesmo a garantia implicita de 
 * ADEQUAÇÃO a qualquer  MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a
 * Licença Pública Geral GNU para maiores detalhes.
 *
 * Você deve ter recebido uma cópia da Licença Pública Geral GNU
 * junto com este programa, se não, acesse no website oficial
 * <http://www.gnu.org/licenses/> ou o Portal do Software Público 
 * Brasileiro <www.softwarepublico.gov.br>
 *
 */
App::uses('PermissoesAppController', 'Permissoes.Controller');
App::uses('CmsAclMainSiteOnly', 'Cms');
App::uses('CmsTextSwap', 'Cms/Utils/Text');

class PermissoesController extends PermissoesAppController {

	public $name = 'Permissoes';

	public $paginate = array();

	protected $_authorizer = null;

	protected $acos = array();

	public $uses = array();

	private $perfil = null;

	public function beforeFilter() {
		parent::beforeFilter();
		$this->loadModel('Usuarios.Usuario');
		$this->loadModel('Usuarios.Perfil');
		$this->set('title_for_layout', $this->stringAction($this->action, 'permissão') );
	}

    public function admin_index() {
    	if(isset($this->request->query['aro'])) {
    		$perfil_id = $this->request->query['aro'];
			$this->Perfil->id = $perfil_id;
			if($this->Perfil->exists()) {
				$this->perfil = $this->Perfil->find('first', 
					array(
						'conditions' => array('Perfil.id' => $perfil_id),
						'recursive' => -1
					)
				);

				$this->set('perfil', $this->perfil['Perfil']['nome']);

				if($this->isAllowed($this->perfil['Perfil']['id'], 'Você não pode alterar as permissões do perfil selecionado', null, 'Perfil')){
					$main = $this->Acl->Aco->find('first', array('conditions' => array('parent_id' => null)));
					$this->set('acos', $this->_findPlugins($main['Aco']['id']));
				}
			}
		}

		$this->set('aros', $this->Perfil->find('list', array('conditions' => array('Perfil.site_id' => $this->site_id))));
	}

	private function _findPlugins($main_id) {
		$plugins = $this->Acl->Aco->children($main_id, true);
		foreach($plugins as $key => $plugin) {
			if($this->site_principal) {
				$plugins[$key]['children'] = $this->_findControllers($plugin['Aco']['id'], $plugin['Aco']['alias']);
			} else {
				if(CmsAclMainSiteOnly::isAllowed($plugin['Aco']['alias'])) {
					$plugins[$key]['children'] = $this->_findControllers($plugin['Aco']['id'], $plugin['Aco']['alias']);
				} else {
					unset($plugins[$key]);
				}
			}
		}
		return $plugins;
	}

	private function _findControllers($plugin_id, $parent) {
		$controllers = $this->Acl->Aco->children($plugin_id, true);
		foreach($controllers as $key => $controller) {
			if($this->site_principal) {
				$controllers[$key]['children'] = $this->_findActions($controller['Aco']['id']);
			} else {
				if(CmsAclMainSiteOnly::isAllowed($parent, $controller['Aco']['alias'])) {
					$controllers[$key]['children'] = $this->_findActions($controller['Aco']['id']);
				} else {
					unset($controllers[$key]);
				}
			}
		}
		return $controllers;
	}

	private function _findActions($controller_id) {
		$actions = $this->Acl->Aco->children($controller_id, true);
		foreach($actions as $key => $action) {
			$actions[$key]['Aco']['permission'] = $this->_hasPermission($action['Aco']['id']);
		}
		return $actions;
	}

	private function _hasPermission($aco_id) {
		$aro = $this->Acl->Aro->find('first', 
			array(
				'conditions' => array(
					'model' => 'Perfil',
					'foreign_key' => $this->perfil['Perfil']['id']
				),
				'recursive' => -1
			)
		);
		if(!isset($aro['Aro']))
			return false;
		
		$permission = $this->Acl->Aro->Permission->find('first',
			array(
	        	'conditions' => array(
	            	'Permission.aro_id' => $aro['Aro']['id'],
	            	'Permission.aco_id' => $aco_id,
	            	'Permission._create' => 1,
	            	'Permission._read' => 1,
	            	'Permission._update' => 1,
	            	'Permission._delete' => 1,
	        	),
	    	)
	    );
	    return (!empty($permission));
	}

    public function admin_allow($perfil_id, $aco_id, $module, $action) {
    	$module = CmsTextSwap::__($module);
		$action = CmsTextSwap::__($action);

		$this->Perfil->id = $perfil_id;
    	if($this->Perfil->exists()) {
			$this->perfil = $this->Perfil->find('first', 
				array(
					'conditions' => array('Perfil.id' => $perfil_id),
					'recursive' => -1
				)
			);
			$this->isAllowed($this->perfil['Perfil']['id'], "Você não tem permissão para permitir o recurso {$action} de {$module}", '/admin/permissoes', 'Perfil');
		}
    	
    	$aro = $this->Acl->Aro->find('first', 
			array(
				'contitons' => array(
					'model' => 'Perfil',
					'foreign_key' => $perfil_id
				),
				'recursive' => -1
			)
		);

		$this->Acl->Aco->id = $aco_id;
		$acos = $this->Acl->Aco->getPath($aco_id);
		$aco = '';
		foreach($acos as $item) {
			if($aco != '')
				$aco .= DS;

				$aco .= $item['Aco']['alias'];
		}
    	if($this->Acl->allow(array('model' => 'Perfil', 'foreign_key' => $perfil_id), $aco, '*')) {
			$this->Session->setFlash('Permissão ' . $action . ' em ' . $module .' salva com sucesso', 'success');
		} else {
			$this->Session->setFlash('Erro ao salvar a permissão ' . $action);
		}
		$this->redirect($this->referer());
	}

	public function admin_deny($perfil_id, $aco_id, $module, $action) {
		$module = CmsTextSwap::__($module);
		$action = CmsTextSwap::__($action);

		$this->Perfil->id = $perfil_id;
    	if($this->Perfil->exists()) {
			$this->perfil = $this->Perfil->find('first', 
				array(
					'conditions' => array('Perfil.id' => $perfil_id),
					'recursive' => -1
				)
			);

			$this->isAllowed($this->perfil['Perfil']['id'], "Você não tem permissão para bloquear o recurso {$action} de {$module}", '/admin/permissoes', 'Perfil');
		}

		$aro = $this->Acl->Aro->find('first', 
			array(
				'contitons' => array(
					'model' => 'Perfil',
					'foreign_key' => $perfil_id
				),
				'recursive' => -1
			)
		);
		$this->Acl->Aco->id = $aco_id;
		$acos = $this->Acl->Aco->getPath($aco_id);
		$aco = '';
		foreach($acos as $item) {
			if($aco != '')
				$aco .= DS;

				$aco .= $item['Aco']['alias'];
		}
    	if($this->Acl->deny(array('model' => 'Perfil', 'foreign_key' => $perfil_id), $aco, '*')) {
			$this->Session->setFlash('Permissão ' . $action . ' em ' . $module . ' removida com sucesso', 'success');
		} else {
			$this->Session->setFlash('Erro ao remover a permissão ' . $action);
		}
		$this->redirect($this->referer());
	}

	public function isAuthorized($user) {
		parent::isAuthorized($user);
	}

}