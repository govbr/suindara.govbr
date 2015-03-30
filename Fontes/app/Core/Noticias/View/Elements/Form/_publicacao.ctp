
<?php 
	if( $this->Session->read('tipo_request') == 'edit' )
      $acao = 'Edição';
	else
	  $acao = 'Cadastro';

	$this->Html->addCrumb("{$acao} de Notícia - Publicação",  array('plugin' => 'noticias', 'controller' => 'noticias', 'action' => 'edit'));
?>

<div class="content form">
	<h2 class="row"><?php echo $acao; ?> de <span>Not&iacute;cia</span></h2>	
	
	<?php
		echo $this->element('_passos', array('conteudo_id' => $this->request->data['Noticia']['id'], 'conteudo' => 'noticia')); 
		echo $this->Form->create('Noticia', array('novalidate', 'class' => 'cadastro')); 
	?>

	<fieldset>
	<legend class="oculto">Publica&ccedil;&atilde;o</legend>
	<?php	
		echo $this->Form->input('bloqueado', array('type' => 'checkbox', 'label' => 'Bloquear notícia'));
		
		
		echo $this->Form->input('agendar', array('type' => 'checkbox', 'label' => 'Agendar notícia'));
		
	?>
		<div id="Fs_datahora_prog_pub">
	<?php
		echo $this->Form->input('datahora_prog_pub', array('type' => 'datetime',
														   'label' => 'Data de publicação da notícia', 
														   'dateFormat' => 'DMY', 
														   'timeFormat' => 24,
														   'class' => 'data',
														   //'id' => 'Fs_datahora_prog_pub',
														   //'disabled' => 'disabled',
														   'separator' => '/'));
	?>
		</div>						
		<div id="Fs_datahora_prog_exp">
	<?php													   
		echo $this->Form->input('datahora_prog_exp', array('type' => 'datetime', 
														   'label' => 'Data de expiração da notícia',	
														   'dateFormat' => 'DMY',
														   'timeFormat' => 24,
														   'class' => 'data', 
														  // 'id' => 'Fs_datahora_prog_exp',
														   'empty' => true,
														   //'disabled' => 'disabled',
														   'separator' => '/'));	 
	?>
		</div>
	</fieldset>	

	<?php
	 echo '<fieldset id="acaoForm">';
        echo '<legend class="oculto">A&ccedil&atildeo do formul&aacute;rio</legend>';
        	echo $this->Form->input('voltar', array('type' => 'submit', 'label' => false,  'value' => 'Voltar', 'name' => 'voltar', 'class' => 'controle'));

        	echo $this->Form->input('deletar', array('type' => 'submit', 'label' => false, 'value' => 'Deletar', 
												   'class' => 'controle',
												   'onclick' => "return confirm('Você tem certeza que deseja deletar esta notícia ?');"));

			echo $this->Form->input('salvar', array('type' => 'submit', 'label' => false,  'value' => 'Confirmar', 'name' => 'confirmar'));
			
		echo '</fieldset>';
			
		echo $this->Form->end(); 
	?>
	
	<?php echo $this->Html->link('Cancelar', array('plugin' => 'noticias', 'controller' => 'noticias', 'action' => 'index'), array('id'=>'cancelar')); ?>
 </div>