<?php

	if( $this->Session->read('tipo_request') == 'edit' )
      $acao = 'Edição';
	else
	  $acao = 'Cadastro';

	$this->Html->addCrumb('Páginas',  array('plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'index'));
	$this->Html->addCrumb("{$acao} de Página - Visualização",  array('plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'view'));
?>

<div class="content">
	<h2 class="row"><?php echo $acao ?> de <span>P&aacute;gina</span></h2>
	
	<?php echo $this->element('_passos', array('conteudo_id' => $pagina['Pagina']['id'], 'conteudo' => 'pagina'), array('plugin' => 'noticias')); ?>

	<div id="view">
		<h3><?php echo $this->CmsUtil->limitarTexto($pagina['Pagina']['titulo'], 90, '...') ?></h3>
		
		<hr />
		
		<p>
			<?php 
			if(!empty($pagina['ImagemPrincipal']))
				echo $this->Midias->thumb($pagina['ImagemPrincipal'][0]['arquivo'], $pagina['ImagemPrincipal'][0]['tipo_id']);
			?>
			<?php echo $pagina['Pagina']['texto'] ?>
		</p>

		<hr />

		<?php if(count($pagina['Midias']) > 0): ?>
			<h4>Galeria Mídias</h4>
			<ul>
				<?php foreach($pagina['Midias'] as $midia): ?>
					<li><?php echo $this->Midias->thumb($midia['arquivo'], $midia['tipo_id']); ?></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<?php if(count($pagina['Arquivos']) > 0): ?>
			<hr />
			<h4>Documentos para download</h4>
			<ul class="listagem">
				<?php foreach($pagina['Arquivos'] as $arquivo): ?>
					<li><?php echo $this->Html->link($arquivo['titulo'] . ' ('.strtoupper($this->Midias->fileExt($arquivo['arquivo'], $arquivo['tipo_id'])) . ' - ' . $this->Midias->size($arquivo['tamanho']). ')' , $this->Midias->fileUrl($arquivo['arquivo'], $arquivo['tipo_id'])); ?></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
		<hr />

		<?php if ($this->Session->check("Pagina.TempSave.Id")) {?>
			<?php echo $this->Html->link('Voltar', array(
				'plugin' => 'paginas',
				'controller' => 'paginas',
				'action' => 'add',
				$pagina['Pagina']['id'], 'banners'
			), array('id'=>'voltar')); ?>
			<?php echo $this->Html->link('Salvar', array(
				'plugin'=>'paginas', 
				'controller'=>'paginas',
				'action'=>'index'
			), array('id'=>'avancar', 'class'=>'salvar'));?>
		<?php }else{ ?>
			<?php echo $this->Html->link('Voltar', array(
				'plugin'=>'paginas', 
				'controller'=>'paginas',
				'action'=>'index'
			), array('id'=>'voltar'));?>
		<?php } ?>
	
	</div>
</div>