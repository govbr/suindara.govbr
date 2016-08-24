<?php
	$this->Html->addCrumb('Exemplos',  array('plugin' => 'exemplos', 'controller' => 'exemplos', 'action' => 'index'));
	$this->Html->addCrumb('Visualizar',  array('plugin' => 'exemplos', 'controller' => 'exemplos', 'action' => 'visualizar'));
?>

<h2 class="row">Visualiza&ccedil;&atilde;o de <span><?php echo $this->name; ?></span></h2>

<div class="row exibicao">
	
	<!-- Codigo para mostrar cada campo deste plugin --> 

	<?php echo $this->Html->link('Voltar', array('plugin' => 'editais', 'controller' => 'editais', 'action' => 'index'), array('id'=>'voltar')); ?> 
</div>




	