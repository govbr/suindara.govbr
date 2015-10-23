<?php echo $this->element('head'); ?>

		<!-- CSS -->
		<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
	    	<link href="<?php echo $this->CmsTemplate->cssPath('eventos') ?>" rel="stylesheet" type="text/css" media="screen" />
    </head>
    
    <body class="eventos"> 
    	 
    	
	    	<div id="principal">
	    		<?php echo $this->element('funcionalidades'); ?>
	    	
		    	<div id="topo">
					<h1>
						<a href="<?php echo $this->CmsTemplate->raizSite() ?>">Acessibilidade Virtual</a>
						<span>Informa&ccedil;&atilde;o ao alcance de todos</span>
					</h1>
				</div>
				
				<?php echo $this->element('menu'); ?>
				
				<div id="content">
	                <a id="conteudo_ref" class="menu_access_ref" accesskey="1" href="#conteudo_ref" title="In&iacute;cio do Conte&uacute;do">In&iacute;cio do Conte&uacute;do</a>
					<p id="breadCrumb">Voc&ecirc; est&aacute; em: <a href="#" title="Voltar &aacute; P&aacute;gina inicial">P&aacute;gina inicial</a> / Eventos</p>                
	                
	                <h2>Eventos</h2>
	                <p>Aqui voc&ecirc; encontrar&aacute; material para download dos eventos que promovemos ou dos quais participamos. </p>
	            
					<div id="esquerda">	
						<h3>Eventos realizados</h3>
						
						<?php 
							$eventos = $this->CmsCategorias->getCategoria('Eventos');
							if ($eventos) {
								$anoCorrente = (int) date('Y');
								$limite = $anoCorrente - 6;
								for ($ano = $anoCorrente; $ano > $limite; $ano--) { 
							?>
								
			                    <!-- lista de anos -->
			                    <h4><a href="#" title="Expandir / Retrair"><span class="titulo-evento">Eventos </span> <?php echo $ano ?> <span class="controle-evento">Expandir</span></a> </h4>
			                    <ul class="lista">
			                    	<?php 
			                    		$nts = $eventos->getNoticias();
										if ($nts) {
			                    		foreach ($eventos->getNoticias() as $nt) {
			                    			if ($nt->getAnoPublicacao() == $ano) {		
			                    	?>
						                    	<!-- lista de eventos para este ano -->
						                    	<li>
													<p class="data"><span class="dia"><?php echo $nt->getDiaPublicacao() ?></span>
													<span class="mes"><?php echo $nt->getMesPublicacao() ?></span>
													</p>
													<p class="desc_evento"><a href="<?php echo $nt->getPath() ?>"><?php echo $nt->titulo ?></a></p>
												</li>
									<?php } } }?>
									<!-- fim lista de eventos para este ano -->
			                    </ul>
		                    
		                   <?php } ?>
		                    	                    
		                
						</div>
						
						<div id="direita">	
		                   	<h3>Eventos &agrave; realizar-se</h3>		
		                   	
		                   	<?php 
		                   		$ntPosteriores = $eventos->getProximasNoticias();
								if (empty($ntPosteriores)) {
		                   	 ?>
		                   	
		                   	<p>N&atilde;o h&aacute; eventos cadastrados no momento!</p>
		                   
		                   <?php 
								} else {
								
									$anoCorrente = (int) date('Y');
									$limite = $anoCorrente + 6;
									for ($ano = $anoCorrente; $ano < $limite; $ano++) {
								
						
											
										foreach ($ntPosteriores as $key => $nt) {
											if ($nt->getAnoPublicacao() == $ano) {
												if ($key == 0) {
													
		                   ?>
		                   		<h4><a href="#" title="Expandir / Retrair"><span class="titulo-evento">Eventos </span><?php echo $ano ?> <span class="controle-evento">Expandir</span></a></h4>
										<ul class="lista">
														  <?php } ?>
		                   	
		                   	
							                  	
													<li>
														<p class="data"><span class="dia"><?php echo $nt->getDiaPublicacao() ?></span>
														<span class="mes"><?php echo $nt->getMesPublicacao() ?></span>
														</p>
														<p class="desc_evento"><a href="<?php echo $nt->getPath() ?>"><?php echo $nt->titulo ?></a></p>
													</li>
					
							<?php
											} 
										}
									}
							?>		
									</ul>		
							<?php		
							    }		
							?>
						</div>
						
						<a href="#finalconteudo_ref" id="finalconteudo_ref" class="menu_access_ref">Final do Conte&uacute;do</a>
					</div>
					
					<?php echo $this->element('footer'); ?>
					
		    	</div>
	    	<?php } ?>
    </body>
</html>