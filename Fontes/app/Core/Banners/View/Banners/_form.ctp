<div class="content form">
	<h2 class="row"> <?php echo $titulo_modulo; ?> de <span>Banners</span> </h2>

	<?php
		echo $this->Form->create('Banner', array('type' => 'file') );
		echo $this->Form->input('id', array('type' => 'hidden'));
		echo $this->Form->input('site_id', array('type' => 'hidden'));
		
		echo $this->Form->input('titulo', array('label' => 'T&iacute;tulo', 
												'class' =>  'w40') );

		echo $this->Form->input('descricao', array('label' => 'Descri&ccedil;&atilde;o', 
												   'class' => 'w97') );		

		echo $this->Form->input('arquivo', array('label'    => 'Selecione o arquivo de imagem', 
										 		 'type'     => 'file',
										 		 //'accept'   => $mimes
										 		) );
		if( $titulo_modulo == 'Edição' )
		{
			echo '<p>' . $this->Banners->imageUrl($banner['Banner']['arquivo']) . '</p>';
		}						   

		echo $this->Form->input('bm_tipo_id', array('label'   => 'Tipo de banner', 
													'default' => 1,
													'class' => 'w30') );

		echo $this->Form->button('Atualizar', array( 'type'  => 'submit', 
													 'title' => '', 
													 'name'  => 'atualizarSJS', 
													 'id'    => 'atualizarSJS') );
?>
<fieldset id="link_extra">
	<legend class="oculto">Dados cadastrais do tipo do banner.</legend>
<?php
		if(isset($opcao)){
			switch ($opcao) {
			    case 2:
			        echo $this->Form->input('link', array('label' => 'Link destino', 'class' => 'w97'));
			        break;

			    case 3:
			        echo $this->Form->input('pagina_id', array('label' => 'P&aacute;ginagina relacionada', 'options' => $lista_paginas, 'class' => 'w30') );
			        break;

			    case 4:
			        echo $this->Form->input('categoria_id', array('label' => 'Categoria relacionada', 'type' => 'select', 'options' => $lista_categorias, 'class' => 'w30') );
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
	?>
	<?php echo $this->Html->link('Cancelar', array('plugin' => 'banners', 'controller' => 'banners', 'action' => 'index', $grupo_id), array('id'=>'cancelar')); ?> 
</div>

<?php
$this->Html->scriptBlock("
$(document).ready(function () {
    $('#atualizarSJS').bind('click', function(e){
    	var selected = $('#BannerBmTipoId').val();
    	var action = false;
    	switch(selected) {
    		case '1': //Sem Link
    			action = false;
    			$('#link_extra').html('');
    			break;
    		case '2': //Link
    			action = '". $this->Html->url(array('controller' => 'ajax', 'action' => 'banners_link'))."';
    			break;
    		case '3': //Página
    			action = '" .$this->Html->url(array('controller' => 'ajax', 'action' => 'banners_paginas'))."';
    			break;
    		case '4': //categoria
    			action = '".$this->Html->url(array('controller' => 'ajax', 'action' => 'banners_categorias'))."';
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