<?php
$this->Html->addCrumb('Contato',  array('admin' => true, 'plugin' => 'informacoes', 'controller' => 'contato', 'action' => 'index'));
?>
<div class="content form">
	<h2 class="row">Entre em <span>Contato</span></h2>
	<?php echo $this->Form->create('Contato', array('class' => 'cadastro')); ?>
	<fieldset>
		<legend class="oculto">Dados para contato.</legend>
		<?php
		if(!isset($this->data['Contato']['nome']))
			$this->request->data['Contato']['nome'] = $this->Session->read('Auth.User.nome');
		
		if(!isset($this->data['Contato']['email']))
			$this->request->data['Contato']['email'] = $this->Session->read('Auth.User.email');
		
		echo $this->Form->input('Contato.nome', array('class'=>"w40"));

		echo $this->Form->input('Contato.email', array('label' => 'E-mail', 'class'=>"w40"));

		echo $this->Form->input('Contato.assunto', array('class'=>"w40"));

		echo $this->Form->input('Contato.descricao', array('label' => 'Descri&ccedil;&atilde;o', 'class'=>"w97", 'type' => 'textarea'));
		?>
	</fieldset>
	<?php echo $this->Form->submit('Enviar');
	echo $this->Form->end();
	?>
</div>