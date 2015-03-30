<?php

echo $this->Form->create('Mime', array('type' => 'get', 
									   'id' => "SimpleSearchFrom", 
									   'url' => array('controller' => 'mimes' , 'action' => 'index')));

echo $this->Form->input('Mime.search', array('label' => 'Pesquisar', 'id' => 'pesquisa','accesskey' => 3));
echo $this->Form->submit('Pesquisar');
echo $this->Form->end();


// coloquei o action vazio no form