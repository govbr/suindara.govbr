<?php
    $this->Html->addCrumb('Gerenciamento e Módulos para ACL',  array('plugin' => 'permissoes', 'controller' => 'acos', 'action' => 'index'));
    $this->Html->addCrumb('Deletar ACOS Obsoletas',  array('plugin' => 'permissoes', 'controller' => 'acos', 'action' => 'prune_acos'));
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
                echo '<h3>Os seguintes ACOs foram removido</h3>';
                echo $this->Html->nestedList($logs);
            }
        } else {
            
            if(count($nodes_to_prune) > 0) {
                echo '<h3>ACOs obsoletos</h3>';
        	    
                
                echo $this->Html->nestedList($nodes_to_prune);
                
                echo '<p>Clicando no link a seguir não irá modificar ou remover as permissões dos ACOS que não estão obsoletos.</p>';
                echo $this->Html->link('Remover obsoletos',  array('controller' => 'acos', 'action' => 'prune_acos', 'run'), array('escape' => false, 'class' => 'aplicar'));

            }
        }
        ?>
    </div>
</div>