<?php
$modo_sistema = $this->requestAction(
	array(
		'ra' => true,
		'plugin' => 'usuarios', 
		'controller' => 'usuarios', 
		'action' => 'ra_modo_sistema',
		'admin' => true
	)
);
?>
<div id="flashMessage" class="message">
	<div class="row">
		<ul>
		<?php foreach($errors as $error): ?>
			<li>
				<a id="message" href="#message">
					<?php echo $error ?>
				</a>
			</li>
		<?php endforeach; ?>
		</ul>
		<?php if($modo_sistema == MODO_SISTEMA_PADRAO) { ?>
			<a href="#closeMesage" id="closeMessage">Fechar mensagem</a>
		<?php } ?>
	</div>
</div>