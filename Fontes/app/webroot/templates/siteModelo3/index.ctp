<!DOCTYPE html>

<html lang="pt-BR">
  
  <?php echo $this->element('head'); ?>
  
  <body>
	<!-- barra de acessibilidade -->
	<div id="panel">
		<div class="navbar navbar-inverse navbar-fixed-top" id="advanced" style="margin-top: 0px; position: relative; ">
			<span class="trigger">
			  <strong></strong>
			  <em></em>
			</span>

			<?php echo $this->element('barra_acessibilidade'); ?>
		</div>
	</div> 

	<!-- header -->
	<header>
	  <div class="container clearfix">
		<div class="row">
		  <div class="span12">
			<div class="navbar navbar_">
			  <div class="container">

				<!-- Logo -->
				<?php echo $this->element('logo_branco'); ?>

				<!-- Menu -->
				<?php echo $this->element('menu'); ?>

			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</header>

	<div class="bg-content">
	  
	  <!-- Topo -->
	  <div class="container">
		<div class="row">
		  <div class="span12"> 
			<img src="<?php echo $this->CmsTemplate->imagemPath('topo-art.png') ?>" class="topo_art" alt="" />
		  </div>
		</div>
	  </div>
	  
	  <!-- content -->
	  <a id="conteudo_ref" href="#conteudo_ref" class="menu_access_ref">In&iacute;cio do Conte&uacute;do</a>
	  <div id="content" class="content-extra">

		<div class="ic"></div>
		
		<div class="row-1">
		  <div class="container">
			<div class="row">
			
			  <?php 
			  	$menu_principal = $this->CmsMenu->getMenu('menu_principal_horizontal'); 
			  	$menu_noticia = $menu_principal->getSubMenu('noticias');
			  	$link = $menu_noticia->getLink();
			  ?>

			  <!-- Noticias -->
			  <article class="span12">
				<h2><a href="<?php echo $link; ?>">Últimas notícias</a></h2>
			  </article>
			  
			  <ul class="thumbnails thumbnails-1">

			  <?php 
				$categoria_noticia = $this->CmsCategorias->getCategoria('noticias'); 

				if($categoria_noticia){
				  $noticias = $categoria_noticia->getNoticiasRecentesFilhos(4);

				  if($noticias){
					foreach ($noticias as $nt) {
			  ?>
					  <li class="span3">
						<div class="thumbnail thumbnail-1">

						  <?php 
								$img_destaque = $nt->getImagemDestaque();
								if($img_destaque){
									echo $img_destaque->htmlImagem(TIMG_MEDIA);
								}else{
						  ?>
						  	        <img alt="Imagem indisponível" src="<?php echo $this->CmsTemplate->imagemPath('file-example-01.jpg') ?>" />
                          <?php
                                }
                          ?>

						  <section>
							<h3><a href="<?php echo $nt->getPath(); ?>"><?php echo $nt->titulo; ?></a></h3>
							<div class="meta">
								<time datetime="2012-11-09" class="date-1"><i class="icon-calendar"></i> <?php echo $nt->htmlDataPublicacao(DATA_PONTO); ?></time>
								<div class="name-author">
									<i class="icon-user"></i> Projeto Acessibilidade Virtual<?php //echo $nt->htmlAutor() ?>
								</div>
							</div>

							<div class="clear"></div>

							<p><?php echo $nt->htmlCartola(); ?></p>
						  </section>
						</div>
					  </li>
			  <?php 
					}
				  }
				}
			  ?>

			  </ul>

			</div>
		  </div>
		</div>

		<!-- Download Site -->
		<div class="row-2">
		  <div class="container">
			<h2>Download Site Modelo</h2>
			<p>Clique no botão abaixo e faça download do site modelo, disponibilizado sob licença GPL</p>
			<a href="<?php echo $this->CmsTemplate->arquivoPath('zip/site_modelo_3.zip') ?>" class="btn btn-1">Download do Site Modelo</a>
		  </div>
		</div>

		<div class="row-1 espaco">
		  <div class="container">
			<div class="row">
			  
			  <!-- Projetos -->
			  <article class="span4">
			  <?php 
			  	$categoria_projetos = $this->CmsCategorias->getCategoria('projetos');

			  	if($categoria_projetos){
			  ?>
			  		<h3><?php echo $categoria_projetos->titulo; ?></h3>
					<!--<p><?php echo $categoria_projetos->descricao; ?></p>-->
					<ul class="projetos">
			  <?php
			  		$projetos_recentes = $categoria_projetos->getNoticiasRecentesFilhos(4);

			  		if($projetos_recentes){
			  			foreach ($projetos_recentes as $noticia) {
			  				if($noticia){
			  ?>
			  					<li>
									<a href="<?php echo $noticia->createPath('projetos', 'visualizar'); ?>"> <!-- Falta colocar Link -->
									  <?php echo $noticia->titulo; ?>
									  <span><?php echo $noticia->cartola; ?></span>
									</a>
								</li>
			  <?php
			  				}
			  			}
			  		}
			  		?> </ul> <?php 
			  	}
			  ?>
			  	<a href="<?php echo $categoria_projetos->createPath('projetos'); ?>" class="btVejaMais">Veja todos projetos</a>
			  </article>

			  <!-- Manuais -->
			  <article class="span4">
			  <?php 
			  	$categoria_manuais = $this->CmsCategorias->getCategoria('manuais'); 

			  	if($categoria_manuais){
			  ?>
			  		<h3><?php echo $categoria_manuais->titulo; ?></h3>
					<!--<p><?php echo $categoria_manuais->descricao; ?></p>-->
					<ul class="manuais">
					<?php 
						$categorias_manuais_filhos = $categoria_manuais->getFilhos();

						if($categorias_manuais_filhos){
							foreach ($categorias_manuais_filhos as $cmf) {
							
								$noticia = $cmf->getNoticiasRecentes(1);

								if($noticia){
			  ?>
										<li>
											<a href="<?php echo $noticia[0]->createPath('manuais', 'visualizar'); ?>"> <!-- Falta colocar Link -->
											  <?php echo $noticia[0]->titulo; ?>
											  <span><?php echo $noticia[0]->cartola; ?></span>
											</a>
										</li>
			  <?php
								}
							}
						}
					?> </ul> <?php
			  	}
			  ?>
			  	<a href="<?php echo $categoria_manuais->createPath('manuais'); ?>" class="btVejaMais">Veja todos manuais</a>
			  </article>


			  <!-- Publicações -->
			  <article class="span4">
			  <?php  
				$categoria_publicacoes = $this->CmsCategorias->getCategoria('publicacoes'); 

				if($categoria_publicacoes){
			  ?> 
			  	<h3><?php echo $categoria_publicacoes->titulo; ?></h3>  
			  	<!--<p><?php echo $categoria_publicacoes->descricao; ?></p>-->
			  	<ul class="manuais">

			  <?php 
				$noticias = $categoria_publicacoes->getNoticiasRecentes(3);
					if($noticias){
						foreach ($noticias as $nt) {
			  ?>
							<li>
								<a href="<?php echo $nt->createPath('publicacoes', 'visualizar'); ?>">   <!-- Falta os links -->
								  	<?php echo $nt->titulo; ?>
								  	<span><?php echo $nt->cartola; ?></span>
								</a>
							</li> 
			  <?php
						}
					}
					?> </ul> <?php
				}
			  ?>
			  	<a href="<?php echo $categoria_publicacoes->createPath('publicacoes'); ?>" class="btVejaMais">Veja todas publicações</a>
			  </article>
	  
			  <div class="clear"></div>
		 
			</div>
		  </div>
		</div>

		<!-- Rodape -->
		<div class="container rodape">
		  <div class="row">
		 
			<!-- Encpntrenos -->
			<article class="span6">
			  <h3>Lorem ipsum</h3>
			  
			  <div class="wrapper">
				<div class="inner-1 overflow extra">
				  <p class="txt-1">Lorem ipsum dolor sit amet, <br />Lorem ipsum dolor sit amet <br /> Telefone: <a href="tel:+Lorem ipsum">Lorem ipsum</a> <br /> E-mail: <a href="mailto:Lorem ipsum">Lorem ipsum</a></p>
				</div>
			  </div>
			</article>

			<!-- Banners -->
			<article class="span6">

			<?php $grupo = $this->CmsBanners->getGrupo('Página Inicial'); ?>

			<?php
				if(!empty($grupo)){
					$banners = $grupo->getBanners();

					if(!empty($banners)){
			?>
					<ul class="banners">

					<?php  
						foreach ($banners as $banner) {
							$url = $banner->htmlBanner();

							echo '<li>' . $url . '</li>';  
						}
					?>
					</ul>
					<?php 
					}
				}
			?>
			</article>
		  </div>
		</div>
	  </div>
	  <a id="finalconteudo_ref" href="#finalconteudo_ref" class="menu_access_ref">Final do Conte&uacute;do</a>

	  <a href="#menu_ref" class="bt_voltar_topo">Voltar ao topo</a>
	</div>

	<!-- footer -->
	<?php echo $this->element('footer'); ?>

  </body>
</html>