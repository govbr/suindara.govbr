<?php
	$this->Html->addCrumb('Categorias',  array('plugin' => 'categorias', 'controller' => 'categorias', 'action' => 'index'));
	$this->Html->addCrumb('Visualizar',  array('plugin' => 'categorias', 'controller' => 'categorias', 'action' => 'visualizar'));
?>

<?php echo $this->Html->script(array('jquery-1.6.4.min', '/categorias/js/formCategoriaPerfil')); ?>

<h2 class="row">Visualiza&ccedil;&atilde;o de <span><?php echo $this->name; ?></span></h2>

<div class="row exibicao">
	<?php 
		if(isset($categoria_pai['Categoria']['titulo'])){
	?>
			<p>Categoria Pai <span class="w40"><?php echo $categoria_pai['Categoria']['titulo'] ?></span></p>
	<?php
		}
	?>
	<p>T&iacute;tulo: <span class="w40"><?php echo $categoria['Categoria']['titulo'] ?></span></p>
	<p>Descri&ccedil;&atilde;o: <span class="w97"><?php echo $categoria['Categoria']['descricao'] ?></span></p>

	<table id="mytable" class="row">
		<caption>Perfis com permiss&atilde;o nessa categoria</caption>
		
		<tr>
			<th>Perfil</th>
			<th>Adicionar</th>
			<th>Editar</th>
			<th>Excluir</th>
			<th>Visualizar</th>
			<th>Publicar</th>
		</tr>
		
		<?php 
			if( !empty($categoria['Perfil']) ){
				foreach ($categoria['Perfil'] as $index => $value) {
		?>
		
			<tr class='perfil<?php echo $index ?>' > 
				<td align="center"><?php echo $value['nome']; ?></td>
				<td align="center"><?php echo ( $value['CategoriaPerfil']['adicionar'] == 1 ) ? 'Sim':  'Não'  ?></td>
				<td align="center"><?php echo ( $value['CategoriaPerfil']['editar'] == 1 ) ? 'Sim':  'Não'  ?></td>
				<td align="center"><?php echo ( $value['CategoriaPerfil']['excluir'] == 1 ) ? 'Sim':  'Não'  ?></td>
				<td align="center"><?php echo ( $value['CategoriaPerfil']['visualizar'] == 1 ) ? 'Sim':  'Não'  ?></td>
				<td align="center"><?php echo ( $value['CategoriaPerfil']['publicar'] == 1 ) ? 'Sim':  'Não'  ?></td>
			</tr>
		
			<?php
				}
			}
		?>
	</table>
	
	<?php echo $this->Html->link('Voltar', array('plugin' => 'categorias', 'controller' => 'categorias', 'action' => 'index'), array('id'=>'voltar')); ?> 
</div>




	