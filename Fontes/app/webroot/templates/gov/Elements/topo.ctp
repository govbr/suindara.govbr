<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">
	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta http-equiv="content-language" content="pt, pt-br" />

        <meta http-equiv="cache-control" content="public" />
        <meta http-equiv="imagetoolbar" content="no" />
        <meta http-equiv="content-script-type" content="text/javascript" />
        <meta http-equiv="content-style-type" content="text/css" />

        <meta name="DC.title" content="Site Modelo - Acessibilidade Virtual" />
        <meta name="DC.creator" content="" />
        <meta name="DC.creator.address" content="" />
        <meta name="DC.subject" content="" />

        <meta name="DC.description" content="" />

        <meta name="author" content="" />
        <meta name="language" content="pt-br" />
        <meta name="classification" content="Internet" />
        <meta name="robots" content="index, follow" />
        <meta name="rating" content="general" />
        <meta name="copyright" content="" />
        <meta name="doc-rights" content="Public" />

        <meta name="geo.region" content="RS"/>
        <meta name="geo.placename" content="Bento Gon&ccedil;alves" />
        <meta name="distribution" content="Global" />
        <meta name="revisit-after" content="7 day" />
        <meta name="keywords" content="" />

        <?php 
        	$site = $this->CmsTemplate->getSite();
        	$current = $this->CmsTemplate->localizacao();
        	if (empty($current)) {
        		$current = $site->titulo;
        	} else {
        		$current = $site->titulo . ' | ' . $current;
        	}

        	// $menu = $this->CmsMenu->getMenu('GovPrincipal');
        	// $selected = $menu->selectedMenu();
        	// $current = $site->titulo;
        	// if ($selected) {
        	// 	$current = $selected->nome . ' - ' . $current;
        	// } 
        ?>

		<title><?php echo $current; ?></title>
		<link rel="shortcut icon" href="<?php echo $this->CmsTemplate->imagemPath('favicon.ico') ?>" type="image/x-icon" />
		
		<link media="all" rel="stylesheet" type="text/css" href="<?php echo $this->CmsTemplate->cssPath('reset-cachekey-7d1b9a7b690892ab1da35eb62e5377b9') ?>" />
		<link media="all" rel="stylesheet" type="text/css" href="<?php echo $this->CmsTemplate->cssPath('base-cachekey-62c2e3ccc7f8d6c3a39586d5d2ed9e64') ?>" />
		<link media="all" rel="stylesheet" type="text/css" href="<?php echo $this->CmsTemplate->cssPath('style') ?>" />
		<link media="all" rel="stylesheet" type="text/css" href="<?php echo $this->CmsTemplate->cssPath('resourceProducts.Doormat.stylesheetsdoormat-cachekey-6fa958c4e9b299976fc3e04588a4ca51') ?>" />

		<script type="text/javascript" src="<?php echo $this->CmsTemplate->jsPath('jquery-1.9.1') ?>"></script>
		<script type="text/javascript" src="../../js/swfobject.js"></script>
		<script type="text/javascript" src="<?php echo $this->CmsTemplate->jsPath('menu') ?>"></script>
		<script type="text/javascript" src="<?php echo $this->CmsTemplate->jsPath('resourcejquery.cookie-cachekey-3a4eab0979b03e37fd19d9502c7fff18') ?>"></script>		
	</head>
	
	<body class="template-view portaltype-collective-cover-content site-portal section-home userrole-anonymous">
		<div id="barra-brasil">
			<a href="http://brasil.gov.br">Portal do Governo Brasileiro</a>
		</div>
		
		<div id="wrapper">
			<!-- HEADER -->
			<div id="header">
				<div>
					<ul id="accessibility">
						<li>
							<a accesskey="1" href="#content" id="link-conteudo"> Ir para o conteúdo <span>1</span> </a>
						</li>
						<li>
							<a accesskey="2" href="#navigation" id="link-navegacao"> Ir para a navegação <span>2</span> </a>
						</li>
						<li>
							<a accesskey="3" href="#portal-searchbox" id="link-buscar"> Ir para a Busca <span>3</span> </a>
						</li>
						<li>
							<a accesskey="4" href="#footer" id="link-rodape"> Ir para o rodapé <span>4</span> </a>
						</li>
					</ul>
					
					<ul id="portal-siteactions">
						<li id="siteaction-accessibility">
							<a href="<?php echo $this->CmsTemplate->path('acessibilidade') ?>" accesskey="5">Acessibilidade</a>
						</li>
						
						<li id="siteaction-contraste">
							<a href="#" accesskey="6">Alto Contraste</a>
						</li>
						
						<li id="siteaction-mapadosite">
							<a href="<?php echo $this->CmsTemplate->path('mapa') ?>" accesskey="7">Mapa do Site</a>
						</li>
					</ul>
										
					<h1 id="logo">						
						<?php 
							$site = $this->CmsTemplate->getSite();
						?>
						
						<a id="portal-logo" title="O Portal do Brasil" href="<?php echo $this->CmsTemplate->raizSite()?>">
							<span id="portal-title" class="corto"><?php echo $site->titulo ?></span>
							<span id="portal-description"><?php echo $site->instituicao ?></span>
						</a>
					</h1>
					
					<div id="portal-searchbox">
						<form id="nolivesearchGadget_form" action="<?php echo $this->CmsTemplate->raizSite()?>pesquisar" method="post">
							<fieldset class="LSBox">
								<legend class="hiddenStructure">Buscar no Site</legend>
								
								<label class="hiddenStructure" for="SearchableText">Busca</label>
								<input name="textoBusca" type="text" size="18" title="Buscar no Site" value="Buscar no Site" class="searchField" id="nolivesearchGadget" />
								
								<input class="searchButton" type="submit" value="Buscar" />
							</fieldset>
						</form>
					</div>
					
					<div id="social-icons">
						<ul>							
							<?php
								$menu = $this->CmsMenu->getMenu('GovRodape')->getSubMenu('Redes sociais');
								$cssCompl = array('twitter', 'youtube', 'facebook', 'flickr');
								
								foreach ($menu->getItens() as $i => $it) {
								
								$complemento = $cssCompl[$i];	
							 ?>
							
								<li id="portalredes-<?php echo $complemento ?>" class="portalredes-item">
									<a href="#" title="<?php echo $it->nome ?>"><img alt="<?php echo $it->nome ?>" src="<?php echo $this->CmsTemplate->imagemPath("icone-{$complemento}.png") ?>" /></a>
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>
				
				<div id="sobre">
					<ul>
						<?php 
							$menu = $this->CmsMenu->getMenu('GovTopo')->getSubMenu('Serviços');
							foreach ($menu->getItens() as $it) {
						?>
						
							<li class="portalservicos-item">
								<a href="<?php echo $it->getLink() ?>"><?php echo $it->nome ?></a>
							</li>
						
						<?php }	?>
					</ul>
				</div>
			</div>