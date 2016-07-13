<?php echo $this->element('head') ?>

		<!-- CSS -->
		<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
	    	<link href="<?php echo $this->CmsTemplate->cssPath('pagina') ?>" rel="stylesheet" type="text/css" media="screen" />
    </head>
    
    <body class="acessibilidade_web"> 
    	<div id="principal">
    		
    		<?php echo $this->element('funcionalidades') ?>
    	
	    	<div id="topo">
				<h1>
					<a href="#">Acessibilidade Virtual</a>
					<span>Informa&ccedil;&atilde;o ao alcance de todos</span>
				</h1>
			</div>
			
			<?php echo $this->element('menu') ?>
			
			<div id="content">			
                <a id="conteudo_ref" class="menu_access_ref" accesskey="1" href="#conteudo_ref" title="In&iacute;cio do Conte&uacute;do">In&iacute;cio do Conte&uacute;do</a>
                <p id="breadCrumb">Voc&ecirc; est&aacute; em: <a href="#" title="Voltar &aacute; P&aacute;gina inicial">P&aacute;gina inicial</a> / Acessibilidade web</p>
                
                <h2>Pedag&oacute;gico</h2>
                <p>Garantir a acessibilidade na Web &eacute; permitir que qualquer indiv&iacute;duo, utilizando qualquer tecnologia de navega&ccedil;&atilde;o, visite qualquer s&iacute;tio e obtenha completo entendimento das informa&ccedil;&otilde;es contidas nele, al&eacute;m de ter total habilidade de intera&ccedil;&atilde;o.</p>
            	<p>Nesta se&ccedil;&atilde;o, voc&ecirc; poder&aacute; conhecer os projetos que desenvolvemos nesta &aacute;rea, al&eacute;m de encontrar material de apoio relacionado &aacute; acessibilidade na web, como manuais, publica&ccedil;&otilde;es, novidades e outras informa&ccedil;&otilde;es que servem de aux&iacute;lio no processo de inclus&atilde;o digital. </p>
            
            
            
				<div id="esquerda">
					<h3>Projetos</h3>
					<p>O trabalho de nossa equipe est&aacute; focado em diferentes projetos, que visam garantir a acessibilidade virtual. Conhe&ccedil;a aqui os projetos que v&ecirc;m sendo desenvolvidos em nossos n&uacute;cleos.</p>
					
					<ul>	
					
					<?php 
						$projetos = $this->CmsCategorias->getCategoria('Pedagogico Cursos');
						
						if ($projetos) {
							foreach ($projetos->getNoticiasRecentes(2) as $p) {
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
					
					<a href="#" class="veja_mais">Conhe&ccedil;a todos os projetos</a>
				</div>	
				
				<div id="direita">	
					<div id="ultimas_noticias">
						<h3>&Uacute;ltimas not&iacute;cias</h3>
						<ul>
							<?php 
								$noticiasRecentes = $this->CmsNoticias->getNoticiasRecentes(3);
								array_shift($noticiasRecentes);
								foreach ($noticiasRecentes as $noticia) { 
							?>
		            		<li>
		            			<?php
		            				$img = $noticia->getImagemDestaque();
									if ($img) {
										echo $img->htmlImagem(TIMG_ORIGINAL, array('width' => 165, 'height' => 120));
									} else {
										echo $this->CmsTemplate->htmlParaImagem('imagem-indisponivel.jpg', array('width' => 165, 'height' => 120));
									} 	
			            			echo '<h4>';
			            				echo "<a href=\"{$noticia->getPath()}\">";
			            				echo $noticia->htmlDataPublicacao(); 
			            					echo $noticia->titulo;
			            			echo '</a>';
			            			echo '</h4>';
			            		?>
							</li>
							
							<?php } ?>
						</ul>
						
						<a href="#" class="veja_mais">Veja todas as not&iacute;cias</a>
					</div>
				</div>
				
				<div id="dicas">
					<h3>Dicas</h3>
					<ul>
					<?php 
						$dicas = $this->CmsCategorias->getCategoria('Pedagogico OAs');
						
						if ($dicas) {
							foreach ($dicas->getNoticiasRecentes(2) as $d) {
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
					
					<a href="#" class="veja_mais">Veja todas as dicas</a>
				</div>
				
				<div id="manuais">
					<h3>Manuais</h3>
					<ul>
						<?php 
						$manuais = $this->CmsCategorias->getCategoria('Pedagogico Manuais');
						
						if ($manuais) {
							foreach ($manuais->getNoticias() as $m) {
					 ?>
						
								<!-- lista de projetos -->
								<li>				
				            		<h4>
				            			<a href="<?php echo $m->getPath() ?>"><span><?php echo $m->titulo ?></span></a>
				            		</h4>  
				            		<p><?php echo $m->resumo ?></p>
								</li>
								<!-- fim lista de projetos -->
							<?php } ?>
					
					<?php } else { ?>
							<p>Nenhum manual cadastrado!</p>
					<?php } ?>
					</ul>
					
					<a href="#" class="veja_mais">Veja todos os manuais</a>
				</div>
				
				<a href="#finalconteudo_ref" id="finalconteudo_ref" class="menu_access_ref">Final do Conte&uacute;do</a>
			</div>
			
			<?php echo $this->element('footer') ?>	
    	</div>
    </body>
</html>