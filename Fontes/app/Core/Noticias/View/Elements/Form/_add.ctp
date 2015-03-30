<?php
	if( $this->Session->read('tipo_request') == 'edit' )
      $acao = 'Edição';
	else
	  $acao = 'Cadastro';


	$this->Html->addCrumb("{$acao} de Notícia - Conteúdo textual",  array('plugin' => 'noticias', 'controller' => 'noticias', 'action' => 'edit'));
?>

<div class="content form">
	
	<?php 
		if( $this->Session->check('tipo_request') ){
			$tipo_request = $this->Session->read('tipo_request');
		}
		?> <h2 class="row"><?php echo $acao ?> de <span>Not&iacute;cia</span></h2> <?php
	?>
	
	<?php
		// Caso a notícia esteja sendo editada, permite acesso
		// as outras etapas do cadastro de notícia
		if (isset($this->request->data['Noticia']['id'])) {
			echo $this->element('_passos', array('conteudo_id' => $this->request->data['Noticia']['id'], 'conteudo' => 'noticia'));
		} else {	
			echo $this->element('_passos', array('functional' => false, 'conteudo' => 'noticia'));

		}
		 
		echo $this->Form->create('Noticia', array('novalidate', 'class' => 'cadastro')); 
	?>

	<fieldset>
	<legend class="oculto">Conte&uacute;do Textual</legend>
	<?php
		echo $this->Html->script('/js/ckeditor/ckeditor.js');
	
		echo $this->Form->input('titulo', array('type' => 'text', 'class'=>"w97", 'label' => 'Título'));
		echo $this->Form->input('resumo', array('type' => 'text', 'class' => 'ckeditor', 'cols' => '80', 'rows' => '5'));
		echo $this->Form->input('texto', array('type' => 'text', 'class' => 'ckeditor', 'cols' => '80', 'rows' => '5'));
		echo $this->Form->input('cartola', array('type' => 'text', 'class'=>"w97"));
		
		echo $this->Form->input('autor', array('type' => 'text', 'class'=>"w97"));
		echo $this->Form->input('categoria_id', array('type' => 'select', 'options' => $lista_categorias)); 
	?>
	<br />
	<span class="oculto obrigatorio">Obrigatório</span> Campos com esta marca são obrigatórios.
	</fieldset>			
	
	<?php
		echo '<fieldset id="acaoForm">';
			echo '<legend class="oculto">A&ccedil&atildeo do formul&aacute;rio</legend>';
			
			echo $this->Form->input('id', array('type' => 'hidden'));

			if (isset($this->request->data['Noticia']['id'])) {
				echo $this->Form->input('deletar', array('type' => 'submit', 'name' => 'deletar', 'label' => false, 'value' => 'Deletar', 
													   'class' => 'controle',
													   'onclick' => "return confirm('Você tem certeza que deseja deletar esta notícia ?');"));
			}
			
			echo $this->Form->input('Avançar', array('type' => 'submit', 'label' => false,  'value' => 'Avançar', 'name' => 'avancar', 'class' => 'controle'));

			echo $this->Form->input('salvar', array('type' => 'submit', 'label' => false, 'value' => 'Salvar'));
		echo '</fieldset>';

	echo $this->Form->end();
	?>

	<?php echo $this->Html->link('Cancelar', array('plugin' => 'noticias', 'controller' => 'noticias', 'action' => 'index'), array('id'=>'cancelar')); ?>
</div>