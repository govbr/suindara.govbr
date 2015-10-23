<?php
    echo $this->Form->create('Banner', array('type' => 'post',
    										 'id' => 'formBuscaSimples', 
    										 'url' => array('controller' => 'banners' , 'action' => 'index', $grupo_id))); 

    echo $this->Form->input('Banner.search', array('label' 	  => 'Pesquisar', 
    											   'id'       => 'pesquisa', 
    											   'accesskey' => 3));

    echo $this->Form->submit('Pesquisar');
    echo $this->Form->end(); 