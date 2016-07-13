<?php

echo $this->Form->create('Pagina', array('type' => 'post'));
echo $this->Form->input('Pagina.keyword', array('label' => 'Pesquisar'));
echo $this->Form->submit('Pesquisar');
echo $this->Form->end();