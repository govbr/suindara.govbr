<?php
    echo $this->Form->create('Perfil', array('type' => 'get') ); 

    echo $this->Form->input('Perfil.search', array('label' 	=> 'Pesquisar', 
    											 'id'       => 'pesquisa', 
    											 'accesskey' => 3)); 

    echo $this->Form->submit('Pesquisar');
    echo $this->Form->end(); 




