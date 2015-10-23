<?php
    $this->Html->addCrumb('Gerenciamento e Módulos para ACL',  array('plugin' => 'permissoes', 'controller' => 'acos', 'action' => 'index'));
    $this->Html->addCrumb('Sincronizar tabela de ACOS',  array('plugin' => 'permissoes', 'controller' => 'acos', 'action' => 'synchronize'));
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
            echo '<h3>ACOs novos</h3>';
            
            if(count($create_logs) > 0) {
                echo $this->Html->nestedList($create_logs);
            }
            
            echo '<h3>ACOs obsoletos</h3>';
            
            if(count($prune_logs) > 0) {
                echo $this->Html->nestedList($prune_logs);
            } 
        } else {
            $has_aco_to_sync = false;
            
            if(count($missing_aco_nodes) > 0) {
                echo '<h3>ACOs faltando</h3>';
                
            	echo $this->Html->nestedList($missing_aco_nodes);
            	
                $has_aco_to_sync = true;
            }
            
            if(count($nodes_to_prune) > 0) {
                echo '<h3>ACOs obsoletos</h3>';
        	    
        	    echo $this->Html->nestedList($nodes_to_prune);
            	
                $has_aco_to_sync = true;
            }
            
            if($has_aco_to_sync) {
                echo '<p>Clicando no link a seguir não irá modificar ou remover as permissões dos ACOs já existentes.</p>';
                echo $this->Html->link('Sincronizar tabela de ACOs', array('controller' => 'acos', 'action' => 'synchronize', 'run'), array('escape' => false, 'class' => 'aplicar'));
            } 
        }
        ?>
    </div>
</div>