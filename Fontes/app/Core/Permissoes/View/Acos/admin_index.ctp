<?php
	$this->Html->addCrumb('Gerenciamento e Módulos para ACL',  array('plugin' => 'permissoes', 'controller' => 'acos', 'action' => 'index'));
?>

<div class="content form">
    <h2 class="row">Gerenciamento de <span>ACL <span class="menor">(Lista de controle de acesso)</span></span></h2>
    
    <div class="row controlist">
        <div id="busca_avancada">
            <?php echo $this->element('design/header'); ?>
        </div>
    </div>
</div>