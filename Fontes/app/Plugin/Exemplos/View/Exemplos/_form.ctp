<div class="content form">
	<h2 class="row"> <?php echo $titulo_modulo; ?> de <span>Exemplos</span> </h2>

	<?php
		echo $this->Form->create('Exemplos', array('class' => 'cadastro') );
		//echo $this->Form->input('id', array('type' => 'hidden'));
		//echo $this->Form->input('site_id', array('type' => 'hidden'));
	?>

	<fieldset>
	<?php 

		// Campos do formulario 

	?>
		<br/>
		<span class="oculto obrigatorio">Obrigat&oacute;rio</span> Campos com esta marca s&atilde;o obrigat&oacute;rios.
	</fieldset>

	<?php
		echo '<fieldset id="acaoForm">';
			echo '<legend class="oculto">A&ccedil&atildeo do formul&aacute;rio</legend>';
			echo $this->Form->reset('reset');
			echo $this->Form->submit('Salvar');
		echo '</fieldset>';
		
		echo $this->Form->end(); 
	?>

	<?php echo $this->Html->link('Cancelar', array('plugin' => 'exemplos', 
												   'controller' => 'exemplos', 
												   'action' => 'index'), 
								  array('id'=>'cancelar')); ?>
</div>