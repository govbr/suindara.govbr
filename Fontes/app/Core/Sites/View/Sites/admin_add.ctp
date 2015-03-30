<?php
$this->Html->addCrumb('Sites',  array('plugin' => 'sites', 'controller' => 'sites', 'action' => 'index'));
$this->Html->addCrumb('Adicionar novo site',  array('plugin' => 'sites', 'controller' => 'sites', 'action' => 'add'));

echo $this->Element('../Sites/_form');

