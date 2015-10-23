<?php echo $this->element('head'); ?>

		<!-- CSS -->
		<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
	    	<link href="<?php echo $this->CmsTemplate->cssPath('noticias') ?>" rel="stylesheet" type="text/css" media="screen" />
    </head>
    
    <body class="lista_noticias"> 
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
            	<p id="breadCrumb">Voc&ecirc; est&aacute; em: <a href="#" title="Voltar &aacute; P&aacute;gina inicial">P&aacute;gina inicial</a> / <a href="#" title="Voltar &aacute; Not&iacute;cias">Not&iacute;cias</a> / Tecnologia Assistiva</p>
            	
            	<h2>Not&iacute;cias</h2>
                <p>Aqui voc&ecirc; ter&aacute; acesso a not&iacute;cias relacionadas &aacute; inclus&atilde;o e acessibilidade, tecnologia assistiva, acessibilidade virtual, entre outros.</p>
            	
            	<?php 
            		$cat_id = $this->CmsTemplate->getParams(0);
            		$categoria = $this->CmsCategorias->getCategoria($cat_id);
					
					echo $categoria->htmlTitulo();
            	?>
            	
				<ul class="lista">
					<?php 
						$noticias = $categoria->getNoticias();
						foreach ($noticias as $noticia) { 
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
				
				<a href="#finalconteudo_ref" id="finalconteudo_ref" class="menu_access_ref">Final do Conte&uacute;do</a>
			</div>
			
			<?php echo $this->element('footer'); ?>
    	</div>
    </body>
</html>