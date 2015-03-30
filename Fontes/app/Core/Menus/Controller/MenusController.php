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

App::uses('MenusAppController', 'Menus.Controller');

	class MenusController extends MenusAppController {
		
		public $name = 'Menus';

		public function admin_index(){
			$options = array(
	            'fields' => array('Menu.id','Menu.nome', 'Menu.identificador'),
	            'conditions' => array('Menu.site_id' => $this->site_id),
	            'limit' => 15
        	);
        	
        	$this->paginate = $options;

			if(isset($this->params->query['limit'])){
	    		$this->paginate['limit'] = $this->params->query['limit'];
	    	}

	    	if( $this->request->isPost() ){
	    		$query = $this->request->data['Menu']['search']; 

		    	if( isset($query) && trim($query) != "") {
		    		$this->search($query, $this->site_id);

		    	} else {
		    		// sem nada na pesquisa
					$this->params['paging'] = array
		                (
		                    'Menu' => array
		                        (
		                            'page' => 1,
		                            'current' => 0,
		                            'count' => 0,
		                            'prevPage' => null,
		                            'nextPage' => null,
		                            'pageCount' => 0,
		                            //'order' => 
		                            'limit' => 1,
		                            'options' => array(),
		                            'paramType' => 'named'
		                        )
		                );

		    		$this->set('menuPaginate', array());
		    	} 

	    	} 
				
			$this->set('menuPaginate', $this->paginate('Menu'));

		}

		private function search($query, $site_id){
			if(!isset($query) || trim($query) == "")
				return;
			$like = '%' . trim($query) . '%';
	    	$this->paginate['conditions'] = array('Menu.site_id' => $this->site_id,
	    		'OR' => array(
		    		'Menu.nome LIKE' => $like
	    		)
	    	);
		}

		public function admin_add(){
			if($this->request->isPost()){
				$this->request->data['Menu']['site_id'] = $this->site_id;
				if($this->Menu->save($this->request->data)){
					$this->Session->setFlash('Menu ' . $this->request->data['Menu']['nome'] . ' criado com sucesso', 'success');
					$this->redirect(array('controller' => 'menus', 'action' => 'index', 'admin' => true));
				}else{
					$array = array($this->Menu->validationErrors, $this->modelClass);  //ModelClass = name model
					$this->Session->setFlash( $array, 'flash_form_error' );
				}
			}

			$this->set('titulo_modulo', 'Cadastro');
		}

		public function admin_edit($id = null){
			if ($this->request->isPut()) {
				if ($this->Menu->save($this->data)) {
					$this->Session->setFlash('Menu editado com sucesso', 'success');
					$this->redirect(array('controller' => 'menus', 'action' => 'index', 'admin' => true));
				} else {
					$array = array($this->Menu->validationErrors, $this->modelClass);  //ModelClass = name model
					$this->Session->setFlash( $array, 'flash_form_error' );
				}
			}else{
				$this->Menu->id = $id;
				if($this->Menu->exists()){
					$this->data = $this->Menu->read();
					$this->isAllowed($id, 'Você não pode editar este menu', '/admin/menus');
				}else{
					$this->Session->setFlash('Menu não encontrado');
					$this->redirect(array('controller' => 'menus', 'action' => 'index', 'admin' => true));
				}
			}

			$this->set('titulo_modulo', 'Edição');

			$this->set('edit', true);
		}

		public function admin_delete($id = null){
			$this->Menu->id = $id;
			$this->request->data = $this->Menu->read();
			if (!$this->Menu->exists()) {
				$this->Session->setFlash('Menu não encontrado');
			} else {
				$this->isAllowed($id, 'Você não pode deletar este menu', '/admin/menus');

				if ($this->Menu->delete()) {
					$this->Session->setFlash('Menu ' . $this->request->data['Menu']['nome'] . ' deletado com sucesso', 'success');
				}else{
					$this->Session->setFlash('Menu não foi deletado');
				}
			}
			$this->redirect(array('controller' => 'menus', 'action' => 'index', 'admin' => true));
		}

		public function admin_view($id = null){
			if($this->request->is('get') && $id > 0){
				$menu = $this->Menu->findById($id);
				if($menu){
					$this->isAllowed($id, 'Você não pode visualizar este menu', '/admin/menus');
					$this->set('menu', $menu);
				}else{
					return $this->redirect(array('controller' => 'menus', 'action' => 'index', 'admin' => true));
				}
			}else{
				return $this->redirect(array('controller' => 'menus', 'action' => 'index', 'admin' => true));
			}
		}

		public function beforeFilter(){
	    	parent::beforeFilter();

	    	$action = substr($this->action, strpos($this->action, '_') + 1);
			$titulo = 'Menu';

			switch ($action) {
				case 'index': 
							$titulo = '- Listagem de Menus';
							break;

				case 'add': 
							$titulo = '- Cadastro de ' . $titulo;
							break;

				case 'edit':
							$titulo = '- Edição de ' . $titulo;
							break;

				default: 
						'- ' . $titulo;
						break;
			}

			$this->set('title_for_layout', $titulo);
		}
		
		
		public function ra_query($type = 'all', $options = array()) {
			if (!empty($this->request->params['requested'])) {
				if ($options) {
					$opt = json_decode(urldecode($options), true);
					//$opt['order'] = array('MenuItem.lft');
					return $this->Menu->find($type, $opt);
				} else {
					return $this->Menu->find($type);
				}		
			}
		}
		

		public function isAuthorized($user) {
			parent::isAuthorized($user);
		}

	}