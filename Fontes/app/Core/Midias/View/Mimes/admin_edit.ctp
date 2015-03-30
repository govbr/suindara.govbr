<?php 

$this->Html->addCrumb('Extensões de arquivos',  array('plugin' => 'midias', 'controller' => 'mimes', 'action' => 'index'));
$this->Html->addCrumb('Editar Extensão de Arquivo',  array('plugin' => 'midias', 'controller' => 'mimes', 'action' => 'edit'));

echo $this->Element('../Mimes/_form');