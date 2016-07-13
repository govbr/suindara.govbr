<?php 
	echo $this->element('head'); 
?>

        <!-- CSS -->
        <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
            <link href="<?php echo $this->CmsTemplate->cssPath('post') ?>" rel="stylesheet" type="text/css" media="screen" />
    </head>

    
    <body class="post"> 
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
                <p id="breadCrumb">Voc&ecirc; est&aacute; em: <a href="#" title="Voltar &aacute; P&aacute;gina inicial">P&aacute;gina inicial</a> / <a href="#" title="Voltar &aacute; Not&iacute;cias">Not&iacute;cias</a> / <a href="#" title="Voltar &aacute; not&iacute;cias Tecnologia assistiva">Tecnologia assistiva</a> / Projeto de Acessibilidade Virtual participa da Reatech em S&atilde;o Paulo</p>
                
                <?php 
                	// Resgata o primeiro parâmetro da URL que informa a ID da notícia
                	$noticia_id = $this->CmsTemplate->getParams(0);
					// Carrega a notícia
                	$noticia = $this->CmsNoticias->getNoticia($noticia_id); 
                ?>
                <div id="post">                
                    <?php
                    	// Gera o HTML do título da notícia  
                    	echo $noticia->htmlTitulo()
                    ?>
                    <p><span>Publicado em 
                    	<?php 
                    		// Gera o HTML para a data de publicação
                    		echo $noticia->htmlDataPublicacao() 
                    	?>
                    	</span></p>          
                    <div id="conteudo_post">                    
						<p>
							<?php
								// Gera o HTML para o texto
								echo $noticia->htmlTexto() 
							?>
						</p>
											
                        <ul>
                            <li><a href="#" class="veja_mais" id="imprimir">Imprimir este conte&uacute;do</a></li>
                            <li><a href="#" class="veja_mais_3" id="voltar">Voltar</a></li>
                        </ul>                      
                    </div>      
                    
                    <div id="conteudo_extra_post">
                    	<?php 
                    		// Resgata a imagem de destaque da notícia
                    		$imgDestaque = $noticia->getImagemDestaque();
							if ($imgDestaque) {
								// Gera o HTML para a tag da imagem
								echo $imgDestaque->htmlImagem(TIMG_ORIGINAL, array('class' => 'foto_principal', 'id' => 'foto_principal', 'width' => '428', 'height' => '320'));
							} else {
								echo $this->CmsTemplate->htmlParaImagem('imagem-indisponivel.jpg', array('class' => 'foto_principal', 'id' => 'foto_principal', 'width' => 428, 'height' => 320));
								
							}
						 
                    		$imgs = $noticia->getImagens(true, 10);
							
							if (!empty($imgs)) {
                    	?>
                    		<ul class="fotos">
                            	<?php 
                            		  foreach ($imgs as $img) { 
                            			echo '<li>' . $img->htmlImagem(TIMG_ORIGINAL, array('width' => '165', 'height' => '120')) . '</li>';
                       				  } 
                       			?>
                        	</ul>
                        <?php } ?>
                    </div>  
                </div>
                
                <div id="outros_posts"> 
                    <h2>Outras Not&iacute;cias</h2>
                    <?php
                    	$noticiasRecentes = $this->CmsNoticias->getNoticiasRecentes(5);
                    ?>                
                    <ul>
                    	<?php
                    		foreach ($noticiasRecentes as $n) {
								if ($n->id == $noticia->id) continue;
                    			echo '<li>' . $n->htmlDataPublicacao() . '&nbsp;&nbsp;' . $n->htmlLink() . '</li>';
							}
                    	?>
                    </ul>
                </div>
                
                <a href="#finalconteudo_ref" id="finalconteudo_ref" class="menu_access_ref">Final do Conte&uacute;do</a>
            </div>
            
            
            <?php 
                 $arquivos = $noticia->getArquivos();
                    if ($arquivos):
                        foreach ($arquivos as $k => $arquivo):
            ?>
                            <div id="arquivo-<?php echo $k ?>" class="arquivo">
                                <?php echo $arquivo->htmlArquivo(array('id' => "file-$k")); ?>
                            </div>
            <?php 
                    endforeach;
                    endif;
            ?>

            <?php 
                    $audios = $noticia->getAudios();
                    if ($audios):

                        foreach ($audios as $k => $audio):
            ?>
                            <div id="aplayer-<?php echo $k ?>" class="audio">
                                <?php echo $audio->htmlAudio(array('id' => "flv-player-$k")); ?>
                            </div>
            <?php 
                    endforeach;
                    endif;
            ?>          


            <?php 
                    $videos = $noticia->getVideos();
                    if ($videos):
                        foreach ($videos as $k => $video):
            ?>
                            <div id="vplayer-<?php echo $k ?>" class="video">
                                <?php echo $video->htmlVideo(array('id' => "mp3-player-$k")); ?>
                            </div>
            <?php 
                    endforeach;
                    endif;
             ?>
            
            <?php echo $this->element('footer'); ?>    
        </div>
    </body>
</html>