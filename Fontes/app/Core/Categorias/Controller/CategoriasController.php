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
App::uses('CategoriasAppController', 'Categorias.Controller');

class CategoriasController extends CategoriasAppController {
	public $name = 'Categorias';

	public function admin_index(){
		$this->numerar($this->site_id);

		$options = array(
            'fields' 	 => array('Categoria.id', 'Categoria.titulo', 'Categoria.descricao', 'Categoria.identificador'),
            'conditions' => array('Categoria.site_id' => $this->site_id),
            'order' 	 => array('Categoria.lft' => 'ASC'),
            'limit' 	 => 15,
            'url' 		 => array('controller' => 'Categorias', 'action' => 'index', 'admin' => true)
        );

		$this->paginate = $options;

		$query = $this->params->query;

    	if(!empty($query)) {
	    	if( isset($query['search']) && trim($query['search']) != "") {
	    		$this->search($query);
				$this->set('categoriaPaginate', $this->paginate());

	    	} else if(isset($query['aplicar_pesquisa_avançada']) && (trim($query['palavras'] != "" || trim($query['parent_id'] != "") )   ) ){
	    		$this->advancedSearch($query);
				$this->set('categoriaPaginate', $this->paginate());

	    	} else if( isset($query['limit']) ) {
	    		$this->paginate['limit'] = $query['limit'];
	    		$this->set('categoriaPaginate', $this->paginate());

	    	} else {

	    		// sem nada na pesquisa
				$this->params['paging'] = array
	                (
	                    'Categoria' => array
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

	    		$this->set('categoriaPaginate', array());
	    	} 
    	}else {
    		$this->set('categoriaPaginate', $this->paginate());
    	} 

    	$this->set('parents', $this->Categoria->generateTreeList(array('Categoria.site_id =' => $this->site_id), null, '{n}.Categoria.titulo', ''));
	}

	private function search($query){
		if(!isset($query['search']) || trim($query['search']) == "")
			return;
		$like = '%' . trim($query['search']) . '%';
    	$this->paginate['conditions'] = array('Categoria.site_id' => $this->site_id,
    		'OR' => array(
	    		'Categoria.titulo LIKE' => $like,
	    		'Categoria.descricao LIKE' => $like
    		)
    	);
	}

	private function advancedSearch($query){
		$conditions = array('Categoria.site_id' => $this->site_id);
		
		if(isset($query['palavras'])){
			foreach(split(',', $query['palavras']) as $palavra) {
				$palavra = trim($palavra);
				if($palavra != "") {
					$conditions['OR'][]['Categoria.titulo LIKE'] = '%'.$palavra.'%';
			    	$conditions['OR'][]['Categoria.descricao LIKE'] = '%'.$palavra.'%';
			    }
			}
		}

		if(isset($query['parent_id']) && trim($query['parent_id']) != ""){
			$conditions['OR'][]['Categoria.parent_id LIKE'] = trim($query['parent_id']);
		}

    	$this->paginate['conditions'] = $conditions;
	}

	public function admin_add(){
		if($this->request->isPost()){
			if ( isset($this->request->data['addSJS']) ) {
				$this->_formAddPerfil();
			}else if( isset($this->request->data['removeSJS']) ){
				$this->_formDeletePerfil();
			}else{
				$this->request->data['Categoria']['site_id'] = $this->site_id;
			 	if($this->Categoria->saveAll($this->request->data, array('deep' => true))){
					$this->Session->setFlash('Categoria ' . $this->request->data['Categoria']['titulo'] . ' criada com sucesso', 'success');
					$this->redirect(array('controller' => 'categorias', 'action' => 'index', 'admin' => true));
				}else{
					$array = array($this->Categoria->validationErrors, $this->modelClass); //ModelClass = name model
					$this->Session->setFlash( $array, 'flash_form_error' );
				}
			}
		}

		$this->set('titulo_modulo', 'Cadastro');

		$this->set('parents', $this->Categoria->generateTreeList(array('Categoria.site_id =' => $this->site_id), null, '{n}.Categoria.titulo', null));
	}

	public function admin_edit($id = null) {
		if ($this->request->isPut()) {
			if ( isset($this->request->data['addSJS']) ) {
				$this->_formAddPerfil();
			}else if( isset($this->request->data['removeSJS']) ){
				$this->_formDeletePerfil();
			}else{
				if($this->Categoria->saveAll($this->request->data, array('validate'=>'only'))) {
					$this->request->data['Perfil'] =  array();
					if(isset($this->request->data['CategoriaPerfil']) ){
						foreach($this->request->data['CategoriaPerfil'] as $categoriaPerfil) {
						$this->request->data['Perfil'][]['CategoriaPerfil'] = $categoriaPerfil;
					}
					unset($this->request->data['CategoriaPerfil']);
					}
					if ($this->Categoria->saveAll($this->request->data)) {
						//$this->numerar($this->site_id);
						$this->Session->setFlash('Categoria editada com sucesso', 'success');
						$this->redirect(array('controller' => 'categorias', 'action' => 'index', 'admin' => true));
					} else {
						$array = array($this->Categoria->validationErrors, $this->modelClass); //ModelClass = name model
						$this->Session->setFlash( $array, 'flash_form_error' );
					}
				} else {
					$array = array($this->Categoria->validationErrors, $this->modelClass); //ModelClass = name model
					$this->Session->setFlash( $array, 'flash_form_error' );
				}
			}
		}else{
			$this->Categoria->id = $id;
			if($this->Categoria->exists()){
				$this->request->data = $this->Categoria->read();
				$this->isAllowed($id, 'Você não pode editar esta categoria', '/admin/categorias');
			}else{
				$this->Session->setFlash('Categoria não encontrada');
				$this->redirect(array('controller' => 'categorias', 'action' => 'index', 'admin' => true));	
			}
		}

		if($this->request->data){
			$this->set('data', $this->request->data);
			$this->set('parents', $this->Categoria->generateTreeList(array('Categoria.id <>' => $id, 'Categoria.site_id =' => $this->request->data['Categoria']['site_id']), null, '{n}.Categoria.titulo', null));
		}

		$this->set('titulo_modulo', 'Edição');
		
		$perfis = $this->Categoria->Perfil->find('list', array('fields'=>array('nome')));
        $this->set(compact('perfis'));
	}

	public function admin_delete($id = null){
		$this->Categoria->id = $id;
		$this->request->data = $this->Categoria->read();
		if (!$this->Categoria->exists()) {
			$this->Session->setFlash('Categoria não encontrada');
		} else {
			$this->isAllowed($id, 'Você não pode deletar esta categoria', '/admin/categorias');

			if ($this->Categoria->delete()) {
				$this->Session->setFlash('Categoria ' . $this->request->data['Categoria']['titulo'] . ' deletada com sucesso', 'success');
			}else{
				$this->Session->setFlash('Categoria não foi deletada');
			}
		}
		$this->redirect(array('controller' => 'categorias', 'action' => 'index', 'admin' => true));
	}

	public function admin_view($id = null) {
		if ($this->request->is('get') && $id > 0) {
			$categoria = $this->Categoria->findById($id);
			if ($categoria) {
				$this->isAllowed($id, 'Você não pode visualizar esta categoria', '/admin/categorias');
				$this->set('categoria', $categoria);

			} else {
				return $this->redirect(array('controller' => 'categorias', 'action' => 'index', 'admin' => true));
			}
			
		} else {
			return $this->redirect(array('controller' => 'categorias', 'action' => 'index', 'admin' => true));
		}

		$this->set('categoria_pai', $this->Categoria->findById($categoria['Categoria']['parent_id']));
	}

	private function numerar($site_id){

    	$results = $this->Categoria->find('all',
                        array(
                            'conditions' => array('Categoria.site_id LIKE' => $site_id),
                            'recursive' => 1,
                            'fields' => array('Categoria.id', 'Categoria.lft', 'Categoria.rght'),
                            'order' => 'Categoria.lft ASC'
                        )
                    );

        $stack = array();
        $lastArray = array();
        $arrayCount = array();
        $contagem = 1;

        foreach ($results as $i => $result) {
            $count = count($stack);
            while ($stack && ($stack[$count - 1] < $result['Categoria']['rght'])) {
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
            	$results[$i]['Categoria']['numero'] = $contagem ;
            }else{
            	$results[$i]['Categoria']['numero'] = ( $contagemPai ) . '.' . $contagem ;
            }
            $stack[] = $result['Categoria']['rght'];
            $contagem++;
        }
        $this->set('numeracao', $results);
    }

	private function _formAddPerfil(){
		if( array_key_exists('CategoriaPerfil', $this->request->data) ){
			array_push( $this->request->data['CategoriaPerfil'], array('id' => $this->request->data['unused']['lastRow']) );
		}else{
			$this->request->data['CategoriaPerfil'] = array('id' => '0');
		}
	}

	private function _formDeletePerfil(){
		unset($this->request->data['CategoriaPerfil'][$this->request->data['removeSJS']]);
		sort($this->request->data['CategoriaPerfil']);
	}

	public function beforeFilter(){
    	parent::beforeFilter();
		$this->set('title_for_layout', $this->stringAction($this->action, 'categoria') );
	}

	public function ra_query($type = 'all', $options = array()) {
		if (!empty($this->request->params['requested'])) {
			if ($options) {
				$opt = json_decode(urldecode($options), true);
				return $this->Categoria->find($type, $opt);
			} else {
				return $this->Categoria->find($type);
			}		
		}
	}

	public function admin_ra_getCategorias(){
		if(!$this->request->params['requested']){
			return null;
		}

		return $this->Categoria->find('list', array( 'fields' => array('Categoria.id', 'Categoria.titulo')));
	}

	public function isAuthorized($user) {
		parent::isAuthorized($user);
	}


}