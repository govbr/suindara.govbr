<div class="content form">
	<h2 class="row">Alterar <span>Senha</span></h2>
<?php
echo $this->Form->create('Usuario');
echo $this->Form->input('RecuperarDado.token', array('type' => 'hidden'));
?>
<fieldset>
<?php
echo $this->Form->input('Usuario.email', array('label' => 'E-mail', 'class' => 'w97'));
echo $this->Form->input('Usuario.senha', array('type' => 'password', 'class' => 'w97'));
echo $this->Form->input('Usuario.confirmacao', array('type' => 'password', 'label' => 'Confirmar senha', 'class' => 'w97'));
?>
<br />
<span class="oculto obrigatorio">Obrigatório</span> Campos com esta marca são obrigatórios.
</fieldset>
<?php
echo $this->Form->submit('Enviar');
echo $this->Form->end();
?>
</div>