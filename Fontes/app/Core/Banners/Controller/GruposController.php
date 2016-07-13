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

App::uses('BannersAppController', 'Banners.Controller');


	class GruposController extends BannersAppController {
		
		public $name = 'Grupos';

		public function admin_index(){
			$options = array(
	            'fields' => array('Grupo.id','Grupo.nome'),
	            'conditions' => array('Grupo.site_id' => $this->site_id),
	            'limit' => 15
        	);
        	$this->paginate = $options;

			$query = $this->params->query;

	    	if(!empty($query)) {

		    	if( isset($query['search']) && trim($query['search']) != "") {
		    		$this->search($query, $this->site_id);
		    		$this->set('grupoPaginate', $this->paginate());	

		    	}else if(isset($query['limit'])){
	    			$this->paginate['limit'] = $query['limit'];
	    			$this->set('grupoPaginate', $this->paginate());	

		    	}else {

	    		// sem nada na pesquisa
				$this->params['paging'] = array
	                (
	                    'Grupo' => array
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

	    		$this->set('grupoPaginate', array());
	    	} 

	    	}else {
    			$this->set('grupoPaginate', $this->paginate());
    		} 
		}

		private function search($query, $site_id){
			if(!isset($query['search']) || trim($query['search']) == "")
				return;
			$like = '%' . trim($query['search']) . '%';
	    	$this->paginate['conditions'] = array('Grupo.site_id' => $this->site_id,
	    		'OR' => array(
		    		'Grupo.nome LIKE' => $like
	    		)
	    	);
		}

		public function admin_add(){
			if($this->request->isPost()){
				$this->request->data['Grupo']['site_id'] = $this->site_id;
				if($this->Grupo->save($this->request->data)){
					$this->Session->setFlash('Grupo ' . $this->request->data['Grupo']['nome'] . ' criado com sucesso', 'success');
					$this->redirect(array('controller' => 'grupos', 'action' => 'index', 'admin' => true));
				}else{
					$array = array($this->Grupo->validationErrors, $this->modelClass);  //ModelClass = name model
					$this->Session->setFlash( $array, 'flash_form_error' );
				}
			}

			$this->set('titulo_modulo', 'Cadastro');
		}

		public function admin_edit($id = null){
			if ($this->request->isPut()) {
				if ($this->Grupo->save($this->data)) {
					$this->Session->setFlash('Grupo editado com sucesso', 'success');
					$this->redirect(array('controller' => 'grupos', 'action' => 'index', 'admin' => true));
				} else {
					$array = array($this->Grupo->validationErrors, $this->modelClass);  //ModelClass = name model
					$this->Session->setFlash( $array, 'flash_form_error' );
				}
			}else{
				$this->Grupo->id = $id;
				if($this->Grupo->exists()){
					$this->data = $this->Grupo->read();
					$this->isAllowed($id, 'Você não pode editar este grupo', '/admin/grupos');
				}else{
					$this->Session->setFlash('Grupo não encontrado');
					$this->redirect(array('controller' => 'grupos', 'action' => 'index', 'admin' => true));
				}
			}

			$this->set('titulo_modulo', 'Edição');			
		}

		public function admin_delete($id = null){
			$this->Grupo->id = $id;
			$this->request->data = $this->Grupo->read();
			if (!$this->Grupo->exists()) {
				$this->Session->setFlash('Grupo não encontrado');
			} else {
				$this->isAllowed($id, 'Você não pode deletar este grupo', '/admin/grupos');

				if ($this->Grupo->delete()) {
					$this->Session->setFlash('Grupo ' . $this->request->data['Grupo']['nome'] . ' deletado com sucesso', 'success');
				}else{
					$this->Session->setFlash('Grupo não foi deletado');
				}
			}
			$this->redirect(array('controller' => 'grupos', 'action' => 'index', 'admin' => true));
		}

		public function admin_view($id = null){
			if($this->request->is('get') && $id > 0){
				$grupo = $this->Grupo->findById($id);
				if($grupo){
					$this->isAllowed($id, 'Você não pode visualizar este grupo', '/admin/grupos');
					$this->set('grupo', $grupo);
				}else{
					return $this->redirect(array('controller' => 'grupos', 'action' => 'index', 'admin' => true));
				}
			}else{
				return $this->redirect(array('controller' => 'grupos', 'action' => 'index', 'admin' => true));
			}
		}
		
		
	public function admin_ra_getGrupos(){
		if(!$this->request->params['requested']){
			return null;
		}
		return $this->Grupo->find('list', array('Grupo.id', 'Grupo.nome'));
	}
	
	public function beforeFilter(){
    	parent::beforeFilter();
		$this->set('title_for_layout', $this->stringAction($this->action, 'grupo') );
	}
		
	public function ra_query($type = 'all', $options = array()) {
		if (!empty($this->request->params['requested'])) {
			if ($options) {
				$opt = json_decode(urldecode($options), true);
				//$opt['order'] = array('GrupoItem.lft');
				return $this->Grupo->find($type, $opt);
			} else {
				return $this->Grupo->find($type);
			}		
		}
	}
		

	public function isAuthorized($user) {
		parent::isAuthorized($user);
	}	

}