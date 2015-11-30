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

	public $components = array('TreeList');

	public function admin_index(){
		$emptySearches = false;
		$conditions = array('Modalidade.site_id' => $this->site_id);

        $options = array(
            'fields' 	 => array('Modalidade.id', 'Modalidade.titulo', 'Modalidade.descricao', 'Modalidade.identificador'),
            'conditions' => $conditions,
            'order' 	 => array('Modalidade.lft' => 'ASC'),
            'limit' 	 => 15,
            'url' 		 => array('controller' => 'Modalidades', 'action' => 'index', 'admin' => true)
        );

	 	$this->paginate = $options;

		if(isset($this->params->query['limit'])){
	    	$this->paginate['limit'] = $this->params->query['limit'];
	    }

    	if( $this->request->isPost() ){
    		$emptySearches = true;

			if( isset($this->request->data['Modalidade']['search']) ){
				$palavra_chave = $this->request->data['Modalidade']['search'];
				if(!empty($palavra_chave)){
					$palavra_chave = '%' . trim($palavra_chave) . '%';
					$conditions[] = array("OR" => array(
												"Modalidade.titulo LIKE " => $palavra_chave,
												"Modalidade.descricao LIKE " => $palavra_chave
 										  ));
				}
			}

			if(isset($this->request->data['Modalidade']['parent_id'])){
				$palavra_chave = $this->request->data['Modalidade']['parent_id'];
				if(!empty($palavra_chave)){
					$conditions[] = "(Modalidade.parent_id = $palavra_chave
									  OR Modalidade.id = $palavra_chave)";
				}else{
					$conditions[] = "Modalidade.id > 0";
				}
			}

			if( count($conditions) > 1 ) {
				$emptySearches = false;
			}    		
    	}

		if($emptySearches){
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
            $this->paginate('Modalidade');
			$this->set('modalidadePaginate', array());
    	} else {
			$data = $this->paginate('Modalidade', $conditions);
			$this->set('modalidadePaginate', $data);	
    	}

    	$results = $this->Modalidade->find('all',
                        array(
                            'conditions' => array('Modalidade.site_id LIKE' => $this->site_id),
                            'recursive' => 1,
                            'order' => 'Modalidade.lft ASC'
                        )
                    );

    	$result = $this->TreeList->numerar($results);

		$this->set('numeracao', $result);		
    	$this->set('parents', $this->TreeList->converterToList($result));
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

		$result = $this->Modalidade->find('all', array('conditions' => array('Modalidade.site_id' => $this->site_id),
													   'order' => 'Modalidade.lft ASC'));

		$this->set('parents', $this->TreeList->numerar($result, true));
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
			$result = $this->Modalidade->find('all', array('conditions' => array('Modalidade.site_id' => $this->site_id),
													   	  'order' => 'Modalidade.lft ASC'));

			$this->set('parents', $this->TreeList->numerar($result, true));

			$this->set('data', $this->request->data);
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

		$result = $this->Modalidade->find('all', array( 'recursive' => 1,
														'fields' => array('Modalidade.id', 'Modalidade.titulo', 'Modalidade.parent_id', 'Modalidade.lft', 'Modalidade.rght'),
														'order' => 'Modalidade.lft ASC',
														'conditions' => array('Modalidade.site_id' => $this->site_id)
													  ));
		$result = $this->TreeList->numerar($result, true);

		return $result;
	}

	public function isAuthorized($user){
		parent::isAuthorized($user);
	}


}