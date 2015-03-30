<?php
	$this->Html->addCrumb('Gerenciamento e Módulos para ACL',  array('plugin' => 'permissoes', 'controller' => 'acos', 'action' => 'index'));
	$this->Html->addCrumb('Limpar tabela de ACOS',  array('plugin' => 'permissoes', 'controller' => 'acos', 'action' => 'empty_acos'));
?>

<div class="content form">
    <h2 class="row">Gerenciamento de <span>ACL <span class="menor">(Lista de controle de acesso)</span></span></h2>
    
    <div class="row controlist">
        <div id="busca_avancada">
            <?php echo $this->element('design/header'); ?>
        </div>
    </div>

    <div class="row acl">
		<p>Clicando no link a seguir irá destruir todos os ACOs existentes e pesmissões associadas a eles.</p>
		
		<?php
		echo $this->Html->link(
		    'Limpar tabela de ACOs',
		     array('controller' => 'acos', 'action' => 'empty_acos', 'run'),
		    array(
		        'confirm' => 'Você tem certeza que deseja deletar todos os ACOs existentes e as permissões de usuários ligados a eles?',
		        'escape' => false,
		        'class' => 'aplicar'
		    )
		);
		?>
	</div>
</div>