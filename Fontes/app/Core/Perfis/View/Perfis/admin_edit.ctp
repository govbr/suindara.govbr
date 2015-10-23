<?php
$this->Html->addCrumb('Listagem de Perfis',  array('plugin' => 'perfis', 'controller' => 'perfis', 'action' => 'index'));
$this->Html->addCrumb('Editar',  array('plugin' => 'perfis', 'controller' => 'perfis', 'action' => 'edit'));

echo $this->Element('../Perfis/_form');