<?php 
    if( isset($this->request['pass'][2]) && !empty($this->request['pass'][2]) ){
        
        $idCategoria = $this->request['pass'][2];
        $categoriaNome = $this->CmsCategorias->getCategoria($idCategoria);

        if(!$categoriaNome){
          throw new NotFoundException('Categoria não encontrada');
        }else{
          $site = $this->CmsTemplate->getSite();
          $siteId = $site->id;

          if($categoriaNome->site_id != $siteId){
            throw new NotFoundException('Categoria de outro site');
          }

          $categoriaPai = $categoriaNome->getCategoriaPai();
          if(!$categoriaPai){
            if($categoriaNome->identificador != 'projetos'){
              throw new NotFoundException('Categoria não é projetos'); 
            }
          }else{
            if($categoriaPai->identificador != 'projetos'){
              throw new NotFoundException('Categoria não é filho de projetos');    
            }
          }
        }
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
              <h2>Projetos</h2>
            </div>
          </div>
        </div>
        
        <div class="container cinterno">
          <!-- Conteudo -->
          <div class="row"> 
            <article class="span12">
              <?php
                if($categoriaPai){
                  $this->Html->addCrumb($categoriaPai->titulo, $categoriaNome->createPath('projetos'));
                }
                
                $this->Html->addCrumb($categoriaNome->titulo);

                echo $this->element('breadcrumb');
              ?>

              <h3><?php echo $categoriaNome->titulo; ?></h3>
            </article>
          </div>

          <?php $noticias = $categoriaNome->getNoticiasRecentes(10); ?>

          <div class="row">
            <ul class="thumbnails thumbnails-1 list-services">
              <?php
                if($noticias){
                    foreach ($noticias as $noticia) {
              ?>
                      <li class="span4">
                        <div class="thumbnail thumbnail-1">
                          <section> 
                            <h4><a href="<?php echo $noticia->createPath('projetos', 'visualizar'); ?>" class="link-1"><?php echo $noticia->titulo; ?></a></h4>
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

        </div>
      </div>
      <a id="finalconteudo_ref" href="#finalconteudo_ref" class="menu_access_ref">Final do Conte&uacute;do</a>

      <a href="#menu_ref" class="bt_voltar_topo">Voltar ao topo</a>
    </div>

    <!-- footer -->
    <?php echo $this->element('footer'); ?>

  </body>
</html>