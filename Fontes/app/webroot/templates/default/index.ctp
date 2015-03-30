<?php echo $this->element('head'); ?>

		<!-- CSS -->
		<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
	    	<link href="<?php echo $this->CmsTemplate->cssPath('index') ?>" rel="stylesheet" type="text/css" media="screen" />
    </head>
    
    <body class="home"> 
    	<div id="principal">	
    		<?php echo $this->element('funcionalidades'); ?>

	    	<div id="topo">
				<h1>
					<a href="<?php echo $this->CmsTemplate->raizSite() ?>">Acessibilidade Virtual</a>
					<span>informa&ccedil;&atilde;o ao alcance de todos</span>
				</h1>			
			</div>
			
			<?php echo $this->element('menu'); ?>
			
			<div id="content">
				<a id="conteudo_ref" class="menu_access_ref" accesskey="1" href="#conteudo_ref" title="In&iacute;cio do Conte&uacute;do">In&iacute;cio do Conte&uacute;do</a>
				<p id="breadCrumb">Voc&ecirc; est&aacute; em: P&aacute;gina inicial</p>
				
				<div class="esquerda">
					<div id="bemvindo">
						<h2>Seja bem-vindo(a)!</h2>
						<p>Este &eacute; o site do Projeto de Acessibilidade Virtual. Aqui voc&ecirc; ir&aacute; encontrar:</p>
						<ul>
							<li>Ferramentas, diretrizes e informa&ccedil;&otilde;es para a implanta&ccedil;&atilde;o de sites acess&iacute;veis;</li>
							<li>Informa&ccedil;&otilde;es sobre recursos de Tecnologia Assistiva;</li>
							<li>Manuais de leitores e ampliadores de tela, mouses e teclados alternativos, entre outros;</li>
							<li>Informa&ccedil;&otilde;es e recursos sobre Educa&ccedil;&atilde;o Inclusiva e Necessidades Educacionais Especiais;</li>
							<li>Not&iacute;cias e eventos relacionados &agrave; acessibilidade e inclus&atilde;o;</li>
						</ul>
						<p>Al&eacute;m disso, voc&ecirc; poder&aacute; conhecer um pouco sobre o nosso projeto e as a&ccedil;&otilde;es que estamos desenvolvendo.</p>
					</div>

					<div id="ultimos_manuais">
						<h3>Manuais</h3>
						<p>Aqui voc&ecirc; encontrar&aacute; links para download dos &uacute;ltimos manuais desenvolvidos pela nossa equipe.</p>
						<!-- lista de (manuais)-->
						<ul>
							<li>						
								<h4>Desenvolvendo sites acess&iacute;veis - Manual do desenvolvedor</h4>
								<!-- lista de arquivos deste manual -->
								<p><a href="#">Formato: PDF / Tamanho: 602 KB</a></p>
								<p><a href="#">Formato: DOC / Tamanho: 102 KB</a></p>
								<!-- fim lista de arquivos deste manual -->
							</li>				
						</ul>
						<!-- fim lista de arquivos (manuais)-->
						<a href="#" class="veja_mais">Veja todos os manuais</a>	
					</div>
				</div>
				
				<div class="direita">

					<!-- noticia destaque -->
					<?php
						$nDestaque = $this->CmsNoticias->getNoticiaDestaque();
						
						if ($nDestaque) {
					?>
						<div id="noticia_destaque">
							<h3><?php echo $nDestaque->cartola ?></h3>
							
							<?php 
								$imgDestaque = $nDestaque->getImagemDestaque();
								if ($imgDestaque) {
									echo $imgDestaque->htmlImagem(TIMG_ORIGINAL, array('width' => '165', 'height' => '120'));
								} else {
									echo $this->CmsTemplate->htmlParaImagem('imagem-indisponivel.jpg', array('width' => 165, 'height' => 120));	
								}
							?>
							
							<h4>
								<a href="<?php echo $nDestaque->getPath(); ?>">
									<?php 
										echo $nDestaque->htmlDataPublicacao();   
									    echo $nDestaque->titulo;  
									?>
								</a>
							</h4>			
							<?php echo $nDestaque->resumo ?>
						</div>
					<?php } ?>
					<!-- fim destaque -->

					<div id="ultimas_noticias">
						<h3>&Uacute;ltimas not&iacute;cias</h3>
						<!-- lista ultimas noticia -->
						
	                    <ul class="lista">
							<?php 
								$noticiasRecentes = $this->CmsNoticias->getNoticiasRecentesSemDestaque(3);
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
						
						<!-- fim lista ultimas noticia -->
						
						<a href="<?php echo $this->CmsTemplate->raizNoticias() ?>" class="veja_mais">Veja todas as not&iacute;cias</a>
					</div>
				</div>
				
				<div id="eventos_home">
					<h3>Eventos</h3>
					<p>A seguir, est&atilde;o disponibilizadas apresenta&ccedil;&otilde;es dos &uacute;ltimos eventos que promovemos ou dos quais participamos. Ao acessar o link do evento, voc&ecirc; encontrar&aacute; o respectivo material para download.</p>
					<!-- lista ultimos eventos -->
					<?php 
						$eventos = $this->CmsCategorias->getCategoria('Eventos');
						if ($eventos) { 
					?>
						<ul>
							<?php foreach ($eventos->getNoticiasRecentes(5) as $nt) { ?>
								<li>	
									<p class="data"><span class="dia"><?php echo $nt->getDiaPublicacao()?></span>
									<span class="mes"><?php echo $nt->getMesPublicacao()?></span>
									</p>
									<p><a href="<?php echo $nt->getPath() ?>"><?php echo $nt->titulo?></a></p>
								</li>
							<?php } ?>
						</ul>
						<!-- fim lista ultimos eventos -->
					<?php } ?>
					<a href="/eventos" class="veja_mais">Veja todos os eventos</a>
				</div>

				<?php 
					// $b = $this->CmsBanners->getBanner('Googleia');
					// print($b->htmlBanner(array('class' => 'teste'))); 
				?>

				<div id="banners_home">
					<!-- lista banners -->
					
					<?php 
						$grupo = $this->CmsBanners->getGrupo('Principal');
						
						if ($grupo) {
					?>
					
					<ul>
						<?php
							foreach ($grupo->getBanners() as $b) {
								echo '<li>' . $b->htmlBanner() . '</li>';
							} 
						?>
					</ul>
					
					<?php } else {
							echo '<p>Nenhum banner registrado</p>';
					    }		
					?>
					<!-- fim lista banners -->
				</div>

				<div id="banner_download_site_modelo">
					<a href="<?php echo $this->CmsTemplate->arquivoPath('site_modelo_template.zip') ?>">Clique aqui e fa&ccedil;a download do site modelo</a>
				</div>

				<div id="quem_somos_home">
					<div id="texto">
						<h2>Quem somos</h2>
						<p>O Projeto de Acessibilidade Virtual tem como objetivo principal garantir um bom n&iacute;vel de acessibilidade aos produtos gerados.</p>
						<ul>
							<li>Criar e gerenciar n&uacute;cleos de acessibilidade em regi&otilde;es diversas do pa&iacute;s;</li>
							<li>Desenvolver e implantar artefatos digitais acess&iacute;veis;</li>
							<li>Produzir material de apoio ao desenvolvimento de sistemas acess&iacute;veis;</li>
							<li>Prover capacita&ccedil;&atilde;o dos profissionais integrantes dos demais projetos.</li>
						</ul>
						
						<a href="#" class="veja_mais">Conhe&ccedil;a o projeto</a>
					</div>
					
					<div id="video_institucional">
						<h3>V&iacute;deo institucional</h3>
						
						<div id="flv-player">
							<p>V&iacute;deo em libras!</p>
							
							<script type="text/javascript">
								var flashvars = {video: 'video_libras.flv'};
								var params = {wmode: "transparent", scale: "noScale", menu: "false", allowFullScreen: "true"};
								var attributes = { id: "flv-player", name: "flv-player", swLiveConnect: "true" };
								
								swfobject.embedSWF("swf/flv-player.swf?v=6", "flv-player", "420", "280", "10.0.0", "expressInstall.swf", flashvars, params, attributes);
							
								// -- controle -- //
								
								var movieName = "flv-player";
								function thisMovie(movieName) {
								  if (navigator.appName.indexOf ("Microsoft") !=-1) {
								    return window[movieName]
								  } else {
								    return document[movieName]
								  }
								}
								
								$(document).ready(function() {
									$("#reproduzir").click(function() {
										thisMovie(movieName).TGotoFrame('controleJavascript', 1);
										return false
									});
									
									$("#pausar").click(function() {
										thisMovie(movieName).TGotoFrame('controleJavascript', 2);
										return false
									});
									
									$("#diminuirVolume").click(function() {
										thisMovie(movieName).TGotoFrame('controleJavascript', 3);
										return false
									});
									
									$("#AumentarVolume").click(function() {
										thisMovie(movieName).TGotoFrame('controleJavascript', 4);
										return false
									});
								});
							</script>
							<noscript><p>Seu browser n&atilde; possui suporte a Javascript!</p></noscript>
						</div>
						
						<ul id="controle-flv-player">
							<li><a href="#" id="reproduzir">Reproduzir v&iacute;deo</a></li>
							<li><a href="#" id="pausar">Pausar v&iacute;deo</a></li>
							<li><a href="#" id="diminuirVolume">Diminuir volume</a></li>
							<li><a href="#" id="AumentarVolume">Aumentar volume</a></li>
						</ul>
					</div>
				</div>
				
				<a href="#finalconteudo_ref" id="finalconteudo_ref" class="menu_access_ref">Final do Conte&uacute;do</a>
			</div>
			
			<?php echo $this->element('footer'); ?>
    	</div>
    </body>
</html>