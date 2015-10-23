<?php
	$this->Html->addCrumb('Listagem de Tipo de Editais',  array('plugin' => 'tipoEditais', 'controller' => 'tipoEditais', 'action' => 'index'));
?>

<h2 class="row">Listagem de <span>Tipo de Editais</span></h2>

<div class="row controlist">
	<?php echo $this->Html->link('Adicionar tipo de edital<span></span>', array('controller' => 'tipoEditais', 'action' => 'add', 'admin' => true), array('class' => 'threecol add', 'escape' => false)); ?>
	
	<div id="busca_simples" class="eightcol">
		<?php echo $this->Element('../TipoEditais/_search'); ?>
		<a href="#" id="exp_busca"><span>Expandir op&ccedil;&otilde;es de busca avan&ccedil;ada</span></a>
	</div>

	<div id="busca_avancada" <?php echo ($this->Session->read('Auth.User.modo_sistema') == MODO_SISTEMA_PADRAO) ? 'style="display: none;"' : ''; ?>>
		<?php echo $this->Element('../TipoEditais/_advanced_search'); ?>
	</div>
</div>

<?php if( empty($tipoEditalPaginate) ) { ?>
  	<p class="noInfo">Nenhum registro encontrado. 
    <?php echo $this->Html->link('Voltar para a listagem de tipo de editais.', 
	Router::url(array('plugin' => 'tipoEditais', 'controller' => 'tipoEditais', 'action' => 'index'), true)); ?>
    </p>

<?php } else { ?>

	<?php $tipoEditalCount = count($tipoEditalPaginate); ?>

	<?php  if (!$this->request->isGet()) { ?>
        <p class="noInfo">
            <?php
                if ($tipoEditalCount > 1) {
             ?>
                Foram encontradas <?php echo $tipoEditalCount; ?> editais.
            
            <?php } else { ?>

                Foi encontrado 1 edital.

            <?php } ?>

            <?php echo $this->Html->link('Voltar para a listagem de tipo de editais.', 
                                     Router::url(array('plugin' => 'tipoEditais', 'controller' => 'tipoEditais', 'action' => 'index'), true)); ?>

            
        </p>
    <?php } ?>

	<table class="row" summary="Tabela de listagem de tipo de editais.">
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

			<?php foreach($tipoEditalPaginate as $key => $tipoEdital): ?>
				<?php
					foreach ($numeracao as $index => $value) {
						if($value['TipoEdital']['id'] == $tipoEdital['TipoEdital']['id']){
							$tipoEdital['TipoEdital']['virtualField'] = $value['TipoEdital']['numero'];
						}
					} 
				?>
				<tr>
					<td><?php echo $tipoEdital['TipoEdital']['virtualField'] ?></td>
					<td><?php echo $this->CmsUtil->limitarTexto($tipoEdital['TipoEdital']['titulo'], 20, " ..."); ?></td>
					<td><?php echo $this->CmsUtil->limitarTexto($tipoEdital['TipoEdital']['descricao'], 20, " ..."); ?></td>
					<td><?php echo $this->CmsUtil->limitarTexto($tipoEdital['TipoEdital']['identificador'], 20, " ..."); ?></td>
					<td>
						<ul>
							<li><?php echo $this->Html->link('Visualizar <span class="oculto">tipo de edital: ' . $tipoEdital['TipoEdital']['titulo'] . '</span>', 
															 array('controller' => 'tipoEditais', 'action' => 'view', 'admin' => true, $tipoEdital['TipoEdital']['id']),
															 array('class'  => 'view', 
															 	   'escape' => false)
															); ?> </li>
	
							<li><?php echo $this->Html->link('Editar <span class="oculto">tipo de edital: ' . $tipoEdital['TipoEdital']['titulo'] . '</span>', 
														     array('controller' => 'tipoEditais', 'action' => 'edit', 'admin' => true, $tipoEdital['TipoEdital']['id']),
														     array('class'  => 'edit',
														   	       'escape' => false)
														    ); ?> </li>
	
							<li><?php echo $this->Html->link('Deletar <span class="oculto">tipo de edital: ' . $tipoEdital['TipoEdital']['titulo'] . '</span>', 
														     array('controller' => 'tipoEditais', 'action' => 'delete', 'admin' => true, $tipoEdital['TipoEdital']['id']),
														 	 array('class'  => 'del',
															       'escape' => false),
														 	 'Voc&ecirc; tem certeza que deseja deletar o tipo de edital ' . $tipoEdital['TipoEdital']['titulo'] . '?'
														    ); ?></li>
						</ul>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php } 

echo $this->Element('paginator');