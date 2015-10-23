<?php
$selected = isset($selected) ? $selected : $this->params['action'];

$links = array();

$links[] = $this->Html->link('Sincronizar tabela de ACOs', array('controller' => 'acos', 'action' => 'synchronize'), array('class' => ('ord ' . (($selected == 'admin_synchronize' ) ? 'selected' : ''))));

$links[] = $this->Html->link('Limpar tabela de ACOs', array('controller' => 'acos', 'action' => 'empty_acos'),  array('class' => ('ord ' . (($selected == 'admin_empty_acos' )  ? 'selected' : ''))));

$links[] = $this->Html->link('Criar ACOs que estão faltando', array('controller' => 'acos', 'action' => 'build_acl'), array('class' => ('ord ' . (($selected == 'admin_build_acl' ) ? 'selected' : ''))));

$links[] = $this->Html->link('Deletar ACOs obsoletas', array('controller' => 'acos', 'action' => 'prune_acos'),array('class' => ('ord ' . (($selected == 'admin_prune_acos' ) ? 'selected' : ''))), 'Você tem certeza que deseja deletar as ACOs obsoletas?');


echo $this->Html->nestedList($links, array('class' => 'acl_links'));