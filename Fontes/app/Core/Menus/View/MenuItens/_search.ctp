<?php
    echo $this->Form->create('MenuItens', array('id' => 'formBuscaSimples','type' => 'get')); 
 
    echo $this->Form->input('MenuItem.search', array('label' 	=> 'Pesquisar', 
    											 	 'id'       => 'pesquisa', 
    											 	 'accesskey' => 3)); 

    echo $this->Form->submit('Pesquisar');
    echo $this->Form->end();