<?php
$this->Html->addCrumb('Grupos',  array('plugin' => 'banners', 'controller' => 'grupos', 'action' => 'index'));
$this->Html->addCrumb('Editar',  array('plugin' => 'banners', 'controller' => 'grupos', 'action' => 'edit'));

echo $this->Element('../Grupos/_form');