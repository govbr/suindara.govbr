<?php 
$this->Html->addCrumb('Listagem de Usuários',  array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'index'));
$this->Html->addCrumb('Cadastro de Usuarios',  array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'add'));

echo $this->Element('../Usuarios/_form');