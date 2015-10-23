<div class="content form">
	<h2 class="row"> <?php echo $titulo_modulo; ?> de <span>Grupos</span> </h2>

	<?php
		echo $this->Form->create('Grupo', array('class' => 'cadastro') );
		echo $this->Form->input('id', array('type' => 'hidden'));
		echo $this->Form->input('site_id', array('type' => 'hidden'));
	?>
	
	<fieldset>
		<legend class="oculto">Dados cadastrais</legend>
		<?php
			echo $this->Form->input('nome', array('label' => 'Título', 
											      'class' => 'w97') ); 
		?>
	<br />
	<span class="oculto obrigatorio">Obrigatório</span> Campos com esta marca são obrigatórios.
	</fieldset>

	<?php
		echo '<fieldset id="acaoForm">';
			echo '<legend class="oculto">A&ccedil&atildeo do formul&aacute;rio</legend>';
			echo $this->Form->reset('reset');
			echo $this->Form->submit('Salvar');
		echo '</fieldset>';
		
		echo $this->Form->end(); 
		//echo $this->Html->link('Descartar' , array('controller' =>'menus', 'action' => 'index'));
	?>
	
	<?php echo $this->Html->link('Cancelar', array('plugin' => 'banners', 'controller' => 'banners', 'action' => 'index'), array('id'=>'cancelar')); ?> 
</div>