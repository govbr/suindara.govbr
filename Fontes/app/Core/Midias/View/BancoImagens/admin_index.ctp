<?php
	$this->Html->addCrumb('Banco de imagens',  array('plugin' => 'midias', 'controller' => 'banco_imagens', 'action' => 'admin_index'));
?>

<h2 class="row">Banco de <span>Imagens</span></h2>
<div class="row controlist">
	<?php echo $this->Html->link('Adicionar novas imagens<span class="oculto"></span>', array('plugin' => 'midias', 'controller' => 'banco_imagens', 'action' => 'add'), array('class' => 'threecol add', 'escape' => false)); ?>
	<?php echo $this->Paginator->sort('Midia.titulo', 'Ordenar imagens <span class="oculto">por t&iacute;tulo</span>', array('class' => 'threecol ord', 'escape' => false)); ?>

	<div id="busca_simples" class="eightcol">
		<?php echo $this->element('../BancoImagens/_search'); ?>
	</div>

</div>


<?php if(count($midias) == 0) { ?>
	<p class="noInfo">Nenhuma imagem encontrada.
		<?php echo $this->Html->link('Voltar para a listagem de imagens.', Router::url(array('plugin' => 'midias', 'controller' => 'banco_imagens', 'action' => 'index'), true)); ?>
	</p>

<?php } else { ?>
	
	<?php if (isset($this->params->query['search'])) { ?>
	<p class="noInfo">

		 <?php
			$numMidias = count($midias);
			if ($numMidias > 1) {
		 ?>
			Foram encontradas <?php echo $numMidias ?> imagens.
		
		<?php } else { ?>

			Foi encontrada 1 imagem.

		<?php } ?>

		<?php echo $this->Html->link('Voltar para a listagem de imagens.', Router::url(array('plugin' => 'midias', 'controller' => 'banco_imagens', 'action' => 'index'), true)); ?>
	</p>
	<?php } ?>

	<ul class="banco_imagens_lista row">
		<?php foreach($midias as $midia): ?>	
			
		<?php if(!$midia['Midia']['ativa']) $midia['Midia']['titulo'] = $midia['Midia']['nome_original']; ?>
			<li class="<?php echo ($midia['Midia']['ativa']) ? 'ativo' : 'inativo';?>">
				<div class="preview">
					<?php echo $this->Midias->thumb($midia['Midia']['arquivo'], $midia['Midia']['tipo_id'], array('alt'=>$midia['Midia']['descricao'])); ?>
					<p><?php echo $midia['Midia']['titulo']; ?></p>
				</div>

				<?php if($midia['Midia']['ativa'] != 1){ ?>
				<p class="aviso">Imagem sem texto alternativo!</p>
				<?php } ?>

				<ul class="action">
					<li><?php echo $this->Html->link('Editar <span class="oculto">"'.$midia['Midia']['titulo'].'"</span>', array('plugin' => 'midias', 'controller' => 'banco_imagens', 'action' => 'edit', $midia['Midia']['id']), array('class'  => 'edit','escape' => false)); ?></li>
					<li><?php echo $this->Html->link('Deletar <span class="oculto"> "'.$midia['Midia']['titulo'].'"</span>', array('plugin' => 'midias', 'controller' => 'banco_imagens', 'action' => 'delete', $midia['Midia']['id']), array('class'  => 'del','escape' => false), "Você tem certeza que deseja deletar '".$midia['Midia']['titulo']."'?"); ?></li>
				</ul>
			</li>
		
		<?php endforeach; ?>
	</ul>

<?php }
	echo $this->Element('paginator');