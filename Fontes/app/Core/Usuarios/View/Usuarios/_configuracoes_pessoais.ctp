<h2 class="row">Op&ccedil;&otilde;es de <span>Acessibilidade</span></h2>

<?php echo $this->Form->create('Usuario', array('id' => 'formOpcoesDeAcessibilidade', 'class' => 'cadastro', 'url' => '/admin/configuracoes_pessoais')); ?>
	<fieldset>
		<legend class="oculto">Dados de acessibilidade do sistema.</legend>
	<?php
		$fontes = $this->requestAction(array('admin' => true, 'plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'fontes'));
		$contrastes = $this->requestAction(array('admin' => true, 'plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'contrastes'));
	
		if(!isset($this->data['Usuario']))
			$this->request->data['Usuario'] = $this->Session->read('Auth.User');
	?>
		
		<?php
		echo $this->Form->input('Usuario.modo_sistema', array('type' => 'select', 'escape' => false, 'class' => 'w30', 'options' => array(
				MODO_SISTEMA_PADRAO => 'Modo padr&atilde;o',
				MODO_SISTEMA_HTML_PURO => 'Modo HTML b&aacute;sico'
			)
		));
		?>
		
		<?php echo $this->Form->input('Usuario.fonte_id', array('options' => $fontes, 'class' => 'w30')); ?>
		
		<?php echo $this->Form->input('Usuario.contraste_id', array('options' => $contrastes, 'class' => 'w30')); ?>	
	</fieldset>
	
	<?php 
		echo '<fieldset id="acaoForm">';
			echo '<legend class="oculto">A&ccedil&atildeo do formul&aacute;rio</legend>';
			echo $this->Form->submit('Aplicar');
		echo '</fieldset>';
	?>

<?php echo $this->Form->end(); ?>