<?php

$this->Html->addCrumb('Listagem de Cursos',  array('plugin' => 'cursos', 
												  'controller' => 'cursos', 
												  'action' => 'index'));

$this->Html->addCrumb('Cadastro de Cursos',  array('plugin' => 'cursos', 
												  'controller' => 'cursos', 
												  'action' => 'add'));

echo $this->Element('../Cursos/_form');