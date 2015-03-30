<?php
$this->Html->addCrumb('Listagem de Menus',  array('plugin' => 'menus', 'controller' => 'menus', 'action' => 'index'));
$this->Html->addCrumb('Editar',  array('plugin' => 'menus', 'controller' => 'menus', 'action' => 'edit'));
echo $this->Element('../Menus/_form');