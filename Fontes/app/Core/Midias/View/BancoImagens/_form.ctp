<div class="content form">
	<h2 class="row">Cadastro de <span>Imagens</span></h2>
	<?php echo $this->Form->create('Midia', array('type' => 'file')); ?>
	<fieldset>
		<legend class="oculto">Cadastro de imagens</legend>
		<?php
		echo $this->Form->input('midias..Midia.arquivo', array(
			'label' => 'Imagens (Você pode selecionar mais que um arquivo de imagem)', 'type' => 'file', 'multiple' => 'multiple', 'accept' => $mimes
			));
		?>
	<br />
	<span class="oculto obrigatorio">Obrigatório</span> Campos com esta marca são obrigatórios.
	</fieldset>

	
	<?php 
		echo '<fieldset id="acaoForm">';
        	echo '<legend class="oculto">A&ccedil&atildeo do formul&aacute;rio</legend>';
			echo $this->Form->submit('Salvar');
		echo '</fieldset>';
		
		echo $this->Form->end();
	?>
	
	<?php echo $this->Html->link('Cancelar', array('plugin' => 'midias', 'controller' => 'banco_imagens', 'action' => 'index'), array('id'=>'cancelar')); ?>
</div>