<?php
$this->Html->addCrumb('Menus',  array('plugin' => 'menus', 'controller' => 'menus', 'action' => 'index'));
$this->Html->addCrumb('Itens',  array('plugin' => 'menus', 'controller' => 'menu_itens', 'action' => 'index'));
$this->Html->addCrumb('Visualizar',  array('plugin' => 'menus', 'controller' => 'menu_itens', 'action' => 'view'));
?>
<h2> Cadastro de Item Menu </h2>

<?php
	echo $this->Form->create('MenuItem');

	echo $this->Form->input('id', array('type' => 'hidden') );

	echo $this->Form->input('menu_id', array('type' => 'hidden') );

	echo $this->Form->input('nome', array('label'    => 'Título', 
										  'disabled' => 'disabled') );
	echo $this->Form->input('parent_id', array('label'    => 'Item Pai', 
											   'empty'    => 'Selecione', 
											   'disabled' => 'disabled') );

	echo $this->Form->input('bm_tipo_id', array('label'    => 'Tipo', 
												'default'  => 1, 
												'disabled' => 'disabled') );

	if(isset($opcao)){
		switch ($opcao) {
		    case 2:
		        echo $this->Form->input('link', array('label'    => 'Link destino', 
		        									  'disabled' => 'disabled') );
		        break;

		    case 3:
		        echo $this->Form->input('pagina_id', array('label'    => 'Página relacionada',
		        										   'options'  => $lista_paginas, 
		        										   'disabled' => 'disabled') );
		        break;

		    case 4:
		        echo $this->Form->input('categoria_id', array('label'    => 'Categoria relacionada',
		        											  'type'     => 'select', 
		        											  'options'  => $lista_categorias, 
		        											  'disabled' => 'disabled'));
		        break;
		}
	}
	
	echo $this->Form->end(); 
	echo $this->Html->link('Voltar', array('plugin' => 'menus', 'controller' => 'menu_itens', 'action' => 'index', $menu_id), array('id'=>'cancelar')); ?> 