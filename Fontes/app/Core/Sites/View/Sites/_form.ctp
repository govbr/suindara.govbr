<div class="content form">
	<h2 class="row"> <?php echo $titulo_modulo; ?> de <span>Sites</span> </h2>

	<?php
		echo $this->Form->create('Site', array('class' => 'cadastro') );
		echo $this->Form->input('id', array('type' => 'hidden'));
	?>
	<fieldset>
		<legend class="oculto">Dados cadastrais do site.</legend>
	<?php
		echo $this->Form->input('titulo', array('label' => 'Título',
												'class' => 'w97'));

		echo $this->Form->input('dominio', array('label' => 'Domínio',
												 'class' => 'w97'));

		echo $this->Form->input('descricao', array('label' => 'Descrição',
												   'class' => 'w97'));

		echo $this->Form->input('palavras_chave', array('label' => 'Palavras-chave (separadas por vírgula)', 
														'class' => 'w97'));

		echo $this->Form->input('instituicao', array('label' => 'Instituição', 
													 'class' => 'w97'));

		echo $this->Form->input('endereco', array('label' => 'Endereço',
												  'class' => 'w97'));

		echo $this->Form->input('email_contato', array('label' => 'E-mail de contato', 
													   'class' => 'w97'));

		if( $this->Sites->getSitePrincipal() ) 
		{
			echo $this->Form->input('site_principal', array(
			'label' => "<span class=\"oculto\">Definir este site como sendo o</span>  
						Site principal
						<span class=\"alertaForm\"> Já existe um site principal no sistema. Ao marcar essa opcao o site principal será trocado.</span>"
			, 'class' => 'w10'));
		}
		else
		{
			echo $this->Form->input('site_principal', array(
			'label' => "<span class=\"oculto\">Definir este site como sendo o</span>  
						Site principal
						<span class=\"alertaForm\"> Não há um site principal no sistema.</span>"
			, 'class' => 'w10'));
		}

		echo $this->Form->input('template_id', array('label' => 'Template', 
													  'type' => 'select', 
													  'options' => $lista_template, 
													  'class' => 'w30') );
	?>
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
	<?php echo $this->Html->link('Cancelar', array('plugin' => 'sites', 'controller' => 'sites', 'action' => 'index'), array('id'=>'cancelar')); ?> 
</div>