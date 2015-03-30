<?php echo $this->element('head'); ?>

		<!-- CSS -->
		<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
	    	<link href="<?php echo $this->CmsTemplate->cssPath('conteudo') ?>" rel="stylesheet" type="text/css" media="screen" />
    </head>
    
    <body class="conteudo"> 
    	<div id="principal">
    		
    		<?php echo $this->element('funcionalidades'); ?>
    	
	    	<div id="topo">
				<h1>
					<a href="#">Acessibilidade Virtual</a>
					<span>Informa&ccedil;&atilde;o ao alcance de todos</span>
				</h1>
			</div>
			
			<?php echo $this->element('menu'); ?>
			
			<div id="content">	
            	<a id="conteudo_ref" class="menu_access_ref" accesskey="1" href="#conteudo_ref" title="In&iacute;cio do Conte&uacute;do">In&iacute;cio do Conte&uacute;do</a>
				<p id="breadCrumb">Voc&ecirc; est&aacute; em: <a href="#" title="Voltar &aacute; P&aacute;gina inicial">P&aacute;gina inicial</a> / Manuais</p>       	
            	
            	<h2>Objetos de Aprendizagem</h2>
            	

            	<h3>Categorias</h3>
                
				<ul class="lista">
					<?php 
						$dicas = $this->CmsCategorias->getCategoria('Pedagogico OAs');
						
						if ($dicas) {
							foreach ($dicas->getNoticias() as $d) {
					 ?>
						
								<!-- lista de projetos -->
								<li>				
				            		<h4>
				            			<a href="<?php echo $d->getPath() ?>"><span><?php echo $d->titulo ?></span></a>
				            		</h4>  
				            		<p><?php echo $d->resumo ?></p>
								</li>
								<!-- fim lista de projetos -->
							<?php } ?>
					
					<?php } else { ?>
							<p>Nenhum dicas cadastrado!</p>
					<?php } ?>
				</ul>
				
				<a href="#finalconteudo_ref" id="finalconteudo_ref" class="menu_access_ref">Final do Conte&uacute;do</a>
			</div>
			
			<?php echo $this->element('footer'); ?>
    	</div>
    </body>
</html>