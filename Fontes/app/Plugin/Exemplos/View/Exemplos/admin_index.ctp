<?php
	$this->Html->addCrumb('Listagem de exemplos',  array('plugin' => 'exemplos', 'controller' => 'exemplos', 'action' => 'index'));
?>

<h2 class="row">Listagem de <span><?php echo $this->name; ?></span></h2>

<div class="row controlist">
	<?php echo $this->Html->link('Adicionar novo exemplo<span></span>', array('controller' => 'exemplos', 'action' => 'add', 'admin' => true), array('class' => 'threecol add', 'escape' => false)); ?>

	<div id="busca_simples" class="eightcol">
		<!-- Aqui view da busca se implementado -->
	</div>
</div>

<?php if( empty($exemploPaginate) ) { ?>
	<p class="noInfo">Nenhum registro encontrado. 
    <?php echo $this->Html->link('Voltar para a listagem de exemplos.', 
                                 Router::url(array('plugin' => 'exemplos', 'controller' => 'exemplos', 'action' => 'index'), true)); ?>
    </p>
	
<?php } else { ?>
	
	<?php $exemploCount = count($exemploPaginate); ?>

	<?php  if (!$this->request->isGet()) { ?>
        <p class="noInfo">
            <?php
                if ($exemploCount > 1) {
             ?>
                Foram encontrados <?php echo $exemploCount; ?> exemplos.
            
            <?php } else { ?>

                Foi encontrado 1 exemplo.

            <?php } ?>

            <?php echo $this->Html->link('Voltar para a listagem de exemplos.', 
                                     Router::url(array('plugin' => 'exemplos', 'controller' => 'exemplos', 'action' => 'index'), true)); ?>
        </p>
    <?php } ?>

    	<!-- Codigo para listagem dos dados vindo da função index -->
	
<?php } 

//echo $this->Element('paginator');