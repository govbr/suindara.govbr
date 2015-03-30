<?php

echo $this->Form->create('Midia', array('type' => 'get',
										'url' => array('controller' => 'banco_imagens' , 'action' => 'index')));

echo $this->Form->input('Midia.search', array('label' => 'Pesquisar', 'id' => 'pesquisa', 'accesskey' => 3));
echo $this->Form->submit('Pesquisar');
echo $this->Form->end();