<?php
	if( $this->Session->read('tipo_request') == 'edit' )
      $acao = 'Edição';
	else
	  $acao = 'Cadastro';

	$this->Html->addCrumb('Notícias',  array('plugin' => 'noticias', 'controller' => 'noticias', 'action' => 'index'));
	$this->Html->addCrumb("{$acao} de Notícia - Visualização",  array('plugin' => 'noticias', 'controller' => 'noticias', 'action' => 'view'));
?>

<div class="content">
	<h2 class="row"><?php echo $acao; ?> de <span>Not&iacute;cia</span></h2>
	
	<?php echo $this->element('_passos', array('conteudo_id' => $noticia['Noticia']['id'], 'conteudo' => 'noticia')); ?>
	
	<div id="view">
		<h3>Data de cadastro: <span><?php echo $this->Formatacao->data(strtotime($noticia['Noticia']['datahora_publicacao'])) ?></span> 
		<p><?php echo $this->CmsUtil->limitarTexto($noticia['Noticia']['titulo'], 90, '...') ?></h3></p>


		<p>Categoria: <?php echo $noticia['Categoria']['titulo'] ?> | Cartola: <?php echo $noticia['Noticia']['cartola'] ?></p>
		
		<hr />
		
		<p>
			<?php 
			if(!empty($noticia['ImagemPrincipal']))
				echo $this->Midias->thumb($noticia['ImagemPrincipal'][0]['arquivo'], $noticia['ImagemPrincipal'][0]['tipo_id']);
			?>
			<?php echo $noticia['Noticia']['texto'] ?>
		</p>

		<hr />

		<?php if(count($noticia['Midias']) > 0): ?>
			<h4>Galeria Mídias</h4>
			<ul>
				<?php foreach($noticia['Midias'] as $midia): ?>
					<li><?php echo $this->Midias->thumb($midia['arquivo'], $midia['tipo_id']); ?></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<?php if(count($noticia['Arquivos']) > 0): ?>
			<hr />
			<h4>Documentos para download</h4>
			<ul class="listagem">
				<?php foreach($noticia['Arquivos'] as $arquivo): ?>
					<li><?php echo $this->Html->link($arquivo['titulo'] . ' ('.strtoupper($this->Midias->fileExt($arquivo['arquivo'], $arquivo['tipo_id'])) . ' - ' . $this->Midias->size($arquivo['tamanho']). ')' , $this->Midias->fileUrl($arquivo['arquivo'], $arquivo['tipo_id'])); ?></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
		<hr />

		<?php echo $this->Html->link('Voltar', array(
			'plugin' => 'midias',
			'controller' => 'midias',
			'tipo_conteudo' => 'noticia',
			'id_conteudo' => $noticia['Noticia']['id'],
			'action' => 'arquivos'
		), array('id'=>'voltar')); ?>
		
		<?php echo $this->Html->link('Avançar', array(
			'plugin'=>'noticias', 
			'controller'=>'noticias',
			'action'=>'edit', $noticia['Noticia']['id'], 'publicar'
		), array('id'=>'avancar'));?>
	
	</div>
</div>