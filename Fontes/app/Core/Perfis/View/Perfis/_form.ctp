<div class="content form">
	<h2 class="row"> <?php echo $titulo_modulo; ?> de <span>Perfis</span> </h2>

	<?php
		echo $this->Form->create('Perfil',  array('class' => 'cadastro') ); 
		echo $this->Form->input('id', array('type' => 'hidden')); 
	?>
	<fieldset>
		<legend class="oculto">Dados cadastrais do perfil.</legend>
	<?php
		echo $this->Form->input('nome', array('label' => 'Nome', 
											  'class' => 'w40') );

		echo $this->Form->input('descricao', array('label' => 'Descrição', 
												   'class' => 'w97') );
	?>
	<br />
	<span class="oculto obrigatorio">Obrigatório</span> Campos com esta marca são obrigatórios.
	</fieldset>
	<?php
		echo '<fieldset id="acaoForm">';
			echo '<legend class="oculto">A&ccedil&atildeo do formul&aacute;rio</legend>';
			echo $this->Form->reset('reset', array('value' => 'Restaurar valores'));
			echo $this->Form->submit('Salvar');
		echo '</fieldset>';

		echo $this->Form->end(); 
		//echo $this->Html->link('Descartar' , array('controller' =>'perfis', 'action' => 'index'));
	?>
	<?php echo $this->Html->link('Cancelar', array('plugin' => 'perfis', 'controller' => 'perfis', 'action' => 'index'), array('id'=>'cancelar')); ?> 
</div>