<?php
	echo $this->Form->create('TipoEdital', array('type' => 'post', 
												'id' => 'formBuscaAvancada'));
	
	echo $this->Form->input('TipoEdital.search', array('label' => 'Palavras-chave'));
?>

<fieldset>
	<legend>Filtrar por</legend>
	<?php 
		echo $this->Form->input('TipoEdital.parent_id', 
		array('label' => 'T&iacute;tulo (Tipo de Edital Pai)', 'empty' => 'Todos...', 'options' => $parents)); 
	?>
</fieldset>

<?php
	echo $this->Form->submit('Aplicar pesquisa avançada');
	echo $this->Form->end();