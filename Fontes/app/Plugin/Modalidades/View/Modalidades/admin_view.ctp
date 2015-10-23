<?php
	$this->Html->addCrumb('Modalidades',  array('plugin' => 'modalidades', 'controller' => 'modalidades', 'action' => 'index'));
	$this->Html->addCrumb('Visualizar',  array('plugin' => 'modalidades', 'controller' => 'modalidades', 'action' => 'visualizar'));
?>

<?php echo $this->Html->script(array('jquery-1.6.4.min', '/modalidades/js/formModalidadePerfil')); ?>

<h2 class="row">Visualiza&ccedil;&atilde;o de <span><?php echo $this->name; ?></span></h2>

<div class="row exibicao">
	<?php 
		if(isset($modalidade_pai['Modalidade']['titulo'])){
	?>
			<p>Modalidade Pai <span class="w40"><?php echo $modalidade_pai['Modalidade']['titulo'] ?></span></p>
	<?php
		}
	?>
	<p>T&iacute;tulo: <span class="w40"><?php echo $modalidade['Modalidade']['titulo'] ?></span></p>
	<p>Descri&ccedil;&atilde;o: <span class="w97"><?php echo $modalidade['Modalidade']['descricao'] ?></span></p>
	
	<?php echo $this->Html->link('Voltar', array('plugin' => 'modalidades', 'controller' => 'modalidades', 'action' => 'index'), array('id'=>'voltar')); ?> 
</div>




	