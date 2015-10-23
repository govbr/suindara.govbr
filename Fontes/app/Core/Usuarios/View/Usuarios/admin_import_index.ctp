<?php
$this->Html->addCrumb('Listagem de Usu&aacute;rios',  array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'index'));
$this->Html->addCrumb('Importar',  array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'import_index'));
?>
<h2 class="row">Listagem de <span><?php echo $this->name; ?></span></h2>
<div class="row controlist">
	<?php echo $this->Html->link('Adicionar novo usu&aacute;rio<span></span>', array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'add'), array('class' => 'threecol add', 'escape' => false)); ?>

	<div id="busca_simples" class="eightcol">
		<?php echo $this->Element('../Usuarios/_search'); ?>
		<a href="#" id="exp_busca"><span>Expandir op&ccedil;&otilde;es de busca avan&ccedil;ada</span></a>
	</div>

	<div id="busca_avancada" <?php echo ($this->Session->read('Auth.User.modo_sistema') == MODO_SISTEMA_PADRAO) ? 'style="display: none;"' : ''; ?>>
		<?php echo $this->Element('../Usuarios/_advanced_search'); ?>
	</div>
</div>

<?php if(count($usuarios) == 0) { ?>
	<p class="noInfo">Nenhum registro encontrado</p>
<?php } else { ?>
	<table class="row">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('nome', '<span class="bullet">Ordenar por </span><span class="texto">Nome</span>', array('escape' => false)); ?></th>
				<th><?php echo $this->Paginator->sort('instituicao', '<span class="bullet">Ordenar por </span><span class="texto">Institui&ccedil;&atilde;o</span>', array('escape' => false)); ?></th>
				<th><?php echo $this->Paginator->sort('departamento', '<span class="bullet">Ordenar por </span><span class="texto">Departamento</span>', array('escape' => false)); ?></th>
				<th>A&ccedil;&otilde;es</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($usuarios as $usuario): ?>
			<tr>
				<td><?php echo $usuario['Usuario']['nome']; ?></td>
				<td><?php echo $usuario['Usuario']['instituicao']; ?></td>
				<td><?php echo $usuario['Usuario']['departamento']; ?></td>
				<td>
					<li><?php echo $this->Html->link('Importar <span class="oculto">usu&aacute;rio: '.$usuario['Usuario']['nome'].'</span>', array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'import_edit', $usuario['Usuario']['id']), array('class' => 'edit', 'escape' => false)); ?></li>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php } ?>

<?php echo $this->Element('paginator');