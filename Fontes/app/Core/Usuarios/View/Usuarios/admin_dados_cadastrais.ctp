<?php $this->Html->addCrumb('Dados Cadastrais',  array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'dados_cadastrais')); ?>

<div class="content form">
	<h2 class="row">Formul&aacute;rio de <span>Dados Cadastrais</span></h2>
	<?php echo $this->Form->create('Usuario', array('id' => 'formDadosCadastrais')); ?>
	<fieldset>
		<legend class="oculto">Dados cadastrais do usuário.</legend>
		<?php
		echo $this->Form->input('Usuario.nome', array('class'=>"w40"));
		echo $this->Form->input('Usuario.telefone', array('label' => 'Telefone (Somente N&uacute;meros)', 'class'=>"w30"));
		echo $this->Form->input('Usuario.instituicao', array('label' => 'Institui&ccedil;&atilde;o', 'class'=>"w40"));
		echo $this->Form->input('Usuario.departamento', array('class'=>"w40"));
		echo $this->Form->input('Usuario.email', array('label' => 'E-mail', 'class'=>"w40 clear"));
		?>

		<?php echo $this->Form->input('Usuario.senha', array('type' => 'password', 'class'=>"w30")); ?>

		<?php echo $this->Form->input('Usuario.confirmacao', array('type' => 'password', 'label' => 'Confirmar senha', 'class'=>"w30")); ?>

		<br />
		<span class="oculto obrigatorio">Obrigatório</span> Campos com esta marca são obrigatórios.
	</fieldset>
	
	<?php 
		echo '<fieldset id="acaoForm">';
			echo '<legend class="oculto">A&ccedil&atildeo do formul&aacute;rio</legend>';
			echo $this->Form->submit('Salvar');
		echo '</fieldset>';
	?>

	<?php echo $this->Form->end(); ?>

<?php
	echo $this->Element('../Usuarios/_configuracoes_pessoais');
	echo $this->Html->link('Restaurar configurações pessoais', array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'resetar_configuracoes_pessoais'), array('id' => 'resetar_config'));
?>
</div>