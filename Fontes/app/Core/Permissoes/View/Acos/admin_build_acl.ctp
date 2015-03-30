<?php
    $this->Html->addCrumb('Gerenciamento e Módulos para ACL',  array('plugin' => 'permissoes', 'controller' => 'acos', 'action' => 'index'));
    $this->Html->addCrumb('Criar ACOS que estão faltando',  array('plugin' => 'permissoes', 'controller' => 'acos', 'action' => 'build_acl'));
?>

<div class="content form">
    <h2 class="row">Gerenciamento de <span>ACL <span class="menor">(Lista de controle de acesso)</span></span></h2>
    
    <div class="row controlist">
        <div id="busca_avancada">
            <?php echo $this->element('design/header'); ?>
        </div>
    </div>

    <div class="row acl">
        <?php
        if($run) {
            if(count($logs) > 0) {
                echo $this->Html->nestedList($logs);
            } 
        } else{
            if(count($missing_aco_nodes) > 0) {
            	echo $this->Html->nestedList($missing_aco_nodes);
                echo $this->Html->link('Reconstruir tabela de ACOs',  array('controller' => 'acos', 'action' => 'build_acl', 'run'), array('escape' => false, 'class' => 'aplicar'));
            }
        }
        ?>
    </div>
</div>