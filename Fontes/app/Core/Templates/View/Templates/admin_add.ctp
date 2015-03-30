<?php
$this->Html->addCrumb('Templates',  array('plugin' => 'templates', 'controller' => 'templates', 'action' => 'admin_index'));
$this->Html->addCrumb('Adicionar novo Template',  array('plugin' => 'sites', 'controller' => 'sites', 'action' => 'add'));

echo $this->Element('../Templates/_form');