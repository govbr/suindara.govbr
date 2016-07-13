<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>

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
		<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
	    	<title>CMS Suindara | <?php if ($this->params['action'] == 'admin_meus_sites') echo "Gerenciar sites";
                                        elseif ($this->params['action'] == 'admin_login') echo "Acesso";
                                        else echo $title_for_layout; ?></title>
    	
		<?php
			echo $this->Html->meta('icon');

			echo $this->Html->css(array('principal', '1140/1140', 'jPages', 'animate', 'resolucoes', 'hacks-safari'));
			echo $this->Html->script(array('jquery-1.10.1.min', 'jquery-migrate-1.2.1.min', 'jquery.cookie', 'jquery.hotkeys-1.4.2.min', 'swfobject', 'css3.mediaqueries', 'admin'));

			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
		?>
        <!-- 1140px Grid styles for IE -->
		<!--[if lte IE 9]><?php echo $this->Html->css('1140/ie'); ?><![endif]-->
</head>

<body>
	<div id="topo" class="topologin">
		<div class="row">
            <div class="fourcol"></div>
            <div class="fourcol"></div>
        	<ul id="atalhos" class="fourcol last">
                <li><a href="#iniciodoconteudo">Conte&uacute;do [1]</a></li>
            </ul>
		</div>
	</div>

	<div id="principal">
        <div class="row">
            <h1 class="error">CMS Suindara</h1>
            
            <a id="iniciodoconteudo" href="#iniciodoconteudo" accesskey="1" class="oculto">Início do Conteúdo</a>
            <div class="content">
                <div class="content form login">

                	<h2><?php echo $name; ?></h2>

					<div class="desc-error">
					    <p>Erro interno, isso pode ter acontecido porque:</p>

					    <ul>
					        <li>» O programador esqueceu de implementar alguma função</li>
					        <li>» Terminou o café</li>
					        <li>» Cancelaram nossos salários</li>
					    </ul>

					    <?php
							if (Configure::read('debug') > 0):
								echo $this->element('exception_stack_trace');
							endif;
						?>

						<?php 
	                        if (Configure::read('debug') > 0){
	                            echo $this->element('sql_dump'); 
	                        }
                        ?>
					</div>

                    
                </div>
                
                <p>Utilize o menu para retomar a navegação.</p>
			</div>
    	</div>
    	
    	<div id="rodape" class="row">
			<p class="sixcol"><span>Suindara</span> | Sistema de gest&atilde;o de conte&uacute;dos</p>
			<ul class="sixcol last">
                <li><?php echo $this->Html->link('Contato', array('admin' => true, 'plugin' => 'informacoes', 'controller' => 'contato', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link('Documentação', '/files/manual.pdf'); ?></li>
				<li><?php echo $this->Html->link('FAQ', array('admin' => true, 'plugin' => 'informacoes', 'controller' => 'pages', 'action' => 'display', 'faq')); ?></li>
			</ul>
		</div>
    </div>
</body>
</html>
