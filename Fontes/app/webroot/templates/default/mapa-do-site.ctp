<?php echo $this->element('head'); ?>

		<!-- CSS -->
		<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
	    	<link href="<?php echo $this->CmsTemplate->cssPath('post') ?>" rel="stylesheet" type="text/css" media="screen" />
    </head>
    
    <body class="post"> 
    	<div id="principal">
    		
    		<?php echo $this->element('funcionalidades'); ?>
    	
	    	<div id="topo">
				<h1>
					<a href="index.php">Acessibilidade Virtual</a>
					<span>Informa&ccedil;&atilde;o ao alcance de todos</span>
				</h1>
			</div>
			
			<?php echo $this->element('menu'); ?>
			
			<div id="content">	
            	<a id="conteudo_ref" class="menu_access_ref" accesskey="1" href="#conteudo_ref" title="In&iacute;cio do Conte&uacute;do">In&iacute;cio do Conte&uacute;do</a>
            	<p id="breadCrumb">Voc&ecirc; est&aacute; em: <a href="index.php" title="Voltar &aacute; P&aacute;gina inicial">P&aacute;gina inicial</a> / Mapa do site</p>
            	
            	<h2>Mapa do site</h2>
				<ol>
				    <li><a href="#">P&aacute;gina inicial</a></li>
				    <li><a href="#">Quem somos</a></li>
				    <li><a href="#">Not&iacute;cias</a></li>
				    <li><a href="#">Eventos</a></li>
				    <li class="ts"><a href="#">Acessibilidade Web</a>
				    	<ol class="ls">  
				            <li><a href="#">Projetos</a></li>  
				            <li><a href="#">Not&iacute;cias</a></li>  
				            <li><a href="#">Dicas</a></li>  
				            <li><a href="#">Manuais</a></li>
				        </ol> 
					</li>
				    <li class="ts"><a href="#">Pedag&oacute;gico</a>
				    	<ol class="ls"> 
				    		<li><a href="#">Cursos</a></li> 
				            <li><a href="#">Objetos de aprendizagem</a></li>  
				            <li><a href="#">Not&iacute;cias</a></li>
				            <li><a href="#">Manuais</a></li>  
				        </ol>    
				    </li>
				    <li class="ts"><a href="#">Tecnologia Assistiva</a>
				    	<ol class="ls"> 
				            <li><a href="#">Projetos</a></li>  
				            <li><a href="#">Not&iacute;cias</a></li>
				            <li><a href="#">Manuais</a></li>
				        </ol>
				    </li>
				    <li><a href="#">Contato</a></li>
				    <li><a href="mapa-do-site.php">Mapa do site</a></li>
				    <li><a href="dicas-de-acessibilidade.php">Dicas de Acessibilidade</a></li>
				    <li><a href="dicas-leitor-de-tela.php">Dicas Leitor de telas</a></li>
				</ol>
				
				<a href="#finalconteudo_ref" id="finalconteudo_ref" class="menu_access_ref">Final do Conte&uacute;do</a>
			</div>
			
			<?php echo $this->element('footer'); ?>
    	</div>
    </body>
</html>
