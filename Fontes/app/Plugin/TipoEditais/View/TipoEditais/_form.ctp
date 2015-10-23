<?php 
	echo $this->Html->script(array('/tipoEditais/js/formTipoEditalPerfil')); 
?>

<div class="content form">
	<h2 class="row"> <?php echo $titulo_modulo; ?> de <span> Tipo de Edital </span> </h2>

	<?php echo $this->Form->create('TipoEdital', array('class' => 'cadastro') ); ?>
	<fieldset>
		<legend class="oculto">Dados cadastrais</legend>

	<?php
		echo $this->Form->input('id', array('type' => 'hidden'));
		echo $this->Form->input('site_id', array('type' => 'hidden'));
		echo $this->Form->input('titulo', array('class' => 'w97', 'label' => 'Título'));
		echo $this->Form->input('descricao', array('class' =>  'w97', 'label' => 'Descrição'));
		echo $this->Form->input('parent_id', array('label' => 'Tipo de Edital Pai', 'empty' => 'Selecione', 'class' => 'w40'));
	?>

		<p><span class="oculto obrigatorio">Obrigatório</span> Campos com esta marca são obrigatórios.</p>
	</fieldset>		
	
	<?php
		echo '<fieldset id="acaoForm">';
			echo '<legend class="oculto">A&ccedil&atildeo do formul&aacute;rio</legend>';
			echo $this->Form->reset('reset');
			echo $this->Form->submit('Salvar');
		echo '</fieldset>';
		
		echo $this->Form->end();
	?>
	<?php echo $this->Html->link('Cancelar', array('plugin' => 'tipoEditais', 'controller' => 'tipoEditais', 'action' => 'index'), array('id'=>'cancelar')); ?> 
</div>

<?php
	$this->Html->scriptBlock("
	$(document).ready(function () {
		var categoriaId = '" .(isset($this->data['Categoria']['id']) ? $this->data['Categoria']['id'] : 0 ). "';
	    var lastRow = $('input[name$=\"data[unused][lastRow]\"]').val();
	    $('#addSJS').bind('click', function(e){
	    	lastRow++;
	        $.ajax({
	            url: '".$this->Html->url(array('controller' => 'ajax', 'action' => 'categorias_perfis'))."',
	            data: {id : lastRow, categoria_id : categoriaId},
	            success: function(data) {
	                $('#trAdd').before(data);
	            },
	            error: function(data) {
	                $('#trAdd').before(data);
	            }
	        });
	        e.preventDefault();
	    }); 
	});", array('inline' => false));