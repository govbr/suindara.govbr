<?php
	$this->Html->addCrumb('Listagem de Categorias',  array('plugin' => 'categorias', 'controller' => 'categorias', 'action' => 'index'));
?>

<h2 class="row">Listagem de <span><?php echo $this->name; ?></span></h2>

<div class="row controlist">
	<?php echo $this->Html->link('Adicionar nova categoria<span></span>', array('controller' => 'categorias', 'action' => 'add', 'admin' => true), array('class' => 'threecol add', 'escape' => false)); ?>
	
	<div id="busca_simples" class="eightcol">
		<?php echo $this->Element('../Categorias/_search'); ?>
		<a href="#" id="exp_busca"><span>Expandir op&ccedil;&otilde;es de busca avan&ccedil;ada</span></a>
	</div>

	<div id="busca_avancada" <?php echo ($this->Session->read('Auth.User.modo_sistema') == MODO_SISTEMA_PADRAO) ? 'style="display: none;"' : ''; ?>>
		<?php echo $this->Element('../Categorias/_advanced_search'); ?>
	</div>
</div>

<?php if( empty($categoriaPaginate) ) { ?>
  	<p class="noInfo">Nenhum registro encontrado. 
    <?php echo $this->Html->link('Voltar para a listagem de categorias.', 
                                 Router::url(array('plugin' => 'categorias', 'controller' => 'categorias', 'action' => 'index'), true)); ?>
    </p>

<?php } else { ?>

	<?php $categoriaCount = count($categoriaPaginate); ?>

	<?php  if (!$this->request->isGet()) { ?>
        <p class="noInfo">
            <?php
                if ($categoriaCount > 1) {
             ?>
                Foram encontradas <?php echo $categoriaCount; ?> categorias.
            
            <?php } else { ?>

                Foi encontrada 1 categoria.

            <?php } ?>

            <?php echo $this->Html->link('Voltar para a listagem de categorias.', 
                                     Router::url(array('plugin' => 'categorias', 'controller' => 'categorias', 'action' => 'index'), true)); ?>

            
        </p>
    <?php } ?>

	<table class="row" summary="Tabela de listagem de categorias.">
		<thead>
			<tr>
				<th>Item</th>
				<th><?php echo $this->Paginator->sort('titulo', '<span class="bullet">Ordenar por </span><span class="texto">T&iacute;tulo</span>', array('escape' => false) ); ?></th>
				<th><?php echo $this->Paginator->sort('descricao', '<span class="bullet">Ordenar por </span><span class="texto">Descri&ccedil;&atilde;o</span>', array('escape' => false) ); ?></th>
				<th>Identificador</th>
				<th>A&ccedil;&atilde;o</th>
			</tr>
		</thead>
		<tbody>

			<?php foreach($categoriaPaginate as $key => $categoria): ?>
				<?php
					foreach ($numeracao as $index => $value) {
						if($value['Categoria']['id'] == $categoria['Categoria']['id']){
							$categoria['Categoria']['virtualField'] = $value['Categoria']['numero'];
						}
					} 
				?>
				<tr>
					<td><?php echo $categoria['Categoria']['virtualField'] ?></td>
					<td><?php echo $categoria['Categoria']['titulo']; ?></td>
					<td><?php echo $categoria['Categoria']['descricao']; ?></td>
					<td><?php echo $categoria['Categoria']['identificador']; ?></td>
					<td>
						<ul>
							<li><?php echo $this->Html->link('Visualizar <span class="oculto">categoria: ' . $categoria['Categoria']['titulo'] . '</span>', 
															 array('controller' => 'categorias', 'action' => 'view', 'admin' => true, $categoria['Categoria']['id']),
															 array('class'  => 'view', 
															 	   'escape' => false)
															); ?> </li>
	
							<li><?php echo $this->Html->link('Editar <span class="oculto">categoria: ' . $categoria['Categoria']['titulo'] . '</span>', 
														     array('controller' => 'categorias', 'action' => 'edit', 'admin' => true, $categoria['Categoria']['id']),
														     array('class'  => 'edit',
														   	       'escape' => false)
														    ); ?> </li>
	
							<li><?php echo $this->Html->link('Deletar <span class="oculto">categoria: ' . $categoria['Categoria']['titulo'] . '</span>', 
														     array('controller' => 'categorias', 'action' => 'delete', 'admin' => true, $categoria['Categoria']['id']),
														 	 array('class'  => 'del',
															       'escape' => false),
														 	 'Voc&ecirc; tem certeza que deseja deletar a categoria ' . $categoria['Categoria']['titulo'] . '?'
														    ); ?></li>
						</ul>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php } 

echo $this->Element('paginator');