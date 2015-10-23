<?php
	$this->Html->addCrumb('Listagem de Menus ',  array('plugin' => 'menus', 'controller' => 'menus', 'action' => 'index'));
	$this->Html->addCrumb('Listagem de Itens do Menu '  . $menu_nome,  array('plugin' => 'menus', 'controller' => 'menu_itens', 'action' => 'index'));
?>

<h2 class="row">Listagem de <span>Itens do Menu <?php echo $menu_nome; ?></span></h2>

<div class="row controlist">
	<?php echo $this->Html->link('Adicionar novo item<span></span>', array('controller' => 'menu_itens', 'action' => 'add', 'admin' => true, $menu_id), array('class' => 'threecol add', 'escape' => false)); ?>
	
	<div id="busca_simples" class="eightcol">
		<?php echo $this->Element('../MenuItens/_search'); ?>
		<a href="#" id="exp_busca"><span>Expandir op&ccedil;&otilde;es de busca avan&ccedil;ada</span></a>
	</div>

	<div id="busca_avancada" <?php echo ($this->Session->read('Auth.User.modo_sistema') == MODO_SISTEMA_PADRAO) ? 'style="display: none;"' : ''; ?>>
		<?php echo $this->Element('../MenuItens/_advanced_search'); ?>
	</div>
</div>

<?php if( empty($menuItemPaginate) ) { ?>
	<p class="noInfo">Nenhum registro encontrado. 
    <?php echo $this->Html->link('Voltar para a listagem de itens do menu.', 
                                 Router::url(array('plugin' => 'menus', 'controller' => 'menu_itens', 'action' => 'index', $menu_id), true)); ?>
    </p>

<?php } else { ?>
	
	<?php $menuItemCount = count($menuItemPaginate); ?>

	<?php  if (!$this->request->isGet()) { ?>
        <p class="noInfo">
            <?php
                if ($menuItemCount > 1) {
             ?>
                Foram encontrados <?php echo $menuItemCount; ?> itens do menu.
            
            <?php } else { ?>

                Foi encontrado 1 item do menu.

            <?php } ?>

            <?php echo $this->Html->link('Voltar para a listagem de itens do menu.', 
                                     Router::url(array('plugin' => 'menus', 'controller' => 'menu_itens', 'action' => 'index', $menu_id), true)); ?>

            
        </p>
    <?php } ?>

	<table class="row" summary="Tabela de listagem de Itens de Menu.">
		<thead>
			<tr>
				<th>Item</th>
				<th><?php echo $this->Paginator->sort('nome', '<span class="bullet">Ordenar por </span><span class="texto">T&iacute;tulo</span>', array('escape' => false) ); ?></th>
				<th>Identificador</th>
				<th><?php echo $this->Paginator->sort('BmTipo.nome', '<span class="bullet">Ordenar por </span><span class="texto">Tipo</span>', array('escape' => false) ); ?></th>
				
				<th>Ordem</th>
				<th class="two_actions">A&ccedil;&otilde;es</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($menuItemPaginate as $key => $menuItem): ?>
				<?php
					foreach ($numeracao as $index => $value) {
						if($value['MenuItem']['id'] == $menuItem['MenuItem']['id']){
							$menuItem['MenuItem']['virtualField'] = $value['MenuItem']['numero'];
						}
					} 
				?>
				<tr>
					<td> <?php echo $menuItem['MenuItem']['virtualField']; ?> </td>
					<td> <?php echo $this->CmsUtil->limitarTexto($menuItem['MenuItem']['nome'], 32, " ..."); ?> </td>
					<td> <?php echo $this->CmsUtil->limitarTexto($menuItem['MenuItem']['identificador'], 32, " ..."); ?> </td>
					<td> <?php echo $menuItem['BmTipo']['nome']; ?> </td>
					<td>
						<ul>
						<?php 
							$action_up = array('controller' => 'menu_itens', 'action' => 'moveup', 'admin' => true, $menuItem['MenuItem']['id']);
							$action_down = array('controller' => 'menu_itens', 'action' => 'movedown', 'admin' => true, $menuItem['MenuItem']['id']);
						?>
							<?php  if (count($menuItemPaginate) > 1) ?>
								<?php if ($key != 0) { ?>
									<li>
										<?php 

											// $action_up = array();
											// $action_down = array();
											// if (count($menuItemPaginate) > 1)
											// {
											// 	$action_up = array('controller' => 'menu_itens', 'action' => 'moveup', 'admin' => true, $menuItem['MenuItem']['id']);
											// 	$action_down = array('controller' => 'menu_itens', 'action' => 'movedown', 'admin' => true, $menuItem['MenuItem']['id']);
											// }

											// if (!)
											echo $this->Html->link('<span class="oculto">Mover "'.$menuItem['MenuItem']['nome'].'" para a</span> posi&ccedil;&atilde;o anterior', 
																 $action_up,
																 array('class'  => 'up', 'escape' => false)
																); 

										?> 
									</li>
								<?php } ?>

								<?php if ($key != count($menuItemPaginate) - 1) { ?>
			    					<li><?php 
			    						echo $this->Html->link('<span class="oculto">Mover "'.$menuItem['MenuItem']['nome'].'" para a</span> pr&oacute;xima posi&ccedil;&atilde;o', 
			    													 $action_down,
			    													 array('class'  => 'down', 'escape' => false)
			    													 ); 
			    						?> 
			    					</li>
			    				<?php } ?>
	    				</ul>
					</td>
					<td class="two_actions">
						<ul>	
							<li><?php echo $this->Html->link('Editar <span class="oculto">item de menu: ' . $menuItem['MenuItem']['nome'] . '</span>', 
															 array('controller' => 'menu_itens', 'action' => 'edit', 'admin' => true, $menuItem['MenuItem']['id']),
															 array('class'  => 'edit',
															   	   'escape' => false)
															); ?> </li>
	
							<li><?php echo $this->Html->link('Deletar <span class="oculto">item de menu: ' . $menuItem['MenuItem']['nome'] . '</span>', 
															 array('controller' => 'menu_itens', 'action' => 'delete', 'admin' => true, $menuItem['MenuItem']['id']),
															 array('class'  => 'del',
																   'escape' => false),
															 'Voc&ecirc; tem certeza que deseja deletar o item de menu ' . $menuItem['MenuItem']['nome'] . '?'
															); ?></li>
						</ul>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php } 

echo $this->Element('paginator');