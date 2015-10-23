<?php
	$this->Html->addCrumb('Configurações',  array('plugin' => 'banners', 'controller' => 'banners', 'action' => 'index'));
?>

<h2 class="row">Visualização das <span> Configurações </span></h2>

<div class="row controlist">
	<?php echo $this->Html->link('Editar Configurações <span></span>', array('controller' => 'configuracoes', 'action' => 'edit', 'admin' => true), array('class' => 'threecol add', 'escape' => false)); ?>
</div>

<div class="row exibicao">
	<p>Tempo Máximo de Sessão: (minutos)<span class="w97"><?php echo Configure::read('Session.timeout'); ?></span></p>
	<p>Tamanho Máximo de Upload: <span class="w97"><?php //echo $configuracao['Configuracao']['upload_max_filesize'] ?></span></p>
</div>




	