<?php 
	echo $this->Html->script(array('/categorias/js/formCategoriaPerfil')); 
?>

<div class="content form">
	<h2 class="row"> <?php echo $titulo_modulo; ?> de <span> Categoria </span> </h2>

	<?php echo $this->Form->create('Categoria', array('class' => 'cadastro') ); ?>
	<fieldset>
		<legend class="oculto">Dados cadastrais</legend>

	<?php
		echo $this->Form->input('id', array('type' => 'hidden'));
		echo $this->Form->input('site_id', array('type' => 'hidden'));
		echo $this->Form->input('titulo', array('class' => 'w97', 'label' => 'Título'));
		echo $this->Form->input('descricao', array('class' =>  'w97', 'label' => 'Descrição'));
		echo $this->Form->input('parent_id', array('label' => 'Categoria Pai', 'empty' => 'Selecione', 'class' => 'w40'));
	?>
	</fieldset>		
	
	<fieldset>
		<legend class="oculto">Dados do perfil</legend>

		<table id="mytable" class="row">
			<caption>Perfis com permiss&atilde;o nessa categoria</caption>
			
			<tr>
				<th>Perfil</th>
				<th>Permiss&otilde;es desse perfil</th>
				<th>A&ccedil;&otilde;es</th>
			</tr>

			<?php $count = 0; ?>
			
			<?php if(isset($this->data['CategoriaPerfil']) ){ ?>
				<?php $maxPerfil = count($this->data['CategoriaPerfil']); ?>
				<?php foreach($this->data['CategoriaPerfil'] as $count => $perfil){ ?>
					<tr class='perfil<?php echo $count ?>' > 
						<td><?php echo $this->Form->input('CategoriaPerfil.'.$count.'.perfil_id', array('type' => 'select', 'empty' => 'Selecione', 'label' => false ) ); ?></td>

						<?php echo $this->Form->input('CategoriaPerfil.'.$count.'.categoria_id', array('type' => 'hidden' ) ); ?>
						<?php echo $this->Form->input('CategoriaPerfil.'.$count.'.id', array('type'=>'hidden' )); ?>

						<td>
							<?php echo $this->Form->input('CategoriaPerfil.'.$count.'.adicionar', array('type'=>'checkbox' , 'label' => '<span class="oculto">O perfil selecionado pode </span>Adicionar <span class="oculto">not&iacute;cias nesta categoria</span>')); ?>
							<?php echo $this->Form->input('CategoriaPerfil.'.$count.'.editar', array('type'=>'checkbox' , 'label' => '<span class="oculto">O perfil selecionado pode </span>Editar <span class="oculto">not&iacute;cias nesta categoria</span>')); ?>
							<?php echo $this->Form->input('CategoriaPerfil.'.$count.'.excluir', array('type'=>'checkbox' , 'label' => '<span class="oculto">O perfil selecionado pode </span>Excluir <span class="oculto">not&iacute;cias nesta categoria</span>')); ?>
							<?php echo $this->Form->input('CategoriaPerfil.'.$count.'.visualizar', array('type'=>'checkbox' , 'label' => '<span class="oculto">O perfil selecionado pode </span>Visualizar <span class="oculto">not&iacute;cias nesta categoria</span>')); ?>
							<?php echo $this->Form->input('CategoriaPerfil.'.$count.'.publicar', array('type'=>'checkbox' , 'label' => '<span class="oculto">O perfil selecionado pode </span>Publicar <span class="oculto">not&iacute;cias nesta categoria</span>')); ?>
						</td>
						<td><?php echo $this->Form->button('Remover Perfil', array('type'=>'submit', 'name' => 'removeSJS', 'value' => $count)); ?></td>
					</tr>
				<?php } ?>
			<?php } ?>

			<tr id="trAdd">
				<td colspan="3" class="center"> 
					<?php echo $this->Form->input('unused.lastRow', array('type' => 'hidden', 'value' => $count)); ?>
					<?php echo $this->Form->button('Adicionar Perfil', array( 'type' => 'submit', 'title' => '', 'name' => 'addSJS', 'id' => 'addSJS') ); ?>
				</td>
			</tr>
		</table>

		<p><span class="oculto obrigatorio">Obrigatório</span> Campos com esta marca são obrigatórios.</p>
	</fieldset>

	<?php
		echo '<fieldset id="acaoForm">';
			echo '<legend class="oculto">A&ccedil&atildeo do formul&aacute;rio</legend>';
			echo $this->Form->reset('reset');
			echo $this->Form->submit('Salvar');
		echo '</fieldset>';
		
		echo $this->Form->end();
		//echo $this->Html->link('Descartar' , array('controller' =>'categorias', 'action' => 'index'));
	?>
	<?php echo $this->Html->link('Cancelar', array('plugin' => 'categorias', 'controller' => 'categorias', 'action' => 'index'), array('id'=>'cancelar')); ?> 
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