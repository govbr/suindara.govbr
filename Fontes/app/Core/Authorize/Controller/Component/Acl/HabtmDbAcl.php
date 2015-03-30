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
App::uses('DbAcl', 'Controller/Component/Acl');

/**
 * HabtmDbAcl implements an ACL control system in the database like DbAcl with
 * User habtm Group checks
 *
 */
class HabtmDbAcl extends DbAcl {

	public $settings = array(
		'userModel' => 'Usuarios.Usuario',
		'groupAlias' => 'Perfis.Perfil'
	);

	private $Acl = null;

/**
 * Initializes the containing component and sets the Aro/Aco objects to it.
 *
 * @param AclComponent $component
 * @return void
 */
	public function initialize(Component $component) {
		parent::initialize($component);
		if (!empty($component->settings['habtm'])) {
			$this->settings = array_merge($this->settings, $component->settings['habtm']);
		}
		$this->Acl = $component;
	}

/**
 * Checks if the given $aro has access to action $action in $aco
 * Check returns true once permissions are found, in following order:
 * User node
 * User::parentNode() node
 * Groupnodes of Groups that User has habtm links to
 *
 * @param string $aro ARO The requesting object identifier.
 * @param string $aco ACO The controlled object identifier.
 * @param string $action Action (defaults to *)
 * @return boolean Success (true if ARO has access to action in ACO, false otherwise)
 */
	public function check($aro, $aco, $action = "*") {
		list($root_path, $plugin_name, $controller_name, $action_name) = explode(DS, $aco, 4);
		$plugin_name = Inflector::Camelize($plugin_name);
		$controller_name = Inflector::Camelize($controller_name);

		$aco = $root_path . DS . $plugin_name . DS . $controller_name . DS . $action_name;

		if(CmsAclFreePlugins::isAllowed($plugin_name) || CmsAclFreeControllers::isAllowed($plugin_name,$controller_name) ||
			CmsAclFreeActions::isAllowed($plugin_name,$controller_name, $action_name) ||
			CmsPublicActions::isAllowed($plugin_name,$controller_name, $action_name))
			return true;

		if(AuthComponent::user('SiteAtual.Site.id') == 'Administracao') {
			if(!AuthComponent::user('root'))
				return false;

			if(CmsAclMainSiteOnly::isAllowed($plugin_name, $controller_name)) {
				if(CmsAclMainSiteOnly::isAllowed($plugin_name)) {
					return false;
				}
			}
		} else {
			if(!CmsAclMainSiteOnly::isAllowed($plugin_name, $controller_name) || !CmsAclMainSiteOnly::isAllowed($plugin_name)) {
				return false;
			}
		}

		if(AuthComponent::user('root'))
			return true;

		if(isset($aro['User']))
			$aro = array('Usuario' => $aro['User']);

		if(isset($aro['Usuario'])) {
			$new = array('model' => 'Usuario', 'foreign_key' => $aro['Usuario']['id']);
			$aro = $new;
		}

		extract($this->settings);
		$User = ClassRegistry::init($userModel);
		list($plugin, $groupAlias) = pluginSplit($groupAlias);
		list($joinModel) = $User->joinModel($User->hasAndBelongsToMany[$groupAlias]['with']);
		$userField = $User->hasAndBelongsToMany[$groupAlias]['foreignKey'];
		$groupField = $User->hasAndBelongsToMany[$groupAlias]['associationForeignKey'];
		
		$userId = null;
		if($aro['model'] == 'Usuario') {
			$userId = Set::extract('foreign_key', $aro);
		} else {
			$node = $this->Acl->Aro->node($aro);
			$userId = Set::extract('0.Aro.foreign_key', $node);
		}

		$groupIDs = ClassRegistry::init($joinModel)->find('list', array(
			'fields' => array($groupField),
			'conditions' => array($userField => $userId),
			'recursive' => -1
		));

		foreach ((array)$groupIDs as $groupID) {
			$User->Perfil->id = $groupID;
			$perfil = $User->Perfil->read(array('site_id'), $groupID);
			if(AuthComponent::user('SiteAtual.Site.id') == $perfil['Perfil']['site_id']) {
				$aro = array(
					'model' => $groupAlias,
					'foreign_key' => $groupID
				);

				$allowed = parent::check($aro, $aco, $action);

				if ($allowed) {
					return true;
				}
			}
		}
		return false;
	}

}
