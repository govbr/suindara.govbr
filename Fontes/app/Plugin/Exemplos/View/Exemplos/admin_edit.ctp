<?php

$this->Html->addCrumb('Listagem de Exemplos',  array('plugin' => 'exemplos', 
												  'controller' => 'exemplos', 
												  'action' => 'index'));

$this->Html->addCrumb('Exemplo',  array('plugin' => 'exemplos', 
									   'controller' => 'exemplos', 
									   'action' => 'edit'));

echo $this->Element('../Exemplos/_form');