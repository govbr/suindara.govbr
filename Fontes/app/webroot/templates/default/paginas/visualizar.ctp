<?php echo $this->element('head'); ?>

		<!-- CSS -->
		<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
	    	<link href="<?php echo $this->CmsTemplate->cssPath('pagina') ?>" rel="stylesheet" type="text/css" media="screen" />
    </head>
    
    <body class="acessibilidade_web"> 
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
                <p id="breadCrumb">Voc&ecirc; est&aacute; em: <a href="#" title="Voltar &aacute; P&aacute;gina inicial">P&aacute;gina inicial</a> / Acessibilidade web</p>
                
                <?php
                	$pagina_id = $this->CmsTemplate->getParams(0);
					$pagina = $this->CmsPaginas->getPagina($pagina_id);
					
					
					echo $pagina->htmlTitulo();
					
					echo $pagina->htmlTexto();
					
					
                ?>
                
            
				<div id="esquerda">
					<h3>Projetos</h3>
					<p>O trabalho de nossa equipe est&aacute; focado em diferentes projetos, que visam garantir a acessibilidade virtual. Conhe&ccedil;a aqui os projetos que v&ecirc;m sendo desenvolvidos em nossos n&uacute;cleos.</p>
					
					<ul>
						<!-- lista projetos -->
						<li>
							<h4><a href="#">Ases</a></h4>
							<p>Avaliador e Simulador Autom&aacute;tico de Acessibilidade de S&iacute;tios: ferramenta do governo federal, que permite avaliar, simular e corrigir a acessibilidade de p&aacute;ginas, s&iacute;tios e portais da web.</p>	
						</li>
						<!-- fim da lista projetos -->
					</ul>
					
					<a href="#" class="veja_mais">Conhe&ccedil;a todos os projetos</a>
				</div>	
				
				<div id="direita">	
					<div id="ultimas_noticias">
						<h3>&Uacute;ltimas not&iacute;cias</h3>
						<ul>
							<!-- lista ultimas noticia -->
							<?php
                    			$noticiasRecentes = $this->CmsNoticias->getNoticiasRecentes(1);
								foreach ($noticiasRecentes as $n) {
                    				$img = $n->getImagemDestaque();
				            		echo '<li>';
										if ($img) {	
				            				echo $img->htmlImagem(TIMG_ORIGINAL, array('width'=>165, 'height'=>120));
										} else {
											echo $this->CmsTemplate->htmlParaImagem('imagem-indisponivel.jpg', array('width' => 165, 'height' => 120));
										}	
					            		echo '<h4>';
					            			echo "<a href=\"{$n->getPath()}\">";
					            			echo $n->htmlDataPublicacao();
											echo $n->titulo; 
					            			echo '</a>';
					            		echo '</h4';
					            		
									echo '</li>';
							} ?>
							<!-- lista ultimas noticia -->
						</ul>
						
						<a href="/noticias" class="veja_mais">Veja todas as not&iacute;cias</a>
					</div>
				</div>
				
				<div id="dicas">
					<h3>Dicas</h3>
					<ul>
						<!-- lista dicas -->
						<li>				
	            			<h4><a href="#">Tableless - dicas de HTML</a></h4>
	            			<p>Videoaula com dicas de desenvolvimento Web utilizando o metodologia Tableless.</p> 
						</li>
						<!-- fim lista dicas -->
					</ul>
					
					<a href="#" class="veja_mais">Veja todas as dicas</a>
				</div>
				
				<div id="manuais">
					<h3>Manuais</h3>
					<ul>
						<!-- lista manuais -->
						<li>
							<h4><span>Desenvolvendo sites acess&iacute;veis</span></h4>
							<!-- lista de arquivos deste manual -->
							<p><a href="#">Formato: PDF / Tamanho: 602 KB</a></p>
							<p><a href="#">Formato: DOC / Tamanho: 102 KB</a></p>
							<!-- fim lista de arquivos deste manual -->
						</li>
						<!-- fim lista manuais -->
					</ul>
					
					<a href="#" class="veja_mais">Veja todos os manuais</a>
				</div>
				
				<a href="#finalconteudo_ref" id="finalconteudo_ref" class="menu_access_ref">Final do Conte&uacute;do</a>
			</div>
			
			<?php 
				$arquivos = $pagina->getArquivos();
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
				$audios = $pagina->getAudios();
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
				$videos = $pagina->getVideos();
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