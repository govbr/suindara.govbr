<div class="content form">
	<h2 class="row"><?php echo $titulo_modulo; ?> de <span>Usu&aacute;rios</span></h2>
	<?php echo $this->Form->create('Usuario', array('class' => 'cadastro', 'id' => "UsuarioForm2")); ?>
	<fieldset>
		<legend class="oculto">Dados cadastrais do usuário.</legend>
		
		<?php
		echo $this->Form->input('Usuario.id');
		echo $this->Form->input('Usuario.nome', array('class'=>"w40"));
		echo $this->Form->input('Usuario.telefone', array('label' => 'Telefone (Somente N&uacute;meros)','class'=>"w30"));
		echo $this->Form->input('Usuario.instituicao', array('label' => 'Institui&ccedil;&atilde;o', 'class'=>"w40"));
		echo $this->Form->input('Usuario.departamento', array('class'=>"w40"));
		echo $this->Form->input('Usuario.email', array('label' => 'E-mail', 'class'=>"w40 clear"));
		
		echo $this->Form->input('Usuario.senha', array('type' => 'password', 'class'=>"float w30"));	
		echo $this->Form->input('Usuario.confirmacao', array('type' => 'password', 'label' => 'Confirmar senha', 'class'=>"float w30")); 
		?>
	</fieldset>

	<?php if (!isset($this->data['Usuario']) || !isset($this->data['Usuario']['root']) || !$this->data['Usuario']['root']) { ?>
		
		<fieldset class="w97">
			<legend class="mb10">
				<span>Perfis de <span>usu&aacute;rio</span></span>
				Selecione pelo menos um perfil para este usu&aacute;rio
			</legend>
			<?php echo $this->Form->input('Usuario.Perfil', array('label' => false, 'type' => 'select', 'multiple' => 'checkbox', 'options' => $perfis)); ?>
		</fieldset>

	<?php }  ?>
		
		<p class="clear"><span class="oculto obrigatorio">Obrigatório</span> Campos com esta marca são obrigatórios.</p>
	
	<?php 
		echo '<fieldset id="acaoForm">';
			echo '<legend class="oculto">A&ccedil&atildeo do formul&aacute;rio</legend>';
			echo $this->Form->submit('Salvar');
		echo '</fieldset>';

		echo $this->Form->end();	
	?>

	<?php echo $this->Html->link('Cancelar', array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'index'), array('id'=>'cancelar')); ?>

	<?php
		if( $titulo_modulo === 'Edição')
		{
			echo $this->Html->link('Restaurar configurações pessoais', array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'resetar_configuracoes_pessoais'), array('id' => 'cancelar'));
		}
	?>
</div>
