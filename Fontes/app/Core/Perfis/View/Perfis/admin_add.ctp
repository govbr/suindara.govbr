<?php
$this->Html->addCrumb('Listagem de Perfis',  array('plugin' => 'perfis', 'controller' => 'perfis', 'action' => 'index'));
$this->Html->addCrumb('Cadastro de Perfis',  array('plugin' => 'perfis', 'controller' => 'perfis', 'action' => 'add'));

echo $this->Element('../Perfis/_form');