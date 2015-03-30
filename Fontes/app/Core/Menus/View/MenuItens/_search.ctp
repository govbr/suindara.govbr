<?php
    echo $this->Form->create('MenuItens', array('type' => 'post',
    											'id' => 'formBuscaSimples',
    											'url' => array('controller' => 'menu_itens' , 'action' => 'index', $menu_id) )); 
 
    echo $this->Form->input('MenuItem.search', array('label' 	=> 'Pesquisar', 
    											 	 'id'       => 'pesquisa', 
    											 	 'accesskey' => 3)); 

    echo $this->Form->submit('Pesquisar');
    echo $this->Form->end();