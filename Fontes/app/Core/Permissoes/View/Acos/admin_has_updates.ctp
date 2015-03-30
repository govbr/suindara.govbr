<div class="content form">
	<h2 class="row">Gerenciamento de <span>ACL <span class="menor">(Lista de controle de acesso)</span></span></h2>
	
	<div class="row acl">
		<p>Alguns controladores foram modificados, resultando em ações que não estão na tabela de ACOS (Controle de acesso de objetos) ou em ACOs obsoletos. Por favor, esteja ciente de que esta mensagem irá aparacer somente uma vez. Mas você pode reconstruir as ACOs na aba "Construir ACOs"</p>

		<?php
			if(count($missing_aco_nodes) > 0) {
			    echo '<h3>ACOs faltando</h3>';
			
		    	echo $this->Html->nestedList($missing_aco_nodes);
		    }
			
			if(count($nodes_to_prune) > 0) {
			    echo '<h3>ACOs obsoletos</h3>';
			    
				echo $this->Html->nestedList($nodes_to_prune);
		    }
			
			echo $this->Html->link('Sincronizar ACOs', array('controller' => 'acos', 'class' => 'aplicar', 'action' => 'synchronize', 'run'), array('class' => 'aplicar'));
		?>
	</div>
</div>