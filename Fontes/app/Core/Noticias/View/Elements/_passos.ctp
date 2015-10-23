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

		function spamAtual($classe, $passo) {
			if($classe == $passo)
				return '<span class="oculto">Passo atual: </span>';
		}
	?>
	<ul id="passos_<?php echo $conteudo; ?>" class="<?php echo $class ?>">
	<?php if (isset($functional) && !$functional) { ?>
		<li <?php echo atual($class,'passo1').">".spamAtual($class,'passo1'); ?>Conte&uacute;do textual</li>
		<li <?php echo atual($class,'passo2').">".spamAtual($class,'passo2'); ?>M&iacute;dias</li>
		<li <?php echo atual($class,'passo3').">".spamAtual($class,'passo3'); ?>Documentos</li>
		
		<?php if ($conteudo == 'noticia') { ?>
			<li <?php echo atual($class,'passo4').">".spamAtual($class,'passo3'); ?>Visualiza&ccedil;&atilde;o</li>
		<?php } else { ?>
			<li <?php echo atual($class,'passo4').">".spamAtual($class,'passo3'); ?>Banners</li>
		<?php } ?>
			
		<?php if ($conteudo == 'noticia') { ?>
			<li <?php echo atual($class,'passo5').">".spamAtual($class,'passo3'); ?>Publica&ccedil;&atilde;o</li>
		<?php } else {?>
			<li <?php echo atual($class,'passo5').">".spamAtual($class,'passo3'); ?>Visualiza&ccedil;&atilde;o</li>
		<?php } ?>
	<?php } else { ?>
		<li <?php echo atual($class,'passo1'); ?>>

			<?php if ($this->Session->read('tipo_request') == 'cadastro') {?>
				<?php echo $this->Html->link(spamAtual($class,'passo1').'Conte&uacute;do textual', array(
					'plugin'=> Inflector::pluralize($conteudo),
					'controller'=>Inflector::pluralize($conteudo),
					'action'=>'add', $conteudo_id,
					'admin' => true
				), 
					array('escape' => false)
				); ?>
			<?php } else { ?>
				<?php echo $this->Html->link(spamAtual($class,'passo1').'Conte&uacute;do textual', array(
					'plugin'=> Inflector::pluralize($conteudo),
					'controller'=>Inflector::pluralize($conteudo),
					'action'=>'edit', $conteudo_id,
					'admin' => true,
				),
					array('escape' => false)
				); ?>
			<?php } ?> 
		</li>
		<li <?php echo atual($class,'passo2'); ?>>
			<?php echo $this->Html->link(spamAtual($class,'passo2').'M&iacute;dias', array(
				'plugin' => 'midias',
				'controller' => 'midias',
				'tipo_conteudo' => $conteudo,
				'id_conteudo' => $conteudo_id,
				'action' => 'midias',
				'admin' => true,
			),
				array('escape' => false)
			); ?>
		</li>
		<li <?php echo atual($class,'passo3'); ?>>
			<?php echo $this->Html->link(spamAtual($class,'passo3').'Documentos', array(
				'plugin' => 'midias',
				'controller' => 'midias',
				'tipo_conteudo' => $conteudo,
				'id_conteudo' => $conteudo_id,
				'action' => 'arquivos',
				'admin' => true,
				),
				array('escape' => false)
			); ?>
		</li>
		
		
		
		<?php if ($conteudo != 'noticia') {?>
			<?php if ($this->Session->read('tipo_request') == 'cadastro') {?>
				<li <?php echo atual($class,'passo4'); ?>>
					<?php echo $this->Html->link(spamAtual($class,'passo4').'Banners', array(
						'plugin'=>Inflector::pluralize($conteudo), 
						'controller'=>Inflector::pluralize($conteudo),
						'action'=>'add', $conteudo_id, 'banners',
						),
						array('escape' => false)
					); ?>					
				</li>
			<?php } else { ?>
				<li <?php echo atual($class,'passo4'); ?>>
					<?php echo $this->Html->link(spamAtual($class,'passo4').'Banners', array(
						'plugin'=>Inflector::pluralize($conteudo), 
						'controller'=>Inflector::pluralize($conteudo),
						'action'=>'edit', $conteudo_id, 'banners',
						),
						array('escape' => false)
					); ?>
				</li>
			<?php } ?>

		<?php } else { ?>
			<li <?php echo atual($class,'passo4'); ?>>
				<?php echo $this->Html->link(spamAtual($class,'passo4').'Visualiza&ccedil;&atilde;o', array(
					'plugin'=> Inflector::pluralize($conteudo),
					'controller'=>Inflector::pluralize($conteudo),
					'action'=>'view', $conteudo_id,
					),
					array('escape' => false)
				); ?>
			</li>
		<?php } ?>
		
		
		
		<?php if ($conteudo == 'noticia') { ?>
			<li <?php echo atual($class,'passo5'); ?>>
				<?php 
					if($this->Session->read('tipo_request') == 'edit'){
				?>
					<?php echo $this->Html->link(spamAtual($class,'passo5').'Publica&ccedil;&atilde;o', array(
						'plugin'=>Inflector::pluralize($conteudo), 
						'controller'=>Inflector::pluralize($conteudo),
						'action'=>'edit', $conteudo_id, 'publicar',
						),
						array('escape' => false)
					); ?>
				<?php
					}else{
				?>
						<?php echo $this->Html->link(spamAtual($class,'passo5').'Publica&ccedil;&atilde;o', array(
						'plugin'=>Inflector::pluralize($conteudo), 
						'controller'=>Inflector::pluralize($conteudo),
						'action'=>'add', $conteudo_id, 'publicar',
						),
						array('escape' => false)
					); ?>
				<?php
					}
				?>
			</li>			  
		<?php } else { ?>
				<li <?php echo atual($class,'passo5'); ?>>
				<?php echo $this->Html->link(spamAtual($class,'passo5').'Visualiza&ccedil;&atilde;o', array(
					'plugin'=>Inflector::pluralize($conteudo), 
					'controller'=>Inflector::pluralize($conteudo),
					'action'=>'view', $conteudo_id,
					),
					array('escape' => false)
				); ?>
			</li>
		<?php } ?>
	<?php } ?>
	</ul>
</div>