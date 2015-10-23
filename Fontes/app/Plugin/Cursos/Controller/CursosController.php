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

App::uses('CursosAppController', 'Cursos.Controller');

	class CursosController extends CursosAppController {
		
		public $name = 'Cursos';

		public $helpers =  array('Midias', 'Midias.Midias');

		public function admin_index(){

			//pr($this->Curso->find());
			
			$options = array(
	            'fields' => array('Curso.id','Curso.nome', 'Modalidade.titulo'),
	            'conditions' => array('Curso.site_id' => $this->site_id),
	            'limit' => 15
        	);
        	
        	$this->paginate = $options;

			if(isset($this->params->query['limit'])){
	    		$this->paginate['limit'] = $this->params->query['limit'];
	    	}

	    	if( $this->request->isPost() ){
	    		$query = $this->request->data['Curso']['search']; 

		    	if( isset($query) && trim($query) != "") {
		    		$this->search($query, $this->site_id);

		    	} else {
		    		//sem nada na pesquisa
					$this->params['paging'] = array
		                (
		                    'Curso' => array
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

		    		$this->set('cursoPaginate', array());
		    	} 

	    	} 
			

			$this->set('cursoPaginate', $this->paginate('Curso') );
			//$this->render(false);

		}

		private function search($query, $site_id){
			if(!isset($query) || trim($query) == "")
				return;
			$like = '%' . trim($query) . '%';
	    	$this->paginate['conditions'] = array('Curso.site_id' => $this->site_id,
	    		'OR' => array(
		    		'Curso.nome LIKE' => $like
	    		)
	    	);
		}

		public function admin_add(){
			if( isset($this->request->data['enviar_arquivos']) && $this->request->isPost() ){
				$this->request->data['Curso']['site_id'] = $this->site_id;

				//Retirar mensagem de salvar com sucesso
				if($this->Curso->save($this->request->data)){
					$id_conteudo = $this->Curso->id;
					$this->set('id', $id_conteudo);
					$tipo_conteudo = 'curso';

					$myData = $this->request->data;
					unset($myData['Curso']);
					$myData = $this->recursive_array_replace('/', '-' , $myData);
					$myData = serialize($myData);

					// unset($this->request->data['Midias']);
					// $myData2 = serialize($this->request->data); 

					$seila = $this->requestAction(array('plugin' => 'midias', 
													'controller' => 'midias', 
													'tipo_conteudo' => $tipo_conteudo,
													'id_conteudo' => $id_conteudo, 
													'data' => $myData, 
													'action' => 'ra_addArquivo',
													'admin' => true));

					// ir para edição
					$this->redirect(array('controller' => 'cursos', 'action' => 'edit', 'admin' => true, $id_conteudo, 'addHide'));

				}else{
					$array = array($this->Curso->validationErrors, $this->modelClass);  //ModelClass = name model
					$this->Session->setFlash( $array, 'flash_form_error' );
				}

				if( isset($id_conteudo) ){
					$midias = $this->requestAction(array('plugin' => 'midias', 
													'controller' => 'midias', 
													'tipo_conteudo' => 'curso',
													'id_conteudo' => $id_conteudo, 
													'action' => 'ra_getMidias',
													'admin' => true));

					$this->set('midias', $midias);
				}
			}else{

				if($this->request->isPost() && !isset($this->request->data['enviar_arquivos'])){

				 	$this->request->data['Curso']['site_id'] = $this->site_id;

					if($this->Curso->save($this->request->data)){
						$this->Session->setFlash('Curso ' . $this->request->data['Curso']['nome'] . ' criado com sucesso', 'success');
						$this->redirect(array('controller' => 'cursos', 'action' => 'index', 'admin' => true));
				 	}else{
						$array = array($this->Curso->validationErrors, $this->modelClass);  //ModelClass = name model
						$this->Session->setFlash( $array, 'flash_form_error' );
					}
				}
			}

			$this->set('titulo_modulo', 'Cadastro');

			$lista_modalidades = $this->requestAction(array('plugin' => 'modalidades', 
													   'controller' => 'modalidades',
													   'action' => 'ra_getModalidades', 
													   'admin' => true));
			$this->set(compact('lista_modalidades'));
			
		}

		//Colocar no Helper do cms (Igual do Midias->Controller)
		private function recursive_array_replace($find, $replace, $array){
			if (!is_array($array)) {
				return str_replace($find, $replace, $array);
			}

			$newArray = array();
			foreach ($array as $key => $value) {
				$newArray[$key] = $this->recursive_array_replace($find, $replace , $value);
			}
			return $newArray;
		}

		public function admin_edit($id = null, $addHide = null){
			$this->Session->write('tipo_request', 'edit');

			if($id != null){
				$this->set('id_conteudo', $id);
			}

			if( isset($this->request->data['enviar_arquivos']) ){

				$id_conteudo = $id;
				$tipo_conteudo = 'curso';

				$myData = $this->data;
				unset($myData['Curso']);
				$myData = $this->recursive_array_replace('/', '-' , $myData);
				$myData = serialize($myData);

				$seila = $this->requestAction(array('plugin' => 'midias', 
												'controller' => 'midias', 
												'tipo_conteudo' => $tipo_conteudo,
												'id_conteudo' => $id_conteudo, 
												'data' => $myData, 
												'action' => 'ra_addArquivo',
												'admin' => true));
			}

			if ($this->request->isPut() && !isset($this->request->data['enviar_arquivos']) ) {
				if ($this->Curso->save($this->data)) {
					$this->Session->setFlash('Curso editado com sucesso', 'success');
					$this->redirect(array('controller' => 'cursos', 'action' => 'index', 'admin' => true));
				} else {
					$array = array($this->Curso->validationErrors, $this->modelClass);  //ModelClass = name model
					$this->Session->setFlash( $array, 'flash_form_error' );
				}
			}else{
				$this->Curso->id = $id;
				if($this->Curso->exists()){
					$this->data = $this->Curso->read();
					$this->isAllowed($id, 'Você não pode editar este curso', '/admin/cursos');
				}else{
					$this->Session->setFlash('Curso não encontrado');
					$this->redirect(array('controller' => 'cursos', 'action' => 'index', 'admin' => true));
				}
			}


			// Perguntar depois
			// if($addHide != null){
			// 	$this->set('titulo_modulo', 'Cadastro');
			// }else{
				$this->set('titulo_modulo', 'Edição');
			// }
			
			$lista_modalidades = $this->requestAction(array('plugin' => 'modalidades', 
													   'controller' => 'modalidades',
													   'action' => 'ra_getModalidades', 
													   'admin' => true));
			$this->set(compact('lista_modalidades'));


			$midias = $this->requestAction(array('plugin' => 'midias', 
												'controller' => 'midias', 
												'tipo_conteudo' => 'curso',
												'id_conteudo' => $id, 
												'action' => 'ra_getMidias',
												'admin' => true));

			$this->set('midias', $midias);
		}

		public function admin_delete($id = null){
			$this->Curso->id = $id;
			$this->request->data = $this->Curso->read();

			pr($this->request->data);

			if (!$this->Curso->exists()) {
				$this->Session->setFlash('Curso não encontrado');
			} else {
				$this->isAllowed($id, 'Você não pode deletar este curso', '/admin/cursos');

				if ($this->Curso->delete()) {
					$this->Session->setFlash('Curso ' . $this->request->data['Curso']['nome'] . ' deletado com sucesso', 'success');
				}else{
					$this->Session->setFlash('Curso não foi deletado');
				}
			}
			$this->redirect(array('controller' => 'cursos', 'action' => 'index', 'admin' => true));
		}

		public function admin_view($id = null){
			if($this->request->is('get') && $id > 0){
				$curso = $this->Curso->findById($id);
				if($curso){
					$this->isAllowed($id, 'Você não pode visualizar este curso', '/admin/cursos');
					$this->set('curso', $curso);
				}else{
					return $this->redirect(array('controller' => 'cursos', 'action' => 'index', 'admin' => true));
				}
			}else{
				return $this->redirect(array('controller' => 'cursos', 'action' => 'index', 'admin' => true));
			}
		}

		public function beforeFilter(){
	    	parent::beforeFilter();

	  //   	$action = substr($this->action, strpos($this->action, '_') + 1);
			// $titulo = 'Menu';

			// switch ($action) {
			// 	case 'index': 
			// 				$titulo = '- Listagem de Menus';
			// 				break;

			// 	case 'add': 
			// 				$titulo = '- Cadastro de ' . $titulo;
			// 				break;

			// 	case 'edit':
			// 				$titulo = '- Edição de ' . $titulo;
			// 				break;

			// 	default: 
			// 			'- ' . $titulo;
			// 			break;
			// }

			// $this->set('title_for_layout', $titulo);
		}

		public function admin_ra_removeIdModalidade($id){
			$cursos = $this->Curso->find('all', array('conditions' => array('Curso.modalidade_id' => $id)));

			foreach ($cursos as $key => $value) {
				$value['Curso']['modalidade_id'] = "";
				$cursos[$key] = $value;
			} 

			$this->Curso->saveAll($cursos);
		}
		
		
		public function ra_query($type = 'all', $options = array()) {
			if (!empty($this->request->params['requested'])) {
				if ($options) {
					$opt = json_decode(urldecode($options), true);
					return $this->Curso->find($type, $opt);
				} else {
					return $this->Curso->find($type);
				}		
			}
		}

		public function ra_view($id = null) {
			if (!empty($this->request->params['requested']) && $id > 0) {
				$curso = $this->Curso->findById($id);
				if (!$curso) return $this->redirect(Router::url('/', true));
				return $curso;
			} else {
				$this->redirect(Router::url('/', true));
			}
		}
		

		public function isAuthorized($user) {
			parent::isAuthorized($user);
		}

	}