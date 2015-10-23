<?php
//echo $this->element('_passos', array('conteudo_id' => $id_conteudo, 'conteudo' => $conteudo), array('plugin' => 'noticias'));

echo $this->Form->create('Edital', array('type' => 'file', 'class'=>'cadastroMidia', 'id' => 'MidiaFormAdd'));
echo $this->Form->input('midias..Midia.arquivo', array(
	'label' => 'Arquivos <span class="oculto"> você pode selecionar mais que um arquivo</span>', 'type' => 'file', 'multiple' => 'multiple', 'id' => 'MidiasArquivosUp'
	));

echo $this->Form->submit('Enviar arquivos');
	
?>