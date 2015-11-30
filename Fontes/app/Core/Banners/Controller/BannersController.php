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
App::uses('exec_time', 'Banners.Lib');

global $time;

class BannersController extends BannersAppController {

	public $name = 'Banners';

	public $components = array('TreeList');

	public function admin_index($grupoPai_id = null){
		if( isset($grupoPai_id) )
    	{
    		$grupo = $this->Banner->Grupo->findById($grupoPai_id);
    		if(!empty($grupo)){
    			$this->set('grupo_id', $grupoPai_id);
    		}else
    		{
    			$this->Session->setFlash('Grupo não existe');
    			$this->redirect(array('controller' => 'grupos', 'action' => 'index', 'admin' => true));
    		}
    	}else{
    		$this->redirect(array('controller' => 'grupos', 'action' => 'index', 'admin' => true));
    	}

		$tipos = $this->Banner->BmTipo->find('list');

		$emptySearches = false;
		$conditions = array('Banner.grupo_id LIKE' => $grupoPai_id);

		$options = array(
            'fields'     => array('Banner.id','Banner.titulo', 'Banner.descricao', 'BmTipo.nome', 'Banner.grupo_id', 'Banner.lft', 'Banner.rght', 'testField'),
            'order'      => array('Banner.lft' => 'ASC'),
            'conditions' => $conditions,
            'limit'      => 15,
            'url'        => array('controller' => 'Banners', 'action' => 'index', 'admin' => true)
        );
		$this->paginate = $options;

		if(isset($this->params->query['limit'])){
	    	$this->paginate['limit'] = $this->params->query['limit'];
	    }

    	if( $this->request->isPost() ){
    		$emptySearches = true;
			
			$query = $this->params->query;

	    	if(isset($this->request->data['Banner']['search'])){
	    		$palavra_chave = $this->request->data['Banner']['search'];
	    		if(!empty($palavra_chave)){
	    			$palavra_chave = '%' . trim($palavra_chave) . '%';
					$conditions[] = array("OR" => array( 
												"Banner.titulo LIKE " => $palavra_chave,
												"Banner.descricao LIKE " => $palavra_chave
										  ));
	    		}
	    	}

	    	if(isset($this->request->data['Banner']['tipo'])){
    			$palavra_chave = (int)$this->request->data['Banner']['tipo'];
				if ($palavra_chave > 0) {
					$conditions[] = "Banner.bm_tipo_id = $palavra_chave";
				}else{
					$conditions[] = "Banner.bm_tipo_id > 0";
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
                    'Banner' => array
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

            $this->paginate('Banner');
			$this->set('bannerPaginate', array());
    	}else{
    		$data = $this->paginate('Banner', $conditions);
			$this->set('bannerPaginate', $data);	
    	}

    	$results = $this->Banner->find('all',
                        array(
                            'conditions' => array('Banner.grupo_id LIKE' => $grupoPai_id),
                            'recursive' => 1,
                            'order' => 'Banner.lft ASC'
                        )
                    );

		$this->set('numeracao', $this->TreeList->numerar($results));		

    	$this->set('bmTipos', $tipos);
	}

	public function admin_add($grupoPai_id = null){
		if(!empty($this->request->data) ){
			$this->set('opcao', $this->request->data['Banner']['bm_tipo_id']);
		}

		if($this->request->isPost()){
			if ( isset($this->request->data['atualizarSJS']) ) {
			}else{ 
				if(!empty($grupoPai_id) ){
					$this->request->data['Banner']['site_id'] = $this->site_id;
					$this->request->data['Banner']['grupo_id'] = $grupoPai_id;

					if($this->Banner->save($this->request->data)){
						$this->Session->setFlash('Banner ' . $this->request->data['Banner']['titulo'] . ' criado com sucesso', 'success');
						$this->redirect(array('controller' => 'banners', 'action' => 'index', 'admin' => true, $grupoPai_id));
					}else{
						$array = array($this->Banner->validationErrors, $this->modelClass);  //ModelClass = name model
						$this->Session->setFlash( $array, 'flash_form_error' );
					}
				}else{
					$this->Session->setFlash('ID do Banner não encontrado');
				}
			}
		}

		if( isset($grupoPai_id)) {
			$result = $this->Banner->Grupo->findById($grupoPai_id);
    		if( empty($result) )
    		{
    			$this->Session->setFlash('Grupo não existe');
    			$this->redirect(array('controller' => 'grupos', 'action' => 'index', 'admin' => true));
    		}
		}

		$this->set('grupo_id', $grupoPai_id );

		$this->set('titulo_modulo', 'Cadastro');
		$this->set('bmTipos', $this->Banner->BmTipo->find('list'));
		$this->set('lista_categorias', $this->requestAction( array('plugin' => 'categorias', 'controller' => 'categorias', 'action' => 'ra_getCategorias', 'admin' => true) ) );
		$this->set('lista_paginas', $this->requestAction( array('plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'ra_getPaginas', 'admin' => true) ) );
	}

	public function admin_edit($id = null) {


		$banner = $this->Banner->findById($id);
		if ($banner) {
			$this->set('banner', $banner);
			
			$result = $this->Banner->Grupo->findById($banner['Banner']['grupo_id']);
    		if( empty($result) )
    		{
    			$this->Session->setFlash('Grupo não encontrado');
    			$this->redirect(array('controller' => 'grupos', 'action' => 'index', 'admin' => true));
    		}
		}


		if(!empty($this->request->data) ){
			$this->set('opcao', $this->request->data['Banner']['bm_tipo_id']);
		}

		if ($this->request->isPut()) {
			if ( isset($this->request->data['atualizarSJS']) ) {
				//
			}else{
				 
				if ($this->Banner->save($this->data)) {
					$this->Session->setFlash('Banner editado com sucesso', 'success');
					$this->redirect(array('controller' => 'banners', 'action' => 'index', 'admin' => true, $banner['Banner']['grupo_id']));
				} else {
					$array = array($this->Banner->validationErrors, $this->modelClass);  //ModelClass = name model
					$this->Session->setFlash( $array, 'flash_form_error' );
				}
			}
		}else{
			$this->Banner->id = $id;
			if($this->Banner->exists()){
				$this->data = $this->Banner->read();
				$this->isAllowed($id, 'Você não pode editar este banner', '/admin/banners');
				$this->set('opcao', $this->data['Banner']['bm_tipo_id']);
			}else{
				$this->Session->setFlash('Banner não encontrado');
				$this->redirect(array('controller' => 'banners', 'action' => 'index', 'admin' => true));
			}
		}

		$this->set('grupo_id', $banner['Banner']['grupo_id'] );
		$this->set('titulo_modulo', 'Edição');
		$this->set('bmTipos', $this->Banner->BmTipo->find('list'));
		$this->set('lista_categorias', $this->requestAction( array('plugin' => 'categorias', 'controller' => 'categorias', 'action' => 'ra_getCategorias', 'admin' => true) ) );
		$this->set('lista_paginas', $this->requestAction( array('plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'ra_getPaginas', 'admin' => true) ) );
	}

	public function admin_delete($id = null){
		$this->Banner->id = $id;
		if($this->Banner->exists()) {
			$this->data = $this->Banner->read();
			$this->isAllowed($id, 'Você não pode deletar este banner', '/admin/banners');
			$this->set('opcao', $this->data['Banner']['bm_tipo_id']);

			if($this->Banner->delete($id)) {
				$this->Session->setFlash('Banner ' . $this->data['Banner']['titulo'] . ' deletado com sucesso', 'success');
			} else {
				$this->Session->setFlash('erro ao deletar banner');
			}
		} else {
			$this->Session->setFlash('Banner não encontrado');
		}
		$this->redirect(array('controller' => 'banners', 'action' => 'index', 'admin' => true, $this->data['Banner']['grupo_id']));
	}

	public function admin_view($id = null) {

		if ($this->request->is('get') && $id > 0) {
			$banner = $this->Banner->findById($id);
			if ($banner) {
				$this->isAllowed($id, 'Você não pode visualizar este banner', '/admin/banners');
				$this->set('banner', $banner);
			} else {
				$this->Session->setFlash('Banner não encontrado');
				return $this->redirect(array('controller' => 'banners', 'action' => 'index', 'admin' => true));
			}
		} else {
			return $this->redirect(array('controller' => 'banners', 'action' => 'index', 'admin' => true));
		}

		$this->set('bmTipos', $this->Banner->BmTipo->find('list'));
		$this->set('grupo_id', $banner['Banner']['grupo_id'] );
		$this->set('lista_paginas', $this->requestAction( array('plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'ra_getPaginas', 'admin' => true) ) );
		
		$temp = $this->requestAction( array('plugin' => 'categorias', 'controller' => 'categorias', 'action' => 'ra_getCategorias', 'admin' => true) );
		if(isset( $temp[$banner['Banner']['categoria_id']] )){
			$this->set('categoria_nome', $temp[$banner['Banner']['categoria_id']] );
		}

		$temp = $this->requestAction( array('plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'ra_getPaginas', 'admin' => true) );
		if(isset( $temp[$banner['Banner']['pagina_id']] )){
			$this->set('pagina_nome', $temp[$banner['Banner']['pagina_id']] );
		}

	}

	public function admin_moveup($id = null, $delta = null) {
		$delta = 1; 
        $this->Banner->id = $id;
        $this->data = $this->Banner->read();
	    if (!$this->Banner->exists()) {
	       throw new NotFoundException(__('Banner invalido'));
	    }

    	if( $this->Banner->moveUp($this->Banner->id, abs($delta)) == false){
    		$this->Session->setFlash('Banner não pode ser movido para cima');
    	}else{
    		$this->Session->setFlash('Banner ' . $this->data['Banner']['titulo'] . ' trocado com sucesso', 'success');
    	}

	    return $this->redirect(array('controller' => 'banners', 'action' => 'index', 'admin' => true, $this->data['Banner']['grupo_id']));
    }

	public function admin_movedown($id = null, $delta = null) {
	  	$delta = 1; 
        $this->Banner->id = $id;
        $this->data = $this->Banner->read();
	    if (!$this->Banner->exists()) {
	       throw new NotFoundException(__('Banner invalido'));
	    }

    	if( $this->Banner->moveDown($this->Banner->id, abs($delta)) == false){
    		$this->Session->setFlash('Banner não pode ser movido para baixo');
    	}else{
    		$this->Session->setFlash('Banner ' . $this->data['Banner']['titulo'] . ' trocado com sucesso', 'success');
    	}

	    return $this->redirect(array('controller' => 'banners', 'action' => 'index', 'admin' => true, $this->data['Banner']['grupo_id']));
	}

	public function ra_query($type = 'all', $options = array()) {
		if (!empty($this->request->params['requested'])) {
			if ($options) {
				$opt = json_decode(urldecode($options), true);
				return $this->Banner->find($type, $opt);
			} else {
				return $this->Banner->find($type);
			}		
		}
	}

	public function beforeFilter(){
    	parent::beforeFilter();

		$this->set('title_for_layout', $this->stringAction($this->action, 'banner') );
	}

	public function isAuthorized($user) {
		parent::isAuthorized($user);
	}
}