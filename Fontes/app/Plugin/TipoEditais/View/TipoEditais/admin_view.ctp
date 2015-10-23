<?php
	$this->Html->addCrumb('Tipo de Editais',  array('plugin' => 'tipoEditais', 'controller' => 'tipoEditais', 'action' => 'index'));
	$this->Html->addCrumb('Visualizar',  array('plugin' => 'tipoEditais', 'controller' => 'tipoEditais', 'action' => 'visualizar'));
?>

<?php //echo $this->Html->script(array('jquery-1.6.4.min', '/tipoEditais/js/formModalidadePerfil')); ?>

<h2 class="row">Visualiza&ccedil;&atilde;o de <span><?php echo $this->name; ?></span></h2>

<div class="row exibicao">
	<?php 
		if(isset($tipoEdital_pai['TipoEdital']['titulo'])){
	?>
			<p>Tipo de Edital Pai <span class="w40"><?php echo $tipoEdital_pai['TipoEdital']['titulo'] ?></span></p>
	<?php
		}
	?>
	<p>T&iacute;tulo: <span class="w40"><?php echo $tipoEdital['TipoEdital']['titulo'] ?></span></p>
	<p>Descri&ccedil;&atilde;o: <span class="w97"><?php echo $tipoEdital['TipoEdital']['descricao'] ?></span></p>
	
	<?php echo $this->Html->link('Voltar', array('plugin' => 'tipoEditais', 'controller' => 'tipoEditais', 'action' => 'index'), array('id'=>'voltar')); ?> 
</div>




	