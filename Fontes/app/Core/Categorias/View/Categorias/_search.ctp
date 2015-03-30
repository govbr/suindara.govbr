<?php
    echo $this->Form->create('Categoria', array('type' => 'post', 
    											'id' => 'formBuscaSimples', 
    											'url' => array('controller' => 'categorias' , 'action' => 'index'))); 

    echo $this->Form->input('Categoria.search', array('label'    => 'Pesquisar', 
    											 	  'id'       => 'pesquisa', 
    											 	  'accesskey' => 3)); 

    echo $this->Form->submit('Pesquisar');
    echo $this->Form->end(); 


