<?php

$this->Html->addCrumb('Listagem de Editais',  array('plugin' => 'editais', 
												  'controller' => 'editais', 
												  'action' => 'index'));

$this->Html->addCrumb('Editar',  array('plugin' => 'editais', 
									   'controller' => 'editais', 
									   'action' => 'edit'));

echo $this->Element('../Editais/_form');