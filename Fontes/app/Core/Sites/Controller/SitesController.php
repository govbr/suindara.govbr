<?php 
App::uses('SitesAppController', 'Sites.Controller');

class SitesController extends SitesAppController {
	public $name = 'Sites';

	public function admin_perfis(){}

	public function admin_index(){
		$options = array(
            'fields' => array('Site.id', 'Site.titulo', 'Site.dominio', 'Site.instituicao', 'Site.site_principal'),
            'limit' => 15,
            'url' => array('controller' => 'Sites', 'action' => 'index', 'admin' => true)
        );
		$this->paginate = $options;

		$query = $this->params->query;
    	if(!empty($query)) {
	    	if( isset($query['search']) && trim($query['search']) != "") {
	    		$this->search($query);
	    		$this->set('sitePaginate', $this->paginate());

	    	} else if( isset($query['limit']) ) {
	    			$this->paginate['limit'] = $query['limit'];
	    			$this->set('sitePaginate', $this->paginate());

	    	} else {
		    		// sem nada na pesquisa
					$this->params['paging'] = array
		                (
		                    'Site' => array
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

		    		$this->set('sitePaginate', array());
		    	} 

    	} else {
			$this->set('sitePaginate', $this->paginate());
    	}

		
		$this->data = $this->paginate('Site');
		$this->set('sites', $this->Site->find('list', array('fields'=>array('titulo')))) ;

	}

	private function search($query){
		if(!isset($query['search']) || trim($query['search']) == "")
			return;
		$like = '%' . trim($query['search']) . '%';
    	$this->paginate['conditions'] = array(
    		'OR' => array(
	    		'Site.titulo LIKE' => $like,
	    		'Site.dominio LIKE' => $like,
	    		'Site.instituicao LIKE' => $like
    		)
    	);
	}

	public function admin_add(){
		if($this->request->isPost()){
			if($this->Site->save($this->request->data)){

				$last = $this->Site->findById($this->Site->id);
				if ($this->data['Site']['site_principal'])
					$this->site_principal($last['Site']['id']); 

				$this->Session->setFlash('Site criado com sucesso', 'success');
				$this->redirect(array('controller' => 'sites', 'action' => 'index', 'admin' => true));
			}else{
				$array = array($this->Site->validationErrors, $this->modelClass);  //ModelClass = name model
				$this->Session->setFlash( $array, 'flash_form_error' );
			}
		}

		$this->set('titulo_modulo', 'Cadastro');

		$this->set('lista_template', $this->requestAction( array('plugin' => 'templates', 'controller' => 'templates', 'action' => 'ra_getTemplates', 'admin' => true) ) );
	}

	public function admin_edit($id = null){
		if ($this->request->isPut()) {
			if ($this->Site->save($this->data)) {

				if ($this->data['Site']['site_principal'])
					$this->site_principal($this->data['Site']['id']); 

				$this->Session->setFlash('Site editado com sucesso', 'success');
				$this->redirect(array('controller' => 'sites', 'action' => 'index', 'admin' => true));
			} else {
				$array = array($this->Site->validationErrors, $this->modelClass);  //ModelClass = name model
				$this->Session->setFlash( $array, 'flash_form_error' );
			}
		}else{
			$this->Site->id = $id;
			if($this->Site->exists()){ 
				$this->data = $this->Site->read();
			}else{
				$this->Session->setFlash('Site n tem');
				$this->redirect(array('controller' => 'sites', 'action' => 'index', 'admin' => true));
			}
		}

		$this->set('titulo_modulo', 'Edição');

		$this->set('lista_template', $this->requestAction( array('plugin' => 'templates', 'controller' => 'templates', 'action' => 'ra_getTemplates', 'admin' => true) ) );
	}

	public function admin_delete($id = null){
		$this->Site->id = $id;
		$this->request->data = $this->Site->read();
		if(!$this->Site->exists()){
			$this->Session->setFlash('Site inválido');
		}

		if($this->Site->delete()){
			$this->requestAction(array('plugin' => 'sites', 'controller' => 'perfis', 'action' => 'ra_deleteSite', 'admin' => true, $id));

			$this->Session->setFlash('Site ' . $this->request->data['Site']['titulo'] . ' deletado com sucesso', 'success');
			$this->redirect(array('controller' => 'sites', 'action' => 'index', 'admin' => true));
		}else{
			$this->Session->setFlash('Site não foi deletado');
			$this->redirect(array('controller' => 'sites', 'action' => 'index', 'admin' => true));
		}
	}

	public function admin_view($id = null){
		if ($this->request->is('get') && $id > 0) {

			$site = $this->Site->findById($id);
			if ($site) {
				//$this->isAllowed($id, 'Você não pode visualizar este site', '/admin/sites');
				$this->set('site', $site);
			} else {
				return $this->redirect(array('controller' => 'sites', 'action' => 'index', 'admin' => true));
			}
			
		} else {
			return $this->redirect(array('controller' => 'sites', 'action' => 'index', 'admin' => true));
		}

		$this->set('template', $this->requestAction( array('plugin' => 'templates', 'controller' => 'templates', 'action' => 'ra_getTemplates', 'admin' => true) ) );

		$temp = $this->requestAction( array('plugin' => 'templates', 'controller' => 'templates', 'action' => 'ra_getTemplates', 'admin' => true) );
		
		if(isset( $temp[$site['Site']['template_id']] )){
			$this->set('template_nome', $temp[$site['Site']['template_id']] );
		}
	}

	public function admin_sitePrincipal($id_site = null){
		$this->Site->id = $id_site;
		if($this->Site->exists()){
			$site = $this->Site->read();
			if(empty($site)) {
				$this->Session->setFlash('Site não encontrado');
				$this->redirect(array('controller' => 'sites', 'action' => 'index', 'admin' => true));
			}

			$old_site_principal = $this->Site->findBySitePrincipal('1');

			if(!empty($old_site_principal)){
				$old_site_principal['Site']['site_principal'] = 0;
    			$this->Site->save($old_site_principal);
			}

			$site['Site']['site_principal'] = 1;
			if($this->Site->save($site)) {
                $this->Session->setFlash('O site ' . $site['Site']['titulo'] . ' foi definido como site principal', 'success');
            } else {
                $this->Session->setFlash('Erro ao tentar salvar');

            }

		}else{
			$this->Session->setFlash('Site invalido');
		}

		$this->redirect(array('controller' => 'sites', 'action' => 'index', 'admin' => true));
	}

	public function admin_ra_getSites(){
		if(!$this->request->params['requested']){
			return null;
		}
		
		return $this->Site->find('list');
	}
	
	/**
	 * Retorna informações do site atual de acordo com o domínio acessado.
	 * @return array Dados do site acessado
	 */
	public function ra_getSiteAtual() {
		if(!empty($this->request->params['requested'])){
			//$cond = array('dominio' => $_SERVER['HTTP_HOST']);
			$cond = array('dominio' => preg_replace("/(^[a-z]*\:\/\/)(.*)(\/$)/", '$2', Router::url('/', true)));
			$busca = $this->Site->find('first', array('conditions' => $cond));

			return $busca;
		}
	}

	public function admin_ra_query($type = 'all', $options = array()) {
		if (!empty($this->request->params['requested'])) {
			if ($options) {
				$opt = json_decode(urldecode($options), true);
				return $this->Site->find($type, $opt);
			} else {
				return $this->Site->find($type);
			}		
		}
	}

	private function site_principal($id_site = null){
		$old_site_principal = $this->Site->find('first', array('conditions' => array('Site.site_principal' => 1, 'Site.id <>' => $id_site) ));
		if(!empty($old_site_principal)){
			$old_site_principal['Site']['site_principal'] = 0;
    		$this->Site->save($old_site_principal);
		}
	}

	public function beforeFilter(){
    	parent::beforeFilter();
		$this->set('title_for_layout', $this->stringAction($this->action, 'site') );
	}

	public function isAuthorized($user) {
		parent::isAuthorized($user);
	}

}