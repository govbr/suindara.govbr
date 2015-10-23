<?php
	$this->Html->addCrumb('Modalidades',  array('plugin' => 'modalidades', 'controller' => 'modalidades', 'action' => 'index'));
	$this->Html->addCrumb('Editar',  array('plugin' => 'modalidades', 'controller' => 'modalidades', 'action' => 'edit'));
	
	echo $this->Element('../Modalidades/_form');