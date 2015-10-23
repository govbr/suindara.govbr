<?php
	echo $this->Form->create('Modalidade', array('type' => 'post', 
												'id' => 'formBuscaAvancada'));
	
	echo $this->Form->input('Modalidade.palavras', array('label' => 'Palavras-chave'));
?>

<fieldset>
	<legend>Filtrar por</legend>
	<?php 
		echo $this->Form->input('Modalidade.parent_id', 
		array('label' => 'T&iacute;tulo (Modalidade Pai)', 'empty' => 'Todos...', 'options' => $parents)); 
	?>
</fieldset>

<?php
	echo $this->Form->submit('Aplicar pesquisa avançada');
	echo $this->Form->end();