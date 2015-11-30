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

App::uses('PaginasAppController', 'Paginas.Controller');
App::uses('Status', 'Paginas.Model');
App::uses('Pagina', 'Paginas.Model');

class PaginasController extends PaginasAppController {

	public $cmsEvents = array('Cms.Service.Upload');

	public $helpers =  array('Midias.Midias',
							 'CmsUtil');

	public $name = 'Paginas';
	
	public $components = array('Session');
	
	
	public $paginate = array(
		'Pagina' => array(
      	  'limit' => 25,
       	 'order' => array(
            'Pagina.datahora_cadastro' => 'asc'
        )),
        
		'Status' 
    );


	public function beforeFilter(){
    	parent::beforeFilter();
		$this->set('title_for_layout', $this->stringAction($this->action, 'página') );
	}

	public function admin_index() {
		$emptySearches = false;
		$conditions = array('Pagina.site_id' => $this->site_id);
		
		$options = array(
            'conditions' => $conditions,
            'limit'      => 15
    	);
    	$this->paginate = $options;

    	if(isset($this->params->query['limit'])){
    		$this->paginate['limit'] = $this->params->query['limit'];
    	}

		if ($this->request->isPost()) {
			$emptySearches = true;
			if (isset($this->request->data['Pagina']['keyword'])) {
				$palavra_chave = $this->request->data['Pagina']['keyword'];
				if (!empty($palavra_chave)) {
					$palavra_chave = '%' . trim($palavra_chave) . '%'; 
					$conditions[] = array("OR" => array(
											"Pagina.titulo LIKE" => $palavra_chave,
											"Pagina.texto LIKE" => $palavra_chave
										 ));
					$emptySearches = false;
				}
			}	
		}

		if($emptySearches){
			$this->params['paging'] = array
                (
                    'Pagina' => array
                        (
                            'page'      => 1,
                            'current'   => 0,
                            'count'     => 0,
                            'prevPage'  => null,
                            'nextPage'  => null,
                            'pageCount' => 0,
                            //'order' => 
                            'limit'     => 1,
                            'options'   => array(),
                            'paramType' => 'named'
                        )
                );

            $this->paginate('Pagina');
			$this->set('paginas', array());
		}else{
			$data = $this->paginate('Pagina', $conditions);
			$this->set('paginas', $data);	
		}
	}
	
	function admin_view($id = null) {
		if ($this->request->is('get') && $id > 0) {
			$pagina = $this->Pagina->findById($id);
			
			if ($pagina) {
				$this->isAllowed($id, 'Você não pode visualizar esta página', array('admin' => true, 'plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'index'));
				$this->set('pagina', $pagina);
			} else {
				return $this->redirect(array('admin' => true, 'plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'index'));
			}
			
		} else {
			return $this->redirect(array('admin' => true, 'plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'index'));
		}
	}
	
	function admin_edit($id = null, $conteudo = null) {
		$this->Session->write('tipo_request', 'edit');
		$pg = $this->Pagina->findById($id);
		if ($pg['Pagina']['bloqueado'] 
			&& ($this->Auth->user('id') != $pg['Pagina']['usuario_id']) &&  $this->Auth->user('root') != 1
		   ) {
		   		$this->Session->setFlash('Você não possui permissão para editar esta página');
				return $this->redirect(array('plugin' => 'paginas', 
											   'controller' => 'paginas',
											   'action' => 'index', 
											   'admin' => true));
		   }
		
		($conteudo == null) ? $this->admin_add($id) : $this->admin_add($id, $conteudo);
	}
	
	function admin_add($id = null, $conteudo = 'pagina') {

		( $this->params['action'] == 'admin_edit' ) ? $this->Session->write('tipo_request', 'edit') : $this->Session->write('tipo_request', 'cadastro');

		$this->set('conteudo', $conteudo);
		
		$Status = new Status;
		$condition = 'Status.id >= ' . Pagina::STATUS_ATIVA . ' AND Status.id <= ' . Pagina::STATUS_INATIVA;
		
		$lista_sites = $this->requestAction(array('admin' => true, 'plugin' => 'sites', 'controller' => 'sites', 'action' => 'ra_getSites'));
		$this->set(compact('lista_sites'));

		$lista_status = $Status->find('list', array('conditions' => array($condition), 'fields' => array('Status.nome')));
		$this->set(compact('lista_status'));		
		
		$lista_grupos = $this->requestAction(array('plugin' => 'banners', 
													   'controller' => 'grupos',
													   'action' => 'ra_getGrupos', 
													   'admin' => true));
		$this->set(compact('lista_grupos'));

		
		if (isset($this->request->data['deletar'])) {
			if ($id) {
				return $this->redirect(array('admin' => true, 'plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'delete', $id));
			} else {
				return $this->redirect(array('admin' => true, 'plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'index'));
			}
		}
		
		if (isset($this->request->data['voltar'])) {
			return $this->redirect(array('plugin' => 'midias',
			'controller' => 'midias',
			'tipo_conteudo' => 'pagina',
			'id_conteudo' => $id,
			'action' => 'arquivos'));
		} 

		
		if ($this->request->is('post') || $this->request->is('put')) {
			
			$this->request->data['Pagina']['usuario_id'] = $this->Auth->user('id');
				
			if ($id && $id > 0) {
				$this->request->data['Pagina']['id'] = $id;
				$PaginaData = $this->Pagina->findById($id);
				$PaginaData['Pagina'] = array_merge($PaginaData['Pagina'], $this->request->data['Pagina']);
				if (isset($this->request->data['GruposBanners'])) {
					$PaginaData['GruposBanners'] = $this->request->data['GruposBanners']['GruposBanners'];
				}
			} else {
				$PaginaData = $this->request->data;
			}
			
			$PaginaData['Pagina']['site_id'] = $this->site_id;
			unset($PaginaData['Midias']);
			unset($PaginaData['Imagens']);
			unset($PaginaData['Arquivos']);
			unset($PaginaData['Audios']);
			unset($PaginaData['Videos']);

			$oldPag = null;
			if (isset($this->request->data['Pagina']['id']) && $this->request->data['Pagina']['id'] > 0) {
				$oldPag = $this->Pagina->findById($this->request->data['Pagina']['id']);

				// Necessário para a comparação de modificações nas mensagens
				if ($oldPag['Pagina']['bloqueado'] == '') $oldPag['Pagina']['bloqueado'] = 0;
				unset($oldPag['Pagina']['datahora_cadastro']);
			}

			$result = $this->Pagina->save($PaginaData);

			
			
			@$this->Session->write('Pagina.TempSave.Id', $result['Pagina']['id']);
			if ($result) {
				if (!$oldPag || (@array_diff_assoc($oldPag['Pagina'], $PaginaData['Pagina']))){
						$this->Session->setFlash('Página ' . $PaginaData['Pagina']['titulo'] . ' salva com sucesso', 'success');
				}
				
				if (isset($this->request->data['avancar'])) {
					
					if ($conteudo == 'banners') {
						return $this->redirect(array('admin' => true, 'action' => 'view', $result['Pagina']['id']));
					} else {
						return $this->redirect(array('admin' => true, 'plugin' => 'midias', 'controller' => 'midias', 'action' => 'midias', 'tipo_conteudo' => 'pagina', 'id_conteudo' => $result['Pagina']['id']));	
					}
				} 

				$this->request->data = $result;
				//return $this->redirect(array('admin' => true, 'plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'edit', $result['Pagina']['id']));
	
			} else {
				$array = array($this->Pagina->validationErrors, $this->modelClass);  //ModelClass = name model
				$this->Session->setFlash( $array, 'flash_form_error' );
				//$this->Session->setFlash('Erro ao salvar página');
				return;
			}
			
		} else {
			if ($id > 0) { 
				$this->request->data = $this->Pagina->findById($id);
				//pr($this->request->data);
				$this->isAllowed($id, 'Você não pode editar esta página', array('admin' => true, 'plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'index'));
			}	
		}
			
	}

	function admin_delete($id = null) {
		$pg = $this->Pagina->findById($id);
		if ($pg['Pagina']['bloqueado'] 
			&& ($this->Auth->user('id') != $pg['Pagina']['usuario_id']) &&  !$this->Auth->user('root') != 1
		   ) {
		   		$this->Session->setFlash('Você não possui permissão para remover esta página');
				return $this->redirect(array('plugin' => 'paginas', 
											   'controller' => 'paginas',
											   'action' => 'index', 
											   'admin' => true));
		   }
		
		$titulo = '';
		if( isset($pg['Pagina']['titulo']) )
		{
			$titulo = $pg['Pagina']['titulo']; 
		}
		
		if ($this->request->is('get')) {
			if ($id > 0) {
				$this->Session->setFlash('Página ' . $titulo . ' deletada com sucesso', 'success');
				$this->Pagina->delete($id);
			}
			
			return $this->redirect(array('admin' => true, 'plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'index'));
		}		
	}
	
	
	
	public function admin_ra_getPaginas(){
		if(!$this->request->params['requested']){
			return null;
		}
		$site = $this->Session->read('Auth.User.SiteAtual');
		$site = $site['Site'];
		$conditions = array('Pagina.site_id' => $site['id']);

		return $this->Pagina->find('list', array( 
												  'fields' => array('Pagina.id', 'Pagina.titulo'),
												  'conditions' => $conditions
								   ));
	}
	
	
	public function admin_ra_currentPaginaId() {
		if (!empty($this->request->params['requested'])) {
            return $this->Session->read('Pagina.Edit.Id');
        } else {
        	return $this->redirect(array('admin' => true, 'plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'index'));
        }
		 	
	}



	public function ra_view($id = null) {
		if (!empty($this->request->params['requested']) && $id > 0) {
			$pagina = $this->Pagina->findById($id);
			if (!$pagina) return $this->redirect(Router::url('/', true));
			return $pagina;
		} else {
			$this->redirect(Router::url('/', true));
		}
	}

	public function isAuthorized($user) {
		parent::isAuthorized($user);
	}

}