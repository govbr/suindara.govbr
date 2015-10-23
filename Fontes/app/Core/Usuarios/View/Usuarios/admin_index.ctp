<?php
$this->Html->addCrumb('Listagem de Usuários',  array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'index'));
?>
<h2 class="row">Listagem de <span>Usu&aacute;rios</span></h2>
<div class="row controlist">
	<?php echo $this->Html->link('Adicionar novo usuário<span></span>', array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'add'), array('class' => 'threecol add', 'escape' => false)); ?>
	<?php echo $this->Html->link('Importar usuário<span class="oculto"> de outro site</span>', array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'import_index'), array('class' => 'threecol add', 'escape' => false)); ?>

	<div id="busca_simples" class="eightcol">
		<?php echo $this->Element('../Usuarios/_search'); ?>
		<a href="#" id="exp_busca"><span>Expandir op&ccedil;&otilde;es de busca avan&ccedil;ada</span></a>
	</div>

	<div id="busca_avancada" <?php echo ($this->Session->read('Auth.User.modo_sistema') == MODO_SISTEMA_PADRAO) ? 'style="display: none;"' : ''; ?>>
		<?php echo $this->Element('../Usuarios/_advanced_search'); ?>
	</div>
</div>

<?php $usuariosCount = count($usuarios);?>
<?php if($usuariosCount == 0) { ?>
	<p class="noInfo">
		Nenhum registro encontrado
		<?php echo $this->Html->link('Voltar para a listagem de usuários.', 
                                 Router::url(array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'index'), true)); ?>
	</p>



<?php  } else { ?>


		<?php if (isset($this->params->query['search'])) { ?>
	        <p class="noInfo">
	            <?php
	                if ($usuariosCount > 1) {
	             ?>
	                Foram encontrados <?php echo $usuariosCount ?> usuários.
	            
	            <?php } else { ?>

	                Foi encontrado 1 usuário.

	            <?php } ?>

	            <?php echo $this->Html->link('Voltar para a listagem de usuários.', 
	                                 Router::url(array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'index'), true)); ?>

	            
	        </p>
	    <?php } ?>    
    

	<table class="row" summary="Tabela de Listagem de usuários.">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('nome', '<span class="bullet">Ordenar por </span><span class="texto">Nome</span>', array('escape' => false)); ?></th>
				<th><?php echo $this->Paginator->sort('instituicao', '<span class="bullet">Ordenar por </span><span class="texto">Instituição</span>', array('escape' => false)); ?></th>
				<th><?php echo $this->Paginator->sort('departamento', '<span class="bullet">Ordenar por </span><span class="texto">Departamento</span>', array('escape' => false)); ?></th>
				<th>A&ccedil;&otilde;es</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($usuarios as $usuario): ?>
			<?php
				if ($usuario['Usuario']['root'] && !$isLoggedUserRoot) continue;
			 ?>
			<tr>
				<td><?php echo $usuario['Usuario']['nome']; ?></td>
				<td><?php echo $usuario['Usuario']['instituicao']; ?></td>
				<td><?php echo $usuario['Usuario']['departamento']; ?></td>
				<td>
					<ul>
						<li><?php echo $this->Html->link('Visualizar <span class="oculto">usu&aacute;rio: '.$usuario['Usuario']['nome'].'</span>', array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'view', $usuario['Usuario']['id']), array('class' => 'view', 'escape' => false)); ?></li>
						<?php
						if($usuario['Usuario']['site_id'] == $this->Session->read('Auth.User.SiteAtual.Site.id')) { ?>
						<li><?php echo $this->Html->link('Editar <span class="oculto">usu&aacute;rio: '.$usuario['Usuario']['nome'].'</span>', '/admin/usuarios/edit/' . $usuario['Usuario']['id'], array('class' => 'edit', 'escape' => false)); ?></li>
						<li><?php echo $this->Html->link('Deletar <span class="oculto">usu&aacute;rio: '.$usuario['Usuario']['nome'].'</span>', array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'delete', $usuario['Usuario']['id']), array('class' => 'del', 'escape' => false), 'Você tem certeza que deseja deletar o usu&aacute;rio '.$usuario['Usuario']['nome'].' ?'); ?></li>
						<?php } else { ?>
							<li><?php echo $this->Html->link('Editar <span class="oculto">usu&aacute;rio: '.$usuario['Usuario']['nome'].'</span>', array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'import_edit', $usuario['Usuario']['id']), array('class' => 'edit', 'escape' => false)); ?></li>
							<li><?php echo $this->Html->link('Deletar <span class="oculto">usu&aacute;rio: '.$usuario['Usuario']['nome'].'</span>', array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'import_delete', $usuario['Usuario']['id']), array('class' => 'del', 'escape' => false), 'Você tem certeza que deseja deletar o usu&aacute;rio '.$usuario['Usuario']['nome'].' ?'); ?></li>
						<?php } ?>
					</ul>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php }

echo $this->Element('paginator');