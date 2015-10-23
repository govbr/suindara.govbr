<?php
	$this->Html->addCrumb('Templates', array('plugin' => 'templates', 'controller' => 'templates', 'action' => 'admin_index', 'admin' => true));
?>

<h2 class="row">Listagem de <span>Templates</span></h2>

<div class="row controlist">
	<ul>
		<li>
			<?php echo $this->Html->link('Adicionar novo template<span></span>', array('controller' => 'templates', 'action' => 'add', 'admin' => true ), array('class' => 'threecol add', 'escape' => false)); ?>
		</li>
		<li>
			<?php echo $this->Html->link('Gerar novo template<span></span>', array('controller' => 'templates', 'action' => 'criar_template', 'admin' => true ), array('class' => 'threecol add', 'escape' => false)); ?>	
		</li>
	</ul>
</div>

<?php if(count($templates) == 0) { ?>
	<p class="noInfo">Nenhum registro encontrado</p>
<?php } else { ?>
	<ul class="banco_imagens_lista row">
		<?php foreach($templates as $template): ?>
			<li class="ativo">
				<div class="preview">
					<?php echo $this->Html->image('/templates/' . $template['Template']['caminho'] . '/' . $template['Template']['print']); ?>
					<p><?php echo $template['Template']['nome']; ?></p>
				</div>
				
				<ul class="action">
					<li><?php echo $this->Html->link('Deletar template <span class="oculto">template: ' . $template['Template']['nome'] . '</span>', array('plugin' => 'templates', 'controller' => 'templates', 'action' => 'delete', $template['Template']['id']), array('class' => 'del', 'escape' => false), 'Você tem certeza que deseja deletar o template '.$template['Template']['nome'].' ?'); ?></li>
				</ul>
			</li>
		<?php endforeach; ?>
	</ul>

<?php }
