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


		$this->numerar($grupoPai_id);

		$options = array(
            'fields' => array('Banner.id','Banner.titulo', 'Banner.descricao', 'BmTipo.nome', 'Banner.grupo_id', 'Banner.lft', 'Banner.rght', 'testField'),
            'order' => array('Banner.lft' => 'ASC'),
            'limit' => 15,
            'url' => array('controller' => 'Banners', 'action' => 'index', 'admin' => true)
        );
		$this->paginate = $options;

		$query = $this->params->query;

		if(isset($this->params->query['limit'])){
	    	$this->paginate['limit'] = $this->params->query['limit'];
	    }

    	if( $this->request->isPost() ){
	    	if( isset($this->request->data['Banner']['search']) && trim($this->request->data['Banner']['search']) != "") {
	    		$this->search($this->request->data['Banner']['search']);

	    	} else if(isset($this->request->data['Banner']['palavras']) && (trim($this->request->data['Banner']['palavras'] != "" || trim($this->request->data['Banner']['tipo'] != "") )   ) ){
	    		$this->advancedSearch($this->request->data['Banner']['palavras'], $this->request->data['Banner']['tipo']);

	    	} else {

	    		// sem nada na pesquisa
				$this->params['paging'] = array
	                (
	                    'Banner' => array
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

	    		$this->set('bannerPaginate', array());
	    	} 
    	}
		
		$this->set('bannerPaginate', $this->paginate('Banner', array('Banner.grupo_id LIKE' => $grupoPai_id)) );	

    	$this->set('bmTipos', $this->Banner->BmTipo->find('list'));
	}

	private function search($query){
		if(!isset($query) || trim($query) == "")
			return;
		$like = '%' . trim($query) . '%';
    	$this->paginate['conditions'] = array('Banner.site_id' => $this->site_id,
    		'OR' => array(
	    		'Banner.titulo LIKE' => $like,
	    		'Banner.descricao LIKE' => $like
    		)
    	);
	}

	private function advancedSearch($palavras, $tipo){
		$conditions = array('Banner.site_id' => $this->site_id);
		
		if(isset($palavras)){
			foreach(split(',', $palavras) as $palavra) {
				$palavra = trim($palavra);
				if($palavra != "") {
					$conditions['OR'][]['Banner.titulo LIKE'] = '%'.$palavra.'%';
			    	$conditions['OR'][]['Banner.descricao LIKE'] = '%'.$palavra.'%';
			    }
			}
		}

		if(isset($tipo) && trim($tipo) != ""){
			$conditions['OR'][]['Banner.bm_tipo_id LIKE'] = '%'.trim($tipo).'%';
		}

    	$this->paginate['conditions'] = $conditions;
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

	private function numerar($grupoPai_id){
			// $time = new exec_time();
			// $time->startExec();
	    	$results = $this->Banner->find('all',
                            array(
                                'conditions' => array('Banner.grupo_id LIKE' => $grupoPai_id),
                                'recursive' => 1,
                                'fields' => array('Banner.id', 'Banner.lft', 'Banner.rght'),
                                'order' => 'Banner.lft ASC'
                            )
                        );
	    	//debug('Find Numerar: ' . $time->endExec());

	        $stack = array();
	        $lastArray = array();
	        $arrayCount = array();
	        $contagem = 1;

	        foreach ($results as $i => $result) {
	            $count = count($stack);
	            while ($stack && ($stack[$count - 1] < $result['Banner']['rght'])) {
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
	            	$results[$i]['Banner']['numero'] = $contagem ;
	            }else{
	            	$results[$i]['Banner']['numero'] = ( $contagemPai ) . '.' . $contagem ;
	            }
	            $stack[] = $result['Banner']['rght'];
	            $contagem++;
	        }

	        $this->set('numeracao', $results);
	    }
}