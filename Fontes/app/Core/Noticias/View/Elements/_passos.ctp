<div class="row controlist">
	<?php
		$class = "passo1";
		if ($this->action == 'admin_midias') {
			$class = "passo2";
		} else if ($this->action == 'admin_arquivos') {
			$class = "passo3";
		} else if ($this->action == 'admin_view') {
			$class = "passo4";
		} else if ($this->action == 'admin_edit' || $this->action == 'admin_add') {
			if(isset($this->params['pass'][1]) && $this->params['pass'][1] == 'publicar') {
				$class = 'passo5';
			} 
		} 
		
		
		if ($conteudo == 'pagina') {
			
			if ( $this->action == 'admin_view'){
				$class = 'passo5';
			} else if (isset($extra) && $extra == 'banners') {
				$class = 'passo4';
			}
		}
		

		function atual($classe, $passo) {
			if($classe == $passo)
				return 'class="atual"';
		}
	?>
	<ul id="passos_<?php echo $conteudo; ?>" class="<?php echo $class ?>">
	<?php if (isset($functional) && !$functional) { ?>
		<li <?php echo atual($class,'passo1'); ?>>Conte&uacute;do textual</li>
		<li <?php echo atual($class,'passo2'); ?>>M&iacute;dias</li>
		<li <?php echo atual($class,'passo3'); ?>>Documentos</li>
		
		<?php if ($conteudo == 'noticia') { ?>
			<li <?php echo atual($class,'passo4'); ?>>Visualiza&ccedil;&atilde;o</li>
		<?php } else { ?>
			<li <?php echo atual($class,'passo4'); ?>>Banners</li>
		<?php } ?>
			
		<?php if ($conteudo == 'noticia') { ?>
			<li <?php echo atual($class,'passo5'); ?>>Publica&ccedil;&atilde;o</li>
		<?php } else {?>
			<li <?php echo atual($class,'passo5'); ?>>Visualiza&ccedil;&atilde;o</li>
		<?php } ?>
	<?php } else { ?>
		<li <?php echo atual($class,'passo1'); ?>>

			<?php if ($this->Session->read('tipo_request') == 'cadastro') {?>
				<?php echo $this->Html->link('Conteúdo textual', array(
					'plugin'=> Inflector::pluralize($conteudo),
					'controller'=>Inflector::pluralize($conteudo),
					'action'=>'add', $conteudo_id,
					'admin' => true
				)); ?>
			<?php } else { ?>
				<?php echo $this->Html->link('Conteúdo textual', array(
					'plugin'=> Inflector::pluralize($conteudo),
					'controller'=>Inflector::pluralize($conteudo),
					'action'=>'edit', $conteudo_id,
					'admin' => true
				)); ?>
			<?php } ?> 
		</li>
		<li <?php echo atual($class,'passo2'); ?>>
			<?php echo $this->Html->link('Mídias', array(
				'plugin' => 'midias',
				'controller' => 'midias',
				'tipo_conteudo' => $conteudo,
				'id_conteudo' => $conteudo_id,
				'action' => 'midias',
				'admin' => true
			)); ?>
		</li>
		<li <?php echo atual($class,'passo3'); ?>>
			<?php echo $this->Html->link('Documentos', array(
				'plugin' => 'midias',
				'controller' => 'midias',
				'tipo_conteudo' => $conteudo,
				'id_conteudo' => $conteudo_id,
				'action' => 'arquivos',
				'admin' => true
			)); ?>
		</li>
		
		
		
		<?php if ($conteudo != 'noticia') {?>
			<?php if ($this->Session->read('tipo_request') == 'cadastro') {?>
				<li <?php echo atual($class,'passo4'); ?>>
					<?php echo $this->Html->link('Banners', array(
						'plugin'=>Inflector::pluralize($conteudo), 
						'controller'=>Inflector::pluralize($conteudo),
						'action'=>'add', $conteudo_id, 'banners'
					)); ?>
				</li>
			<?php } else { ?>
				<li <?php echo atual($class,'passo4'); ?>>
					<?php echo $this->Html->link('Banners', array(
						'plugin'=>Inflector::pluralize($conteudo), 
						'controller'=>Inflector::pluralize($conteudo),
						'action'=>'edit', $conteudo_id, 'banners'
					)); ?>
				</li>
			<?php } ?>

		<?php } else { ?>
			<li <?php echo atual($class,'passo4'); ?>>
				<?php echo $this->Html->link('Visualização', array(
					'plugin'=> Inflector::pluralize($conteudo),
					'controller'=>Inflector::pluralize($conteudo),
					'action'=>'view', $conteudo_id
				)); ?>
			</li>
		<?php } ?>
		
		
		
		<?php if ($conteudo == 'noticia') { ?>
			<li <?php echo atual($class,'passo5'); ?>>
				<?php 
					if($this->Session->read('tipo_request') == 'edit'){
				?>
					<?php echo $this->Html->link('Publicação', array(
						'plugin'=>Inflector::pluralize($conteudo), 
						'controller'=>Inflector::pluralize($conteudo),
						'action'=>'edit', $conteudo_id, 'publicar'
					)); ?>
				<?php
					}else{
				?>
						<?php echo $this->Html->link('Publicação', array(
						'plugin'=>Inflector::pluralize($conteudo), 
						'controller'=>Inflector::pluralize($conteudo),
						'action'=>'add', $conteudo_id, 'publicar'
						)); ?>
				<?php
					}
				?>
			</li>			  
		<?php } else { ?>
				<li <?php echo atual($class,'passo5'); ?>>
				<?php echo $this->Html->link('Visualização', array(
					'plugin'=>Inflector::pluralize($conteudo), 
					'controller'=>Inflector::pluralize($conteudo),
					'action'=>'view', $conteudo_id
				)); ?>
			</li>
		<?php } ?>
	<?php } ?>
	</ul>
</div>