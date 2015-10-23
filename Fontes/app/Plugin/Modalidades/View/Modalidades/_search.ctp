<?php
    echo $this->Form->create('Modalidade', array('type' => 'post', 
    											'id' => 'formBuscaSimples', 
    											'url' => array('controller' => 'modalidades' , 'action' => 'index'))); 

    echo $this->Form->input('Modalidade.search', array('label'    => 'Pesquisar', 
    											 	  'id'       => 'pesquisa', 
    											 	  'accesskey' => 3)); 

    echo $this->Form->submit('Pesquisar');
    echo $this->Form->end(); 


