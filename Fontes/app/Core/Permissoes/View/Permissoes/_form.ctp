<?php
	$default = (isset($this->request->query['aro']) && !empty($this->request->query['aro'])) ? $this->request->query['aro'] : '';

	echo $this->Form->create('Permissao', array('type' => 'get', 'class'=>'w97'));
	
	echo $this->Form->input('aro', array('label' => 'Perfil','type' => 'select',
		'empty' => 'Selecione um perfil',
		'default' => $default,
			'label' => array(
				'class' => 'oculto',
	        	'text' => 'Selecione um perfil para alterar as permissões:'
	        ), 'class' => 'w40, dir',));
	
	echo $this->Form->submit('Listar', array('div' => false, 'value' => 'Aplicar', 'id'=>'botaoLabel'));
	
	echo $this->Form->end();