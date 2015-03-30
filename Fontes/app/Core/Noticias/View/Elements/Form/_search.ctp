<?php

echo $this->Form->create('Noticia', array('type' => 'post', 
										  'id' => 'NoticiasFormSearch',
										  'url' => array('controller' => 'noticias' , 'action' => 'index')));

echo $this->Form->input('Noticia.keyword', array('label' => 'Pesquisar', 'id' => 'NoticiaKeyword'));
echo $this->Form->submit('Pesquisar');
echo $this->Form->end();