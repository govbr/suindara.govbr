<?php
    echo $this->Form->create('Grupo', array('type' => 'post',
    										'id' => 'formBuscaSimples' ,
    										'url' => array('controller' => 'grupos' , 'action' => 'index'))); 

	echo $this->Form->input('Grupo.search', array('label' 	=> 'Pesquisar', 
    											  'id'       => 'pesquisa', 
    											  'accesskey' => 3)); 

    echo $this->Form->submit('Pesquisar');
    echo $this->Form->end(); 