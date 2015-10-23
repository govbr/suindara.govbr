<?php 
	$this->Html->addCrumb('Listagem de Usuários',  array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'index'));
	$this->Html->addCrumb('Importar',  array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'import_index'));
	$this->Html->addCrumb('Editar',  array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'import_edit', $this->data['Usuario']['id']));
?>


<h2 class="row">Editar Usu&aacute;rios <span>Importados</span></h2>

<div class="row exibicao form">
	<p>Usuário: <span class="w40"><?php echo $this->data['Usuario']['nome']; ?></span></h3>
	<p>Institui&ccedil;&atilde;o: <span class="w97"><?php echo $this->data['Usuario']['instituicao']; ?></span></p>
	<p>Departamento: <span class="w97"><?php echo $this->data['Usuario']['departamento']; ?></span></p>

	<?php echo $this->Form->create('Usuario', array('class' => 'cadastro')); ?>
	<fieldset>
		<?php
		echo $this->Form->input('Usuario.id');
		?>
		<fieldset>
			<legend>Selecione pelo menos um perfil para este usu&aacute;rio</legend>
			<?php echo $this->Form->input('Usuario.Perfil', array('label' => false, 'type' => 'select', 'multiple' => 'checkbox', 'options' => $perfis)); ?>
		</fieldset>
		<br />
		<span class="oculto obrigatorio">Obrigatório</span> Campos com esta marca são obrigatórios.
	</fieldset>
	
	<?php echo $this->Form->submit('Salvar');
		//echo $this->Form->reset('reset');
		echo $this->Form->end();
	?>
	<?php echo $this->Html->link('Cancelar', array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'import_index'), array('id'=>'cancelar')); ?>
</div>