<?php 
$this->Html->addCrumb('Extensões de arquivos',  array('plugin' => 'midias', 'controller' => 'mimes', 'action' => 'index'));
$this->Html->addCrumb('Adicionar Extensões de Arquivo',  array('plugin' => 'midias', 'controller' => 'mimes', 'action' => 'add'));

echo $this->Element('../Mimes/_form');