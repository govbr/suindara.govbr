<?php
$this->Html->addCrumb('Listagem de Modalidades',  array('plugin' => 'modalidades', 'controller' => 'modalidades', 'action' => 'index'));
$this->Html->addCrumb('Cadastro de Modalidade',  array('plugin' => 'modalidades', 'controller' => 'modalidades', 'action' => 'add'));

echo $this->Element('../Modalidades/_form');

