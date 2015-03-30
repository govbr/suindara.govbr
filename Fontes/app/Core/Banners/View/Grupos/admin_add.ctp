<?php
$this->Html->addCrumb('Grupos',  array('plugin' => 'banners', 'controller' => 'grupos', 'action' => 'index'));
$this->Html->addCrumb('Cadastrar',  array('plugin' => 'banners', 'controller' => 'grupos', 'action' => 'add'));


echo $this->Element('../Grupos/_form');