<?php
    echo $this->Form->create('Curso', array('type' => 'post')); 

	echo $this->Form->input('Curso.search', array('label' 	=> 'Pesquisar', 
    											 'id'       => 'pesquisa', 
    											 'accesskey' => 3)); 

    echo $this->Form->submit('Pesquisar');
    echo $this->Form->end(); 