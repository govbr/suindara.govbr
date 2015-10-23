<div class="content form">
	<h2 class="row"> <?php echo $titulo_modulo; ?> de <span>Cursos</span> </h2>

	<?php
		echo $this->Form->create('Curso', array('class' => 'cadastro', 'type' => 'file') );
		echo $this->Form->input('id', array('type' => 'hidden'));
		echo $this->Form->input('site_id', array('type' => 'hidden'));
	?>

	<fieldset>
		<legend class="oculto">Dados cadastrais do curso.</legend>
	<?php 

		echo $this->Form->input('nome', array('class' => 'w80', 
											  'label' => 'Nome'));

		echo $this->Form->input('descricao', array('class' =>  'w97', 
												   'label' => 'Descrição'));

		echo $this->Form->input('modalidade_id', array('label'   => 'Modalidade',
													'class'   =>  'w40', 
												    'options' => $lista_modalidades));

		echo '<fieldset class="checkbox"><legend>Selecione o/os turno/os</legend>';

		echo $this->Form->input('turno_manha', array('type'=>'checkbox' , 'label' => 'Manhã'));
		echo $this->Form->input('turno_tarde', array('type'=>'checkbox' , 'label' => 'Tarde'));
		echo $this->Form->input('turno_vespertino', array('type'=>'checkbox' , 'label' => 'Vespertino'));
		echo $this->Form->input('turno_noite', array('type'=>'checkbox' , 'label' => 'Noite'));

		echo '</fieldset>';

		echo $this->Form->input('duracao', array('label' => 'Duração',
												 'type' => 'number',
												 'min' => 1,
												 'max' => 100,
												 'default' => 1,
												 'class' => 'w30'));

		

		$option = array('Anos', 'Semestres', 'Dias', 'Horas');
		echo $this->Form->input('tipo_duracao', array('label' => 'Duração',
													  'options' => $option,
													  'class' => 'w30'));

		echo '<p class="clear"><p>';

	?>

	<fieldset>
		<legend class="oculto">Dados cadastrais do coordenador.</legend>
		<?php
			echo $this->Form->input('nome_coordenador', array('class' => 'w97', 
												  			  'label' => 'Nome do Coordenador'));

			echo $this->Form->input('email_coordenador', array('class' => 'w97', 
										  			  		   'label' => 'Email do Coordenador'));
		?>
	</fieldset>

	<?php	
		echo $this->Form->input('pre_requisito', array('class' => 'w97', 
									  			  	   'label' => 'Pré-requisito do curso'));

		echo $this->Form->input('formas_ingresso', array('class' => 'w97', 
									  			  	     'label' => 'Formas de ingresso'));
		// add fotos
		if(isset($id_conteudo)){
			echo $this->element('admin_arquivos', array('tipo_conteudo' => 'curso', 'id_conteudo' => $id_conteudo), array('plugin' => 'Midias'));
		}else{
			echo $this->element('admin_arquivos', array('tipo_conteudo' => 'curso'), array('plugin' => 'Midias'));
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

	<?php echo $this->Html->link('Cancelar', array('plugin' => 'cursos', 
												   'controller' => 'cursos', 
												   'action' => 'index'), 
								  array('id'=>'cancelar')); ?>
</div>