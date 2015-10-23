<?php 
	$tipo_conteudo = substr_count($this->request->url, 'noticia') > 0 ? 'noticia' : 'pagina';
	$id_conteudo = $this->request->params['id_conteudo'];


	if( $this->Session->read('tipo_request') == 'edit' )
      $acao = 'Edi&ccedil;&atilde;o';
	else
	  $acao = 'Cadastro';

	if($tipo_conteudo == 'noticia') {
		$this->Html->addCrumb('Not&iacute;cias',  array('plugin' => 'noticias', 'controller' => 'noticias', 'action' => 'index'), array('escape' => false));
		$this->Html->addCrumb("{$acao} de Not&iacute;cia - Documentos",  array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias' ,'action' => 'arquivos'));
	} else {
		$this->Html->addCrumb('P&aacute;ginas',  array('plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'index'), array('escape' => false));
		$this->Html->addCrumb("{$acao} de P&aacute;gina - Documentos",  array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias' ,'action' => 'arquivos'));
	}

?>


<?php 
	$nomeConteudo = ($tipo_conteudo == 'noticia') ? 'not&iacute;cia' : 'p&aacute;gina';
	$countDocsSemDescricao = 0;
?>

<h2 class="row"><?php echo $acao; ?> de <span><?php echo ucfirst($nomeConteudo); ?></span></h2>
<?php echo $this->element('../Midias/_form', array('mimes' => $mimes)); ?>

<div class="imagensNoticia">
	<h3>Arquivos da <span><?php echo ucfirst($nomeConteudo); ?></span></h3>

	<?php if(count($midias) == 0) { ?>
	
	<p class="noInfo">Voc&ecirc; n&atilde;o possu&iacute; arquivos cadastrados para esta <?php echo ($tipo_conteudo == 'noticia') ? 'not&iacute;cia' : 'p&aacute;gina'; ?>!</p>
  
  	<?php } else { ?>

	<ul class="midias_conteudo_lista banco_imagens_lista">
		<?php foreach($midias as $k => $midia): ?>
		<?php if(!$midia['Midia']['ativa']) $midia['Midia']['titulo'] = $midia['Midia']['nome_original']; ?>
			<li class="<?php echo ($midia['Midia']['ativa']) ? 'ativo' : 'inativo';?>">
				<div class="preview">
          			<ul class="opcoesMidia">
          				<li class="numero"><?php echo ($midia['MidiasConteudo']['posicao']); ?></li>
          				
          				<?php if ($k != 0) { ?>
	          				<li class="ant"><?php echo $this->Html->link('mover "'.$midia['Midia']['titulo'].'" para a posi&ccedil;&atilde;o anterior', array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias_conteudos', 'action' => 'move_up', 'id_midia' => $midia['MidiasConteudo']['id']), array('class' => 'move_up')); ?></li>
						<?php } ?>	

						<?php if ($k != count($midias) - 1) { ?>
							<li class="prox"><?php echo $this->Html->link('mover "'.$midia['Midia']['titulo'].'" para a pr&oacute;xima posi&ccedil;&atilde;o', array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias_conteudos', 'action' => 'move_down', 'id_midia' => $midia['MidiasConteudo']['id']), array('class' => 'move_down'));?></li>
						<?php } ?>
					</ul>

					<?php echo $this->Midias->thumb($midia['Midia']['arquivo'], $midia['Midia']['tipo_id']); ?>

					<p><strong>T&iacute;tulo:</strong> <?php echo $midia['Midia']['titulo']; ?></p>
					<p><strong>Tamanho</strong> <?php echo $this->Midias->size($midia['Midia']['tamanho']); ?></p>
				</div>

				<?php if($midia['Midia']['ativa'] != 1){ 
					$countDocsSemDescricao++;
				?>
		        <p class="aviso">Arquivo sem texto alternativo!</p>
		        <?php } ?>

				<ul class="action">
					<li><?php echo $this->Html->link('Editar <span class="oculto"> Editar arquivo "' . $midia['Midia']['titulo'].'"</span>',
														array('admin'         => true,
															  'tipo_conteudo' => $tipo_conteudo,
															  'id_conteudo'   => $id_conteudo,
															  'controller'    => 'midias',
															  'action'        => $this->Midias->editAction($midia['Midia']['tipo_id']), 
															  'id_midia'      => $midia['Midia']['id']
															 ), 
														array('class'     => 'editar_midia',
															  'escape' => false,
															  'class'  => 'edit'
															 )
													); 
													?>
												</li>

					<li><?php echo $this->Html->link('Deletar <span class="oculto"> ' . 'Deletar arquivo ' . $midia['Midia']['titulo'] . ' </span>', 
														array('admin' 		  => true, 
															  'tipo_conteudo' => $tipo_conteudo, 
															  'id_conteudo'   => $id_conteudo, 
															  'controller'    => 'midias', 
															  'action' 		  => 'delete', 
															  'id_midia'  	  => $midia['Midia']['id']
															 ), 
														array('class'  => 'del', 
															  //'class'  => 'midia_delete del', // Erro, ignora return false do confirm
															  'escape' => false
															 ), 
														'Voc&ecirc; tem certeza que deseja deletar ' . $midia['Midia']['titulo'] . ' ?'
													); 
													?>
												</li>


				</ul>
			</li>
		<?php endforeach; ?>
	</ul>

	<?php } ?>
</div>

<?php 
	$this->Html->scriptBlock("

		$(document).ready(function() {

			$('#avancar').on('click', function(e) {
	          var numDocsSemDescricao =  " . $countDocsSemDescricao . ";
	          
	          if (numDocsSemDescricao > 0 ) {
	            var strExiste = 'Existem ' ;
	            var strDoc = ' documentos ';

	            if (numDocsSemDescricao == 1) {
	              strExiste = 'Existe ';
	              strDoc = ' documento '
	            } 

	            return confirm(strExiste + numDocsSemDescricao + strDoc + 'sem descri&ccedil;&atilde;o, deseja prosseguir mesmo assim ?');
	          } 

	          return true;
	      });

		});", array('inline' => false));
?>

<?php 
	echo '<div class="form">';
		 echo $this->Form->create('Midia', array('type' => 'file'));
		 	 echo '<fieldset id="acaoForm">';
        		echo '<legend class="oculto">A&ccedil&atildeo do formul&aacute;rio</legend>';
				echo $this->Form->input('midias..Midia.arquivo', array('type' => 'hidden'));
					
				echo $this->Form->input('voltar', array('type' => 'submit', 'label' => false,  'value' => 'Voltar', 'name' => 'voltar', 'class' => 'controle'));					
	      		echo $this->Form->input('Avan&ccedil;ar', array('type' => 'submit', 'label' => false,  'value' => 'Avan&ccedil;ar', 'name' => 'avancar', 'id' => 'avancar', 'class' => 'controle', 'escape' => false));
		
				echo $this->Form->input('descartar', array('type' => 'submit', 'label' => false, 'value' => 'Descartar', 'class' => 'controle', 'onclick' => "return confirm('Voc&ecirc; tem certeza que deseja deletar esta {$nomeConteudo} ?');"));
	      		echo $this->Form->input('salvar', array('type' => 'submit', 'label' => false, 'value' => 'Salvar'));
			echo '</fieldset>';

		echo $this->Form->end();

		if($tipo_conteudo == 'noticia') {
			echo $this->Html->link('Cancelar', array('plugin' => 'noticias', 'controller' => 'noticias', 'action' => 'index'), array('id'=>'cancelar'));
		} else {
			echo $this->Html->link('Cancelar', array('plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'index'), array('id'=>'cancelar'));
		} 
	echo '</div>';