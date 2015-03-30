<?php
	$this->Html->addCrumb('Grupos',  array('plugin' => 'grupos', 'controller' => 'grupos', 'action' => 'index'));
?>

<h2 class="row">Listagem de <span><?php echo $this->name; ?></span></h2>

<div class="row controlist">
	<?php echo $this->Html->link('Adicionar novo grupo<span></span>', array('controller' => 'grupos', 'action' => 'add', 'admin' => true), array('class' => 'threecol add', 'escape' => false)); ?>

	<div id="busca_simples" class="eightcol">
		<?php echo $this->Element('../Grupos/_search'); ?>
	</div>
</div>

<?php if( empty($grupoPaginate) ) { ?>
	<p class="noInfo">Nenhum registro encontrado. 
    <?php echo $this->Html->link('Voltar para a listagem de grupos.', 
                                 Router::url(array('plugin' => 'banners', 'controller' => 'banners', 'action' => 'index'), true)); ?>
    </p>

<?php } else { ?>
	
	<?php $grupoCount = count($grupoPaginate); ?>

	<?php  if (!$this->request->isGet()) { ?>
        <p class="noInfo">
            <?php
                if ($grupoCount > 1) {
             ?>
                Foram encontrados <?php echo $grupoCount; ?> grupos.
            
            <?php } else { ?>

                Foi encontrado 1 grupo.

            <?php } ?>

            <?php echo $this->Html->link('Voltar para a listagem de grupos.', 
                                     Router::url(array('plugin' => 'banners', 'controller' => 'banners', 'action' => 'index'), true)); ?>

            
        </p>
    <?php } ?>

	<table class="row" summary="Tabela de Listagem de grupos de banners.">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('nome', '<span class="bullet">Ordenar por </span><span class="texto">T&iacute;tulo do grupo</span>', array('escape' => false) ); ?></th>
				<th>A&ccedil;&otilde;es</th>
			</tr>
		</thead>
		<tbody>

			<?php foreach($grupoPaginate as $grupo): ?>
				<tr>
					<td><?php echo $grupo['Grupo']['nome']; ?></td>
					<td>
						<ul>
							<li><?php echo $this->Html->link('Banners <span class="oculto">grupo: ' . $grupo['Grupo']['nome'] . '</span>', 
															 array('controller' => 'banners', 'action' => 'index', 'admin' => true, $grupo['Grupo']['id']),
															 array('class'  => 'itensmenu',
														   	  	   'escape' => false)
															); ?></li>
	
							<li><?php echo $this->Html->link('Editar <span class="oculto">grupo: ' . $grupo['Grupo']['nome'] . '</span>',
														   	 array('controller' => 'grupos', 'action' => 'edit', 'admin' => true, $grupo['Grupo']['id']),
														   	 array('class'  => 'edit',
														   	  	   'escape' => false)
														   	); ?> </li>
	
							<li><?php echo $this->Html->link('Deletar <span class="oculto">grupo: ' . $grupo['Grupo']['nome'] . '</span>', 
															 array('controller' => 'grupos', 'action' => 'delete', 'admin' => true, $grupo['Grupo']['id']),
															 array('class'  => 'del',
															  	   'escape' => false),
															 'Você tem certeza que deseja deletar o grupo ' . $grupo['Grupo']['nome'] . '?' 
															); ?> </li>
						</ul>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php } 

echo $this->Element('paginator');