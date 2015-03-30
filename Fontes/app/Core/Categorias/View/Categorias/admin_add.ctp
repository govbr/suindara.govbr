<?php
$this->Html->addCrumb('Listagem de Categorias',  array('plugin' => 'categorias', 'controller' => 'categorias', 'action' => 'index'));
$this->Html->addCrumb('Cadastro de Categoria',  array('plugin' => 'categorias', 'controller' => 'categorias', 'action' => 'add'));

echo $this->Element('../Categorias/_form');

