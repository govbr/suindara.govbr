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

        <div class="navbar-inner">
          <div class="container">
            <div class="nav-collapse collapse nav-top-collapse">
              <ul class="nav">
                <li class="">
                  <a accesskey="1" href="#conteudo_ref" id="link-conteudo"> Ir para o conte&uacute;do <span>(1)</span> </a>
                </li>
                <li class="">
                  <a accesskey="2" href="#menu_ref" id="link-navegacao"> Ir para a navega&ccedil;&atilde;o <span>(2)</span> </a>
                </li>

                <li class="divider-vertical"></li>
                
                <li class="">
                  <a accesskey="4" href="acessibilidade.html">Acessibilidade <span>(4)</span></a>
                </li>
                <li class="">
                  <a accesskey="5" href="#" id="contraste">Alto Contraste <span>(5)</span></a>
                </li>
                <li>
                  <a accesskey="6" href="mapa-do-site.html">Mapa do Site <span>(6)</span></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- header -->
    <header>
      <div class="container clearfix">
        <div class="row">
          <div class="span12">
            <div class="navbar navbar_">
              <div class="container menor">

                <!-- Logo -->
                <h1 class="">
                  <a href="#">
                    <img src="img/logo-preto.png" alt="PAV - Projeto de Acessibilidade Virtual" />
                  </a>
                </h1>

                <!-- Menu -->
                <a class="btn btn-navbar btn-navbar_" data-toggle="collapse" data-target=".nav-collapse_">Menu <span class="icon-bar"></span></a>
                
                <div class="nav-collapse nav-collapse_  collapse">
                  <a id="menu_ref"  href="#menu_ref" class="menu_access_ref">In&iacute;cio do Menu</a>
                  <ul class="nav sf-menu">
                    <li><a href="index.html">Página Inicial</a></li>
                    <li><a href="quem-somos.html">Quem-somos</a></li>
                    <li><a href="noticias.html">Notícias</a></li>
                    <li><a href="manuais.html">Manuais</a></li>
                    <li><a href="cursos.html">Cursos</a></li>
                    <li><a href="projetos.html">Projetos</a></li>
                    <li><a href="publicacoes.html">Publicações</a></li>
                    <li><a href="contato.html">Contato</a></li>
                  </ul>
                  <a id="finaldomenu" href="#finaldomenu" class="menu_access_ref">Final do Menu</a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <div class="bg-content">  

      <!--  content  -->
      <a id="conteudo_ref" href="#conteudo_ref" class="menu_access_ref">In&iacute;cio do Conte&uacute;do</a>
      <div id="content"> 
       
         <!-- Topo -->
        <div class=" interno">
          <div class="center">
            <div class="block-slogan">
              <h2>Erro 404</h2>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row ">
            <div class="span12">
              <div class="block-404">  
                
                <img class="img-404" src="img/404.jpg" alt="">       
                
                <div class="box-404">
                  <h3>Página não encontrada</h3>          

                  <p>Descrição do erro congue nihil doming id quod mazim placerat facer possim assum orem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy euismod.</p>
                </div>

              </div>
            </div>
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