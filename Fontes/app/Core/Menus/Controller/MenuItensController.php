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

	class MenuItensController extends MenusAppController {
		
		public $name = 'MenuItens';

		public function admin_index($menuPai_id = null){
			$this->isAllowed($menuPai_id, 'Você não pode listar os itens deste menu', '/admin/menus');

			if($menuPai_id){
				$menuPaiNome = $this->MenuItem->Menu->findById($menuPai_id);
				
				$this->set('menu_nome', $menuPaiNome['Menu']['nome']);
				$this->set('menu_id', $menuPai_id);
			}else{
				$this->redirect(array('controller' => 'menus', 'action' => 'index', 'admin' => true));
			}

			$this->numerar($menuPai_id);

			$options = array(
				'threaded',
	            'fields' => array('MenuItem.id','MenuItem.nome', 'MenuItem.identificador', 'BmTipo.nome', 'MenuItem.lft', 'MenuItem.rght'),
	            'order' => array('MenuItem.lft' => 'ASC'),
	            'limit' => 15,
	            'url' => array('controller' => 'MenuItens', 'action' => 'index', 'admin' => true)
	        );
			$this->paginate = $options;

			if(isset($this->params->query['limit'])){
	    		$this->paginate['limit'] = $this->params->query['limit'];
	    	}
			
	    	if( $this->request->isPost() ){
		    	if( isset($this->request->data['MenuItem']['search']) && trim($this->request->data['MenuItem']['search']) != "") {
		    		$this->search($this->request->data['MenuItem']['search']);
		    		
		    	} else if(isset($this->request->data['MenuItem']['palavras']) && (trim($this->request->data['MenuItem']['palavras'] != "" || trim($this->request->data['MenuItem']['tipo'] != "") )   ) ){
	    			$this->advancedSearch($this->request->data['MenuItem']['palavras'], $this->request->data['MenuItem']['tipo']);

	    		} else {

		    		// sem nada na pesquisa
					$this->params['paging'] = array
		                (
		                    'MenuItem' => array
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

		    		$this->set('menuItemPaginate', array());
		    	} 

	    	}
			
			$this->set('menuItemPaginate', $this->paginate('MenuItem', array('MenuItem.menu_id LIKE' => $menuPai_id)) );

			$this->set('bmTipos', $this->MenuItem->BmTipo->find('list'));

		}

		private function search($query){
			if(!isset($query) || trim($query) == "")
				return;
			$like = '%' . trim($query) . '%';
	    	$this->paginate['conditions'] = array(
	    		'OR' => array(
		    		'MenuItem.nome LIKE' => $like
	    		)
	    	);
		}

		private function advancedSearch($palavras, $tipo){
			$conditions = array();
			
			if(isset($palavras)){
				foreach(split(',', $palavras) as $palavra) {
					$palavra = trim($palavra);
					if($palavra != "") {
						$conditions['OR'][]['MenuItem.nome LIKE'] = '%'.$palavra.'%';
				    }
				}
			}

			if(isset($tipo) && trim($tipo) != ""){
				$conditions['OR'][]['MenuItem.bm_tipo_id LIKE'] = '%'.trim($tipo).'%';
			}

	    	$this->paginate['conditions'] = $conditions;
		}

		public function admin_add($menuPai_id = null){
			$this->isAllowed($menuPai_id, 'Você não pode adicionar itens este menu', '/admin/menus');
			if(!empty($this->request->data) ){
				$this->set('opcao', $this->request->data['MenuItem']['bm_tipo_id']);
			}

			if($this->request->isPost()){
				if ( isset($this->request->data['atualizarSJS']) ) {
					//
				}else{ 
					if(!empty($menuPai_id) ){
						$this->request->data['MenuItem']['menu_id'] = $menuPai_id;
						if($this->MenuItem->save($this->request->data)){
							$this->Session->setFlash('Item ' . $this->request->data['MenuItem']['nome'] .  ' criado com sucesso', 'success');
							$this->redirect(array('controller' => 'menu_itens', 'action' => 'index', 'admin' => true, $menuPai_id));
						}else{
							$array = array($this->MenuItem->validationErrors, $this->modelClass);  //ModelClass = name model
							$this->Session->setFlash( $array, 'flash_form_error' );
						}
					}else{
						$this->Session->setFlash('ID do Menu não encontrado');
					}
				}
			}

			$menuPai = $this->MenuItem->Menu->findById($menuPai_id);
				
			$this->set('menu_nome', $menuPai['Menu']['nome']);

			$this->set('parents', $this->MenuItem->generateTreeList(array('MenuItem.menu_id =' => $menuPai_id), null, '{n}.MenuItem.nome', null));

			$this->set('menu_id', $menuPai_id);

			$this->set('titulo_modulo', 'Cadastro');

			$this->set('bmTipos', $this->MenuItem->BmTipo->find('list'));
			$this->set('lista_categorias', $this->requestAction(array('plugin' => 'categorias' ,'controller' => 'categorias', 'action' => 'ra_getCategorias', 'admin' => true)) );
			$this->set('lista_paginas', $this->requestAction(array('plugin' => 'paginas' ,'controller' => 'paginas', 'action' => 'ra_getPaginas', 'admin' => true)) );
		}

		public function admin_edit($id = null){
			if(!empty($this->request->data) ){
				$this->set('opcao', $this->request->data['MenuItem']['bm_tipo_id']);
			}

			if ($this->request->isPut()) {
				if ( isset($this->request->data['atualizarSJS']) ) {
					//
				}else{ 
					if ($this->MenuItem->save($this->data)) {
						$this->Session->setFlash('Item do menu editado com sucesso', 'success');
						$this->redirect(array('controller' => 'menu_itens', 'action' => 'index', 'admin' => true, $this->data['MenuItem']['menu_id']));
					} else {
						$array = array($this->MenuItem->validationErrors, $this->modelClass);  //ModelClass = name model
						$this->Session->setFlash( $array, 'flash_form_error' );
					}
				}
			}else{
				$this->MenuItem->id = $id;
				if($this->MenuItem->exists()){
					$this->data = $this->MenuItem->read();
					$this->isAllowed($id, 'Você não pode editar este item de menu', '/admin/menuitens/index/' . $this->data['MenuItem']['menu_id']);
					$this->set('opcao', $this->data['MenuItem']['bm_tipo_id']);
				}else{
					$this->Session->setFlash('Item do menu n tem');
					$this->redirect(array('controller' => 'menus', 'action' => 'index', 'admin' => true));	
				}
			}

			$menuItem = $this->MenuItem->findById($id);
			$menuPai = $this->MenuItem->Menu->findById($menuItem['MenuItem']['menu_id']);

			$this->set('edit', true);
			
			$this->set('menuitem_nome', $menuItem['MenuItem']['nome']);
			$this->set('menu_nome', $menuPai['Menu']['nome']);
			
			$this->set('titulo_modulo', 'Edição');

			$this->set('parents', $this->MenuItem->generateTreeList(array('MenuItem.id <>' => $id, 'MenuItem.menu_id =' => $this->request->data['MenuItem']['menu_id']), null, '{n}.MenuItem.nome', null));		

			$this->set('menu_id', $this->request->data['MenuItem']['menu_id'] );

			$this->set('bmTipos', $this->MenuItem->BmTipo->find('list'));
			$this->set('lista_categorias', $this->requestAction(array('plugin' => 'categorias' ,'controller' => 'categorias', 'action' => 'ra_getCategorias', 'admin' => true)) );
			$this->set('lista_paginas', $this->requestAction(array('plugin' => 'paginas' ,'controller' => 'paginas', 'action' => 'ra_getPaginas', 'admin' => true)) );
		}

		public function admin_delete($id = null){
			$this->MenuItem->id = $id;
			$this->request->data = $this->MenuItem->read();

			$menu_id = $this->request->data['MenuItem']['menu_id'];

			if(!$this->MenuItem->exists()){
				$this->Session->setFlash('Item do menu inválido');
			}

			$this->isAllowed($id, 'Você não pode deletar este item de menu', '/admin/menuitens/index/' . $this->data['MenuItem']['menu_id']);

			if($this->MenuItem->delete()){
				$this->Session->setFlash('Item do menu ' . $this->request->data['MenuItem']['nome'] . ' deletado com sucesso', 'success');
				$this->redirect(array('controller' => 'menu_itens', 'action' => 'index', 'admin' => true, $menu_id ));
			}else{
				$this->Session->setFlash('Item do menu não foi deletado');
				$this->redirect(array('controller' => 'menu_itens', 'action' => 'index', 'admin' => true, $menu_id ));
			}
		}

		public function admin_view($id = null){
			$this->MenuItem->id = $id;
			if($this->MenuItem->exists()){
			 	$this->data = $this->MenuItem->read();
			 	$this->isAllowed($id, 'Você não pode visualizar este item de menu', '/admin/menuitens/index/' . $this->data['MenuItem']['menu_id']);
			 	$this->set('opcao', $this->data['MenuItem']['bm_tipo_id']);
			}else{
				$this->Session->setFlash('Item do menu não tem');
				//$this->redirect('/admin/menus/index');	
				$this->redirect(array('controller' => 'menus', 'action' => 'index', 'admin' => true));
			}

			$this->set('parents', $this->MenuItem->generateTreeList(array('MenuItem.id <>' => $id, 'MenuItem.menu_id =' => $this->request->data['MenuItem']['menu_id']), null, '{n}.MenuItem.nome', null));		

			$this->set('menu_id', $this->request->data['MenuItem']['menu_id'] );

			$this->set('bmTipos', $this->MenuItem->BmTipo->find('list'));

			$this->set('lista_categorias', $this->requestAction(array('plugin' => 'categorias' ,'controller' => 'categorias', 'action' => 'ra_getCategorias', 'admin' => true)) );
			$this->set('lista_paginas', $this->requestAction(array('plugin' => 'paginas' ,'controller' => 'paginas', 'action' => 'ra_getPaginas', 'admin' => true)) );
		}

		public function admin_moveup($id = null, $delta = null) {
			$delta = 1; 
	        $this->MenuItem->id = $id;
	        $this->data = $this->MenuItem->read();
		    if (!$this->MenuItem->exists()) {
		       throw new NotFoundException(__('Item do menu invalido'));
		    }

		    $arrayOld = $this->MenuItem->generateTreeList(array(null, 'MenuItem.menu_id =' => $this->data['MenuItem']['menu_id'], ), null, '{n}.MenuItem.nome', null);		

		    $this->data = $this->MenuItem->read();
		    
	    	if( $this->MenuItem->moveUp($this->MenuItem->id, abs($delta)) == false){
	    		$this->Session->setFlash('Menu Item não pode ser movido para cima');
	    	}
		    
		    $arrayNew = $this->MenuItem->generateTreeList(array(null, 'MenuItem.menu_id =' => $this->data['MenuItem']['menu_id'], ), null, '{n}.MenuItem.nome', null);		
		    if($arrayOld === $arrayNew){
				$this->Session->setFlash('Nao pode mover este item de menu');
			}else{
				$this->Session->setFlash('Item do menu ' . $this->data['MenuItem']['nome'] . ' trocado com sucesso', 'success');
			}

		    return $this->redirect(array('controller' => 'menu_itens', 'action' => 'index', 'admin' => true, $this->data['MenuItem']['menu_id']));
	    }

	    public function admin_movedown($id = null, $delta = null) {
	    	$delta = 1;
	    	$this->MenuItem->id = $id;
	    	$this->data = $this->MenuItem->read();
		    if (!$this->MenuItem->exists()) {
		       throw new NotFoundException(__('Item do menu invalido'));
		    }

		    $arrayOld = $this->MenuItem->generateTreeList(array(null, 'MenuItem.menu_id =' => $this->data['MenuItem']['menu_id'], ), null, '{n}.MenuItem.nome', null);		
		    $this->data = $this->MenuItem->read();

		    if( $this->MenuItem->moveDown($this->MenuItem->id, abs($delta)) == false){
	    		$this->Session->setFlash('Menu Item não pode ser movida para baixo.');
	    	}

		    $arrayNew = $this->MenuItem->generateTreeList(array(null, 'MenuItem.menu_id =' => $this->request->data['MenuItem']['menu_id']), null, '{n}.MenuItem.nome', null);		

			if($arrayOld === $arrayNew){
				$this->Session->setFlash('Nao pode mover este item de menu');
			}else{
				$this->Session->setFlash('Item do menu ' . $this->data['MenuItem']['nome'] . ' trocado com sucesso', 'success');
			}

		    return $this->redirect(array('controller' => 'menu_itens', 'action' => 'index', 'admin' => true, $this->data['MenuItem']['menu_id']));
		    //$this->redirect('/admin/menu_itens/index/' . ($this->data['MenuItem']['menu_id']));
	    }

	    private function numerar($menuPai_id){
	    	$results = $this->MenuItem->find('all',
                            array(
                                'conditions' => array('MenuItem.menu_id LIKE' => $menuPai_id),
                                'recursive' => 1,
                                'fields' => array('MenuItem.id', 'MenuItem.lft', 'MenuItem.rght'),
                                'order' => 'MenuItem.lft ASC'
                            )
                        );

	        $stack = array();
	        $lastArray = array();
	        $arrayCount = array();
	        $contagem = 1;

	        foreach ($results as $i => $result) {
	            $count = count($stack);
	            while ($stack && ($stack[$count - 1] < $result['MenuItem']['rght'])) {
	                array_pop($stack);
	                $count--;
	            }

	            array_push($arrayCount, $count);
	            if( isset($arrayCount[count($arrayCount) - 1]) && isset($arrayCount[count($arrayCount) - 2])  ){
	            	$ultimo = $arrayCount[count($arrayCount) - 1];
	            	$penultimo = $arrayCount[count($arrayCount) - 2];

					if($ultimo > $penultimo){
		            	if(empty($lastArray)){
		            		$lastArray[0] = $contagem;
		            	}else{
		            		array_push($lastArray, $contagem); 
		            	}
		            	$contagem = 1;
		            }else{
		            	if($ultimo < $penultimo){
		            		$contagem = $lastArray[count($lastArray) - 1]; 
		            		unset($lastArray[count($lastArray) - 1]);
		            		sort($lastArray);
		            	}
		            }	            	
	            }

	            $contagemPai = "";
	            for($j = 0; $j < $count; $j++){
	            	if(empty($contagemPai)){
	            		$contagemPai = 	($lastArray[$j] - 1);
	            	}else{
	            		$contagemPai = ($contagemPai . '.' . ($lastArray[$j] - 1) ); 	
	            	}
	            }
	            
	            if($count == 0){
	            	$results[$i]['MenuItem']['numero'] = $contagem ;
	            }else{
	            	$results[$i]['MenuItem']['numero'] = ( $contagemPai ) . '.' . $contagem ;
	            }
	            $stack[] = $result['MenuItem']['rght'];
	            $contagem++;
	        }

	        $this->set('numeracao', $results);
	    }

	    public function beforeFilter(){
	    	parent::beforeFilter();

	    	$menuTemp = $this->MenuItem->Menu->findById($this->params['pass'][0]);

	    	$action = substr($this->action, strpos($this->action, '_') + 1);
			$titulo = 'Item de Menu';

			switch ($action) {
				case 'index': 
							if(isset($menuTemp))
							{
								$titulo = '- Listagem de Itens de Menu ' . $menuTemp['Menu']['nome'];	
							}
							else
							{
								$titulo = '- Listagem de Itens de Menu';
							}
							
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

		public function isAuthorized($user) {
			parent::isAuthorized($user);
		}

		protected function isAllowed($menu_item_id, $message = false, $redirect = false, $modelClass = false) {
			$menu_id = $menu_item_id;

			if($this->action != 'admin_index' && $this->action != 'admin_add') {
		        $menuItem = $this->MenuItem->read(array('MenuItem.menu_id'), $menu_item_id);
		        $menu_id = $menuItem['MenuItem']['menu_id'];
		    }
		    
		    $menu = $this->MenuItem->Menu->read(array('Menu.site_id'), $menu_id);

			$allowed = ($menu['Menu']['site_id'] == $this->site_id);
			
			if(!$allowed && $message)
				$this->Session->SetFlash($message);

			if(!$allowed && $redirect)
				$this->redirect($redirect);

			return $allowed;
	    }

	}
