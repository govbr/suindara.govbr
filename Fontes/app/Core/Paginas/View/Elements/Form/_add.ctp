<?php 
	if( $this->Session->read('tipo_request') == 'edit' )
      $acao = 'Edição';
	else
	  $acao = 'Cadastro';
?>



<div class="content form">
	<h2 class="row"><?php echo $acao ?> de <span>P&aacute;gina</span></h2>
	
	<?php 
		// Caso a página esteja sendo editada, permite acesso
		// as outras etapas do cadastro de páginas
		if (isset($this->request->data['Pagina']['id'])) {
			echo $this->element('_passos', array('conteudo_id' => $this->request->data['Pagina']['id'], 
												 'conteudo' => 'pagina', 'extra' => $conteudo), array('plugin' => 'noticias'));
		} else {	
			echo $this->element('_passos', array('functional' => false, 'conteudo' => 'pagina', 'extra' => $conteudo), 
								array('plugin' => 'noticias'));
		}
		
		echo $this->Form->create('Pagina', array('novalidate', 'class' => 'cadastro')); 
	?>

	<fieldset>
	<legend class="oculto"><?php echo $acao ?> de P&aacute;gina</legend>
	<?php
		if ($conteudo == 'banners') {
			$this->Html->addCrumb("{$acao} de Página - Banner",  array('plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'edit'));  

			echo '<h3>Grupos de <span>Banners</span></h3>';
			echo $this->Form->input('GruposBanners', array('type' => 'select', 
													  'multiple' => 'checkbox',
													  'label' => 'Grupos:', 	  
													  'options' => $lista_grupos));
		} else {

			$this->Html->addCrumb("{$acao} de Página - Conteúdo textual",  array('plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'edit'));
			echo $this->Html->script('/js/ckeditor/ckeditor.js');
			echo $this->Form->input('titulo', array('type' => 'text', 'class'=>"w97", 'label' => 'Título'));
			echo $this->Form->input('texto', array('type' => 'text', 'class' => 'ckeditor w97', 'cols' => '80', 'rows' => '5'));
			//echo $this->Form->input('site_id', array('type' => 'select', 'options' => $lista_sites));
			echo $this->Form->input('status_id', array('type' => 'select', 'options' => $lista_status,'class' => 'clear 30'));
			echo $this->Form->input('bloqueado', array('type' => 'checkbox'));
		} 
	?>
	</fieldset>

	<?php
	echo '<fieldset id="acaoForm">';
        echo '<legend class="oculto">A&ccedil&atildeo do formul&aacute;rio</legend>';
		
		echo $this->Form->input('id', array('type' => 'hidden'));

		if ($conteudo == 'banners') {
			echo $this->Form->input('voltar', array('type' => 'submit', 'label' => false,  'value' => 'Voltar', 'name' => 'voltar', 'class' => 'controle'));
		}

		echo $this->Form->input('Avançar', array('type' => 'submit', 'label' => false,  'value' => 'Avançar', 'name' => 'avancar', 'class' => 'controle'));
		
		if (isset($this->request->data['Pagina']['id'])) {
			echo $this->Form->input('deletar', array('type' => 'submit', 'label' => false, 'value' => 'Deletar', 
													   'class' => 'controle',
													   'onclick' => "return confirm('Você tem certeza que deseja deletar esta página ?');"));
		}

		echo $this->Form->input('salvar', array('type' => 'submit', 'label' => false, 'value' => 'Salvar'));
	echo '</fieldset>';

	echo $this->Form->end(); 
	?>

	<?php echo $this->Html->link('Cancelar', array('plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'index'), array('id'=>'cancelar')); ?>
</div>