<tr class='perfil<?php echo $count ?>' > 
	<td>
		<?php echo $this->Form->input('CategoriaPerfil.'.$count.'.perfil_id', array('type' => 'select', 'empty' => 'Selecione', 'label' => '<span class="oculto">Perfil</span>' ) ); ?>
	</td>

	<?php if($categoria_id) echo $this->Form->input('CategoriaPerfil.'.$count.'.categoria_id', array('type' => 'hidden', 'value' => $categoria_id) ); ?>

	<td>
		<?php echo $this->Form->input('CategoriaPerfil.'.$count.'.adicionar', array('type'=>'checkbox' , 'label' => '<span class="oculto">O perfil selecionado pode </span>Adicionar <span class="oculto">not&iacute;cias nesta categoria</span>')); ?>
		<?php echo $this->Form->input('CategoriaPerfil.'.$count.'.editar', array('type'=>'checkbox' , 'label' => '<span class="oculto">O perfil selecionado pode </span>Editar <span class="oculto">not&iacute;cias nesta categoria</span>')); ?>
		<?php echo $this->Form->input('CategoriaPerfil.'.$count.'.excluir', array('type'=>'checkbox' , 'label' => '<span class="oculto">O perfil selecionado pode </span>Excluir <span class="oculto">not&iacute;cias nesta categoria</span>')); ?>
		<?php echo $this->Form->input('CategoriaPerfil.'.$count.'.visualizar', array('type'=>'checkbox' , 'label' => '<span class="oculto">O perfil selecionado pode </span>Visualizar <span class="oculto">not&iacute;cias nesta categoria</span>')); ?>
		<?php echo $this->Form->input('CategoriaPerfil.'.$count.'.publicar', array('type'=>'checkbox' , 'label' => '<span class="oculto">O perfil selecionado pode </span>Publicar <span class="oculto">not&iacute;cias nesta categoria</span>')); ?>
	</td>
	<td><?php echo $this->Form->button('Remover Perfil', array('type'=>'submit', 'name' => 'removeSJS', 'value' => $count)); ?></td>
</tr>