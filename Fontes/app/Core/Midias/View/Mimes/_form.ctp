<div class="content form">
	
	<?php if ( $this->params['controller'] === 'mimes' && $this->params['action'] === 'admin_edit'): ?>
		<h2 class="row">Edição de <span>Extens&atilde;o de Arquivo</span></h2>
	<?php else: ?>
		<h2 class="row">Cadastro de <span>Extens&atilde;o de Arquivo</span></h2>
	<?php endif; ?>
                        
	<?php echo $this->Form->create('Mime', array('class' => 'cadastro')); ?>
	<fieldset>
		<legend>Cadastro de Extens&atilde;o de Arquivo</legend>
		<?php
		echo $this->Form->input('Mime.id');
		echo $this->Form->input('Mime.mime', array('label' => 'Tipo de Conte&uacute;do (Ex: text/html)', 'class' => 'w40'));
		echo $this->Form->input('Mime.tipo_id', array('label' => 'Categoria', 'class' => 'w30'));
		echo $this->Form->input('Mime.extensao', array('label' => 'Extens&atilde;o (Ex: .xml, .mp3, .jpg, .doc)', 'class' => 'w40'));
		?>
		<fieldset class="checkbox">
			<legend>Ativação das extensões de arquivos</legend>
			<?php
			echo $this->Form->input('Mime.ativo');
			?>	
		</fieldset>
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
	?>
	
	<?php echo $this->Html->link('Cancelar',  array('plugin' => 'midias', 'controller' => 'mimes', 'action' => 'index'), array('id'=>'cancelar')); ?>
</div>