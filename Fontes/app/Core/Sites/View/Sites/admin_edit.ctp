<?php
$this->Html->addCrumb('Sites',  array('plugin' => 'sites', 'controller' => 'sites', 'action' => 'index'));
$this->Html->addCrumb('Editar',  array('plugin' => 'sites', 'controller' => 'sites', 'action' => 'edit'));

echo $this->Element('../Sites/_form');