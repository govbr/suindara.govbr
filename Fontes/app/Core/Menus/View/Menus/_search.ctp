<?php
    echo $this->Form->create('Menu', array('type' => 'post')); 

	echo $this->Form->input('Menu.search', array('label' 	=> 'Pesquisar', 
    											 'id'       => 'pesquisa', 
    											 'accesskey' => 3)); 

    echo $this->Form->submit('Pesquisar');
    echo $this->Form->end(); 