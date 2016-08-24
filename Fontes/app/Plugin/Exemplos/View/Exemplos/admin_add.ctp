<?php

$this->Html->addCrumb('Listagem de Exemplos',  array('plugin' => 'exemplos', 
												  'controller' => 'exemplos', 
												  'action' => 'index'));

$this->Html->addCrumb('Cadastro de Exemplos',  array('plugin' => 'exemplos', 
												  'controller' => 'exemplos', 
												  'action' => 'add'));

echo $this->Element('../Exemplos/_form');