<?php 
	if( $this->Session->read('tipo_request') == 'edit' )
      $acao = 'Edição';
	else
	  $acao = 'Cadastro';
?>

<div class="content form">
	<h2 class="row">Cadastro de <span>P&aacute;ginas</span></h2>
	<?php 
		// Caso a página esteja sendo editada, permite acesso
		// as outras etapas do cadastro de páginas
		if (isset($this->request->data['Pagina']['id'])) {
			echo $this->element('_passos', array('conteudo_id' => $this->request->data['Pagina']['id'], 
												 'conteudo' => 'pagina', 'extra' => 'banners'), array('plugin' => 'noticias'));
		} else {	
			echo $this->element('_passos', array('functional' => false, 'conteudo' => 'pagina', 'extra' => 'banners'), 
							    array('plugin' => 'noticias'));
		}
		echo $this->Form->create('Pagina', array('novalidate', 'class' => 'cadastro')); 
	?>
	<fieldset>

		<?php	  
			echo $this->Form->input('banners_categoria', array('type' => 'select', 
															   'multiple' => 'checkbox', 
															   'options' => $lista_categorias));
															   
			
			echo $this->Html->link('Cancelar', array('plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'index'), array('id'=>'cancelar')); 
		
			
			echo $this->Form->input('avancar', array('type' => 'submit', 'label' => false,  'value' => 'Avançar', 'name' => 'avancar', 'class' => 'controle'));		
			
	?>
	</fieldset>
	<?php
	
	//echo $this->Form->input('id', array('type' => 'hidden'));
	echo $this->Form->end(array('label' => 'Salvar', 'name' => 'salvar'));
	?>
</div>
