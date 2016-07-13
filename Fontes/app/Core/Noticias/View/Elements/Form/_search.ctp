<?php

echo $this->Form->create('Noticia', array('type' => 'post', 'id' => 'NoticiasFormSearch'));
echo $this->Form->input('Noticia.keyword', array('label' => 'Pesquisar', 'id' => 'NoticiaKeyword'));
echo $this->Form->submit('Pesquisar');
echo $this->Form->end();