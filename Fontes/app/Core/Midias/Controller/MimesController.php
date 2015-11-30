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
App::uses('MidiasAppController', 'Midias.Controller');
class MimesController extends MidiasAppController {

	public $name = 'Mimes';

	public $paginate = array('limit' => 15);

	public function beforeFilter(){
		parent::beforeFilter();

		$action = substr($this->action, strpos($this->action, '_') + 1);
		$titulo = '- Extensões de Arquivos ';

		switch ($action) {
			case 'index':
						$titulo .= '- Listagem de Extensões';
						break;

			case 'add': 
						$titulo .= '- Adicionar Extensões';
						break;

			case 'edit':
						$titulo .= '- Editar Extensões';
						break;
		}

		$this->set('title_for_layout', $titulo);
	}

    public function admin_index() {

    	$emptySearches = false;
    	$conditions = null;

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

	    	if(isset($this->request->data['Mime']['search'])){
    			$palavra_chave = $this->request->data['Mime']['search'];
    			if(!empty($palavra_chave)){
    				$palavra_chave = '%' . trim($palavra_chave) . '%';
    				$conditions[] = array("OR" => array( 
												"Mime.mime LIKE " => $palavra_chave,
												"Mime.extensao LIKE " => $palavra_chave
										  ));
    				$emptySearches = false;
    			}
    		}

    		if(isset($this->request->data['Mime']['tipo_id'])){
				$palavra_chave = (int)$this->request->data['Mime']['tipo_id'];
				if ($palavra_chave > 0) {
					$conditions[] = array("Mime.tipo_id =" => $palavra_chave);
				}else{
					$conditions[] = "Mime.tipo_id > 0";
				}
				$emptySearches = false;
			}

			if(isset($this->request->data['Mime']['ativo'])){
				if($this->request->data['Mime']['ativo'] != ""){
					$palavra_chave = (int)$this->request->data['Mime']['ativo'];	
					$conditions[] = array("Mime.ativo =" => $palavra_chave);
				}else{
					$palavra_chave = (int)$this->request->data['Mime']['ativo'];
					$conditions[] = array("Mime.ativo =" => array(0, 1));
				}
				$emptySearches = false;
			}
	    }

	    if($emptySearches){
			// sem nada na pesquisa
			$this->params['paging'] = array
	            (
	                'Mime' => array
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

	        $this->paginate('Mime');
			$this->set('mimes', array());
		} else{
			$data = $this->paginate('Mime', $conditions);
			$this->set('mimes', $data);	
		}

		$this->set('tipos', $this->Mime->Tipo->find('list'));
	}

	public function admin_status($id = null) {
		$this->Mime->id = $id;
		if($this->Mime->exists()) {
			$mime = $this->Mime->read();
			$mime['Mime']['ativo'] = ($mime['Mime']['ativo'] == 0) ? 1 : 0;
			if($this->Mime->save($mime)) {
				$mensagem = ($mime['Mime']['ativo'] == 0) ? 'desativada' : 'ativada';
				$this->Session->setFlash('Extensão de arquivo '. $mime['Mime']['extensao'] . ' ' . $mensagem . ' com sucesso', 'success');
			} else {
				$mensagem = ($mime['Mime']['ativo'] == 0) ? 'desativar' : 'ativar';
				$this->Session->setFlash('Erro ao ' . $mensagem . ' extensão de arquivo ' . $mime['Mime']['extensao']);
			}
		} else {
			$this->Session->setFlash('Extensão de arquivo não encontrada');
		}
		$this->redirect($this->referer());
	}

    public function admin_add() {
		if($this->request->isPost()) {
			if($this->Mime->save($this->data)) {
				$this->Session->setFlash('Extensão de arquivo ' . $this->data['Mime']['extensao'] . ' cadastrada com sucesso', 'success');
				$this->redirect(array('controller' =>'mimes', 'action' => 'index', 'admin' => true));
			} else {
				$array = array($this->Mime->validationErrors, $this->modelClass);  //ModelClass = name model
				$this->Session->setFlash( $array, 'flash_form_error' );
			}
		}
		$this->set('tipos', $this->Mime->Tipo->find('list'));
	}

    public function admin_edit($id = null) {
		if($this->request->isPut()) {
			if($this->Mime->save($this->data)) {
				$this->Session->setFlash('Extensão de arquivo' . $this->data['Mime']['extensao'] . ' alterada com sucesso', 'success');
				$this->redirect(array('controller' =>'mimes', 'action' => 'index', 'admin' => true));
			} else {
				$array = array($this->Mime->validationErrors, $this->modelClass);  //ModelClass = name model
				$this->Session->setFlash( $array, 'flash_form_error' );
			}
		} else {
			$this->Mime->id = $id;
			if($this->Mime->exists()) {
				$this->data = $this->Mime->read();
			} else {
				$this->Session->setFlash('Extensão de arquivos não encontrada');
				$this->redirect(array('controller' =>'mimes', 'action' => 'index', 'admin' => true));
			}
		}
		$this->set('tipos', $this->Mime->Tipo->find('list'));
	}

	public function admin_delete($id = null) {
		$this->Mime->id = $id;
		if($this->Mime->exists()) 
		{
			$this->data = $this->Mime->read();
		}

		if($this->Mime->delete($id)) {
			$this->Session->setFlash('Extensão de arquivos ' . $this->data['Mime']['extensao'] . ' excluída com sucesso', 'success');
		} else {
			$this->Session->setFlash('Erro ao deletar o extensão de arquivos');
		}
		$this->redirect($this->referer());
	}

	public function isAuthorized($user) {
        parent::isAuthorized($user);
    }

}