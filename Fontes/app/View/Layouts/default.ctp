<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">
<head>
	<!-- META -->
	<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta http-equiv="content-language" content="pt, pt-br" />

        <meta http-equiv="cache-control" content="public" />
        <meta http-equiv="imagetoolbar" content="no" />
        <meta http-equiv="content-script-type" content="text/javascript" />
        <meta http-equiv="content-style-type" content="text/css" />

        <meta name="DC.title" content="CMS Suindara" />
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
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <!-- TITLE -->
		<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
            <!-- <title>CMS Suindara <?php echo ($this->params['action'] == 'admin_display' && $this->params['controller'] == 'pages' ) ? "- Pagina inicial" : $title_for_layout ?></title> -->
		<?php
			echo $this->Html->meta('icon');

			echo $this->Html->css(array('principal', '1140/1140', 'jPages', 'animate', 'resolucoes', 'hacks-safari'));
			echo $this->Html->script(array('jquery-1.10.1.min', 'jquery-migrate-1.2.1.min', 'jquery.cookie', 'jquery.hotkeys-1.4.2.min', 'swfobject', 'css3.mediaqueries', 'jPages.min', 'jquery.lazyload', 'admin', 'jquery.maskedinput'));

			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
		?>
        <!-- 1140px Grid styles for IE -->
		<!--[if lte IE 9]><?php echo $this->Html->css('1140/ie'); ?><![endif]-->
</head>
    <?php 
        $fonteNome = strtolower($this->Session->read('Auth.User.Fonte.nome'));
        switch($fonteNome){
            case substr($fonteNome, strpos($fonteNome, "verdana"), 7 ) == "verdana": 
                $fonteEdit = "verdana"; break;

            case substr($fonteNome, strpos($fonteNome, "opendyslexic"), 12 ) == "opendyslexic":
                $fonteEdit = "opendyslexic"; break;

            case substr($fonteNome, strpos($fonteNome, "trebuchet"), 9 ) == "trebuchet":
                $fonteEdit = "trebuchet"; break;

            default: $fonteEdit = "arial"; break;            
        }

        $contrasteNome = strtolower($this->Session->read('Auth.User.Contraste.nome') );
        switch($contrasteNome){
            case substr($contrasteNome, strpos($contrasteNome, "preto"), 5 ) == "preto":
                $contrasteEdit = "preto"; 
                echo $this->Html->css('alto-contraste-preto'); 
                break;

            case substr($contrasteNome, strpos($contrasteNome, "azul"), 4 ) == "azul":
                $contrasteEdit = "azul"; 
                echo $this->Html->css('alto-contraste-azul'); 
                break;

            case substr($contrasteNome, strpos($contrasteNome, "verde"), 5 ) == "verde":
                $contrasteEdit = "verde";
                echo $this->Html->css('alto-contraste-verde'); 
                break;

            default: $contrasteEdit = "padrao"; break;
        }

        ?> <body class="<?php echo $fonteEdit . " " . $contrasteEdit ?>" > <?php 
     ?>
	<div id="topo">
		<div class="row">
			<ul class="fourcol">
				<li id="opcoes_acessibilidade"><a class="toggle_menu_acessibilidade" id="toggle_menu_acessibilidade" href="#">Op&ccedil;&otilde;es de acessibilidade <span>Expandir</span></a></li>	
			</ul>

            <?php if($this->Session->read('Auth.User')) { ?>
            <?php 
            $sites = $this->requestAction(array('admin' => true, 'plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'sites'));
            $url = $this->Html->url(array('admin' => true, 'plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'selecionar_site'), true);
            echo $this->Form->create('Usuario', array('class' => 'fourcol', 'url' => $url, 'id' => 'SiteSelectorForm'));
                echo $this->Form->input('Usuario.site_id', array(
                    'label' => array(
                        'class' => 'oculto',
                        'text' => 'Site sendo gerenciado:'
                    ),
                    'escape' => false,
                    'type' => 'select',
                    'id' => 'site',
                    'options' => $sites,
                    'selected' => $this->Session->read('Auth.User.SiteAtual.Site.id')
                    )
                );
            echo $this->Form->submit('Aplicar', array('div' => false, 'class' => 'aplicar', 'id' => 'set_site'));
            echo $this->Form->end();
            ?>
			<ul id="opcoes_usuario" class="fourcol last">
                <li id="usuario" class="threecol">
                    <?php echo $this->Html->link("<span class=\"oculto\">Voc&ecirc; acessou o sistema com o usu&aacute;rio </span>" . $this->Session->read('Auth.User.nome') . "<span class=\"oculto\"> clique aqui para alterar seus dados</span>", array('admin' => true, 'plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'dados_cadastrais'), array('escape' => false)); ?>
                </li>
                <li id="sair" class="onecol last">
                    <?php echo $this->Html->link('Sair', array('admin' => true, 'plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'logout')); ?>
                </li>
			</ul>
            <?php } ?>
		</div>
		<div class="row" id="menu_acessibilidade" <?php echo ($this->Session->read('Auth.User.modo_sistema') == MODO_SISTEMA_PADRAO) ? 'style="display: none;"' : ''; ?>>
            <a id="inicio_menu_acessibilidade"  href="#inicio_menu_acessibilidade" class="oculto">In&iacute;cio do Menu de Acessibilidade</a>
            
            <?php
            if($this->Session->read('Auth.User')) {
                $fontes = $this->requestAction(array('admin' => true, 'plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'fontes'));
                $contrastes = $this->requestAction(array('admin' => true, 'plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'contrastes'));
                
                $url = $this->Html->url(array('admin' => true, 'plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'configuracoes_pessoais'), true);
                
                echo $this->Form->create('Usuario', array('class' => 'sevencol', 'url' => $url));

                echo $this->Form->input('Usuario.fonte_id', array(
                    'label' => array(
                        'class' => 'oculto',
                        'text' => 'Tipo da fonte:'
                    ),
                    'escape' => false,
                    'type' => 'select',
                    'id' => 'fonte',
                    'options' => $fontes,
                    'selected' => $this->Session->read('Auth.User.fonte_id')
                    )
                );
                echo $this->Form->input('Usuario.contraste_id', array(
                    'label' => array(
                        'class' => 'oculto',
                        'text' => 'Tipo de contraste:'
                    ),
                    'escape' => false,
                    'type' => 'select',
                    'id' => 'contraste',
                    'options' => $contrastes,
                    'selected' => $this->Session->read('Auth.User.contraste_id')
                    )
                );
                echo $this->Form->input('Usuario.modo_sistema', array(
                    'label' => array(
                        'class' => 'oculto',
                        'text' => 'Modo do sistema:'
                    ),
                    'escape' => false,
                    'type' => 'select',
                    'id' => 'tema',
                    'options' => array(
                            MODO_SISTEMA_PADRAO => 'Modo padr&atilde;o',
                            MODO_SISTEMA_HTML_PURO => 'Modo HTML b&aacute;sico'
                        ),
                    'selected' => $this->Session->read('Auth.User.modo_sistema')
                    )
                );
                echo $this->Form->submit('Aplicar', array('div' => false, 'class' => 'aplicar', 'id' => 'set_acessibilidade'));
                echo $this->Form->end();
            }
            ?>
			
			<ul id="atalhos" class="fivecol last">
				<li><a href="#iniciodoconteudo">Conte&uacute;do [1]</a></li>
				<li><a href="#iniciodomenu">Menu [2]</a></li>

                <?php 
                    if ( $this->params['controller'] != 'acos' && $this->params['action'] != 'admin_display' && $this->params['controller'] != 'permissoes' && $this->params['controller'] != 'usuarios')
                    {
                ?>
                    <li><a href="#pesquisa">Pesquisa [3]</a></li>
                <?php 
                    }

                ?>

                <li><?php echo $this->Html->link('Acessibilidade [4]', array('admin' => true, 'plugin' => 'informacoes', 'controller' => 'pages', 'action' => 'acessibilidade'), array('id' => 'acessibilidade')); ?></li>
			</ul>

            <a href="#final_menu_acessibilidade" id="final_menu_acessibilidade" class="oculto">Final do Menu de Acessibilidade</a> 
		</div>
	</div>

    <?php echo $this->Session->flash(); ?>
    <?php if(isset($errors) && is_array($errors) & !empty($errors)){ echo $this->Element('list_errors', array('errors' => $errors)); } ?>

	<div id="principal">
    	<div class="row">
    		<div class="threecol">
    			<h1>
    				<?php echo $this->Html->link('CMS Suindara', array(
							'admin' => true,
							'plugin' => 'informacoes',
							'controller' => 'pages',
							'action' => 'display',
							'home'
						));
					?>
				</h1>
    			
    			<a id="iniciodomenu"  href="#iniciodomenu" accesskey="2" class="oculto">In&iacute;cio do Menu</a>
				<?php echo $this->CmsMenu->adminMenus(); ?>
				<a href="#finaldomenu" id="finaldomenu" class="oculto">Final do Menu</a> 
    		</div>
    		
    		<div class="ninecol last">
                <div class="row">
                    Voc&ecirc; est&aacute; em:

                <?php
                echo $this->Html->getCrumbList(array('separator' => ' / ', 'id' => 'breadcrumb'), array(
                        'text' => $this->Session->read('Auth.User.SiteAtual.Site.dominio'),
                        'url' => array(
                            'admin' => true,
                            'plugin' => 'informacoes',
                            'controller' => 'pages',
                            'action' => 'display',
                            'home'
                        )
                    )
                );
                ?>
                </div>
    			
    			<div class="content list">
                    <a id="iniciodoconteudo"  href="#iniciodoconteudo" accesskey="1" class="oculto">In&iacute;cio do Conte&uacute;do</a>

                    <?php echo $this->fetch('content'); ?>
                    
                    <a href="#doconteudo" id="finaldoconteudo" class="oculto">Final do Conte&uacute;do</a> 
    			</div>
    		</div>
    	</div>

    	<div id="rodape" class="row">
			<p class="sixcol"><span>Suindara</span> | Sistema de gest&atilde;o de conte&uacute;dos</p>
			<ul class="sixcol last" >               
				<li><?php echo $this->Html->link('FAQ', array('admin' => true, 'plugin' => 'informacoes', 'controller' => 'pages', 'action' => 'display', 'faq')); ?></li>
                <li><?php echo $this->Html->link('Manuais', array('admin' => true, 'plugin' => 'informacoes', 'controller' => 'pages', 'action' => 'display', 'manuais')); ?></li>
                <li><?php echo $this->Html->link('Contato', array('admin' => true, 'plugin' => 'informacoes', 'controller' => 'contato', 'action' => 'index')); ?></li>
			</ul>
		</div>
    </div>
</body>
</html>