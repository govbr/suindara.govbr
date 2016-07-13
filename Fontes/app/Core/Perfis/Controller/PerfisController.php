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

App::uses('PerfisAppController', 'Perfis.Controller');

class PerfisController extends PerfisAppController {

	public $name = 'Perfis';

	public $paginate = array('limit' => 15);

	public function admin_index(){
		$query = $this->params->query;
    	
    	if(!empty($query)) {
	    	if( isset($query['search']) && trim($query['search']) != "") {
	    		$this->search($query);
	    		
	    		$this->paginate['conditions']['Perfil.site_id'] = $this->site_id;
				$this->set('perfilPaginate', $this->paginate('Perfil'));

	    	} else if( isset($query['limit']) ) {
	    			$this->paginate['limit'] = $query['limit'];
	    			
	    			$this->paginate['conditions']['Perfil.site_id'] = $this->site_id;
					$this->set('perfilPaginate', $this->paginate('Perfil'));

	    	} else {
		    		// sem nada na pesquisa
					$this->params['paging'] = array
		                (
		                    'Perfil' => array
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

		    		$this->set('perfilPaginate', array());
		    	} 

    	} else {
			$this->paginate['conditions']['Perfil.site_id'] = $this->site_id;
			$this->set('perfilPaginate', $this->paginate('Perfil'));
    	}


	}

	private function search($query){
		if(!isset($query['search']) || trim($query['search']) == "")
			return;
		$like = '%' . trim($query['search']) . '%';
    	$this->paginate['conditions'] = array(
    		'OR' => array(
	    		'Perfil.nome LIKE' => $like,
	    		'Perfil.descricao LIKE' => $like
    		)
    	);
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->request->data['Perfil']['site_id'] = $this->site_id;
			if($this->Perfil->saveAll($this->request->data)){
				$this->Session->setFlash('Perfil criado com sucesso', 'success');
				$this->redirect(array('controller' => 'perfis', 'action' => 'index', 'admin' => true));
			}else{
				$array = array($this->Perfil->validationErrors, $this->modelClass);  //ModelClass = name model
				$this->Session->setFlash( $array, 'flash_form_error' );
			}
		}

		$this->set('titulo_modulo', 'Cadastro');
	}

	public function admin_edit($id = null){
		if ($this->request->is('put')) {
			if ($this->Perfil->save($this->data)) {
				$this->Session->setFlash('Perfil editado com sucesso', 'success');
				$this->redirect(array('controller' => 'perfis', 'action' => 'index', 'admin' => true));
			} else {
				$array = array($this->Perfil->validationErrors, $this->modelClass);  //ModelClass = name model
				$this->Session->setFlash( $array, 'flash_form_error' );
			}
		}else{
			$this->Perfil->id = $id;
			if($this->Perfil->exists()){
				$this->data = $this->Perfil->read();
				$this->isAllowed($id, 'Você não pode visualizar este perfil', '/admin/perfis');
			}else{
				$this->Session->setFlash('Perfil não encontrado');
				$this->redirect(array('controller' => 'perfis', 'action' => 'index', 'admin' => true));
			}
		}

		$this->set('titulo_modulo', 'Edição');
	}

	public function admin_delete($id = null){
		$this->Perfil->id = $id;
		$this->request->data = $this->Perfil->read();
		if (!$this->Perfil->exists()) {
			$this->Session->setFlash('Perfil não encontrado');
		} else {
			$this->isAllowed($id, 'Você não pode deletar este perfil', '/admin/perfis');

			if ($this->Perfil->delete()) {
				$this->Session->setFlash('Perfil ' . $this->request->data['Perfil']['nome'] . ' deletado com sucesso', 'success');
			}else{
				$this->Session->setFlash('Perfil não foi deletado');
			}
		}
		$this->redirect(array('controller' => 'perfis', 'action' => 'index', 'admin' => true));
	}	

	public function admin_view($id = null){
		if ($this->request->is('get') && $id > 0) {
			$perfil = $this->Perfil->findById($id);
			if ($perfil) {
				$this->isAllowed($id, 'Você não pode visualizar este perfil', '/admin/perfis');
				$this->set('perfil', $perfil);
			} else {
				return $this->redirect(array('controller' => 'perfis', 'action' => 'index', 'admin' => true));
			}
			
		} else {
			return $this->redirect(array('controller' => 'perfis', 'action' => 'index', 'admin' => true));
		}
	}

	public function admin_ra_deleteSite($id = null){
		if($id){
			$perfilSite_id = $this->Perfil->findBySiteId($id);
			
			if(!empty($perfilSite_id)){
				$perfilSite_id['Perfil']['site_id'] = 0;
    			$this->Perfil->save($perfilSite_id);
			}
		}
	}

	public function beforeFilter(){
    	parent::beforeFilter();
		$this->set('title_for_layout', $this->stringAction($this->action, 'perfil') );
	}

	public function isAuthorized($user) {
        parent::isAuthorized($user);
    }
}