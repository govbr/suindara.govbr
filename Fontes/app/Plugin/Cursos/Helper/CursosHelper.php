<?php 

App::uses('AppHelper', 'View/Helper');

class CursosHelper extends AppHelper {

	public $helpers = array('Html');

	public function __construct(View $view, $settings = array()) {
        parent::__construct($view, $settings);
    }

	public function recursive_array_replace($find, $replace, $array){
		if (!is_array($array)) {
			return str_replace($find, $replace, $array);
		}

		$newArray = array();
		foreach ($array as $key => $value) {
			$newArray[$key] = $this->recursive_array_replace($find, $replace , $value);
		}
		return $newArray;
	}

}