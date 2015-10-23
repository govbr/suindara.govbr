<?php
	$this->Html->addCrumb('Listagem de Cursos',  array('plugin' => 'cursos', 'controller' => 'cursos', 'action' => 'index'));
?>

<h2 class="row">Listagem de <span><?php echo $this->name; ?></span></h2>

<div class="row controlist">
	<?php echo $this->Html->link('Adicionar novo curso<span></span>', array('controller' => 'cursos', 'action' => 'add', 'admin' => true), array('class' => 'threecol add', 'escape' => false)); ?>

	<div id="busca_simples" class="eightcol">
		<?php echo $this->Element('../Cursos/_search'); ?>
	</div>
</div>

<?php if( empty($cursoPaginate) ) { ?>
	<p class="noInfo">Nenhum registro encontrado. 
    <?php echo $this->Html->link('Voltar para a listagem de cursos.', 
                                 Router::url(array('plugin' => 'cursos', 'controller' => 'cursos', 'action' => 'index'), true)); ?>
    </p>
	
<?php } else { ?>
	
	<?php $cursoCount = count($cursoPaginate); ?>

	<?php  if (!$this->request->isGet()) { ?>
        <p class="noInfo">
            <?php
                if ($cursoCount > 1) {
             ?>
                Foram encontrados <?php echo $cursoCount; ?> cursos.
            
            <?php } else { ?>

                Foi encontrado 1 curso.

            <?php } ?>

            <?php echo $this->Html->link('Voltar para a listagem de cursos.', 
                                     Router::url(array('plugin' => 'cursos', 'controller' => 'cursos', 'action' => 'index'), true)); ?>

            
        </p>
    <?php } ?>

	<table class="row" summary="Tabela de Listagem de cursos.">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('nome', '<span class="bullet">Ordenar por </span><span class="texto">Nome</span>', array('escape' => false)); ?></th>
				<th><?php echo $this->Paginator->sort('modalidade', '<span class="bullet">Ordenar por </span><span class="texto">Modalidade</span>', array('escape' => false)); ?></th>
				<th>A&ccedil;&atilde;o</th>
			</tr>
		</thead>
		<tbody>

			<?php foreach($cursoPaginate as $curso): ?>
				<tr>
					<td><?php echo $this->CmsUtil->limitarTexto($curso['Curso']['nome'], 32, " ..."); ?></td>
					<td><?php echo $this->CmsUtil->limitarTexto($curso['Modalidade']['titulo'], 32, " ..."); ?></td>
					</td>
					<td>
						<ul>
							<li><?php echo $this->Html->link('Visualizar <span class="oculto">curso: ' . $curso['Curso']['nome'] . '</span>', 
															 array('controller' => 'cursos', 'action' => 'view', 'admin' => true, $curso['Curso']['id'] ),
															 array('class' => 'view', 
															 	   'escape' => false)
															); ?> </li>
	
							<li><?php echo $this->Html->link('Editar <span class="oculto">curso: ' . $curso['Curso']['nome'] . '</span>', 
														     array('controller' => 'cursos', 'action' => 'edit', 'admin' => true, $curso['Curso']['id'] ),
														     array('class'  => 'edit', 
														 	       'escape' => false)
														    ); ?> </li>
	
							<li><?php echo $this->Html->link('Deletar <span class="oculto">curso: ' . $curso['Curso']['nome'] . '</span>', 
															 array('controller' => 'cursos', 'action' => 'delete', 'admin' => true, $curso['Curso']['id'] ),
															 array('class'  => 'del',
															 	   'escape' => false), 
															 'Você tem certeza que deseja deletar o cursos ' . $curso['Curso']['nome'] . '?'
															); ?> </li>
						</ul>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php } 

echo $this->Element('paginator');



