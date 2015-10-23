<?php
	$this->Html->addCrumb('Meus Sites');
?>

<div class="breadcrump_login">
	Voc&ecirc; est&aacute; em:
    <?php
    echo $this->Html->getCrumbList(array('separator' => ' / ', 'id' => 'breadcrumb'), array(
            'text' => $this->Session->read('Auth.User.SiteAtual.Site.dominio'),
            'url' => array(
                'admin' => true,
                'plugin' => 'informacoes',
                'controller' => 'pages',
                'action' => 'display',
                'home'
            )
        )
    );
    ?>
</div>

<div class="content form login">
	<h2 class="row">Gerenciar <span lang="en">sites</span></h2>
	
	<?php
		$url = $this->Html->url(array('admin' => true, 'plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'selecionar_site'), true);
        echo $this->Form->create('Usuario', array('id' => 'formGerenciarSites', 'class' => 'login', 'url' => $url));
	?>
	
	<fieldset>
		<legend class="oculto">Escolha o site o qual deseja gerenciar.</legend>
		<?php
			echo $this->Form->input('Usuario.site_id', array('type' => 'select', 'class' => 'w97', 'label' => 'Selecione um site para gerenciar'));
		?>
	</fieldset>
	
	<?php 
		echo $this->Form->submit('Acessar');
		echo $this->Form->end();
	?>
</div>