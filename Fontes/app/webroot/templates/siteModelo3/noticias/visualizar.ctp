<?php 
    if( isset($this->request['pass'][2]) && !empty($this->request['pass'][2]) ){
        $idNoticia = $this->request['pass'][2];
        $noticia = $this->CmsNoticias->getNoticia($idNoticia);

        if(!$noticia){
          throw new NotFoundException('Noticia não encontrada');
        }else{
            $site = $this->CmsTemplate->getSite();
            $siteId = $site->id;

            if($noticia->site_id != $siteId){
              throw new NotFoundException('Noticia de outro site');
            }

            $categoriaNome = $this->CmsCategorias->getCategoria($noticia->categoria_id);
            $categoriaPai = $categoriaNome->getCategoriaPai();
            if(!$categoriaPai){
              if($categoriaNome->identificador != 'noticias'){
                throw new NotFoundException('Categoria não é noticias'); 
              }
            }else{
              if($categoriaPai->identificador != 'noticias'){
                throw new NotFoundException('Categoria não é filho de noticias');    
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

                <?php echo $this->element('menu'); ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    
    <?php 
      $categoriaNome = $this->CmsCategorias->getCategoria($noticia->categoria_id);
      $categoria_pai = $categoriaNome->getCategoriaPai();
    ?>

    <div class="bg-content">       
      
      <!--  content  -->     
      <a id="conteudo_ref" href="#conteudo_ref" class="menu_access_ref">In&iacute;cio do Conte&uacute;do</a>
      <div id="content">
        
        <!-- Topo -->
        <div class=" interno">
          <div class="center">
            <div class="block-slogan">
              <h2><?php echo ($categoria_pai) ? $categoria_pai->titulo : $categoriaNome->titulo ?></h2>
            </div>
          </div>
        </div>

        <div class="ic"></div>
        
        <div class="container cinterno">
          <div class="row">

            <?php 
                $options = array(
                    'fields'     => array('Categoria.id', 'Categoria.titulo', 'Categoria.descricao', 'Categoria.identificador'),
                    'conditions' => array('Categoria.site_id' => $siteId),
                    'order'      => array('Categoria.lft' => 'ASC'),
                    'url'        => array('controller' => 'Categorias', 'action' => 'index', 'admin' => true)
                );

                $categorias = $this->CmsCategorias->getCategorias($options);

                foreach ($categorias as $categoria) {
                    if($categoria->titulo == $categoriaNome->titulo){
                      $link = $categoria->getNoticiasPath(); 
                    } 
                }
            ?>

            <!-- Conteudo -->
            <article class="span12">
              <?php
                $this->Html->addCrumb(($categoriaPai) ? $categoriaPai->titulo : $categoriaNome->titulo, ($categoriaPai) ? $categoriaPai->createPath('noticias') : $categoriaNome->createPath('noticias') );
                $this->Html->addCrumb($categoriaNome->titulo, $categoriaNome->createPath('noticias', 'listar') );
                $this->Html->addCrumb($noticia->titulo);

                echo $this->element('breadcrumb');
              ?>
              
              <h3><?php echo ($categoria_pai) ? $categoria_pai->titulo : $categoriaNome->titulo ?></h3> 
            </article>

            <div class="clear"></div>
          
            <article class="span12">
              <div class="inner-1 post-blog span12">         
                <h4><?php echo $noticia->titulo;?></h4>     
                
                <time datetime="2012-11-09" class="date-1"><i class="icon-calendar"></i> <?php echo $noticia->htmlDataPublicacao(DATA_PONTO); ?></time>
                <div class="name-author"><i class="icon-user"></i>Projeto Acessibilidade Virtual<?php //echo $noticia->htmlAutor() ?></div>
                
                <div class="clear"></div>            
          
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

                <?php echo $noticia->htmlTexto(array(), false, false); ?> 

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

              </div>  
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
