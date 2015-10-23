<div class="content form">
	<h2 class="row"> <?php echo $titulo_modulo; ?> de <span>Editais</span> </h2>

	<?php
		echo $this->Form->create('Edital', array('class' => 'cadastro', 'type' => 'file') );
		echo $this->Form->input('id', array('type' => 'hidden'));
		echo $this->Form->input('site_id', array('type' => 'hidden'));
	?>

	<fieldset>
		<legend class="oculto">Dados cadastrais do edital.</legend>
	<?php 

		echo $this->Form->input('titulo', array('class' => 'w97', 
											  	'label' => 'Titulo'));

		echo $this->Form->input('descricao', array('class' =>  'w97', 
												   'label' => 'Descrição'));

		echo $this->Form->input('tipo_edital_id', array('label'   => 'Tipo de edital',
														'class'   =>  'w40', 
												    	'options' => $lista_tipoEditais));


		echo $this->Form->input('status', array('label'   => 'Status',
												'class'   => 'w40', 
												'options' => $status_options));

		echo $this->Form->input('data_publicao', array('type' => 'date', 
											   'label' => 'Data de publicação',	
											   'dateFormat' => 'DMY',
											   'class' => 'data', 
											   'maxYear' => date('Y'),
											   'separator' => '/'));

		echo '<p class="clear"><p>';

		// add fotos
		if(isset($id_conteudo)){
			echo $this->element('admin_arquivos_edital', array('tipo_conteudo' => 'edital', 'id_conteudo' => $id_conteudo), array('plugin' => 'Midias'));
		}else{
			echo $this->element('admin_arquivos_edital', array('tipo_conteudo' => 'edital'), array('plugin' => 'Midias'));
		}

	?>
		<br />
		<span class="oculto obrigatorio">Obrigat&oacute;rio</span> Campos com esta marca s&atilde;o obrigat&oacute;rios.
	</fieldset>

	<?php
		echo '<fieldset id="acaoForm">';
			echo '<legend class="oculto">A&ccedil&atildeo do formul&aacute;rio</legend>';
			echo $this->Form->reset('reset');
			echo $this->Form->submit('Salvar');
		echo '</fieldset>';
		
		echo $this->Form->end(); 
	?>

	<?php echo $this->Html->link('Cancelar', array('plugin' => 'editais', 
												   'controller' => 'editais', 
												   'action' => 'index'), 
								  array('id'=>'cancelar')); ?>
</div>