<?php
    echo $this->Form->create('TipoEdital', array('type' => 'post', 
    											'id' => 'formBuscaSimples', 
    											'url' => array('plugin' => 'tipoEditais', 'controller' => 'tipoEditais' , 'action' => 'index'))); 

    echo $this->Form->input('TipoEdital.search', array('label'    => 'Pesquisar', 
    											 	  'id'       => 'pesquisa', 
    											 	  'accesskey' => 3)); 

    echo $this->Form->submit('Pesquisar');
    echo $this->Form->end(); 


