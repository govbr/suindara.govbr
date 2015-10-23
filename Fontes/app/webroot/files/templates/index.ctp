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
              <div class="container">

                <!-- Logo -->
                <h1 class="brand brand_">
                  <a href="#">
                    <img src="<?php echo $this->CmsTemplate->imagemPath('logo-branco.png') ?> " alt="PAV - Projeto de Acessibilidade Virtual" />
                  </a>
                </h1>

                <!-- Menu -->
                <a class="btn btn-navbar btn-navbar_" data-toggle="collapse" data-target=".nav-collapse_">Menu <span class="icon-bar"></span></a>
                
                <div class="nav-collapse nav-collapse_  collapse">
                  <a id="menu_ref"  href="#menu_ref" class="menu_access_ref">In&iacute;cio do Menu</a>
                  <ul class="nav sf-menu">
                    <li><a href="index.html" class="selected">Página Inicial</a></li>
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
            
              <!-- Noticias -->
              <article class="span12">
                <h2><a href="noticias.html">Últimas notícias</a></h2>
              </article>
            
              <ul class="thumbnails thumbnails-1">
                <li class="span3">
                  <div class="thumbnail thumbnail-1">
                    <img  src="<?php echo $this->CmsTemplate->imagemPath('file-example-01.jpg') ?>" alt="" />
                    
                    <section> 
                      <h3><a href="#">Titulo lorem ipsum dolor sit amet consep elit</a></h3>
                      <div class="meta">
                        <time datetime="2012-11-09" class="date-1"><i class="icon-calendar"></i> 10.08.14</time>
                        <div class="name-author"><i class="icon-user"></i> Redação</div>
                      </div>

                      <div class="clear"></div>

                      <p>Cartola a Pró-reitoria de Extensão do IFRS lança o livro “Soluções Acessíveis: experiências inclusivas no IFRS”</p>
                    </section>
                  </div>
                </li>

                <li class="span3">
                  <div class="thumbnail thumbnail-1">
                    <img  src=" <?php echo $this->CmsTemplate->imagemPath('file-example-01.jpg') ?> " alt="" />
                    
                    <section> 
                      <h3><a href="#">Titulo lorem ipsum dolor sit amet consep elit</a></h3>
                      <div class="meta">
                        <time datetime="2012-11-09" class="date-1"><i class="icon-calendar"></i> 10.08.14</time>
                        <div class="name-author"><i class="icon-user"></i> Redação</div>
                      </div>

                      <div class="clear"></div>

                      <p>Cartola a Pró-reitoria de Extensão do IFRS lança o livro “Soluções Acessíveis: experiências inclusivas no IFRS”</p>
                    </section>
                  </div>
                </li>

                <li class="span3">
                  <div class="thumbnail thumbnail-1">
                    <img  src="<?php echo $this->CmsTemplate->imagemPath('file-example-01.jpg') ?> " alt="" />
                    
                    <section> 
                      <h3><a href="#">Titulo lorem ipsum dolor sit amet consep elit</a></h3>
                      <div class="meta">
                        <time datetime="2012-11-09" class="date-1"><i class="icon-calendar"></i> 10.08.14</time>
                        <div class="name-author"><i class="icon-user"></i> Redação</div>
                      </div>

                      <div class="clear"></div>

                      <p>Cartola a Pró-reitoria de Extensão do IFRS lança o livro “Soluções Acessíveis: experiências inclusivas no IFRS”</p>
                    </section>
                  </div>
                </li>

                <li class="span3">
                  <div class="thumbnail thumbnail-1">
                    <img  src=" <?php echo $this->CmsTemplate->imagemPath('file-example-01.jpg') ?> " alt="" />
                  
                    <section> 
                      <h3><a href="#">Titulo lorem ipsum dolor sit amet consep elit</a></h3>
                      <div class="meta">
                        <time datetime="2012-11-09" class="date-1"><i class="icon-calendar"></i> 10.08.14</time>
                        <div class="name-author"><i class="icon-user"></i> Redação</div>
                      </div>

                      <div class="clear"></div>

                      <p>Cartola a Pró-reitoria de Extensão do IFRS lança o livro “Soluções Acessíveis: experiências inclusivas no IFRS”</p>
                    </section>
                  </div>
                </li>
              </ul>

            </div>
          </div>
        </div>

        <!-- Download Site -->
        <div class="row-2">
          <div class="container">
            <h2>Download Site Modelo</h2>
            <p>Clique no botão abaixo e faça download do site modelo, disponibilizado sobre as licenças GPL</p>
            <a href="#" class="btn btn-1">Download do Site Modelo</a>
          </div>
        </div>

        <div class="row-1 espaco">
          <div class="container">
            <div class="row">
              
              <!-- Projetos -->
              <article class="span4">
                <h3><a href="projetos.html">Projetos</a></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae mauris et elit sodales.</p>
                <ul class="projetos">
                  <li>
                    <a href="#">
                      Desenvolvendo sites acessiveis - Manual do desenvolvedor
                      <span>Cartola lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                    </a>
                  </li> 
                  <li>
                    <a href="#">
                      Desenvolvendo sites acessiveis - Manual do desenvolvedor
                      <span>Cartola lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                    </a>
                  </li> 
                  <li>
                    <a href="#">
                      Desenvolvendo sites acessiveis - Manual do desenvolvedor
                      <span>Cartola lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                    </a>
                  </li> 
                </ul>
              </article>

              <!-- Manuais -->
              <article class="span4">
                <h3><a href="manuais.html">Manuais</a></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae mauris et elit sodales.</p>
                <ul class="manuais">
                  <li>
                    <a href="#">
                      Desenvolvendo sites acessiveis - Manual do desenvolvedor
                      <span>Cartola lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                    </a>
                  </li> 
                  <li>
                    <a href="#">
                      Desenvolvendo sites acessiveis - Manual do desenvolvedor
                      <span>Cartola lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                    </a>
                  </li> 
                  <li>
                    <a href="#">
                      Desenvolvendo sites acessiveis - Manual do desenvolvedor
                      <span>Cartola lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                    </a>
                  </li> 
                </ul>
              </article>

              <!-- Publicações -->
              <article class="span4">
                <h3><a href="publicacoes.html">Publicações</a></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae mauris et elit sodales.</p>
                <ul class="manuais">
                  <li>
                    <a href="#">
                      Desenvolvendo sites acessiveis - Manual do desenvolvedor
                      <span>Cartola lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                    </a>
                  </li> 
                  <li>
                    <a href="#">
                      Desenvolvendo sites acessiveis - Manual do desenvolvedor
                      <span>Cartola lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                    </a>
                  </li> 
                  <li>
                    <a href="#">
                      Desenvolvendo sites acessiveis - Manual do desenvolvedor
                      <span>Cartola lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                    </a>
                  </li> 
                </ul>
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
              <h3>Encontre-nos</h3>
              
              <div class="wrapper">
                <div class="inner-1 overflow extra">
                  <p class="txt-1">Avenida Osvaldo Aranha, 540, Bairro Juventude na Enologia, Bento Gonçalves, RS, Brasil <br /> Telefone: <a href="#">(54) 3455.3261</a> <br /> E-mail: <a href="#">nav@ifrs.edu.br</a></p>
                </div>
              </div>
            </article>

            <!-- Banners -->
            <article class="span6">
              <ul class="banners">
                <li><a href="#"><img src="img/banner-01.png" alt="Siga nosso Canal no Youtube" /></a></li>
                <li><a href="#"><img src="img/banner-02.png" alt="Acesse nosso Blog: Acessibilidade Virtual" /></a></li>
                <li><a href="#"><img src="img/banner-03.png" alt="Siga nossas Redes Sociais" /></a></li>
              </ul>
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