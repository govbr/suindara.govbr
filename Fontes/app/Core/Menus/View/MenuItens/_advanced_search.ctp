<?php
	echo $this->Form->create('MenuItens', array('id' => 'formBuscaAvancada','type' => 'get'));
	echo $this->Form->input('MenuItem.palavras', array('label' => 'Palavras-chave'));
?>

<fieldset>
	<legend>Filtrar por</legend>
	<?php echo $this->Form->input('MenuItem.tipo', array(
		'type' => 'select', 'empty' => 'Todos...', 'options' => $bmTipos));
	?>
</fieldset>
<?php
	echo $this->Form->submit('Aplicar pesquisa avançada');
	echo $this->Form->end();