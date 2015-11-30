<?php

echo $this->Form->create('Mime', array('type' => 'post'));
echo $this->Form->input('Mime.search', array('label' => 'Palavras-chave'));
?>
<fieldset>
	<legend>Filtrar por</legend>
	<?php echo $this->Form->input('Mime.tipo_id', array('label' => 'Categoria', 'empty' => 'Todos...')); ?>
	<?php echo $this->Form->input('Mime.ativo', array(
		'label' => 'Status',
		'type' => 'select',
		'options' => array(1 => 'Ativo', 0 => 'Inativo'),
		'empty' => 'Todos...')); ?>
</fieldset>
<?php
echo $this->Form->submit('Aplicar pesquisa avançada');
echo $this->Form->end();