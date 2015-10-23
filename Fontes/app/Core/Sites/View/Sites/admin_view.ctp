<?php
	$this->Html->addCrumb('Sites',  array('plugin' => 'sites', 'controller' => 'sites', 'action' => 'index'));
	$this->Html->addCrumb('Visualizar',  array('plugin' => 'sites', 'controller' => 'sites', 'action' => 'view'));
?>	

<h2 class="row">Visualiza&ccedil;&atilde;o de <span><?php echo $this->name; ?></span></h2>

<div class="row exibicao">
	<p>T&iacute;tulo: <span class="w97"><?php echo $site['Site']['titulo'] ?></span></p>
	<p>Dom&iacute;nio: <span class="w97"><?php echo $site['Site']['dominio'] ?></span></p>
	<p>Descri&ccedil;&atilde;o: <span class="w97"><?php echo $site['Site']['descricao'] ?></span></p>
	<p>Palavras-chave: <span class="w97"><?php echo $site['Site']['palavras_chave'] ?></span></p>
	<p>Institui&ccedil;&atilde;o: <span class="w40"><?php echo $site['Site']['instituicao'] ?></span></p>
	<p>Endere&ccedil;o: <span class="w97"><?php echo $site['Site']['endereco'] ?></span></p>
	<p>E-mail de Contato: <span class="w97"><?php echo $site['Site']['email_contato'] ?></span></p>
	<p>Template: <span class="w97"><?php echo $template_nome;  ?></span></p>
</div>
<?php echo $this->Html->link('Voltar', array('plugin' => 'sites', 'controller' => 'sites', 'action' => 'index'), array('id'=>'voltar')); ?> 