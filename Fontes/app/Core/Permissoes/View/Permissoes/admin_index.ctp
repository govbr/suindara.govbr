<?php
	$this->Html->addCrumb('Listagem de Permissões',  array('plugin' => 'permissoes', 'controller' => 'permissoes', 'action' => 'index'));
	
	if(isset($this->params->query['aro']) && isset($perfil))
		$this->Html->addCrumb("Perfil - {$perfil}",  array('plugin' => 'permissoes', 'controller' => 'permissoes', 'action' => 'index', '?' => array('aro' => $this->params->query['aro'])));
?>
<div class="content form">
	<h2 class="row">Listagem de <span>Permissões </span></h2>

	<div class="row controlist">

		<div id="busca_simples">
			<?php echo $this->Element('../Permissoes/_form'); ?>
		</div>
	</div>
	<?php
	if(isset($this->request->query['aro']) && isset($acos)) {
		$aro_id = $this->request->query['aro'];
	?>
	<ul class="row tabelaLista">
		<?php foreach($acos as $plugin): ?>
			<?php  if ($plugin['Aco']['alias'] == 'Pages') continue; ?>
			<?php  if ($plugin['Aco']['alias'] == 'Instalar') continue; ?>
			<li class="row">
				<h3>Módulo - <span><?php echo CmsTextSwap::__($plugin['Aco']['alias']); ?></span></h3>

				<ol class="row">
				<?php $repeated = ''; ?>
				<?php foreach($plugin['children'] as $controller): ?>
						<?php foreach($controller['children'] as $action): ?>
							<?php 
								$module = __($controller['Aco']['alias']);
								//Action
								$moduleAction = __(str_replace("admin_", "", $action['Aco']['alias']));

							?>
							<li class="row">
								<span class="fourcol first">
									<?php 
										$controllerName = CmsTextSwap::__($module);
										if ($controllerName != $repeated) 
										{
											$repeated = $controllerName;
											echo 'Controlador de ' . CmsTextSwap::__($module); 
										}
										else 
										{
											echo '-';
										}
									?>

								</span>	
								<span class="fourcol">
									<?php echo CmsTextSwap::__($moduleAction); ?>
								</span>
								<span class="threecol last">
								<?php 
								$txt = '<span class="oculto"> perfil "'.$aros[$aro_id]. '" acesso a ' . $module . '/' . $moduleAction .'</span>';
									if($action['Aco']['permission']) {
								 		echo $this->Html->link(
								 			'Bloquear' . $txt,
								 			array('plugin' => 'permissoes', 'controller' => 'permissoes', 'action' => 'deny', $aro_id, $action['Aco']['id'], $module, $moduleAction),
								 			array('class' => 'deny', 'escape' => false)
								 			); 
								 	} else {
								 		echo $this->Html->link(
								 			'Permitir' . $txt, 
								 			array('plugin' => 'permissoes', 'controller' => 'permissoes', 'action' => 'allow', $aro_id, $action['Aco']['id'], $module, $moduleAction ),
								 			array('class' => 'allow', 'escape' => false)
								 			);
								 	}
								?>
							</span>
							</li>
						<?php endforeach; ?>
				<?php endforeach; ?>
				</ol>
			</li>
		<?php endforeach; ?>
	</ul>
	<?php } ?>
</div>