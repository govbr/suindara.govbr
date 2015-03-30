<?php
	$this->Html->addCrumb('Configurações - Editar',  array('plugin' => 'categorias', 'controller' => 'categorias', 'action' => 'edit'));
?>

<div class="content form">
	<h2 class="row"> Edição das <span> Configurações </span> </h2>

	<?php
		echo $this->Form->create('Configuracao', array('class' => 'cadastro') );

		echo $this->Form->input('id', array('type' => 'hidden', 'value' => 1));
	?>
	<fieldset>
	<legend class="oculto"> configuracoes do servidor</legend>
	<?php
		echo $this->Form->input('tempo_sessao', array('label' => 'Tempo maximo de sessão (minutos)',
													  'class' => 'w97',
													  'value' => $tempo_sessao
													  ));

		echo $this->Form->input('upload_tamanho', array('label' => 'Tamanho máximo do upload (megabytes - MB)',
														'class' => 'w97',
														'value' => $upload
														));

		echo $this->Form->input('memoria_tamanho', array('label' => 'Tamanho da memória (megabytes - MB)',
														'class' => 'w97',
														'value' => $memoria
														));

		echo $this->Form->input('post_tamanho', array('label' => 'Tamanho do envio (megabytes - MB)',
														'class' => 'w97',
														'value' => $post
														));

	?>

	</fieldset>
	<?php 
		echo '<fieldset id="acaoForm">';
        	echo '<legend class="oculto">A&ccedil&atildeo do formul&aacute;rio</legend>';
			echo $this->Form->reset('reset');
			echo $this->Form->submit('Salvar');
		echo '</fieldset>';
		
		echo $this->Form->end(); 
	?>
</div>