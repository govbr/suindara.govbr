<?php
$this->Html->addCrumb('Páginas',  array('plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'index'));
//$this->Html->addCrumb('Adicionar',  array('plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'add'));
echo $this->element('Form/_add');
