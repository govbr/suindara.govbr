<?php echo $this->element('head'); ?>

		<!-- CSS -->
		<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
	    	<link href="<?php echo $this->CmsTemplate->cssPath('noticias') ?>" rel="stylesheet" type="text/css" media="screen" />
    </head>
    
    <body class="posts"> 
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
				<p id="breadCrumb">Voc&ecirc; est&aacute; em: <a href="#" title="Voltar &aacute; P&aacute;gina inicial">P&aacute;gina inicial</a> / Not&iacute;cias</p>

				<h2>Not&iacute;cias</h2>
                <p>Aqui voc&ecirc; ter&aacute; acesso a not&iacute;cias relacionadas &aacute; inclus&atilde;o e acessibilidade, tecnologia assistiva, acessibilidade virtual, entre outros.</p>

				<div id="esquerda">		
					<?php 
						$noticiaD = $this->CmsNoticias->getNoticiaDestaque(); 
						if ($noticiaD) {
					?>

					<div id="noticia_destaque">
						<h3>Not&iacute;cia em destaque</h3>

						<div>
							<?php 
								$imgDestaque = $noticiaD->getImagemDestaque();
								if ($imgDestaque) {
									echo $imgDestaque->htmlImagem(TIMG_ORIGINAL, array('width' => '165', 'height' => '120'));
								} else {
									echo $this->CmsTemplate->htmlParaImagem('imagem-indisponivel.jpg', array('width' => 165, 'height' => 120));	
								}
							?>
							<h4> 
								<a href="<?php echo $noticiaD->getPath() ?>">
									<span><?php echo $noticiaD->htmlDataPublicacao()?></span> 
									<?php echo $noticiaD->titulo ?>
								</a>
							</h4>
						</div> <!-- div -->

						<?php echo $noticiaD->htmlTexto(); ?>
					<?php } ?>	

					</div> <!-- div noticia destaque -->
				</div> <!-- div esquerda -->

					<div id="direita">

						<?php 
							$categoriasRecentes = $this->CmsCategorias->getCategoriasRecentes(); 
						?>

						<?php 
                		foreach($categoriasRecentes as $cat) {
							$noticiasRecentes = $cat->getNoticiasRecentes(2);
							if ($noticiasRecentes) {
								if ($cat->id == $noticiaD->categoria_id || empty($noticiasRecentes)) continue;	 
								echo $cat->htmlTitulo();
                   		 ?>
                    	
                    	<div class="categoria">
	                    	<ul class="ultimos_posts_categoria">
	                    		<!-- lista ultimas noticia -->
	                    		<?php foreach ($noticiasRecentes as $noticiaRecente) { ?>
	                    		<li>
	                    			<?php
	                    				
	                    			$img = $noticiaRecente->getImagemDestaque();
									if ($img) {	
	                    				echo $img->htmlImagem(TIMG_ORIGINAL, array('width' => 165, 'height' => 120));	
									} else {
										echo $this->CmsTemplate->htmlParaImagem('imagem-indisponivel.jpg', array('width' => 165, 'height' => 120));
									}
									
									echo '<h4>';
										echo "<a href=\"{$noticiaRecente->getPath()}\">";
										echo    $noticiaRecente->htmlDataPublicacao();
										echo 	$noticiaRecente->titulo;
										echo '</a>';
									echo '</h4>';
									
									?>	
								</li>
								<?php } ?>
								<!-- fim lista ultimas noticia -->
	                    	</ul>
	                    	
	                    	<a href="<?php echo $cat->getNoticiasPath() ?>" class="veja_mais_2">
	                    		Mais not&iacute;cias sobre <?php echo $cat->titulo ?>
	                    	</a>
                    	</div>
                    <?php } } ?>
					</div> <!-- div direita -->

			</div> <!-- div content -->

			<?php echo $this->element('footer'); ?>
    	</div> <!-- div principal -->

    </body>
</html>