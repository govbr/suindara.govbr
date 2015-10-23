<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('AppController', 'Controller');
App::uses('Noticia', 'Noticias.Model');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Pages';

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array ('Noticias.Noticia');


	public $helpers = array('CakePtbr.Formatacao', 
							'CmsTemplate',
							'CmsNoticias', 
							'CmsMidias', 
							'CmsMenu',
							'CmsBanners',
							'CmsCategorias',
							'CmsUtil',
							'CmsBusca'
							//'Paginator' => array('className' => 'CmsAdminPaginator')
							);


	public $components = array('Paginator', 'Session');

	// public $paginate =  array (
	// 		'limit' => 10,
	// 		'maxLimit' => 10
	// 		);


/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function display() {

		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		$this->render(implode('/', $path)); 
	}

	public function isAuthorized($user) {
		return parent::isAuthorized($user);
	}
	
	
	
	public function beforeFilter() {
		$this->set("fromTemplate", true);

		parent::beforeFilter();
		$siteAtual = $this->requestAction(array('ra' => true, 
												'plugin' => 'sites', 
					      				        'controller' => 'sites', 
					      				        'action' => 'ra_getSiteAtual'));
			
		//$siteAtual = false;								
		if (!$siteAtual) {
			throw new InternalErrorException("Site não encontrado");
		}

		Configure::write('Site.Atual', $siteAtual['Site']);
		

		// Pasta do template do site atual
		// TODO carregar esta informação do DB
		Configure::write('Site.Template.Dir', $siteAtual['Template']['caminho']);
		
		// Localização da pasta que contêm os templates (utilizada como referência para incluir os arquivos .php do template)
		Configure::write('Template.dir', WWW_ROOT . 'templates' . DS . Configure::read('Site.Template.Dir'));

		return true;
			
	}
	
	public function templateFinder() {
		//$this->layout = false;
		
		// Configura o caminho para as Views
		//App::build(array('View' => array(Configure::read('Template.dir') . DS)));
		    				
		$vars = explode('/', str_replace($this->request->base, '', $this->here));
		
		// Caminho para o diretório do template 
		$templatePath = Configure::read('Template.dir') . DS;
		
		// Caminho para a view dentro da pasta do template 
		$viewBase = '';
		
		// Caminho para o 
		$this->layoutPath ='';
	
		//$this->ext = '.php';

		$paramFirstIndex = 0;
		$templateFileFound = false;
		$templateFile = null;

		if (!preg_match('/\/admin\//', $this->here))
			App::build(array('View' => array(Configure::read('Template.dir') . DS)));
		
	
		foreach ($vars as $res) {
			$paramFirstIndex++;
			if ($res) {
				if (is_dir($templatePath . $res)) {
					$viewBase .= $res . DS;
					$templatePath .= $res . DS; 

				} else if (is_file($templatePath . $res . $this->ext)) {
					//$templatePath .= $res . '.php';
					$templateFile = $res;
					$templateFileFound = true;
					break;
				} else {
					throw new NotFoundException('Página não encontrada');
				}
			}
		}
		
		
		// Verifica se existe o arquivo index, caso somente o diretório tenha sido 
		// informado
		if (!$templateFileFound) {
			if (is_file($templatePath . 'index' . $this->ext)) {
				$templateFile = 'index';
			} else {
				throw new NotFoundException('Página não encontrada');
			}	
		}
		
		
		$this->viewPath = $viewBase;
		$this->view = $templateFile;
		 
		//$this->set('$base', $this->request->base); 
		
		$this->request->query = array_slice($vars, $paramFirstIndex);
		//$this->set('template_file', $templatePath);

		//$this->set('here', $this->here);
		
	}


	public function pesquisar(){
		$this->Paginator->settings = array(
				'Noticia' => array('limit' => 10)
        );

		$siteAtual = Configure::read('Site.Atual');
		
		$now = date('Y-m-d H:i:s');
		
		if (isset($this->data['textoBusca'])) {
			$this->Session->write('Pesquisar.textoBusca', $this->data['textoBusca']);
		}

		$palavra_chave = $this->Session->read('Pesquisar.textoBusca');	
		
			//if (preg_match('/^\s*$/', $palavra_chave) || preg_match('/[^\w\d\s]+/', $palavra_chave)) {

		$conditions = array();
		$conditions['Noticia.site_id'] = $siteAtual['id'];
		$conditions['Noticia.status_id'] = Noticia::STATUS_PUBLICO;
		$conditions['NOT'] = array('Noticia.datahora_publicacao' => null);
		$conditions['Noticia.datahora_prog_pub <'] = $now;
		$conditions['OR'] =  array('Noticia.datahora_prog_exp >' => $now,
										  'Noticia.datahora_prog_exp' => null) ;
		$conditions[] = "(Noticia.titulo LIKE '%$palavra_chave%' 
						  		OR Noticia.resumo LIKE '%$palavra_chave%'
						  		OR Noticia.texto LIKE '%$palavra_chave%')";
		
			
		$data = $this->Paginator->paginate('Noticia', $conditions);
		$this->set('noticias', $data);			
	
		return $this->templateFinder();
	}
}





