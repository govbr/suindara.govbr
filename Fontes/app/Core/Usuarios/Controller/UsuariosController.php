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
App::uses('UsuariosAppController', 'Usuarios.Controller');
class UsuariosController extends UsuariosAppController {

	public $name = 'Usuarios';

	public $paginate = array('limit' => 15);

    public function admin_index() {
    	//$this->set('title_for_layout', 'Usu&aacute;rios');

    	$query = $this->params->query;
    	if(!empty($query)) {
	    	if(isset($query['search'])) {
	    		$this->prepareSearch($query);
	    	} elseif(isset($query['limit'])) {
	    		$this->paginate['limit'] = $query['limit'];
	    	} else {
	    		$this->prepareAdvancedSearch($query);
	    	}
    	}
    	$this->Usuario->Behaviors->load('Containable');
    	$usuarios_importados_raw = $this->Usuario->find('all', array(
    		'conditions' => array(
    			'Usuario.site_id <> ' => $this->site_id,
    			),
    		'contain' => array(
    			'Perfil' => array(
    				'conditions' => array(
    					'Perfil.site_id' => $this->site_id
    					)
    				)
    			)
    		)
    	);
    	$usuarios_importados = array();
    	foreach($usuarios_importados_raw as $usuario) {
    		if(!empty($usuario['Perfil']))
    			$usuarios_importados[] = $usuario['Usuario']['id'];
    	}

    	$this->data = $query;
    	$this->paginate['conditions']['AND']['OR']['Usuario.site_id'] = $this->site_id;
    	$this->paginate['conditions']['AND']['OR']['Usuario.id'] = $usuarios_importados;

    	if (isset($query['search']) && empty($query['search']))
    	{
    		$this->params['paging'] = array
                (
                    'Usuario' => array
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

               // $this->paginate();
                $this->set('usuarios', array());
    	}
    	else
    	{
    		$this->set('usuarios', $this->paginate());
    	}

		$this->set('isLoggedUserRoot', $this->Auth->User('root'));
		$this->set('departamentos', $this->Usuario->find('departamentos', array('conditions' => array('Usuario.site_id' => $this->site_id))));
		$this->set('instituicoes', $this->Usuario->find('instituicoes', array('conditions' => array('Usuario.site_id' => $this->site_id))));
	}

	private function prepareSearch($query) {
		if(trim($query['search']) == "")
			return;

		$like = '%' . trim($query['search']) . '%';

    	$this->paginate['conditions'] = array(
    		'OR' => array(
	    		'Usuario.nome LIKE' => $like,
	    		'Usuario.email LIKE' => $like
    		)
    	);
	}

	private function prepareAdvancedSearch($query) {
		$conditions = array();
		
		if(isset($query['palavras'])) {
			foreach(split(',', $query['palavras']) as $palavra) {
				$palavra = trim($palavra);
				if($palavra != "") {
					$this->paginate['conditions']['OR'][]['Usuario.nome LIKE'] = '%'.$palavra.'%';
			    	$this->paginate['conditions']['OR'][]['Usuario.email LIKE'] = '%'.$palavra.'%';
			    }
			}
		}

		if(isset($query['departamento']) && trim($query['departamento']) != "")
			$this->paginate['conditions']['OR'][]['Usuario.departamento LIKE'] = '%'.trim($query['departamento']).'%';

		if(isset($query['instituicao']) && trim($query['instituicao']) != "")
			$this->paginate['conditions']['OR'][]['Usuario.instituicao LIKE'] = '%'.trim($query['instituicao']).'%';
	}

	public function admin_fontes() {
		return $this->Usuario->Fonte->find('list');
	}

	public function admin_contrastes() {
		return $this->Usuario->Contraste->find('list');
	}

	public function admin_sites() {
		$user = $this->Usuario->read(null, $this->Auth->user('id'));

    	$sites = array();
    	if($this->Auth->user('root')) {
    		$sites = array('Administracao' => 'Administração');
    		$sites += $this->Usuario->Perfil->Site->find('list', array('fields' => array('Site.id', 'Site.titulo')));
    	} else {
    		$perfis = array();
		    $sites_id = array();

	    	foreach($user['Perfil'] as $perfil) {
	    		if(!in_array($perfil['site_id'], $sites_id))
	    			$sites_id[] = $perfil['site_id'];

	    		$perfis[$perfil['site_id']][] = $perfil['id'];
	    	}
    		$conditions = array('Site.id' => $sites_id);
	    	$sites = $this->Usuario->Perfil->Site->find('list', array('conditions' => $conditions, 'fields' => array('Site.id', 'Site.titulo')));
    	}
	    
	    return $sites;
	}

	public function admin_dados_cadastrais() {

		$this->Usuario->id = $this->Auth->User('id');
		if($this->request->isPut()) {
			$user = $this->Usuario->read();
			$this->request->data['Usuario']['id'] = $this->Auth->User('id');
			$this->request->data['Usuario']['Perfil'] = array();
			foreach($user['Perfil'] as $perfil) {
				$this->request->data['Usuario']['Perfil'][] = $perfil['id'];
			}

			$camposModificados = $this->modificado($this->request->data, $user);

			if($this->Usuario->save($this->data)) {
				
				$this->Session->write('Auth.User.nome', $this->data['Usuario']['nome']);
				$this->Session->write('Auth.User.email', $this->data['Usuario']['email']);
				$this->Session->write('Auth.User.departamento', $this->data['Usuario']['departamento']);
				$this->Session->write('Auth.User.telefone', $this->data['Usuario']['telefone']);
				$this->Session->write('Auth.User.instituicao', $this->data['Usuario']['instituicao']);

				$mensagem = "";
				if( count($camposModificados) > 0 )
				{
					foreach ($camposModificados as $key => $value) {
						if($key == (count($camposModificados) - 1) && $mensagem != "")
						{
							$mensagem .= ' e ' . $value;
						} 
						else
						{
							( ($key == 0) ? $mensagem .= $value : $mensagem .= ', ' . $value);
						}
					}
					$this->Session->setFlash('Campo(s) ' . $mensagem . ' alterado(s) com sucesso', 'success');
				}
				else
				{
					$this->Session->setFlash('Formulário salvo com sucesso e sem alteração nos dados', 'success');
				}
			} else {
				$array = array($this->Usuario->validationErrors, $this->modelClass);  //ModelClass = name model
				$this->Session->setFlash( $array, 'flash_form_error' );
			}
		} else {
			if($this->Usuario->exists()) {
				$this->data = $this->Usuario->read();
			}
		}
		unset($this->request->data['Usuario']['senha']);
		unset($this->request->data['Usuario']['confirmacao']);
	}

	private function modificado($data, $user)
	{
		$fieldsModificated = array();
		$remove = array("(", ")", "-", " ");
		$telefone = str_replace($remove, "", $data['Usuario']['telefone']);

		(strcmp( $data['Usuario']['nome'],  $user['Usuario']['nome']) == 0) ? 'ok' : array_push($fieldsModificated, 'Nome');
		(strcmp( $data['Usuario']['email'],  $user['Usuario']['email']) == 0) ? 'ok' : array_push($fieldsModificated, 'E-mail');
		(strcmp( $data['Usuario']['departamento'],  $user['Usuario']['departamento']) == 0) ? 'ok' : array_push($fieldsModificated, 'Departamento');
		(strcmp( $telefone,  $user['Usuario']['telefone']) == 0) ? 'ok' : array_push($fieldsModificated, 'Telefone');
		(strcmp( $data['Usuario']['instituicao'],  $user['Usuario']['instituicao']) == 0) ? 'ok' : array_push($fieldsModificated, 'Instituição');
		( !empty($data['Usuario']['senha']) ) ? array_push($fieldsModificated, 'Senha'): '';

		return $fieldsModificated;
	}

	public function admin_configuracoes_pessoais() {	
		if($this->request->isPost() || $this->request->isPut()) {
			$user = $this->Usuario->find('first', array('conditions' => array('Usuario.id' => $this->Auth->User('id'))));
			$this->request->data['Usuario']['id'] = $this->Auth->User('id');
			$this->request->data['Usuario']['Perfil'] = array();
			foreach($user['Perfil'] as $perfil) {
				$this->request->data['Usuario']['Perfil'][] = $perfil['id'];
			}

			$mensagem = "";
			if($this->Usuario->saveAll($this->request->data)) {

				//Verifica qual campo foi modificado - fonte, contraste ou modo sistema
				if( $user['Usuario']['fonte_id'] != $this->request->data['Usuario']['fonte_id'] )
					$mensagem = 'Fonte alterada com sucesso';
				elseif( $user['Usuario']['contraste_id'] != $this->request->data['Usuario']['contraste_id'] )
						$mensagem = 'Contraste alterado com sucesso';
					else
						$mensagem = 'Modo do Sistema alterado com sucesso';
				

				$this->Usuario->id = $this->Auth->User('id');
				$user = $this->Usuario->read();
				$this->Session->write('Auth.User.contraste_id', $user['Contraste']['id']);
				$this->Session->write('Auth.User.Contraste.id', $user['Contraste']['id']);
				$this->Session->write('Auth.User.Contraste.nome', $user['Contraste']['nome']);
				$this->Session->write('Auth.User.fonte_id', $user['Usuario']['fonte_id']);
				$this->Session->write('Auth.User.Fonte.id', $user['Usuario']['fonte_id']);
				$this->Session->write('Auth.User.Fonte.nome', $user['Fonte']['nome']);
				$this->Session->write('Auth.User.modo_sistema', $user['Usuario']['modo_sistema']);

				$this->Session->setFlash($mensagem, 'success');
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash('Erro ao alterar configurações pessoais');
			}
			$this->redirect($this->referer());
		} else {
			$this->redirect($this->referer());
		}
	}

	public function admin_resetar_configuracoes_pessoais() {
		$usuario['Usuario']['id'] = $this->Auth->User('id');
		$usuario['Usuario']['modo_sistema'] = false;
		$usuario['Usuario']['fonte_id'] = FONTE_ID;
		$usuario['Usuario']['contraste_id'] = CONTRASTE_ID;
		$usuario['Usuario']['Perfil'] = array();
		$this->Usuario->id = $this->Auth->User('id');
		$user = $this->Usuario->read();
		foreach($user['Perfil'] as $perfil) {
			$usuario['Usuario']['Perfil'][] = $perfil['id'];
		}
		if($this->Usuario->saveAll($usuario)) {
			$this->Usuario->id = $this->Auth->User('id');
			$user = $this->Usuario->read();
			$this->Session->write('Auth.User.contraste_id', $user['Contraste']['id']);
			$this->Session->write('Auth.User.Contraste.id', $user['Contraste']['id']);
			$this->Session->write('Auth.User.Contraste.nome', $user['Contraste']['nome']);
			$this->Session->write('Auth.User.fonte_id', $user['Fonte']['id']);
			$this->Session->write('Auth.User.Fonte.id', $user['Fonte']['id']);
			$this->Session->write('Auth.User.Fonte.nome', $user['Fonte']['nome']);
			$this->Session->write('Auth.User.modo_sistema', $user['Usuario']['modo_sistema']);

			$this->Session->setFlash('Configurações pessoais restauradas com sucesso', 'success');
		} else {
			$this->Session->setFlash('Erro ao resetar as configurações pessoais');
		}
		$this->redirect($this->referer());
	}

    public function admin_add() {
		if($this->request->isPost()) {
			$this->request->data['Usuario']['tamanho_fonte'] = TAMANHO_FONTE;
			$this->request->data['Usuario']['modo_sistema'] = MODO_SISTEMA_PADRAO;
			$this->request->data['Usuario']['fonte_id'] = FONTE_ID;
			$this->request->data['Usuario']['contraste_id'] = CONTRASTE_ID;
			$this->request->data['Usuario']['site_id'] = $this->site_id;
			if($this->Usuario->saveAll($this->data)) {
				$this->Session->setFlash('Usuário cadastrado com sucesso', 'success');
				$this->redirect(array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'index'));
			} else {
				$array = array($this->Usuario->validationErrors, $this->modelClass); //ModelClass = name model
				$this->Session->setFlash( $array, 'flash_form_error' );

				unset($this->request->data['Usuario']['senha']);
				unset($this->request->data['Usuario']['confirmacao']);
			}
		}

		$this->set('titulo_modulo', 'Cadastro');

		$this->set('perfis', $this->Usuario->Perfil->find('list', array('conditions' => array('Perfil.site_id' => $this->site_id))));
	}

    public function admin_edit($id = null) {

		$this->Usuario->id = $id;
		if($this->request->isPut()) {
			$user = $this->Usuario->read();
			foreach($user['Perfil'] as $perfil) {
				if($perfil['site_id'] != $this->site_id && !in_array($perfil['id'], $this->data['Usuario']['Perfil']))
					$this->request->data['Usuario']['Perfil'][] = $perfil['id'];
			}

			$camposModificados = $this->modificado($this->request->data, $user);

			if($this->request->data['Usuario']['senha'] == '' && $this->request->data['Usuario']['confirmacao'] == '') {
				unset($this->request->data['Usuario']['senha']);
				unset($this->request->data['Usuario']['confirmacao']);
			}
			if($this->Usuario->saveAll($this->data)) {

				$mensagem = "";
				if( count($camposModificados) > 0 )
				{
					foreach ($camposModificados as $key => $value) {
						if($key == (count($camposModificados) - 1) && $mensagem != "")
						{
							$mensagem .= ' e ' . $value;
						} else
						{
							( ($key == 0) ? $mensagem .= $value : $mensagem .= ', ' . $value);
						}
					}
					$this->Session->setFlash('Campo(s) ' . $mensagem . ' alterado(s) com sucesso', 'success');
				}
				else
				{
					$this->Session->setFlash('Formulário salvo com sucesso e sem alteração nos dados', 'success');
				}

				//$this->Session->setFlash('Usuário alterado com sucesso', 'success');
				$this->redirect(array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'index'));
			} else {
				$array = array($this->Usuario->validationErrors, $this->modelClass); //ModelClass = name model
				$this->Session->setFlash( $array, 'flash_form_error' );
			}
		} else {
			if($this->Usuario->exists()) {
				$this->data = $this->Usuario->read();
				$this->isAllowed($id, 'Você não pode editar este usuário', '/admin/usuarios');
			} else {
				$this->Session->setFlash('Usuário não encontrado.');
				$this->redirect(array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'index'));
			}
		}
		unset($this->request->data['Usuario']['senha']);
		unset($this->request->data['Usuario']['confirmacao']);
		$this->set('perfis', $this->Usuario->Perfil->find('list', array('conditions' => array('Perfil.site_id' => $this->site_id))));

		$this->set('titulo_modulo', 'Edição');
	}

	public function admin_import_index() {

		$query = $this->params->query;
    	if(!empty($query)) {
	    	if(isset($query['search'])) {
	    		$this->prepareSearch($query);
	    	} elseif(isset($query['limit'])) {
	    		$this->paginate['limit'] = $query['limit'];
	    	} else {
	    		$this->prepareAdvancedSearch($query);
	    	}
    	}
    	$this->Usuario->Behaviors->load('Containable');
    	$usuarios_importados_raw = $this->Usuario->find('all', array(
    		'conditions' => array(
    			'Usuario.site_id <> ' => $this->site_id,
    			),
    		'contain' => array(
    			'Perfil' => array(
    				'conditions' => array(
    					'Perfil.site_id' => $this->site_id
    					)
    				)
    			)
    		)
    	);
    	$usuarios_importados = array();
    	foreach($usuarios_importados_raw as $usuario) {
    		if(!empty($usuario['Perfil']))
    			$usuarios_importados[] = $usuario['Usuario']['id'];
    	}
    	$this->data = $query;
	    $this->paginate['conditions']['NOT'] = array(
	    	'Usuario.site_id' => $this->site_id,
	    	'Usuario.id' => $usuarios_importados
	    	);
		$this->set('usuarios', $this->paginate());
		$this->set('departamentos', $this->Usuario->find('departamentos', array('conditions' => array('Usuario.site_id <>' => $this->site_id))));
		$this->set('instituicoes', $this->Usuario->find('instituicoes', array('conditions' => array('Usuario.site_id <>' => $this->site_id))));
	}

	public function admin_import_edit($id = null) {
		$this->Usuario->id = $id;
		if($this->request->isPut()) {
			$user = $this->Usuario->read();
			foreach($user['Perfil'] as $perfil) {
				$t = $this->data['Usuario']['Perfil'];
				$t =  ($t == '') ? array() : $t;
				if($perfil['site_id'] != $this->site_id && !in_array($perfil['id'], $t))
					$this->request->data['Usuario']['Perfil'][] = $perfil['id'];
			}

			if($this->Usuario->saveAll($this->data)) {
				$this->Session->setFlash('Usuário editado com sucesso', 'success');
				$this->redirect(array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'index'));
			} else {
				$this->Session->setFlash('Erro ao editar usuário');
			}
		}
		if($this->Usuario->exists()) {
				$this->data = $this->Usuario->read();

			if($this->isAllowed($id)) {
				$this->Session->setFlash('Você não pode importar este usuário', 'success');
				$this->redirect(array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'index'));
			}
		} else {
			$this->Session->setFlash('Usuário não encontrado.');
			$this->redirect(array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'index'));
		}
		
		$this->set('perfis', $this->Usuario->Perfil->find('list', array('conditions' => array('Perfil.site_id' => $this->site_id))));
	}

	public function admin_import_delete($id = null) {
		$this->Usuario->id = $id;
		if($this->Usuario->exists()) {
			$user_raw = $this->Usuario->read();
			$user['Usuario']['id'] = $id;
			$user['Usuario']['Perfil'] = array();
			foreach($user_raw['Perfil'] as $perfil) {
				if($perfil['site_id'] != $this->site_id)
					$user['Usuario']['Perfil'][] = $perfil['id'];
			}
			if($this->isAllowed($id)) {
				$this->Session->setFlash('Você não pode deletar este usuário');
				$this->redirect($this->referer());
			}
			if($this->Usuario->save($user)) {
				$this->Session->setFlash('Usuário deletado com sucesso', 'success');
			} else {
				$this->Session->setFlash('Erro ao deletar usuário');
			}
		} else {
			$this->Session->setFlash('Usuário não encontrado.');
		}
		$this->redirect($this->referer());
	}

	public function admin_delete($id = null) {
		$this->Usuario->id = $id;
		if($this->Usuario->exists()) {
			$this->data = $this->Usuario->read();
			$this->isAllowed($id, 'Você não pode deletar este usuário', array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'index'));
			if($this->Usuario->delete($id)) {
				$this->Session->setFlash('Usuário deletado com sucesso', 'success');
			} else {
				$this->Session->setFlash('Erro ao deletar usuário');
			}
		} else {
			$this->Session->setFlash('Usuário não encontrado.');
		}
		$this->redirect(array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'index'));
	}

	public function admin_view($id = false) {
		$this->Usuario->id = $id;
		if($this->Usuario->exists()) {
			$this->set('usuario', $this->Usuario->read());
		} else {
			$this->Session->setFlash('Usuário não encontrado.');
			$this->redirect(array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'index'));
		}
	}

	public function admin_login() {

		if($this->Auth->User())
	        return $this->redirect($this->Auth->redirect());
			
		if ($this->request->isPost()) {

	        if ($this->Auth->login()) {
	            return $this->redirect($this->Auth->redirect());
	        } else {
	        	if( !empty($this->data['Usuario']['email']) && !empty($this->data['Usuario']['senha']))
	        	{
	        		if(  $this->Usuario->findByEmail($this->data['Usuario']['email']) )
	        		{
		        		$this->Session->setFlash('Senha incorreta', 'default', array(), 'auth');
		        	}else{
		        		$this->Session->setFlash('Email incorreto', 'default', array(), 'auth');	
		        	}
	        	}
	        	else
	        	{
	        		if( empty($this->data['Usuario']['email']) && empty($this->data['Usuario']['senha']) ){

	        			$this->Session->setFlash('Os campos email e senha não podem ficar em branco', 'default', array(), 'auth'); 

	        		}elseif( empty($this->data['Usuario']['email']) ){
	        			
	        			$this->Session->setFlash('Campo email não pode ficar em branco', 'default', array(), 'auth'); 
	        			
	        		}else{
	        				$this->Session->setFlash('Campo senha não pode ficar em branco', 'default', array(), 'auth');
	        		}
	        	}
	        }
	    }

		$this->layout = 'login';
	}

	public function admin_meus_sites() {

		$sites = $this->admin_sites();
    	
    	if(count($sites) == 1) {
	    	$sites_id = array_keys($sites);
    		$this->admin_selecionar_site($sites_id[0]);
    	}

    	$this->set('sites', $sites);
		$this->layout = 'login';
	}

	public function admin_selecionar_site($site_id = null) {
		if($this->request->isPost() || $this->request->isPut()) {
			$site_id = $this->data['Usuario']['site_id'];
		}
		if($site_id == 'Administracao') {
			if($this->Auth->User('root')) {
				$site_atual = array('Site' => array('id' => 'Administracao', 'dominio' => 'Administração'));
				$this->Session->write('Auth.User.SiteAtual', $site_atual);
			} else {
				$this->Session->setFlash('Site não encontrado');
    			$this->redirect(array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'meus_sites'));
			}
		} else {
			$this->Usuario->Perfil->Site->id = $site_id;
			
			if($this->Usuario->Perfil->Site->exists()) {
		    	$site = $this->Usuario->Perfil->Site->find('first', array('conditions' => array('Site.id' => $site_id), 'fields' => array('Site.id', 'Site.titulo', 'Site.site_principal', 'Site.dominio', 'Site.email_contato')));
		    	$usuario = $this->Usuario->read(null, $this->Auth->user('id'));
		    	$perfis = array();
		    	foreach($usuario['Perfil'] as $perfil) {
		    		if($perfil['site_id'] == $site_id) {
		    			$perfis[] = $perfil['id'];
		    		}
		    	}
		    	
	    		$this->Session->write('Auth.User.SiteAtual', $site);
	    		$this->Session->write('Auth.User.Perfil', $perfis);
	    	} else {
	    		$this->Session->setFlash('Site não encontrado');
	    		$this->redirect(array('admin' => true, 'plugin' => 'informacoes', 'controller' => 'pages', 'action' => 'display', 'home'));
	    		$this->redirect(array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'meus_sites'));
	    	}
    	}

    	$this->redirect(array('admin' => true, 'plugin' => 'informacoes', 'controller' => 'pages', 'action' => 'display', 'home'));
	}

	public function admin_ra_modo_sistema() {
		if($this->Auth->User('id')) {
			return $this->Auth->User('modo_sistema');
		} else {
			return MODO_SISTEMA_PADRAO;
		}
	}

	public function admin_logout() {
		$user['Usuario']['id'] = $this->Auth->user('id');
		$user['Usuario']['url_redirect'] = 'true, usuarios, usuarios, meus_sites';
		$user['Usuario']['myUrl'] = 'ok';

		$this->Usuario->save($user);		

		$this->redirect($this->Auth->logout());
	}

	public function beforeFilter(){
    	parent::beforeFilter();
		$this->set('title_for_layout', $this->stringAction($this->action, 'usuário') );
	}

	public function isAuthorized($user) {
		parent::isAuthorized($user);
	}

}