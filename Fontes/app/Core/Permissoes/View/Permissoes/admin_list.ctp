<?php echo $this->element('design/header'); ?>

<ul>
<?php foreach($aros as $foreign_key => $aro): ?>
	<li>
		<?php echo $this->Html->link($aro, '/admin/permissoes/list/' . $foreign_key); ?>
	</li>
<?php endforeach; ?>
</ul>

<?php 
if(isset($this->request->params['pass'][0])) {
	$aro_id = $this->request->params['pass'][0];
	unset($acos[0]); 
?>
<ul>
	<?php foreach($acos as $plugin): ?>
	<li>
		<h3>
			Módulo: <?php echo $plugin['Aco']['alias']; ?>
		</h3>

		<ul>
			<?php foreach($plugin['children'] as $controller): ?>
				<ul>
					<?php foreach($controller['children'] as $action): ?>
						<li>
							<?php echo $controller['Aco']['alias'] . ' :: ' . $action['Aco']['alias']; ?>
							<?php 
								if($action['Aco']['permission']) {
							 		echo $this->Html->link('Bloquear', '/admin/permissoes/deny/' . $aro_id . DS .  $action['Aco']['id']); 
							 	} else {
							 		echo $this->Html->link('Permitir', '/admin/permissoes/allow/' . $aro_id . DS .$action['Aco']['id']);
							 	}
							?>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endforeach; ?>
		</ul>
	</li>
	<?php endforeach; ?>
</ul>
<?php } ?>