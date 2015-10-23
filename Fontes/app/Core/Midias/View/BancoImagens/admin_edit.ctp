<?php 
	$this->Html->addCrumb('Banco de imagens',  array('plugin' => 'midias', 'controller' => 'banco_imagens', 'action' => 'admin_index'));
	$this->Html->addCrumb('Editar Imagem',  array('plugin' => 'midias', 'controller' => 'banco_imagens', 'action' => 'admin_edit'));	
?>

<div class="content form">
	<h2 class="row">Edição de <span>Imagem</span></h2>

	<?php echo $this->Crop->create($this->data['Midia']); ?>

	<hr />

	<h3>Informações sobre a <span>imagem</span></h3>
	<?php echo $this->Form->create('Midia'); ?>
	
	<fieldset>
		<legend class="oculto">Edição de Imagem</legend>
		<?php
			echo $this->Form->input('Midia.id');
			echo $this->Form->input('Midia.arquivo', array('type' => 'hidden'));
			echo $this->Form->input('Midia.crop_x', array('type' => 'hidden'));
			echo $this->Form->input('Midia.crop_y', array('type' => 'hidden'));
			echo $this->Form->input('Midia.crop_x2', array('type' => 'hidden'));
			echo $this->Form->input('Midia.crop_y2', array('type' => 'hidden'));
			echo $this->Form->input('Midia.crop_w', array('type' => 'hidden'));
			echo $this->Form->input('Midia.crop_h', array('type' => 'hidden'));
			echo $this->Form->input('Midia.titulo', array('label' => 'T&iacute;tulo', 'class'=>'w40'));
			echo $this->Form->input('Midia.descricao', array('label' => 'Descri&ccedil;&atilde;o', 'class'=>'w97'));
			echo $this->Form->input('Midia.fonte', array('class'=>'w97'));
		?>
	</fieldset>

	<?php 
		echo '<fieldset id="acaoForm">';
			echo '<legend class="oculto">A&ccedil&atildeo do formul&aacute;rio</legend>';
			echo $this->Form->submit('Restaurar valores', array('id' => 'MidiaReset'));
			echo $this->Form->submit('Salvar');
		echo '</fieldset>';
		
		echo $this->Form->end();
	?>
	<?php echo $this->Html->link('Cancelar', array('plugin' => 'midias', 'controller' => 'banco_imagens', 'action' => 'index'), array('id'=>'cancelar')); ?> 
</div>