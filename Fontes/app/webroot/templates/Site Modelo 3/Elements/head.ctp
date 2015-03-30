<!DOCTYPE html>

<html lang="pt-br">
  
  <head>

    <!-- META -->
      <!-- <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> -->
      <!-- <meta http-equiv="content-language" content="pt-br"> -->

      <!-- <meta http-equiv="cache-control" content="public"> -->
      <!-- <meta http-equiv="imagetoolbar" content="no"> -->
      <!-- <meta http-equiv="content-script-type" content="text/javascript"> -->
      <!-- <meta http-equiv="content-style-type" content="text/css"> -->

      <!-- <meta name="DC.title" content="Site Modelo - Acessibilidade Virtual"> -->
      <!-- <meta name="DC.creator" content="Projeto de Acessibilidade Virtual"> -->
      <!-- <meta name="DC.creator.address" content="IFRS - Campus Bento Gonçalves, Av, Osvaldo Aranha, 540, Bento Gonçalves, RS – 95700-000, Fone: (54) 3455-3219 "> -->
      <!-- <meta name="DC.subject" content="Acessibilidade Virtual"> -->

      <!-- <meta name="DC.description" content="Site modelo de acessibilidade desenvolvido pelo Projeto de Acessibilidade Virtual"> -->

      <meta name="author" content="Projeto de Acessibilidade Virtual">
      <!-- <meta name="language" content="pt-br"> -->
      <!-- <meta name="Classification" content="Internet"> -->
      <meta name="robots" content="index, follow">
      <meta name="rating" content="general">
      <!-- <meta name="copyright" content=""> -->
      <!-- <meta name="doc-rights" content="Public" /> -->

      <meta name="geo.region" content="RS">
      <meta name="geo.placename" content="Bento Gon&ccedil;alves">
      <!-- <meta name="distribution" content="Global"> -->
      <meta name="revisit-after" content="7 day">
      <meta name="keywords" content="Acessibilidade, Portal Modelo, Site Modelo, e-MAG, PAV, Acessibilidade Virtual, Acessibilidade Web, Tecnologia Assistiva, Pedagógico, Manuais, Projetos, IFRS, IFCE, IFBAIANO">

      <?php 
          $site = $this->CmsTemplate->getSite();
          $current = $this->CmsTemplate->localizacao();
          if (empty($current)) {
            $current = $site->titulo;
          } else {
            $current = $site->titulo . ' | ' . $current;
          }
      ?>

    <!-- TITLE -->
      <link rel="shortcut icon" href="images/favicon.ico" type="img/x-icon" />
      <title><?php echo $current; ?></title>

    <!-- CSS -->
      <link rel="stylesheet" href="<?php echo $this->CmsTemplate->cssPath('bootstrap') ?>" type="text/css" media="screen" />
      <link rel="stylesheet" href="<?php echo $this->CmsTemplate->cssPath('docs') ?>" type="text/css" media="screen" />
      <link rel="stylesheet" href="<?php echo $this->CmsTemplate->cssPath('responsive') ?>" type="text/css" media="screen" />
      <link rel="stylesheet" href="<?php echo $this->CmsTemplate->cssPath('style') ?>" type="text/css" media="screen" />
      <link rel="stylesheet" href="<?php echo $this->CmsTemplate->cssPath('touchTouch') ?>" type="text/css" media="screen" />
      <link rel="stylesheet" href="<?php echo $this->CmsTemplate->cssPath('kwicks-slider') ?>" type="text/css" media="screen" />
      <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans:400,300'  type='text/css' media="screen" />

    <!-- JS -->
      <script type="text/javascript" src="<?php echo $this->CmsTemplate->jsPath('jquery') ?>"></script>
      <script type="text/javascript" src="<?php echo $this->CmsTemplate->jsPath('superfish') ?>"></script>
      <script type="text/javascript" src="<?php echo $this->CmsTemplate->jsPath('flexslider-min') ?>"></script>
      <script type="text/javascript" src="<?php echo $this->CmsTemplate->jsPath('jquery.kwicks-1.5.1') ?>"></script>
      <script type="text/javascript" src="<?php echo $this->CmsTemplate->jsPath('jquery.easing.1.3') ?>"></script>
      <script type="text/javascript" src="<?php echo $this->CmsTemplate->jsPath('jquery.cookie') ?>"></script>    
      <script type="text/javascript" src="<?php echo $this->CmsTemplate->jsPath('touchTouch.jquery') ?>"></script>

      <script type="text/javascript" src="<?php echo $this->CmsTemplate->jsPath('menu') ?>"></script>
      <script type="text/javascript" src="<?php echo $this->CmsTemplate->jsPath('jquery.hotkeys-1.4.2.min') ?>"></script>
      <script type="text/javascript" src="<?php echo $this->CmsTemplate->jsPath('acessibilidade') ?>"></script>
      <script type="text/javascript" src="<?php echo $this->CmsTemplate->jsPath('bootstrap') ?>"></script>

    <!--[if lt IE 8]>
        <div style='text-align:center'><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/img/upgrade.jpg"border="0"alt=""/></a></div>  
    <![endif]-->

    <!--[if (gt IE 9)|!(IE)]><!-->
    <!--<![endif]-->

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <link rel="stylesheet" href="css/docs.css" type="text/css" media="screen">
      <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>
    <![endif]-->
  </head>
  
  <body>

    <!-- Barra de Acessibilidade -->
    <?php echo $this->element('barra_acessibilidade'); ?>

    <!-- header -->

    <a id="navegacao_ref" class="menu_access_ref" accesskey="2" href="#menu_ref" title="Início do Navegação">Início da Navegação</a>
    <header>
      <div class="container clearfix">
        <div class="row">
          <div class="span12">
            <div class="navbar navbar_">
              <div class="container">

                <!-- Logo -->
                <h1 class="brand brand_">
                  <a href="#">
                    <img src="<?php echo $this->CmsTemplate->imagemPath('logo-branco.png') ?>" alt="" />
                  </a>
                </h1>

                <!-- Menu -->
                <?php echo $this->element('menu'); ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </header>