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
            	<p id="breadCrumb">Voc&ecirc; est&aacute; em: <a href="index.php" title="Voltar &aacute; P&aacute;gina inicial">P&aacute;gina inicial</a> / <a href="tecnologia-assistiva.php" title="Voltar &aacute; Tecnologia assistiva">Tecnologia assistiva</a> / Projetos de tecnologia assistiva</p>
            	
            	<h2>Tecnologia assistiva</h2>
            	<p>O trabalho de nossa equipe est&aacute; focado em diferentes projetos, que visam garantir a acessibilidade virtual. Conhe&ccedil;a aqui os projetos que v&ecirc;m sendo desenvolvidos em nossos n&uacute;cleos.</p>
            	
            	<h3>Projetos</h3>

				<ul class="lista">	
					
					<?php 
						$projetos = $this->CmsCategorias->getCategoria('TA Projetos');
						
						if ($projetos) {
							foreach ($projetos->getNoticias() as $p) {
					 ?>
						
								<!-- lista de projetos -->
								<li>				
				            		<h4>
				            			<a href="<?php echo $p->getPath() ?>"><span><?php echo $p->titulo ?></span></a>
				            		</h4>  
				            		<p><?php echo $p->resumo ?></p>
								</li>
								<!-- fim lista de projetos -->
							<?php } ?>
					
					<?php } else { ?>
							<p>Nenhum projeto cadastrado!</p>
					<?php } ?>
				</ul>
				
				<a href="#finalconteudo_ref" id="finalconteudo_ref" class="menu_access_ref">Final do Conte&uacute;do</a>
			</div>
			
			<?php echo $this->element('footer'); ?>
    	</div>
    </body>
</html>