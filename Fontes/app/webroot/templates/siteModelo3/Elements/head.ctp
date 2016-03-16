<head>
    <!-- META -->
      <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

      <meta name="DC.title" content="Site Modelo - Acessibilidade Virtual" />
      <meta name="DC.creator" content="Projeto de Acessibilidade Virtual" />
      <meta name="DC.creator.address" content="IFRS - Campus Bento Gonçalves, Av, Osvaldo Aranha, 540, Bento Gonçalves, RS – 95700-000, Fone: (54) 3455-3219 " />
      <meta name="DC.subject" content="Acessibilidade Virtual" />

      <meta name="DC.description" content="Site modelo de acessibilidade desenvolvido pelo Projeto de Acessibilidade Virtual" />

      <meta name="author" content="Projeto de Acessibilidade Virtual" />
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
      <meta name="keywords" content="Acessibilidade, Portal Modelo, Site Modelo, e-MAG, PAV, Acessibilidade Virtual, Acessibilidade Web, Tecnologia Assistiva, Pedagógico, Manuais, Projetos, IFRS, IFCE, IFBAIANO" />

    <!-- TITLE -->
      <link rel="shortcut icon" href="<?php echo $this->CmsTemplate->imagemPath('favicon.ico') ?>" type="images/x-icon" />

      <?php $site = $this->CmsTemplate->getSite(); ?>
      <title> <?php echo( !empty($site) ? $site->titulo : '' ); ?> </title>

    <!-- CSS -->
      <link rel="stylesheet" href=" <?php echo $this->CmsTemplate->cssPath('bootstrap') ?> " type="text/css" media="screen" />
      <link rel="stylesheet" href=" <?php echo $this->CmsTemplate->cssPath('responsive') ?> " type="text/css" media="screen" />
      <link rel="stylesheet" href=" <?php echo $this->CmsTemplate->cssPath('style') ?> " type="text/css" media="screen" />
      <link rel="stylesheet" href=" <?php echo $this->CmsTemplate->cssPath('contraste') ?> " type="text/css" media="screen" />
      <link rel="stylesheet" href=" <?php echo $this->CmsTemplate->cssPath('impressao') ?> " type="text/css" media="print" />
      <link rel="stylesheet" href=" <?php echo $this->CmsTemplate->cssPath('docs') ?> " type="text/css" media="screen" />
      <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans:400,300'  type='text/css' media="screen" />

    <!-- JS -->
      <script type="text/javascript" src=" <?php echo $this->CmsTemplate->jsPath('wl-min') ?> "></script>
      <script type="text/javascript" src=" <?php echo $this->CmsTemplate->jsPath('jquery') ?> "></script>
      <script type="text/javascript" src=" <?php echo $this->CmsTemplate->jsPath('jquery.cookie') ?> "></script>    
      <script type="text/javascript" src=" <?php echo $this->CmsTemplate->jsPath('bootstrap') ?> "></script>
      <script type="text/javascript" src=" <?php echo $this->CmsTemplate->jsPath('jquery.hotkeys-1.4.2.min') ?> "></script>
      <script type="text/javascript" src=" <?php echo $this->CmsTemplate->jsPath('acessibilidade') ?> "></script>
      <script type="text/javascript" src=" <?php echo $this->CmsTemplate->jsPath('util') ?> "></script>

      <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-35788343-1']);
        _gaq.push(['_trackPageview']);
      
        (function() {
          var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
          ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
          var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
      
      </script>

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