<?php
	$this->Html->addCrumb('Tipo de Editais',  array('plugin' => 'tipoEditais', 'controller' => 'tipoEditais', 'action' => 'index'));
	$this->Html->addCrumb('Editar',  array('plugin' => 'tipoEditais', 'controller' => 'tipoEditais', 'action' => 'edit'));
	
	echo $this->Element('../TipoEditais/_form');