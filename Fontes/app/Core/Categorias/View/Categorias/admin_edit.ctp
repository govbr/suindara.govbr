<?php
	$this->Html->addCrumb('Categorias',  array('plugin' => 'categorias', 'controller' => 'categorias', 'action' => 'index'));
	$this->Html->addCrumb('Editar',  array('plugin' => 'categorias', 'controller' => 'categorias', 'action' => 'edit'));
	
	echo $this->Element('../Categorias/_form');