<?php
    echo $this->Form->create('Site', array('type' => 'post', 
    									   'id' => 'formBuscaSimples')); 

    echo $this->Form->input('Site.search', array('label' 	=> 'Pesquisar', 
    											 'id'       => 'pesquisa', 
    											 'accesskey' => 3));

    echo $this->Form->submit('Pesquisar');
    echo $this->Form->end(); 