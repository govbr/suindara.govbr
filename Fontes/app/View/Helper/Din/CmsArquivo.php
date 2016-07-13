<?php 

	App::uses('CmsWrapper', 'View/Helper/Din');

	class CmsArquivo extends CmsWrapper {
		public function __construct(array $arquivo, View $view) {
			parent::__construct($arquivo, $view);
		}
		
		public function getPath() {
			return $this->_view->CmsTemplate->raizSite() . '/' . 'files' . '/' . 'doc' . '/' . $this->arquivo;
		}
		
		public function htmlArquivo(array $options = array()) {
			$size = sprintf("%0.1f Kb", $this->tamanho / 1024);
			
			return $this->_view->Html->link($this->titulo . " ({$this->extensao}, $size)", $this->getPath(), $options);
		}
		
		
	}
