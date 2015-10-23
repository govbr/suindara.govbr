<?php

$this->Html->addCrumb('Notícias',  array('plugin' => 'noticias', 'controller' => 'noticias', 'action' => 'index'));
// if(in_array('publicar', $this->params->pass)) {
// 	$this->Html->addCrumb('Publicar',  array('plugin' => 'noticias', 'controller' => 'noticias', 'action' => 'edit'));
// } else {
// 	$this->Html->addCrumb('Conteúdo textual',  array('plugin' => 'noticias', 'controller' => 'noticias', 'action' => 'edit'));
// }


if (isset($noticia_exists)) {
	echo $this->element('Form/_publicacao');
} else {
	echo $this->element('Form/_add');
}
