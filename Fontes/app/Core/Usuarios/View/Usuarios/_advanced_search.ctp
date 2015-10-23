<?php

echo $this->Form->create('Usuario', array('id' => 'formBuscaAvancada','type' => 'get'));
echo $this->Form->input('Usuario.palavras', array('label' => 'Palavras-chave'));
?>
<fieldset>
	<legend>Filtrar por</legend>
	<?php echo $this->Form->input('Usuario.departamento', array(
		'type' => 'select', 'options' => $departamentos, 'empty' => 'Todos...'
	)); ?>

	<?php if($this->action == 'admin_import_index') {
		echo $this->Form->input('Usuario.instituicao', array(
			'type' => 'select', 'label' => 'Instituição','options' => $instituicoes, 'empty' => 'Todas...'
		)); }
	?>
</fieldset>
<?php
echo $this->Form->submit('Aplicar pesquisa avançada');
echo $this->Form->end();