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
App::uses('TipoEditaisAppController', 'TipoEditais.Controller');

class TipoEditaisController extends TipoEditaisAppController {

	public $name = 'TipoEditais';

	public function admin_index(){
		$this->numerar($this->site_id);

        $options = array(
            'fields' 	 => array('TipoEdital.id', 'TipoEdital.titulo', 'TipoEdital.descricao', 'TipoEdital.identificador'),
            'conditions' => array('TipoEdital.site_id' => $this->site_id),
            'order' 	 => array('TipoEdital.lft' => 'ASC'),
            'limit' 	 => 15,
            'url' 		 => array('controller' => 'TipoEditais', 'action' => 'index', 'admin' => true)
        );

	 	$this->paginate = $options;

		if(isset($this->params->query['limit'])){
	    	$this->paginate['limit'] = $this->params->query['limit'];
	    }

    	if( $this->request->isPost() ){
	    	if( isset($this->request->data['TipoEdital']['search']) && trim($this->request->data['TipoEdital']['search']) != "") {
	    		$this->search($this->request->data['TipoEdital']['search']);

	    	} else if(isset($this->request->data['TipoEdital']['palavras']) && (trim($this->request->data['TipoEdital']['palavras'] != "" || trim($this->request->data['Modalidade']['parent_id'] != "") )   ) ){
	    		$this->advancedSearch($this->request->data['TipoEdital']['palavras'], $this->request->data['TipoEdital']['parent_id']);

	    	} else {

	    		// sem nada na pesquisa
				$this->params['paging'] = array
	                (
	                    'TipoEdital' => array
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

	    		$this->set('tipoEditalPaginate', array());
	    	} 
    	}

    	$this->set('tipoEditalPaginate', $this->paginate());

 		$this->set('parents', $this->TipoEdital->generateTreeList(array('TipoEdital.site_id =' => $this->site_id), null, '{n}.TipoEdital.titulo', ''));
	}

	private function search($query){
		if(!isset($query) || trim($query) == "")
			return;
		$like = '%' . trim($query) . '%';
    	$this->paginate['conditions'] = array('TipoEdital.site_id' => $this->site_id,
    		'OR' => array(
	    		'TipoEdital.titulo LIKE' => $like,
	    		'TipoEdital.descricao LIKE' => $like
    		)
    	);
	}

	private function advancedSearch($palavras, $parent_id){
		$conditions = array('TipoEdital.site_id' => $this->site_id);
		
		if(isset($palavras)){
			foreach(split(',', $palavras) as $palavra) {
				$palavra = trim($palavra);
				if($palavra != "") {
					$conditions['OR'][]['TipoEdital.titulo LIKE'] = '%'.$palavra.'%';
			    	$conditions['OR'][]['TipoEdital.descricao LIKE'] = '%'.$palavra.'%';
			    }
			}
		}

		if(isset($parent_id) && trim($parent_id) != ""){
			$conditions['OR'][]['TipoEdital.parent_id LIKE'] = trim($parent_id);
		}

 	 	$this->paginate['conditions'] = $conditions;
	}

	public function admin_add(){
		if($this->request->isPost()){
			$this->request->data['TipoEdital']['site_id'] = $this->site_id;
		 	if($this->TipoEdital->saveAll($this->request->data, array('deep' => true))){
				$this->Session->setFlash('Tipo de edital ' . $this->request->data['TipoEdital']['titulo'] . ' criada com sucesso', 'success');
				$this->redirect(array('controller' => 'tipoEditais', 'action' => 'index', 'admin' => true));
			}else{
				$array = array($this->TipoEdital->validationErrors, $this->modelClass); //ModelClass = name model
				$this->Session->setFlash( $array, 'flash_form_error' );
			}
		}

		$this->set('titulo_modulo', 'Cadastro');

		$this->set('parents', $this->TipoEdital->generateTreeList(array('TipoEdital.site_id =' => $this->site_id), null, '{n}.TipoEdital.titulo', null));
	}

	public function admin_edit($id = null) {
		if ($this->request->isPut()) {
			if($this->TipoEdital->saveAll($this->request->data, array('validate'=>'only'))) {
				if ($this->TipoEdital->saveAll($this->request->data)) {
					$this->Session->setFlash('Tipo de edital editado com sucesso', 'success');
					$this->redirect(array('controller' => 'tipoEditais', 'action' => 'index', 'admin' => true));
				} else {
					$array = array($this->TipoEdital->validationErrors, $this->modelClass); //ModelClass = name model
					$this->Session->setFlash( $array, 'flash_form_error' );
				}
			} else {
				$array = array($this->TipoEdital->validationErrors, $this->modelClass); //ModelClass = name model
				$this->Session->setFlash( $array, 'flash_form_error' );
			}
		}else{
			$this->TipoEdital->id = $id;
			if($this->TipoEdital->exists()){
				$this->request->data = $this->TipoEdital->read();
				$this->isAllowed($id, 'Você não pode editar esta modalidade', '/admin/tipoEditais');
			}else{
				$this->Session->setFlash('Tipo de edital não encontrado');
				$this->redirect(array('controller' => 'tipoEditais', 'action' => 'index', 'admin' => true));	
			}
	 	}

		if($this->request->data){
			$this->set('data', $this->request->data);
			$this->set('parents', $this->TipoEdital->generateTreeList(array('TipoEdital.id <>' => $id, 'TipoEdital.site_id =' => $this->request->data['TipoEdital']['site_id']), null, '{n}.TipoEdital.titulo', null));
		}

		$this->set('titulo_modulo', 'Edição');
	}

	public function admin_delete($id = null){
		$this->TipoEdital->id = $id;
		$this->request->data = $this->TipoEdital->read();
		if (!$this->TipoEdital->exists()) {
			$this->Session->setFlash('Tipo de Edital não encontrado');
		} else {
			$this->isAllowed($id, 'Você não pode deletar esta modalidade', '/admin/tipoEditais');

			if ($this->TipoEdital->delete()) {
				$this->Session->setFlash('TipoEdital ' . $this->request->data['TipoEdital']['titulo'] . ' deletada com sucesso', 'success');
			}else{
				$this->Session->setFlash('Tipo de edital não foi deletado');
			}
		}
		$this->redirect(array('controller' => 'tipoEditais', 'action' => 'index', 'admin' => true));
	}

	public function admin_view($id = null) {
		if ($this->request->is('get') && $id > 0) {
			$tipoEdital = $this->TipoEdital->findById($id);
			if ($tipoEdital) {
				$this->isAllowed($id, 'Você não pode visualizar este tipo de edital', '/admin/tipoEditais');
				$this->set('tipoEdital', $tipoEdital);

			} else {
				return $this->redirect(array('controller' => 'tipoEditais', 'action' => 'index', 'admin' => true));
			}
			
		} else {
			return $this->redirect(array('controller' => 'tipoEditais', 'action' => 'index', 'admin' => true));
		}

		$this->set('tipoEdital_pai', $this->TipoEdital->findById($tipoEdital['TipoEdital']['parent_id']));
	}

	private function numerar($site_id){
	    	$results = $this->TipoEdital->find('all',
	                        array(
	                            'conditions' => array('TipoEdital.site_id LIKE' => $site_id),
	                            'recursive' => 1,
	                            'fields' => array('TipoEdital.id', 'TipoEdital.lft', 'TipoEdital.rght'),
	                            'order' => 'TipoEdital.lft ASC'
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
            while ($stack && ($stack[$count - 1] < $result['TipoEdital']['rght'])) {
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
            	$results[$i]['TipoEdital']['numero'] = $contagem ;
            }else{
            	$results[$i]['TipoEdital']['numero'] = ( $contagemPai ) . '.' . $contagem ;
            }
            $stack[] = $result['TipoEdital']['rght'];
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
				return $this->TipoEdital->find($type, $opt);
			} else {
				return $this->TipoEdital->find($type);
			}		
		}
	}

	public function admin_ra_getTipoEditais(){
		if(!$this->request->params['requested']){
			return null;
		}

		$results = $this->TipoEdital->find('all',
	                        array(
	                            'conditions' => array('TipoEdital.site_id LIKE' => $this->site_id),
	                            'recursive' => 1,
	                            'fields' => array('TipoEdital.id', 'TipoEdital.titulo', 'TipoEdital.lft', 'TipoEdital.rght'),
	                            'order' => 'TipoEdital.lft ASC'
	                        )
	                    );

		return $this->numeracao($results);
	}

	public function isAuthorized($user){
		parent::isAuthorized($user);
	}


}