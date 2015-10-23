<?php

echo $this->Form->create('Pagina', array('type' => 'post',
										 'url' => array('controller' => 'paginas' , 'action' => 'index')));

echo $this->Form->input('Pagina.keyword', array('label' => 'Pesquisar'));
echo $this->Form->submit('Pesquisar');
echo $this->Form->end();