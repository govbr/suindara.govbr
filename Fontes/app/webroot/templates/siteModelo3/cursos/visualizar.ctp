<?php 
    if( isset($this->request['pass'][2]) && !empty($this->request['pass'][2]) ){ // se tiver id noticia
        $idNoticia = $this->request['pass'][2];

        $site = $this->CmsTemplate->getSite();
        $siteId = $site->id;

        $noticia = $this->CmsNoticias->getNoticia($idNoticia);

        if(!$noticia){
          throw new NotFoundException('noticia não encontrada');
        }

        $categoria = $noticia->getCategoria();
    }else{
      throw new NotFoundException('Sem Parametros');
    }
?>

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
              <h2><?php echo $categoria->titulo; ?></h2>
            </div>
          </div>
        </div>
        
        <div class="container cinterno">
          
          <!-- Conteudo -->
          <div class="row"> 
            <article class="span12">
              <?php
                $link = $categoria->createPath($categoria->identificador);

                $this->Html->addCrumb($categoria->titulo, $link);
                $this->Html->addCrumb($noticia->titulo);

                echo $this->element('breadcrumb');
              ?>

              <h3><?php echo $noticia->titulo;?></h3>
            </article>

            <div class="clear"></div>

            <article class="post-blog span12">
              <?php 
                $imgs = $noticia->getImagens(true);
                if($imgs){
                    echo $imgs[0]->htmlImagem(TIMG_MEDIA, array('id' => 'foto_principal', 'class' => 'foto_principal'));
                    if(count($imgs) > 1){
                      ?> <ul class="fotos"> <?php
                      foreach ($imgs as $key => $img) {
                          ?> <li><?php echo $img->htmlImagem(TIMG_THUMB); ?></li><?php 
                      }
                      ?> </ul> <?php
                    }
                }
              ?>

              <?php echo $noticia->htmlTexto(); ?>

              <?php 
                $arquivos = $noticia->getArquivos();
                $qntd = count($arquivos);
                if ($arquivos) {
                    ?> <h4>Arquivos para download</h4> <?php
                    if ($qntd == 1) {
                        echo $arquivos[0]->htmlArquivoCustom(true, true); 
                    }else{
                        ?> <ul> <?php 
                        foreach ($arquivos as $arquivo) {
                            ?> <li> <?php echo $arquivo->htmlArquivoCustom(true, true); ?> </li> <?php
                        }
                        ?> </ul> <?php
                    }
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