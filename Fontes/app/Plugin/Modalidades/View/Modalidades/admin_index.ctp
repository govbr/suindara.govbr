<?php
	$this->Html->addCrumb('Listagem de Modalidades',  array('plugin' => 'modalidades', 'controller' => 'modalidades', 'action' => 'index'));
?>

<h2 class="row">Listagem de <span><?php echo $this->name; ?></span></h2>

<div class="row controlist">
	<?php echo $this->Html->link('Adicionar modalidade<span></span>', array('controller' => 'modalidades', 'action' => 'add', 'admin' => true), array('class' => 'threecol add', 'escape' => false)); ?>
	
	<div id="busca_simples" class="eightcol">
		<?php echo $this->Element('../Modalidades/_search'); ?>
		<a href="#" id="exp_busca"><span>Expandir op&ccedil;&otilde;es de busca avan&ccedil;ada</span></a>
	</div>

	<div id="busca_avancada" <?php echo ($this->Session->read('Auth.User.modo_sistema') == MODO_SISTEMA_PADRAO) ? 'style="display: none;"' : ''; ?>>
		<?php echo $this->Element('../Modalidades/_advanced_search'); ?>
	</div>
</div>

<?php if( empty($modalidadePaginate) ) { ?>
  	<p class="noInfo">Nenhum registro encontrado. 
    <?php echo $this->Html->link('Voltar para a listagem de modalidades.', 
	Router::url(array('plugin' => 'modalidades', 'controller' => 'modalidades', 'action' => 'index'), true)); ?>
    </p>

<?php } else { ?>

	<?php $modalidadeCount = count($modalidadePaginate); ?>

	<?php  if (!$this->request->isGet()) { ?>
        <p class="noInfo">
            <?php
                if ($modalidadeCount > 1) {
             ?>
                Foram encontradas <?php echo $modalidadeCount; ?> modalidades.
            
            <?php } else { ?>

                Foi encontrada 1 modalidade.

            <?php } ?>

            <?php echo $this->Html->link('Voltar para a listagem de modalidade.', 
                                     Router::url(array('plugin' => 'modalidades', 'controller' => 'modalidades', 'action' => 'index'), true)); ?>

            
        </p>
    <?php } ?>

	<table class="row" summary="Tabela de listagem de modalidades.">
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

			<?php foreach($modalidadePaginate as $key => $modalidade): ?>
				<?php
					foreach ($numeracao as $index => $value) {
						if($value['Modalidade']['id'] == $modalidade['Modalidade']['id']){
							$modalidade['Modalidade']['virtualField'] = $value['Modalidade']['numero'];
						}
					} 
				?>
				<tr>
					<td><?php echo $modalidade['Modalidade']['virtualField'] ?></td>
					<td><?php echo $this->CmsUtil->limitarTexto($modalidade['Modalidade']['titulo'], 20, " ..."); ?></td>
					<td><?php echo $this->CmsUtil->limitarTexto($modalidade['Modalidade']['descricao'], 20, " ..."); ?></td>
					<td><?php echo $this->CmsUtil->limitarTexto($modalidade['Modalidade']['identificador'], 20, " ..."); ?></td>
					<td>
						<ul>
							<li><?php echo $this->Html->link('Visualizar <span class="oculto">modalidade: ' . $modalidade['Modalidade']['titulo'] . '</span>', 
															 array('controller' => 'modalidades', 'action' => 'view', 'admin' => true, $modalidade['Modalidade']['id']),
															 array('class'  => 'view', 
															 	   'escape' => false)
															); ?> </li>
	
							<li><?php echo $this->Html->link('Editar <span class="oculto">modalidade: ' . $modalidade['Modalidade']['titulo'] . '</span>', 
														     array('controller' => 'modalidades', 'action' => 'edit', 'admin' => true, $modalidade['Modalidade']['id']),
														     array('class'  => 'edit',
														   	       'escape' => false)
														    ); ?> </li>
	
							<li><?php echo $this->Html->link('Deletar <span class="oculto">modalidade: ' . $modalidade['Modalidade']['titulo'] . '</span>', 
														     array('controller' => 'modalidades', 'action' => 'delete', 'admin' => true, $modalidade['Modalidade']['id']),
														 	 array('class'  => 'del',
															       'escape' => false),
														 	 'Voc&ecirc; tem certeza que deseja deletar a modalidade ' . $modalidade['Modalidade']['titulo'] . '?'
														    ); ?></li>
						</ul>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php } 

echo $this->Element('paginator');