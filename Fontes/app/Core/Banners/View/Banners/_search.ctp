<?php
    echo $this->Form->create('Banner', array('id' => 'formBuscaSimples', 'type' => 'get')); 

    echo $this->Form->input('Banner.search', array('label' 	  => 'Pesquisar', 
    											   'id'       => 'pesquisa', 
    											   'accesskey' => 3));

    echo $this->Form->submit('Pesquisar');
    echo $this->Form->end(); 