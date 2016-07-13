<?php
	echo $this->Form->create('Categoria', array('id' => 'formBuscaAvancada', 'type' => 'get'));
	echo $this->Form->input('Categoria.palavras', array('label' => 'Palavras-chave'));
?>

<fieldset>
	<legend>Filtrar por</legend>
	<?php 
		echo $this->Form->input('Categoria.parent_id', 
		array('label' => 'T&iacute;tulo (Categoria Pai)', 'empty' => 'Todos...', 'options' => $parents)); 
	?>
</fieldset>

<?php
	echo $this->Form->submit('Aplicar pesquisa avançada');
	echo $this->Form->end();