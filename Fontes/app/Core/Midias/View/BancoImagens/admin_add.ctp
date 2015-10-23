<?php
$this->Html->addCrumb('Banco de imagens',  array('plugin' => 'midias', 'controller' => 'banco_imagens', 'action' => 'admin_index'));
$this->Html->addCrumb('Adicionar Imagens',  array('plugin' => 'midias', 'controller' => 'banco_imagens', 'action' => 'admin_add'));

echo $this->element('../BancoImagens/_form', array('mimes' => $mimes));
