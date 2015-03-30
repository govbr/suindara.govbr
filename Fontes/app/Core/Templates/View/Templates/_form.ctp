<div class="content form">
	<h2 class="row"> Cadastro de <span>Templates</span> </h2>

	<?php 
		echo $this->Form->create('Template', array('type' => 'file'));
	?>

	<fieldset>
		<legend class="oculto">Dados cadastrais do template.</legend>
	<?php
		echo $this->Form->input('Template.arquivo', array('label' => 'Arquivo (somente arquivos .zip)', 'type' => 'file', 'accept' => 'application/zip'));
	?>

	<br />
	<span class="oculto obrigatorio">Obrigatório</span> Campos com esta marca são obrigatórios.
	</fieldset>

	<fieldset id="acaoForm">
		<legend class="oculto">A&ccedil&atildeo do formul&aacute;rio</legend>
		<?php echo $this->Form->submit('Enviar arquivo'); ?>
	</fieldset>
	<?php echo $this->Form->end(); ?>

</div>