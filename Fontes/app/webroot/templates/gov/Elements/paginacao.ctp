<?php if ($this->Paginator->hasNext()): ?>
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
<?php endif ?>

<div id="configPaginator" class="row">
	<p class="exibindo">
		<?php echo $this->Paginator->counter(array('format' => 'Exibindo {:start} a {:end} de {:count} itens')); ?>
	</p>
</div>