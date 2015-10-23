<?php
	$this->Html->addCrumb('Grupos',  array('plugin' => 'banners', 'controller' => 'grupos', 'action' => 'index'));
	$this->Html->addCrumb('Banners',  array('plugin' => 'banners', 'controller' => 'banners', 'action' => 'index'));
?>

<h2 class="row">Listagem de <span><?php echo $this->name; ?></span></h2>

<div class="row controlist">
	<?php echo $this->Html->link('Adicionar novo banner<span></span>', array('controller' => 'banners', 'action' => 'add', 'admin' => true, $grupo_id), array('class' => 'threecol add', 'escape' => false)); ?>
	
	<div id="busca_simples" class="eightcol">
		<?php echo $this->Element('../Banners/_search'); ?>
		<a href="#" id="exp_busca"><span>Expandir op&ccedil;&otilde;es de busca avan&ccedil;ada</span></a>
	</div>

	<div id="busca_avancada" <?php echo ($this->Session->read('Auth.User.modo_sistema') == MODO_SISTEMA_PADRAO) ? 'style="display: none;"' : ''; ?>>
		<?php echo $this->Element('../Banners/_advanced_search'); ?>
	</div>
</div>

<?php if( empty($bannerPaginate) ) { ?>
	<p class="noInfo">Nenhum registro encontrado. 
    <?php echo $this->Html->link('Voltar para a listagem de banners.', 
                                 Router::url(array('plugin' => 'banners', 'controller' => 'banners', 'action' => 'index', $grupo_id), true)); ?>
    </p>

<?php } else { ?>
	
	<?php $bannerCount = count($bannerPaginate); ?>

	<?php  if (!$this->request->isGet()) { ?>
        <p class="noInfo">
            <?php
                if ($bannerCount > 1) {
             ?>
                Foram encontrados <?php echo $bannerCount; ?> banners.
            
            <?php } else { ?>

                Foi encontrado 1 banner.

            <?php } ?>

            <?php echo $this->Html->link('Voltar para a listagem de banner.', 
                                     Router::url(array('plugin' => 'banners', 'controller' => 'banners', 'action' => 'index', $grupo_id), true)); ?>

            
        </p>
    <?php } ?>

	<table class="row" summary="Tabela de Listagem de banners.">
		<thead>
			<tr>
				<th>Item</th>
				<th><?php echo $this->Paginator->sort('titulo', '<span class="bullet">Ordenar por </span><span class="texto">T&iacute;tulo do Banner</span>', array('escape' => false) ); ?></th>
				<th><?php echo $this->Paginator->sort('descricao', '<span class="bullet">Ordenar por </span><span class="texto">Descri&ccedil;&atilde;o</span>', array('escape' => false) ); ?></th>
				<th><?php echo $this->Paginator->sort('bm_tipo_id.nome', '<span class="bullet">Ordenar por </span><span class="texto">Tipo</span>', array('escape' => false) ); ?></th>
				<th>Ordem</th>
				<th>A&ccedil;&otilde;es</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($bannerPaginate as $key => $banner): ?>
			<?php
				foreach ($numeracao as $index => $value) {
					if($value['Banner']['id'] == $banner['Banner']['id']){
						$banner['Banner']['testField'] = $value['Banner']['numero'];
					}
				 } 
			?>
				<tr>
					<td> <?php echo $banner['Banner']['testField'] ?> </td>
					<td><?php echo $banner['Banner']['titulo']; ?></td>
					<td><?php echo $banner['Banner']['descricao']; ?></td>
					<td><?php echo $banner['BmTipo']['nome']; ?></td>
					<td>
						<ul>
							<?php 
								 if( $key > 0 ) 
								 {
							?>
									<li><?php echo $this->Html->link('<span class="oculto">Mover "'.$banner['Banner']['titulo'].'" para a</span> posi&ccedil;&atilde;o anterior', 
																 array('controller' => 'banners', 'action' => 'moveup', 'admin' => true, $banner['Banner']['id']),
																 array('class'  => 'up', 'escape' => false)
																); ?> </li>
							
							<?php } ?>


							<?php 
								 if( $key < (count($bannerPaginate) - 1) ) 
								 {
							?>
	    					<li><?php echo $this->Html->link('<span class="oculto">Mover "'.$banner['Banner']['titulo'].'" para a</span> pr&oacute;xima posi&ccedil;&atilde;o', 
	    													 array('controller' => 'banners', 'action' => 'movedown', 'admin' => true, $banner['Banner']['id']),
	    													 array('class'  => 'down', 'escape' => false)
	    													 ); ?> </li>
	    					<?php } ?>

						</ul>
					</td>
					<td>
						<ul>
							<li><?php echo $this->Html->link('Visualizar <span class="oculto">banner: ' . $banner['Banner']['id'] . '</span>', 
															 array('controller' => 'banners', 'action' => 'view', 'admin' => true, $banner['Banner']['id']),
															 array('class' => 'view', 
															 	   'escape' => false)
															); ?> </li>
							
							<li><?php echo $this->Html->link('Editar <span class="oculto">banner: ' . $banner['Banner']['titulo'] . '</span>',
															 array('controller' => 'banners', 'action' => 'edit', 'admin' => true, $banner['Banner']['id']),
															 array('class'  => 'edit',
															 	   'escape' => false) ); ?></li>
	
							<li><?php echo $this->Html->link('Deletar <span class="oculto">banner: ' . $banner['Banner']['titulo'] . '</span>',
															 '/admin/banners/delete/' . $banner['Banner']['id'], 
															 array('class' => 'del', 
																  'escape' => false), 
															 'Voc&ecirc; tem certeza que deseja deletar o banner ' . $banner['Banner']['titulo'] . '?'); ?> </li>
						</ul>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php }

echo $this->Element('paginator');
