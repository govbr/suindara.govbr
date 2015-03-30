<?php

echo $this->Form->create('Midia', array('type' => 'get'));
echo $this->Form->input('Midia.search', array('label' => 'Pesquisar'));
echo $this->Form->submit('Pesquisar');
echo $this->Form->end();