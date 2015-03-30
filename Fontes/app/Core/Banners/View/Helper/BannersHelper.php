<?php 

App::uses('AppHelper', 'View/Helper');
App::uses('BannerConfig', 'Banners.Lib');

class BannersHelper extends AppHelper {

	public $helpers = array('Html');

	private $config;

	public function __construct(View $view, $settings = array()) {
        parent::__construct($view, $settings);
        $this->config = new BannerConfig();
    }

	public function imageUrl($arquivo, $append = false) {

		$base = $this->config->bannerBase();
		
	 	return $this->Html->image($this->Html->url($base . $arquivo));
	}

}