<ul id="paginator">
	<?php 

	echo $this->Paginator->first('<span>Ir para a primeira p&aacute;gina</span>', array(
		'tag' => 'li',
		'escape' => false,
		'separator' => false
		)
	);

	if($this->Paginator->hasPrev())
		echo $this->Paginator->prev('<span>Voltar para a p&aacute;gina anterior</span>', 
			array(
				'escape' => false,
				'tag' => 'li',
			),
			null, 
			array(
				'class' => 'desabilitado',
				'escape' => false,
				'tag' => 'li',
				'disabledTag' => 'a',
				'separator' => false
			)
		);

	echo $this->Paginator->numbers(array(
		'modulus' => 4,
		'tag' => 'li',
		'currentClass' => 'atual',
		'currentTag' => 'a',
		'escape' => false,
		'separator' => false
		)
	);

	if($this->Paginator->hasNext())
		echo $this->Paginator->next('<span>Ir para a pr&oacute;xima p&aacute;gina</span>',
			array(
				'escape' => false,
				'tag' => 'li',
			), 
			null, 
			array(
				'id' => 'vpa',
				'class' => 'desabilitado',
				'escape' => false,
				'tag' => 'li',
				'disabledTag' => 'a',
				'separator' => false
			)
		);

	echo $this->Paginator->last('<span>Ir para a &uacute;ltima p&aacute;gina</span>', array(
		'tag' => 'li',
		'escape' => false,
		'separator' => false
		)
	);
	?>
</ul>

<div id="configPaginator" class="row">
	<p class="exibindo">
		<?php echo $this->Paginator->counter(array('format' => 'Exibindo {:start} a {:end} de {:count} itens')); ?>
	</p>
	<?php

	if( isset($grupo_id) ){
		echo $this->Form->create(null, array('type' => 'get', 'id' => 'itens_pag', 'url' => array('controller' => 'banners', 'action' => "index", $grupo_id , 'page' => 1)));
	}
	else
	{
		if( isset($menu_id) )
		{
			echo $this->Form->create(null, array('type' => 'get', 'id' => 'itens_pag', 'url' => array('controller' => 'menuItens', 'action' => "index", $menu_id , 'page' => 1)));
		}
		else
		{
			echo $this->Form->create(null, array('type' => 'get', 'id' => 'itens_pag', 'url' => array('controller' => $this->params['controller'], 'action' => 'index', 'page' => 1)));
		}
	}

	$default = (isset($this->request->query['limit']) && !empty($this->request->query['limit'])) ? $this->request->query['limit'] : '15';
	echo $this->Form->input('limit', array(
		'label' => array(
			'class' => 'oculto',
        	'text' => 'Exibir quantos itens por p&aacute;gina:'
        ),
        'default' => $default,
        'escape' => false,
		'type' => 'select',
		'id' => 'qtd_itens',
		'options' => array(
				15 => '15 itens por p&aacute;gina',
				25 => '25 itens por p&aacute;gina',
				50 => '50 itens por p&aacute;gina',
				75 => '75 itens por p&aacute;gina',
				100 => '100 itens por p&aacute;gina'
			)
		)
	);
	echo $this->Form->submit('Aplicar', array('div' => false, 'class' => 'aplicar', 'id' => 'set_itens'));
	echo $this->Form->end();

	?>
</div>