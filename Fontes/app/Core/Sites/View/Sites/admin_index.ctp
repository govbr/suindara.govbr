<?php
	$this->Html->addCrumb('Sites',  array('plugin' => 'sites', 'controller' => 'sites', 'action' => 'index'));
?>

<h2 class="row">Listagem de <span><?php echo $this->name; ?></span></h2>

<div class="row controlist"> 
	<?php echo $this->Html->link('Adicionar novo site<span></span>', array('controller' => 'sites', 'action' => 'add', 'admin' => true ), array('class' => 'threecol add', 'escape' => false)); ?>

	<div id="busca_simples" class="eightcol">
		<?php echo $this->Element('../Sites/_search'); ?>
	</div>
</div>

<?php if( empty($sitePaginate) ) { ?>
	<p class="noInfo">Nenhum registro encontrado. 
    <?php echo $this->Html->link('Voltar para a listagem de sites.', 
                                 Router::url(array('plugin' => 'sites', 'controller' => 'sites', 'action' => 'index'), true)); ?>
    </p>
	
<?php } else { ?>
	
	<?php $siteCount = count($sitePaginate); ?>

	<?php  if (!$this->request->isGet()) { ?>
        <p class="noInfo">
            <?php
                if ($siteCount > 1) {
             ?>
                Foram encontrados <?php echo $siteCount; ?> sites.
            
            <?php } else { ?>

                Foi encontrado 1 site.

            <?php } ?>

            <?php echo $this->Html->link('Voltar para a listagem de sites.', 
                                     Router::url(array('plugin' => 'sites', 'controller' => 'sites', 'action' => 'index'), true)); ?>

            
        </p>
    <?php } ?>

	<table class="row" summary="Tabela de Listagem de sites.">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('titulo', '<span class="bullet">Ordenar por </span><span class="texto">T&iacute;tulo</span>', array('escape' => false)); ?></th>
				<th><?php echo $this->Paginator->sort('dominio', '<span class="bullet">Ordenar por </span><span class="texto">Dom&iacute;nio</span>', array('escape' => false)); ?></th>
				<th><?php echo $this->Paginator->sort('instituicao', '<span class="bullet">Ordenar por </span><span class="texto">Institui&ccedil;&atilde;o</span>', array('escape' => false)); ?></th>
				<th><?php echo $this->Paginator->sort('site_principal', '<span class="bullet">Ordenar por </span><span class="texto">Principal', array('escape' => false)); ?></th>
				<th>A&ccedil;&atilde;o</th>
			</tr>
		</thead>
		<tbody>

			<?php foreach($sitePaginate as $site): ?>
				<tr>
					<td><?php echo $site['Site']['titulo']; ?></td>
					<td><?php echo $site['Site']['dominio']; ?></td>
					<td><?php echo $site['Site']['instituicao']; ?></td>
					<td>
						<?php 
						if($site['Site']['site_principal']) {
							echo '<p class="principalOn">"' . $site['Site']['titulo'] . '" esta definido como site principal.</p>';
						} else {
							echo $this->Html->link('Definir "'.$site['Site']['titulo'].'" como site principal.',
													 array('controller' => 'sites',
													  'action' => 'sitePrincipal',
													  'admin' => true, $site['Site']['id']
													 ), 
													 array('escape' => false, 'class' => 'principalOff')
													);
						}
						?>

					</td>
					<td>
						<ul>
							<li><?php echo $this->Html->link('Visualizar <span class="oculto">site: ' . $site['Site']['titulo'] . '</span>', 
															 array('controller' => 'sites', 'action' => 'view', 'admin' => true, $site['Site']['id'] ),
															 array('class' => 'view', 
															 	   'escape' => false)
															); ?> </li>
	
							<li><?php echo $this->Html->link('Editar <span class="oculto">site: ' . $site['Site']['titulo'] . '</span>', 
														     array('controller' => 'sites', 'action' => 'edit', 'admin' => true, $site['Site']['id'] ),
														     array('class'  => 'edit', 
														 	       'escape' => false)
														    ); ?> </li>
	
							<li><?php echo $this->Html->link('Deletar <span class="oculto">site: ' . $site['Site']['titulo'] . '</span>', 
															 array('controller' => 'sites', 'action' => 'delete', 'admin' => true, $site['Site']['id'] ),
															 array('class'  => 'del',
															 	   'escape' => false), 
															 'Você tem certeza que deseja deletar o site ' . $site['Site']['titulo'] . '?'
															); ?> </li>
						</ul>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php } 

echo $this->Element('paginator');