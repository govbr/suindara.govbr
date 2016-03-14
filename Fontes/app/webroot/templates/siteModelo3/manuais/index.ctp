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
      
      <!-- content -->
      <a id="conteudo_ref" href="#conteudo_ref" class="menu_access_ref">In&iacute;cio do Conte&uacute;do</a>
      <div id="content">

        <!-- Topo -->
        <div class=" interno">
          <div class="center">
            <div class="block-slogan">
              <h2>Manuais</h2>
            </div>
          </div>
        </div>
        
        <div class="container cinterno">
          <!-- Conteudo -->
          <div class="row"> 
            <article class="span12">
              <?php
                $this->Html->addCrumb('Manuais');
                echo $this->element('breadcrumb');
              ?>

              <h3>Últimos manuais</h3>
            </article>
          </div>

          <?php 
                $categoria_manuais = $this->CmsCategorias->getCategoria("manuais");
                if($categoria_manuais){
                  $filhos = $categoria_manuais->getFilhos();

                  if($filhos){
                      foreach ($filhos as $index => $filho) {

                        $noticias = null;
                        $noticias = $filho->getNoticiasRecentes(3);

                        if($noticias){
          ?>
                        <div class="row">
                          <article class="span12 inner-1">
                            <h4>
                              <a href="<?php echo $filho->createPath('manuais', 'listar'); ?>">
                                <?php echo $filho->titulo; ?> 
                                <?php echo '(' . count($filho->getNoticias()) . ' <span class=\'oculto\'> Postagens </span>' . ')' ?>
                              </a>
                            </h4>
                            <!-- <p><?php echo $filho->descricao; ?></p> -->
                          </article>

                          <div class="clear"></div>

                          <ul class="thumbnails thumbnails-1 list-services">

                          <?php 
                            if($noticias){
                              foreach ($noticias as $index => $noticia) {
                          ?>

                            <li class="span4">
                              <div class="thumbnail thumbnail-1"> 
                                <section> 
                                  <h5><a href="<?php echo $noticia->createPath('manuais', 'visualizar'); ?>" class="link-1"><?php echo $noticia->titulo; ?></a></h5>
                                  <p><?php echo $noticia->htmlResumo(); ?></p>
                                </section>
                              </div>
                            </li>

                          <?php 
                              }
                            }
                          ?>
                          </ul>
                        </div>
          <?php
                      }
                    }
                  }
                }
          ?>

        </div>
      </div>
      <a id="finalconteudo_ref" href="#finalconteudo_ref" class="menu_access_ref">Final do Conte&uacute;do</a>

      <a href="#menu_ref" class="bt_voltar_topo">Voltar ao topo</a>
    </div>

    <!-- footer -->
    <?php echo $this->element('footer'); ?>

  </body>
</html>