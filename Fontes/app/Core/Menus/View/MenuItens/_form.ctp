<div class="content form">
	<h2 class="row"> <?php echo $titulo_modulo; ?> de <span>Item Menu</span> </h2>

	<?php
		echo $this->Form->create('MenuItem', array('class' => 'cadastro') );
		echo $this->Form->input('id', array('type' => 'hidden') );
		echo $this->Form->input('site_id', array('type' => 'hidden'));
		echo $this->Form->input('menu_id', array('type' => 'hidden') );

		echo $this->Form->input('nome', array('label' => 'Título', 
											  'class' => 'w97') );

		if(!isset($edit)){
			echo $this->Form->input('identificador', array('label' => 'Identificador', 
										                   'class' => 'w97') ); 
		}
		
		echo $this->Form->input('parent_id', array('label' => 'Item Pai', 
												   'empty' => 'Selecione',
												   'class' => 'w30') );

		echo $this->Form->input('bm_tipo_id', array('label'   => 'Tipo', 
													'default' => 1,
													'class' => 'w30') );

		echo $this->Form->button('Atualizar tipo do item', array( 'type'  => 'submit', 
													 'name'  => 'atualizarSJS', 
													 'id'    => 'atualizarSJS') );	
?>
<fieldset id="link_extra">
	<legend class="oculto">Dados de destino.</legend>
<?php
		if(isset($opcao)){
			switch ($opcao) {
			    case 2:
			        echo $this->Form->input('link', array('label' => 'Link destino', 'class' => 'w97'));
			        break;

			    case 3:
			        echo $this->Form->input('pagina_id', array('label' => 'Página relacionada', 'class' => 'w30', 'options' => $lista_paginas, 'type' => 'select'));
			        break;

			    case 4:
			        echo $this->Form->input('categoria_id', array('label' => 'Categoria relacionada', 'class' => 'w30' ,'options' => $lista_categorias, 'type' => 'select'));
			        break;
			}
		}

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
		//echo $this->Html->link('Descartar' , array('action' => 'index/' . $menu_id  ));
	?>
	<?php echo $this->Html->link('Cancelar', array('plugin' => 'menus', 'controller' => 'menu_itens', 'action' => 'index', $menu_id), array('id'=>'cancelar')); ?> 
</div>
<?php
$this->Html->scriptBlock("
$(document).ready(function () {
    $('#atualizarSJS').bind('click', function(e){
    	var selected = $('#MenuItemBmTipoId').val();
    	var action = false;
    	switch(selected) {
    		case '1': //Sem Link
    			action = false;
    			$('#link_extra').html('');
    			break;
    		case '2': //Link
    			action = '". $this->Html->url(array('controller' => 'ajax', 'action' => 'menu_itens_link'))."';
    			break;
    		case '3': //Página
    			action = '" .$this->Html->url(array('controller' => 'ajax', 'action' => 'menu_itens_paginas'))."';
    			break;
    		case '4': //categoria
    			action = '".$this->Html->url(array('controller' => 'ajax', 'action' => 'menu_itens_categorias'))."';
    			break;
    	}

    	if(action) {
	        $.ajax({
	            url: action,
	            success: function(data) {
	                $('#link_extra').html(data);
	            }
	        });
    	}
        e.preventDefault();
    }); 
});", array('inline' => false));