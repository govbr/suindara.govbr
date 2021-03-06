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
              <div class="container menor">

                <!-- Logo -->
                <?php echo $this->element('logo_preto'); ?>

                <!-- Menu -->
                <?php echo $this->element('menu'); ?>

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
              <h2>Not&iacute;cias</h2>
            </div>
          </div>
        </div>

        <div class="ic"></div>
        
        <div class="container cinterno">
          <div class="row">

            <!-- Conteudo -->
            <article class="span12">
              <?php
                $this->Html->addCrumb('Notícias');
                echo $this->element('breadcrumb');
              ?>

              <h3>Últimas notícias</h3>
            </article>

            <div class="clear"></div>
          
            <article class="span9">
              <div class="inner-1"> 
                <ul class="list-blog">  
              <?php 
                    $categoria_noticia = $this->CmsCategorias->getCategoria('noticias'); 
                    if($categoria_noticia){
                      $filhos = $categoria_noticia->getFilhos();

                      if($filhos){
                        foreach ($filhos as $index => $filho) {
                            $noticias = null;
                            $noticias = $filho->getNoticiasRecentes(1);

                            if($noticias){
                              foreach ($noticias as $index => $noticia) {
              ?>
                                  <li class="span8">  
                                    <h4><a href="<?php echo $noticia->getPath() ?>"><?php echo $noticia->titulo; ?></a></h4>     
                                    <time datetime="2012-11-09" class="date-1"><i class="icon-calendar"></i><?php echo $noticia->htmlDataPublicacao(DATA_PONTO); ?></time>
                                    <div class="name-author"><i class="icon-user"></i><?php echo $noticia->htmlAutor(); ?></div>
                                    
                                    <div class="clear"></div>            
                              
                                    <?php 
                                        $img_destaque = $noticia->getImagemDestaque();
                                        if($img_destaque){
                                            echo $img_destaque->htmlImagem(TIMG_PEQUENA);
                                        }
                                    ?>

                                    <p><?php echo $noticia->htmlResumo(); ?></p>
                                  </li>  
                  <?php   
                            }
                          }
                        }
                      }
                    }
                  ?>
                </ul>
              </div>  
            </article>

            <?php 
                $categoria = $this->CmsCategorias->getCategoria("noticias");
                $filhos = $categoria->getFilhos();
            ?> 

            <article class="span3">
              <h3>Categorias</h3>
              <ul class="list extra extra1">
                <?php 
                    foreach ($filhos as $filho) {
                ?>
                        <li><a href="<?php echo $filho->getNoticiasPath(); ?>"> <?php echo $filho->titulo; ?> <?php echo '(' . count($filho->getNoticias()) . '<span class=\'oculto\'> Postagens </span>' . ')' ?> </a></li>
                <?php } ?>                   
              </ul>

              <?php 
                $id_filhos = $categoria->getIdFilhos();
                $datas = $this->CmsNoticias->getListDate(12, $id_filhos); 
                
                if($datas){
              ?>
                  <h3>Arquivo</h3>
                  <div class="wrapper">
                    <ul class="list extra2 list-pad ">
              <?php 
                  foreach ($datas as $key => $data) {
                      $atual = current($data);
              ?>
                      <li><a href="<?php echo $this->CmsNoticias->createPath('noticias', 'listar', sprintf('%02d', $atual['mes']) . "/" . $atual['ano']); ?>"><?php echo $this->CmsUtil->getNomeMes($atual['mes']); ?> <?php echo $atual['ano']; ?></a></li>
              <?php
                  }
              ?>
                    </ul>
                  </div>
              <?php
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