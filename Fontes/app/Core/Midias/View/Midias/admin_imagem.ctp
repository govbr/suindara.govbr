<?php 
	
$tipo_conteudo = $this->request->params['tipo_conteudo'];
$id_conteudo = $this->request->params['id_conteudo'];

if( $this->Session->read('tipo_request') == 'edit' )
      $acao = 'Edição';
	else
	  $acao = 'Cadastro';

if($tipo_conteudo == 'noticia') {
	$this->Html->addCrumb('Notícias',  array('plugin' => 'noticias', 'controller' => 'noticias', 'action' => 'index'));
	$this->Html->addCrumb("{$acao} de Notícia - Mídias",  array('plugin' => 'midias', 'controller' => 'midias', 'tipo_conteudo' => $this->params['tipo_conteudo'], 'id_conteudo' => $this->params['id_conteudo'], 'action' => 'midias'));
} else {
	$this->Html->addCrumb('Páginas',  array('plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'index'));
	$this->Html->addCrumb("{$acao} de Página - Mídias",  array('plugin' => 'midias', 'controller' => 'midias', 'tipo_conteudo' => $this->params['tipo_conteudo'], 'id_conteudo' => $this->params['id_conteudo'], 'action' => 'midias'));
}

$this->Html->addCrumb('Edição de Mídia', array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias' ,'action' => 'imagem', 'id_midia' => $this->data['Midia']['id']));

?>

<div class="content form">
	<h2 class="row"> <?php echo $acao; ?> de <span><?php echo ($tipo_conteudo=='noticia') ? 'Notícias' : 'Páginas'; ?></span></h2>
	
	<h3>Edição de <span>mídia</span></h3>
	<?php echo $this->Crop->create($this->data['Midia']); ?>
	
	<hr />

	<h3>Informações sobre a <span>imagem</span></h3>
	<?php echo $this->Form->create('Midia'); ?>
	
	<fieldset>
	<legend class="oculto">Informações sobre a imagem</legend>
		<?php
			echo $this->Form->input('Midia.id');
			echo $this->Form->input('Midia.arquivo', array('type' => 'hidden'));
			echo $this->Form->input('Midia.crop_x', array('type' => 'hidden'));
			echo $this->Form->input('Midia.crop_y', array('type' => 'hidden'));
			echo $this->Form->input('Midia.crop_w', array('type' => 'hidden'));
			echo $this->Form->input('Midia.crop_x2', array('type' => 'hidden'));
			echo $this->Form->input('Midia.crop_y2', array('type' => 'hidden'));
			echo $this->Form->input('Midia.crop_h', array('type' => 'hidden'));
			//echo $this->Form->input('Midia.crop_x', array('type' => 'hidden'));
			echo $this->Form->input('Midia.titulo', array('label' => 'T&iacute;tulo', 'class'=>'w40'));
			echo $this->Form->input('Midia.descricao', array('label' => 'Descri&ccedil;&atilde;o', 'class'=>'w97'));
			echo $this->Form->input('Midia.fonte', array('label' => 'Fonte', 'class'=>'w97'));
		?>
	</fieldset>
	
	<?php 
		echo '<fieldset id="acaoForm">';
			echo '<legend class="oculto">A&ccedil&atildeo do formul&aacute;rio</legend>';

			echo $this->Form->input('voltar', array('type' => 'submit', 'label' => false,  'value' => 'Voltar', 'name' => 'voltar', 'class' => 'controle'));

			if ($this->data['Midia']['descricao'] && $this->data['Midia']['titulo'])
			{
				echo $this->Form->submit('Restaurar valores', array('type' => 'reset', 'div' => false));
			}

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