<?php
	$this->Html->addCrumb('Listagem de Perfis',  array('plugin' => 'perfis', 'controller' => 'perfis', 'action' => 'index'));
	$this->Html->addCrumb('Visualizar',  array('plugin' => 'perfis', 'controller' => 'perfis', 'action' => 'view'));
?>	

<h2 class="row">Visualiza&ccedil;&atilde;o de <span><?php echo $this->name; ?></span></h2>

<div class="row exibicao">
	<p>Nome: <span class="w40"><?php echo $perfil['Perfil']['nome']; ?></span></p>
	<p>Descri&ccedil;&atilde;o: <span class="w97"><?php echo $perfil['Perfil']['descricao']; ?></span></p>
	<p>Site: <span class="w97"><?php echo $perfil['Site']['titulo']; ?></span></p>
</div>
<?php echo $this->Html->link('Voltar', array('plugin' => 'perfis', 'controller' => 'perfis', 'action' => 'index'), array('id'=>'voltar')); ?> 