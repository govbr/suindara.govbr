<?php
    echo $this->Form->create('Edital', array('type' => 'post')); 

	echo $this->Form->input('Edital.search', array('label' 	=> 'Pesquisar', 
    											 'id'       => 'pesquisa', 
    											 'accesskey' => 3)); 

    echo $this->Form->submit('Pesquisar');
    echo $this->Form->end(); 