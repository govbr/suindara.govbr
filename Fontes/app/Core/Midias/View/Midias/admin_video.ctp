<?php 

$tipo_conteudo = $this->request->params['tipo_conteudo'];
$id_conteudo = $this->request->params['id_conteudo'];

if($tipo_conteudo == 'noticia') {
	$this->Html->addCrumb('Notícias',  array('plugin' => 'noticias', 'controller' => 'noticias', 'action' => 'index'));
} else {
	$this->Html->addCrumb('Páginas',  array('plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'index'));
}

$this->Html->addCrumb('Mídias', array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias' ,'action' => 'midias'));
$this->Html->addCrumb('Editar Vídeo', array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias' ,'action' => 'video', 'id_midia' => $this->data['Midia']['id']));
?>

<div class="content form">
	<h2 class="row">Cadastro de <span><?php echo ($tipo_conteudo=='noticia') ? 'Notícias' : 'Páginas'; ?></span></h2>
	
	<h3>Edição de <span>vídeo</span></h3>
	<?php echo $this->VideoPlayer->create($this->data); ?>
	
	<hr />

	<h3>Informações sobre o <span>vídeo</span></h3>
	<?php echo $this->Form->create('Midia'); ?>
	
	<fieldset>
		<?php
		echo $this->Form->input('Midia.id');
		echo $this->Form->input('Midia.titulo', array('label' => 'T&iacute;tulo', 'class'=>'w40'));
		echo $this->Form->input('Midia.descricao', array('label' => 'Descri&ccedil;&atilde;o', 'class'=>'w97'));
		echo $this->Form->input('Midia.versao_textual', array('label' => 'Vers&atilde;o textual', 'class'=>'w97'));
		echo $this->Form->input('Midia.fonte', array('label' => 'Fonte', 'class'=>'w97'));
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
	<?php
		if($tipo_conteudo == 'noticia') {
			echo $this->Html->link('Cancelar', array('plugin' => 'noticias', 'controller' => 'noticias', 'action' => 'index'), array('id'=>'cancelar'));
		} else {
			echo $this->Html->link('Cancelar', array('plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'index'), array('id'=>'cancelar'));
		}
	?> 
</div>