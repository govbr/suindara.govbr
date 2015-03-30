<?php 
	class CmsWrapper {
		protected $_dbData;
		protected $_view;
		
		public function __construct(array $dbData, View $view) {
			$this->_dbData = $dbData;
			$this->_view = $view;
		}

		public function getView(){
			return $this->_view;
		}
		
		public function __get($name) {
			if (property_exists(__CLASS__, $name)) {
				return $this->$name;
			} else if (array_key_exists($name, $this->_dbData)) {
				return $this->_dbData[$name];
			} else {
				return new Exception("Atributo $name inexistente");
			}
		}
	}
