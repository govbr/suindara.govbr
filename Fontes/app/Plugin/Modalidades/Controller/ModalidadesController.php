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
App::uses('ModalidadesAppController', 'Modalidades.Controller');

class ModalidadesController extends ModalidadesAppController {

	public $name = 'Modalidades';

	public function admin_index(){
		$this->numerar($this->site_id);

        $options = array(
            'fields' 	 => array('Modalidade.id', 'Modalidade.titulo', 'Modalidade.descricao', 'Modalidade.identificador'),
            'conditions' => array('Modalidade.site_id' => $this->site_id),
            'order' 	 => array('Modalidade.lft' => 'ASC'),
            'limit' 	 => 15,
            'url' 		 => array('controller' => 'Modalidades', 'action' => 'index', 'admin' => true)
        );

	 	$this->paginate = $options;

		if(isset($this->params->query['limit'])){
	    	$this->paginate['limit'] = $this->params->query['limit'];
	    }

    	if( $this->request->isPost() ){
	    	if( isset($this->request->data['Modalidade']['search']) && trim($this->request->data['Modalidade']['search']) != "") {
	    		$this->search($this->request->data['Modalidade']['search']);

	    	} else if(isset($this->request->data['Modalidade']['palavras']) && (trim($this->request->data['Modalidade']['palavras'] != "" || trim($this->request->data['Modalidade']['parent_id'] != "") )   ) ){
	    		$this->advancedSearch($this->request->data['Modalidade']['palavras'], $this->request->data['Modalidade']['parent_id']);

	    	} else {

	    		// sem nada na pesquisa
				$this->params['paging'] = array
	                (
	                    'Modalidade' => array
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

	    		$this->set('modalidadePaginate', array());
	    	} 
    	}

    	$this->set('modalidadePaginate', $this->paginate());

 		$this->set('parents', $this->Modalidade->generateTreeList(array('Modalidade.site_id =' => $this->site_id), null, '{n}.Modalidade.titulo', ''));
	}

	private function search($query){
		if(!isset($query) || trim($query) == "")
			return;
		$like = '%' . trim($query) . '%';
    	$this->paginate['conditions'] = array('Modalidade.site_id' => $this->site_id,
    		'OR' => array(
	    		'Modalidade.titulo LIKE' => $like,
	    		'Modalidade.descricao LIKE' => $like
    		)
    	);
	}

	private function advancedSearch($palavras, $parent_id){
		$conditions = array('Modalidade.site_id' => $this->site_id);
		
		if(isset($palavras)){
			foreach(split(',', $palavras) as $palavra) {
				$palavra = trim($palavra);
				if($palavra != "") {
					$conditions['OR'][]['Modalidade.titulo LIKE'] = '%'.$palavra.'%';
			    	$conditions['OR'][]['Modalidade.descricao LIKE'] = '%'.$palavra.'%';
			    }
			}
		}

		if(isset($parent_id) && trim($parent_id) != ""){
			$conditions['OR'][]['Modalidade.parent_id LIKE'] = trim($parent_id);
		}

 	 	$this->paginate['conditions'] = $conditions;
	}

	public function admin_add(){
		if($this->request->isPost()){
			$this->request->data['Modalidade']['site_id'] = $this->site_id;
		 	if($this->Modalidade->saveAll($this->request->data, array('deep' => true))){
				$this->Session->setFlash('Modalidade ' . $this->request->data['Modalidade']['titulo'] . ' criada com sucesso', 'success');
				$this->redirect(array('controller' => 'modalidades', 'action' => 'index', 'admin' => true));
			}else{
				$array = array($this->Modalidade->validationErrors, $this->modelClass); //ModelClass = name model
				$this->Session->setFlash( $array, 'flash_form_error' );
			}
		}

		$this->set('titulo_modulo', 'Cadastro');

		$this->set('parents', $this->Modalidade->generateTreeList(array('Modalidade.site_id =' => $this->site_id), null, '{n}.Modalidade.titulo', null));
	}

	public function admin_edit($id = null) {
		if ($this->request->isPut()) {
			if($this->Modalidade->saveAll($this->request->data, array('validate'=>'only'))) {
				if ($this->Modalidade->saveAll($this->request->data)) {
					$this->Session->setFlash('Modalidade editada com sucesso', 'success');
					$this->redirect(array('controller' => 'modalidades', 'action' => 'index', 'admin' => true));
				} else {
					$array = array($this->Modalidade->validationErrors, $this->modelClass); //ModelClass = name model
					$this->Session->setFlash( $array, 'flash_form_error' );
				}
			} else {
				$array = array($this->Modalidade->validationErrors, $this->modelClass); //ModelClass = name model
				$this->Session->setFlash( $array, 'flash_form_error' );
			}
		}else{
			$this->Modalidade->id = $id;
			if($this->Modalidade->exists()){
				$this->request->data = $this->Modalidade->read();
				$this->isAllowed($id, 'Você não pode editar esta modalidade', '/admin/modalidades');
			}else{
				$this->Session->setFlash('Modalidade não encontrada');
				$this->redirect(array('controller' => 'modalidades', 'action' => 'index', 'admin' => true));	
			}
	 	}

		if($this->request->data){
			$this->set('data', $this->request->data);
			$this->set('parents', $this->Modalidade->generateTreeList(array('Modalidade.id <>' => $id, 'Modalidade.site_id =' => $this->request->data['Modalidade']['site_id']), null, '{n}.Modalidade.titulo', null));
		}

		$this->set('titulo_modulo', 'Edição');
	}

	public function admin_delete($id = null){
		$this->Modalidade->id = $id;
		$this->request->data = $this->Modalidade->read();
		if (!$this->Modalidade->exists()) {
			$this->Session->setFlash('Modalidade não encontrada');
		} else {
			$this->isAllowed($id, 'Você não pode deletar esta modalidade', '/admin/modalidades');

			if ($this->Modalidade->delete()) {
				$this->Session->setFlash('Modalidade ' . $this->request->data['Modalidade']['titulo'] . ' deletada com sucesso', 'success');
			}else{
				$this->Session->setFlash('Modalidade não foi deletada');
			}
		}
		$this->redirect(array('controller' => 'modalidades', 'action' => 'index', 'admin' => true));
	}

	public function admin_view($id = null) {
		if ($this->request->is('get') && $id > 0) {
			$modalidade = $this->Modalidade->findById($id);
			if ($modalidade) {
				$this->isAllowed($id, 'Você não pode visualizar esta modalidade', '/admin/modalidades');
				$this->set('modalidade', $modalidade);

			} else {
				return $this->redirect(array('controller' => 'modalidades', 'action' => 'index', 'admin' => true));
			}
			
		} else {
			return $this->redirect(array('controller' => 'modalidades', 'action' => 'index', 'admin' => true));
		}

		$this->set('modalidade_pai', $this->Modalidade->findById($modalidade['Modalidade']['parent_id']));
	}

	private function numerar($site_id){
	    	$results = $this->Modalidade->find('all',
	                        array(
	                            'conditions' => array('Modalidade.site_id LIKE' => $site_id),
	                            'recursive' => 1,
	                            'fields' => array('Modalidade.id', 'Modalidade.lft', 'Modalidade.rght'),
	                            'order' => 'Modalidade.lft ASC'
	                        )
	                    );

	        $this->set('numeracao', $this->numeracao($results));
    }

    private function numeracao($results){
    	$stack = array();
        $lastArray = array();
        $arrayCount = array();
        $contagem = 1;

        foreach ($results as $i => $result) {
            $count = count($stack);
            while ($stack && ($stack[$count - 1] < $result['Modalidade']['rght'])) {
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
            	$results[$i]['Modalidade']['numero'] = $contagem ;
            }else{
            	$results[$i]['Modalidade']['numero'] = ( $contagemPai ) . '.' . $contagem ;
            }
            $stack[] = $result['Modalidade']['rght'];
            $contagem++;
        }

	    return $results;
    }

	public function beforeFilter(){
    	parent::beforeFilter();
	}

	public function ra_query($type = 'all', $options = array()) {
		if (!empty($this->request->params['requested'])) {
			if ($options) {
				$opt = json_decode(urldecode($options), true);
				return $this->Modalidade->find($type, $opt);
			} else {
				return $this->Modalidade->find($type);
			}		
		}
	}

	public function admin_ra_getModalidades(){
		if(!$this->request->params['requested']){
			return null;
		}

		return $this->Modalidade->find('list', array( 'fields' => array('Modalidade.id', 'Modalidade.titulo')));
	}

	public function isAuthorized($user){
		parent::isAuthorized($user);
	}


}