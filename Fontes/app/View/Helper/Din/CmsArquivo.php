<?php 

	App::uses('CmsWrapper', 'View/Helper/Din');

	class CmsArquivo extends CmsWrapper {
		public function __construct(array $arquivo, View $view) {
			parent::__construct($arquivo, $view);
		}
		
		public function getPath() {
			return $this->_view->CmsTemplate->raizSite() . 'files' . '/' . 'doc' . '/' . $this->arquivo;
		}

		public function getExtension($uppercase = false){
			$extension = $this->extensao;

			if($uppercase){
				$extension = strtoupper($extension);
			}

			return $extension;
		}

		public function getSize(){
			$size = sprintf("%0.1f Kb", $this->tamanho / 1024);
			return $size;
		}
		
		public function htmlArquivo(array $options = array()) {
			$size = $this->getSize();
			$extension = $this->getExtension();

			$options = array('download' => ($this->titulo . '.' . $this->extensao));
			
			return $this->_view->Html->link($this->titulo . " ($extension, $size)", $this->getPath(), $options);
		}

		public function htmlArquivoCustom($subtitle = false, $uppercase = false, array $options = array()){
			$size = $this->getSize();
			$extension = $this->getExtension($uppercase);

			$options = array('download' => ($this->titulo . '.' . $this->extensao));

			if($subtitle){
				return $this->_view->Html->link($this->titulo . " (Formato $extension, Tamanho $size)", $this->getPath(), $options);
			}else{
				return $this->_view->Html->link($this->titulo . " ($extension, $size)", $this->getPath(), $options);
			}
		}
		
	}
