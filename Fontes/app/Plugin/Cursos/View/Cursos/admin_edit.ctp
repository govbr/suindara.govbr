<?php

$this->Html->addCrumb('Listagem de Cursos',  array('plugin' => 'cursos', 
												  'controller' => 'cursos', 
												  'action' => 'index'));

$this->Html->addCrumb('Editar',  array('plugin' => 'cursos', 
									   'controller' => 'cursos', 
									   'action' => 'edit'));

echo $this->Element('../Cursos/_form');