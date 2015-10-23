<?php
echo $this->Form->create('Noticia', array('type' => 'post', 'id' => 'NoticiasAdvFormSearch'));
echo $this->Form->input('Noticia.keyword', array('label' => 'Palavras-chave', 'id' => 'NoticiaKeywordAdv'));
echo $this->Form->input('Noticia.author', array('label' => 'Autor'));
echo $this->Form->input('Noticia.sheduled', array('label' => 'Agenda', 'type' => 'select', 'options' => $agendadoOpts));
echo $this->Form->input('Noticia.start_date', array('label' => 'Período de:', 'type' => 'date', 'class' => 'data', 'dateFormat' => 'DMY'));
echo $this->Form->input('Noticia.end_date', array('label' => ' até ', 'type' => 'date', 'class' => 'data', 'dateFormat' => 'DMY'));
echo $this->Form->input('Noticia.category', array('label' => 'Categoria', 'type' => 'select', 'options' => $lista_categorias));
echo $this->Form->submit('Aplicar pesquisa avançada');
echo $this->Form->end();