<div class="content form login">
	<h2 class="row" lang="en">Login</h2>
	
	<?php
		echo $this->Session->flash('authError');
		echo $this->Form->create('Usuario', array('id' => 'formLogin'));
	?>
	
	<fieldset>
		<legend class="oculto">Entre com os dados abaixo para efetuar o login.</legend>
		<?php
			echo $this->Form->input('Usuario.email', array('label' => 'E-mail', 'class' => 'w97'));
			echo $this->Form->input('Usuario.senha', array('type' => 'password', 'class' => 'w97'));
		?>
		<br />
		<span class="oculto obrigatorio">Obrigatório</span> Campos com esta marca são obrigatórios.
	</fieldset>
	
	<?php 
		echo $this->Form->submit('Acessar');
		echo $this->Form->end();
		echo $this->Html->link('Esqueceu a senha ?', array('plugin' => 'usuarios', 'controller' => 'recuperar_dados', 'action' => 'recuperar_senha', 'admin' => false), array('id' => 'link_recuperasenha'));
	?>
</div>