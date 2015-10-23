<?php
	$this->Html->addCrumb('Grupos',  array('plugin' => 'banners', 'controller' => 'grupos', 'action' => 'index'));
	$this->Html->addCrumb('Banners',  array('plugin' => 'banners', 'controller' => 'banners', 'action' => 'index', $grupo_id));
	$this->Html->addCrumb('Visualizar',  array('plugin' => 'banners', 'controller' => 'banners', 'action' => 'view'));
?>

<h2 class="row">Visualiza&ccedil;&atilde;o de <span><?php echo $this->name; ?></span></h2>

<div class="row exibicao">
	<p>T&iacute;tulo: <span class="w40"><?php echo $banner['Banner']['titulo'] ?></span></p>
	<p>Descri&ccedil;&atilde;o: <span class="w97"><?php echo $banner['Banner']['descricao'] ?></span></p>
	<p>Tipo do Banner: <span class="w40"><?php echo $banner['BmTipo']['nome'] ?></span></p>
	<?php 
		$opcao = $banner['Banner']['bm_tipo_id'];
		if(isset($opcao)){
			switch ($opcao) {
			    case 2: ?> <p>Link: <span class="w97"><?php echo $banner['Banner']['link']; ?> </span></p> <?php
			        	break;

			    case 3: ?> <p>P&aacute;gina Relacionada: <span class="w97"><?php echo $pagina_nome; ?> </span></p> <?php
						break;

			    case 4: ?> <p>Categoria: <span class="w97"><?php echo $categoria_nome; ?> </span></p> <?php    
			        	break;
			}
		}
	?>
	
	<p>Imagem do Banner: <span class="w97"><?php echo $this->Banners->imageUrl($banner['Banner']['arquivo']); ?></span></p>	
</div>
<?php echo $this->Html->link('Voltar', array('plugin' => 'banners', 'controller' => 'banners', 'action' => 'index', $grupo_id), array('id'=>'voltar')); ?> 