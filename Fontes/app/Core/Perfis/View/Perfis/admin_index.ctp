<?php
	$this->Html->addCrumb('Listagem de Perfis',  array('plugin' => 'perfis', 'controller' => 'perfis', 'action' => 'index'));
?>

<h2 class="row">Listagem de <span><?php echo $this->name; ?></span></h2>

<div class="row controlist"> 
	<?php echo $this->Html->link('Adicionar novo perfil<span></span>', array('controller' => 'perfis', 'action' => 'add', 'admin' => true), array('class' => 'threecol add', 'escape' => false)); ?>

	<div id="busca_simples" class="eightcol">
		<?php echo $this->Element('../Perfis/_search'); ?>
	</div>
</div>

<?php if( empty($perfilPaginate) ) { ?>
	<ul>
		<p class="noInfo">Nenhum perfil encontrado.</p>
	</ul>

<?php } else { ?>
	<table class="row" summary="Tabela de Listagem de perfis.">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('nome', '<span class="bullet">Ordenar por </span><span class="texto">Nome</span>', array('escape' => false)); ?></th>
				<th><?php echo $this->Paginator->sort('descricao', '<span class="bullet">Ordenar por </span><span class="texto">Descri&ccedil;&atilde;o</span>', array('escape' => false)); ?></th>
				<th>A&ccedil;&atilde;o</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($perfilPaginate as $perfil): ?>
				<tr>
					<td><?php echo $perfil['Perfil']['nome']; ?></td>
					<td><?php echo $perfil['Perfil']['descricao']; ?></td>
					<td>
						<ul>
							<li><?php echo $this->Html->link('Visualizar <span class="oculto">perfil: ' . $perfil['Perfil']['id'] . '</span>', 
															 array('controller' => 'perfis', 'action' => 'view', 'admin' => true, $perfil['Perfil']['id']),
															 array('class' => 'view', 
															 	   'escape' => false)
															); ?> </li>
	
							<li><?php echo $this->Html->link('Editar <span class="oculto">perfil: ' . $perfil['Perfil']['nome'] . '</span>', 
														     array('controller' => 'perfis', 'action' => 'edit', 'admin' => true, $perfil['Perfil']['id']),
														     array('class'  => 'edit', 
														 	       'escape' => false)
														    ); ?> </li>
	
							<li><?php echo $this->Html->link('Deletar <span class="oculto">perfil: ' . $perfil['Perfil']['nome'] . '</span>', 
															 array('controller' => 'perfis', 'action' => 'delete', 'admin' => true, $perfil['Perfil']['id']),
															 array('class'  => 'del',
															 	   'escape' => false), 
															 'Você tem certeza que deseja deletar o perfil ' . $perfil['Perfil']['nome'] . '?'
															); ?> </li>
						</ul>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php } 

echo $this->Element('paginator');











