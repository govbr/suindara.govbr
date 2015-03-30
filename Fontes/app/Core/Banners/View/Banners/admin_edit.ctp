<?php
	$this->Html->addCrumb('Grupos',  array('plugin' => 'banners', 'controller' => 'grupos', 'action' => 'index'));
	$this->Html->addCrumb('Banners',  array('plugin' => 'banners', 'controller' => 'banners', 'action' => 'index', $grupo_id));
	$this->Html->addCrumb('Editar',  array('plugin' => 'banners', 'controller' => 'banners', 'action' => 'edit'));

	echo $this->Element('../Banners/_form');