<?php

$this->Html->addCrumb('Listagem de Editais',  array('plugin' => 'editais', 
												  'controller' => 'editais', 
												  'action' => 'index'));

$this->Html->addCrumb('Cadastro de Editais',  array('plugin' => 'editais', 
												  'controller' => 'editais', 
												  'action' => 'add'));

echo $this->Element('../Editais/_form');