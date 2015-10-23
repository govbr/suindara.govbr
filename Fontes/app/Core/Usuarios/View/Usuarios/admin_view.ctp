<?php
	$this->Html->addCrumb('Listagem de Usuários',  array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'index'));
	$this->Html->addCrumb('Visualizar',  array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'view', $usuario['Usuario']['id']));
?>

<h2 class="row">Visualiza&ccedil;&atilde;o de <span><?php echo $this->name; ?></span></h2>

<div class="row exibicao">
		<p>Nome: <span class="w40"><?php echo $usuario['Usuario']['nome'] ?></span></p>
		<p>E-mail: <span class="w97"><?php echo $usuario['Usuario']['email'] ?></span></p>
		<p>Instituição: <span class="w97"><?php echo $usuario['Usuario']['instituicao'] ?></span></p>
		<p>Departamento: <span class="w97"><?php echo $usuario['Usuario']['departamento'] ?></span></p>
		<p>Telefone: <span class="w40"><?php echo $usuario['Usuario']['telefone'] ?></span></p>

		<p>Perfis:</p>
		<ul>
			<?php foreach($usuario['Perfil'] as $perfil): ?>
				<?php if($perfil['site_id'] == $this->Session->read('Auth.User.SiteAtual.Site.id'))  { ?>
					<li><?php echo $perfil['nome']; ?></li>
				<?php } ?>
			<?php endforeach; ?>
		</ul>

</div>
<?php echo $this->Html->link('Voltar', array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'index'), array('id'=>'voltar')); ?> 