<li class="ativo parent_li">
	<div class="preview">
		<?php echo $this->Midias->thumb($midia['Midia']['arquivo'], $midia['Midia']['tipo_id']); ?>
		<p><span><?php echo $midia['Midia']['titulo']; ?></span></p>
	</div>

	<ul class="action">
		<li><?php echo $this->Html->link('Adicionar imagem <span class="oculto"> "'.$midia['Midia']['titulo'].'" ao conteúdo</span>', array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias_conteudos', 'action' => 'add', 'id_midia' => $midia['Midia']['id']), array('class' => 'midia_add add', 'escape' => false)); ?></li>
	</ul>
</li>