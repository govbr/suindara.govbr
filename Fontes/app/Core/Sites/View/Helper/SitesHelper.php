<?php 

App::uses('AppHelper', 'View/Helper');

class SitesHelper extends AppHelper {

	public $helpers = array('Html');

	private function getSite(array $options = array()) {
		$opt = urlencode(json_encode($options));
	
		$site = $this->requestAction(array('ra' => true, 
											'plugin' => 'sites', 
				      				        'controller' => 'sites', 
				      				        'action' => 'ra_query', 'all', $opt));
		return $site;	
	}

	/**
	 * Verifica se existe um site principal no sistema
	 * @return boolean True or False 
	 */
	public function getSitePrincipal() {
		$sitePrincipal = null;
		
		$sitePrincipal = $this->getSite(array('conditions' => array('Site.site_principal' => 1)));
		if (!empty($sitePrincipal)) {
			return true;
		} else {
			return false;
		}
	}

}