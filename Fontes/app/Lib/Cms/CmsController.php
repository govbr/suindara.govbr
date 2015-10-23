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

App::uses('AppController', 'Controller');
App::uses('CmsEventManager', 'Cms');
App::uses('Utility', 'Security');
App::uses('CmsAdminSessionHelper', 'View/Helper');
App::uses('View', 'View');
App::uses('CmsTextSwap', 'Cms/Utils/Text');
/**
 * 	Base para os controladores do CMS 3.
 * 
 * 	Resposável por vincular os módulos interessados nos eventos lançados
 * 	pelo Controller.
 * 
 * 	@version 0.1 
 */

class CmsController extends Controller {

	public $name = 'Cms';

	public $components = array(
		'Acl' => array(
	    	'habtm' => array(
	            'userModel' => 'Usuarios.Usuario',
	            'groupAlias' => 'Perfis.Perfil'
	        )
        ),
		'Auth' => array(
	        'loginAction' => '/login',
	        'loginRedirect' => array('admin' => true, 'plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'meus_sites'),
	        'logoutRedirect' => '/login',
	        'authorize' => array(
	        	'Controller',
                'Authorize.Acl' => array('actionPath' => 'Model/'),
            ),
	        'authError' => 'Você precisa se logar primeiro',
	        'authenticate' => array(
	            'Form' => array(
	            	'userModel' => 'Usuarios.Usuario',
	                'fields' => array(
	                	'username' => 'email',
	                	'password' => 'senha'
	                )
	            )
	        )
	    ),
		'Session',
		'RequestHandler'
	);

	public $helpers = array(
        'Html' => array(
            'className' => 'CmsAdminHtml'
        ),
        'Form' => array(
        	'className'=>'CmsAdminForm'
        ),
        'Session' => array(
        	'className' => 'CmsAdminSession'
        ),
        'CmsMenu' => array(
        	'className' => 'CmsAdminMenu'
        ),
        'Paginator' => array(
        	'className' => 'CmsAdminPaginator'
        )
    );

    public $paginate = array('limit' => 15);

	/**
	 *  Armazena os eventos que serão disparados pelo Controller.
	 *  Ex: $cmsEvents = array("Cms.User.AfterInsert", "Cms.User.AfterUpdate")
	 * 	@var array
	 */
	public $cmsEvents = null;


	/**
	 *  Armazena a id do site em que o usuário está logado no momento
	 * 	@var int
	 */
	protected $site_id;

	protected $administracao;

	/**
	 *	Responsável por verificar os interessados nos eventos e registra-los
	 * 	 
	 */
	public function __construct($request = null, $response = null) {

		// echo $request->params['plugin'];
		// echo $request->params['controller'];
		// echo $request->params['action'];

		//var_dump($request);

		parent::__construct($request, $response);
		CmsEventManager::getInstance()->register($this->cmsEvents, $this);
	}

	protected function response($message, $status = 200, $render = false) { //error status  = 400
		$view = new View($this->Controller);
        $session = new CmsAdminSessionHelper($view);

        if($status == 200) {
            $this->Session->setFlash($message, 'success');
        } else {
            $this->Session->setFlash($message);
        }

        $html = false;
        if($render) {
        	$response = (is_string($render)) ? $this->render($render) : $this->render(); 

            $html = $response->body();
        }
    	return new CakeResponse(
    		array(
    			'body'=> json_encode(
    				array(
    					'message' => $session->flash(),
                        'html' => $html
    				)
    			),
    			'status' => $status
    		)
    	);
    }

	public function beforeFilter() {

		parent::beforeFilter();

		$user = $this->Auth->user();
		
		if(!empty($user)) {
			$this->site_id = $this->Auth->user('SiteAtual.Site.id');
			$this->administracao = ($this->Auth->user('SiteAtual.Site.id') == 'Administracao');
		}

		$actions = CmsPublicActions::getAllowedActions(Inflector::Camelize($this->params['plugin']), Inflector::Camelize($this->params['controller']));
		
		if($actions == false) {
			$this->Auth->deny();
		} else {
			if($actions == '*')
				$this->Auth->allow();
			else
				$this->Auth->allow($actions);
		}
		
		if($this->Auth->User() != "" && $this->Auth->User('SiteAtual') == "" && !in_array($this->params['action'], array('admin_ra_modo_sistema', 'admin_meus_sites', 'admin_selecionar_site', 'admin_contrastes', 'admin_fontes', 'admin_dados_cadastrais', 'admin_configuracoes_pessoais', 'admin_acessibilidade', 'admin_sites', 'admin_logout'))) {
			$this->redirect($this->Auth->redirect());
		}

		if($this->request->isPost() || $this->request->isPut()) {
			$max = ini_get('post_max_size');
			$max = str_replace("M", '', $max);
			$req = env('CONTENT_LENGTH') / 1024 / 1024;

			if($max < $req) {
				$max .= "MB";
				$this->Session->setFlash('O tamanho da requisição é maior do que o limite definido no servidor que é de ' . $max . '.');
				$this->redirect($this->referer());
			}
		}
	}

	/**
	 *	Responsável por verificar se o site em que o usuário está logado (Site atual) 
	 *	corresponde com o site do registro que o usuário deseja acessar, editar ou deletar
	 *
	 * @param Array $data registro a ser verificado.
	 * @param string $message Flash message.
	 * @param string $redirect url to redirect
	 * @return boolean Success (true se o usuário pode manipular registro, false caso contrário) 
	 */
	protected function isAllowed($id, $message = false, $redirect = false, $modelClass = false) {

		$allowed = false;
		if($modelClass) {
			$this->loadModel($modelClass);
			$data = $this->{$modelClass}->read(array('site_id'), $id);
			$allowed = ($data[$modelClass]['site_id'] == $this->site_id);
		} else {
			$data = $this->{$this->modelClass}->read(array('site_id'), $id);
			$allowed = ($data[$this->modelClass]['site_id'] == $this->site_id);
		}

		if(!$allowed && $message)
			$this->Session->SetFlash($message);

		if(!$allowed && $redirect)
			$this->redirect($redirect);

		return $allowed;
	}

	public function isAuthorized($user) {	

		$plugin = $this->params['plugin'];
		$controller = $this->params['controller'];
		$action = $this->params['action'];

		$aco =  'controllers' . DS . $plugin . DS . $controller . DS . $action;

		$aro = array(
			'model' => 'Usuario',
			'foreign_key' => $user['id']
		);
		
    	$check = $this->Acl->check($aro, $aco);
    	
        if($check) {
            return true;
        } else {
        	if( isset($this->request['pass'][2]) && isset($this->request['pass'][3]) ){
				$this->Session->setFlash('Você não tem permissão para ' . CmsTextSwap::__($action) . ' ' . CmsTextSwap::__($this->request['pass'][3]) . ' de ' .  CmsTextSwap::__($this->request['pass'][2]));
			}else{
				$this->Session->setFlash("Você não tem permissão para acessar o recurso " . CmsTextSwap::__($action) . " " . CmsTextSwap::__(ucfirst($controller))  );
			}
        	return false;
        }
	}


	/*
	 * 
	 * @param string $action
	 * @param string $controller - (minusculo, com acento, singular)
	 * @param string/bool $passo (optional)  
	 */
	public function stringAction($action, $controller, $passo = false){
		$action = substr($action, strpos($action, '_') + 1);
		$plural = "";

		switch ($controller) {
			case 'perfil':
					$plural = 'Perfis';
				break;

			case 'permissão':
					$plural = 'Permissões';
				break;

			case 'extenção de arquivo':
					$plural = 'Extenções de Arquivos';
				break;

		}

		switch ($action) {
			case 'index':
					if($plural != ""){
						return '- Listagem de ' . $plural;
					}
					return '- Listagem de ' . ucfirst($controller) . 's';
				break;

			case 'add':
					return '- Cadastro de ' . ucfirst($controller);
				break;

			case 'edit':
					if($passo){
						return '- ' . ucfirst($passo) . ' de ' . ucfirst($controller);	
					}else{
						if($controller == 'notícia' || $controller == 'página'){
							return '- Edição do Conteúdo Textual';
						}else{
							return '- Edição de ' . ucfirst($controller);
						}
					}
				break;

			case 'imagem':
					return '- Edição de imagem';
				break;

			case 'view':
					return '- Vizualização de ' . ucfirst($controller);
				break;

			case 'view':
					return '- Vizualização de ' . ucfirst($controller);
				break;

			case 'import_index':
					return '- Importar ' . ucfirst($controller);
				break;

			case 'login':
					return '- Login';
				break;

			case 'meus_sites':
					return '- Gerenciar Sites';
				break;

			case 'dados_cadastrais':
					return '- Edição de Dados Cadastrais';
				break;

			case 'midias':
					return '- Seleção de Mídias';
				break;

			case 'arquivos':
					return '- Upload de Documentos';
				break;

			default:
					return '- Não tem essa opcao';
				break;
		}
	}
} 