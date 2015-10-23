<?php
$this->Html->addCrumb('Listagem de Tipo de Editais',  array('plugin' => 'tipoEditais', 'controller' => 'tipoEditais', 'action' => 'index'));
$this->Html->addCrumb('Cadastro de Tipo de Edital',  array('plugin' => 'tipoEditais', 'controller' => 'tipoEditais', 'action' => 'add'));

echo $this->Element('../TipoEditais/_form');

