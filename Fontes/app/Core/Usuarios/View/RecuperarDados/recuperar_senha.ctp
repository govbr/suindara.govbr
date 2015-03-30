<div class="content form login">
	<h2 class="row">Recuperar <span>Senha</span></h2>
<?php
echo $this->Form->create('Usuario');
?>
<fieldset>
	<?php echo $this->Form->input('Usuario.email', array('label' => 'E-mail', 'class' => 'w97'));?>
	<br />
	<span class="oculto obrigatorio">Obrigatório</span> Campos com esta marca são obrigatórios.
</fieldset>
<?php
echo $this->Form->submit('Enviar');
echo $this->Form->end();
?>
</div>