<?php
	$this->Html->addCrumb('Editais',  array('plugin' => 'editais', 'controller' => 'editais', 'action' => 'index'));
	$this->Html->addCrumb('Visualizar',  array('plugin' => 'editais', 'controller' => 'editais', 'action' => 'visualizar'));
?>

<h2 class="row">Visualiza&ccedil;&atilde;o de <span><?php echo $this->name; ?></span></h2>

<div class="row exibicao">
	<p>Titulo: <span class="w40"><?php echo $edital['Edital']['titulo'] ?></span></p>
	<p>Descri&ccedil;&atilde;o: <span class="w97"><?php echo $edital['Edital']['descricao'] ?></span></p>
	<p>Tipo de edital: <span class="w40"><?php echo $edital['Edital']['tipo_edital_id'] ?></span></p>
	<p>Status <span class="w40"><?php echo $edital['Edital']['status'] ?></span></p>
	<p>Data de publica&ccedil;&atilde;o: <span class="w40"><?php echo $edital['Edital']['data_publicao'] ?></span></p>
	
	<?php echo $this->Html->link('Voltar', array('plugin' => 'editais', 'controller' => 'editais', 'action' => 'index'), array('id'=>'voltar')); ?> 
</div>




	