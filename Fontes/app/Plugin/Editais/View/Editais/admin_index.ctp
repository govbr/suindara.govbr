<?php
	$this->Html->addCrumb('Listagem de Editais',  array('plugin' => 'editais', 'controller' => 'editais', 'action' => 'index'));
?>

<h2 class="row">Listagem de <span><?php echo $this->name; ?></span></h2>

<div class="row controlist">
	<?php echo $this->Html->link('Adicionar novo edital<span></span>', array('controller' => 'editais', 'action' => 'add', 'admin' => true), array('class' => 'threecol add', 'escape' => false)); ?>

	<div id="busca_simples" class="eightcol">
		<?php echo $this->Element('../Editais/_search'); ?>
	</div>
</div>

<?php if( empty($editalPaginate) ) { ?>
	<p class="noInfo">Nenhum registro encontrado. 
    <?php echo $this->Html->link('Voltar para a listagem de editais.', 
                                 Router::url(array('plugin' => 'editais', 'controller' => 'editais', 'action' => 'index'), true)); ?>
    </p>
	
<?php } else { ?>
	
	<?php $editalCount = count($editalPaginate); ?>

	<?php  if (!$this->request->isGet()) { ?>
        <p class="noInfo">
            <?php
                if ($editalCount > 1) {
             ?>
                Foram encontrados <?php echo $editalCount; ?> editals.
            
            <?php } else { ?>

                Foi encontrado 1 edital.

            <?php } ?>

            <?php echo $this->Html->link('Voltar para a listagem de editais.', 
                                     Router::url(array('plugin' => 'editais', 'controller' => 'editais', 'action' => 'index'), true)); ?>

            
        </p>
    <?php } ?>

	<table class="row" summary="Tabela de Listagem de editais.">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('titulo', '<span class="bullet">Ordenar por </span><span class="texto">Titulo</span>', array('escape' => false)); ?></th>
				<th><?php echo $this->Paginator->sort('Tipo de Edital', '<span class="bullet">Ordenar por </span><span class="texto">Tipo de Edital</span>', array('escape' => false)); ?></th>
				<th>A&ccedil;&atilde;o</th>
			</tr>
		</thead>
		<tbody>

			<?php foreach($editalPaginate as $edital): ?>
				<tr>
					<td><?php echo $this->CmsUtil->limitarTexto($edital['Edital']['titulo'], 32, " ..."); ?></td>
					<td><?php echo $this->CmsUtil->limitarTexto($edital['TipoEdital']['titulo'], 32, " ..."); ?></td>
					</td>
					<td>
						<ul>
							<li><?php echo $this->Html->link('Visualizar <span class="oculto">edital: ' . $edital['Edital']['titulo'] . '</span>', 
															 array('controller' => 'editais', 'action' => 'view', 'admin' => true, $edital['Edital']['id'] ),
															 array('class' => 'view', 
															 	   'escape' => false)
															); ?> </li>
	
							<li><?php echo $this->Html->link('Editar <span class="oculto">edital: ' . $edital['Edital']['titulo'] . '</span>', 
														     array('controller' => 'editais', 'action' => 'edit', 'admin' => true, $edital['Edital']['id'] ),
														     array('class'  => 'edit', 
														 	       'escape' => false)
														    ); ?> </li>
	
							<li><?php echo $this->Html->link('Deletar <span class="oculto">edital: ' . $edital['Edital']['titulo'] . '</span>', 
															 array('controller' => 'editais', 'action' => 'delete', 'admin' => true, $edital['Edital']['id'] ),
															 array('class'  => 'del',
															 	   'escape' => false), 
															 'Você tem certeza que deseja deletar o edital ' . $edital['Edital']['titulo'] . '?'
															); ?> </li>
						</ul>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php } 

echo $this->Element('paginator');