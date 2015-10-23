<?php
$this->Html->addCrumb('Listagem de Menus',  array('plugin' => 'menus', 'controller' => 'menus', 'action' => 'index'));
$this->Html->addCrumb('Cadastro de Menus',  array('plugin' => 'menus', 'controller' => 'menus', 'action' => 'add'));

echo $this->Element('../Menus/_form');