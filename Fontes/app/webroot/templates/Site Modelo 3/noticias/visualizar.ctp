<?php 
    if( isset($this->request['pass'][2]) && !empty($this->request['pass'][2]) ){ // se ouver id da categoria
        $idNoticia = $this->request['pass'][2];

        $site = $this->CmsTemplate->getSite();
        $siteId = $site->id;

        echo $this->element('head');
?>

    <div class="bg-content">       
      
      <!--  content  -->     
      <a id="conteudo_ref" class="menu_access_ref" accesskey="1" href="#conteudo_ref" title="In&iacute;cio do Conte&uacute;do">In&iacute;cio do Conte&uacute;do</a> 
      <div id="content">
        
        <!-- Topo -->
        <div class=" interno">
          <div class="center">
            <div class="block-slogan">
              <h2>Not&iacute;cias</h2>
              
              <div>
                <p>Aqui você terá acesso a notícias relacionadas á inclusão e acessibilidade, tecnologia assistiva, acessibilidade virtual, entre outros.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="ic"></div>
        
        <div class="container cinterno">
          <div class="row">

            <?php 
                $noticia = $this->CmsNoticias->getNoticia($idNoticia);

                $categoriaNome = $this->CmsCategorias->getCategoria($noticia->categoria_id);

                $options = array(
                    'fields'     => array('Categoria.id', 'Categoria.titulo', 'Categoria.descricao', 'Categoria.identificador'),
                    'conditions' => array('Categoria.site_id' => $siteId),
                    'order'      => array('Categoria.lft' => 'ASC'),
                    'url'        => array('controller' => 'Categorias', 'action' => 'index', 'admin' => true)
                );

                $result = $this->CmsCategorias->getCategorias( $options );


                  foreach ($result as $categoria) {
                      if($categoria->titulo == $categoriaNome->titulo){
                        $link = $categoria->getNoticiasPath(); 
                      } 
                  }
            ?>

            <!-- Conteudo -->
            <article class="span12">
              <h3><?php echo $categoriaNome->titulo; ?></h3>
              <!-- <p class="breadCrumb">Você está em: <a title="Voltar á Página inicial" href="#">Página inicial</a> / <a title="Voltar á Notícias" href="#">Notícias</a> / <a title="Voltar á Categoria" href="#">Categoria</a> / Título da notícia</p> -->
              <?php
                $this->Html->addCrumb('Noticias', $this->CmsTemplate->raizNoticias());
                $this->Html->addCrumb($categoriaNome->titulo, $link);
                $this->Html->addCrumb($noticia->titulo);

                echo $this->element('breadcrumb');
              ?>
            </article>

            <div class="clear"></div>
          
            <article class="span8">
              <div class="inner-1 post-blog">
                <?php 
                    if ($noticia) { 
                ?>
                        
                    <h4><?php echo $noticia->titulo; ?></h4> 
                    <time datetime="2012-11-09" class="date-1"><i class="icon-calendar"></i><?php echo $noticia->htmlDataPublicacao(DATA_PONTO); ?></time>
                    <div class="name-author"><i class="icon-user"></i><?php echo $noticia->htmlAutor() ?></div>    
                    
                    <div class="clear"></div>

                    <?php 
                        $imgs = $noticia->getImagens();
                        if($imgs){
                            foreach ($imgs as $img) {
                                echo $img->htmlImagem(TIMG_MEDIA);
                            }
                        }else{
                    ?>
                            <img alt="" src="<?php echo $this->CmsTemplate->imagemPath('file-example-01.jpg') ?>" />
                    <?php
                        }
                    ?>

                    <p><?php echo $noticia->htmlTexto(); ?></p>

                <?php } ?>  

              </div>  
            </article>

            <article class="span4">
              <h3>Categorias</h3>

              <ul class="list extra extra1">
                <?php 
                    foreach ($result as $categoria) {
                ?>
                        <li><a href="<?php echo $categoria->getNoticiasPath(); ?>"> <?php echo $categoria->titulo; ?> </a></li>
                <?php } ?>
              </ul>

              <!-- Datas -->
              <h3>Arquivo</h3>
              <div class="wrapper">
                <ul class="list extra2 list-pad ">
                  <?php 

                    $options = array(
                        'fields'     => array('Noticia.datahora_prog_pub'),
                        'conditions' => array('Noticia.site_id' => $siteId),
                        'order'      => array('Noticia.datahora_prog_pub' => 'DESC'),
                        'url'        => array('controller' => 'Noticia', 'action' => 'index', 'admin' => true)
                    );

                    $result = $this->CmsNoticias->getNoticias( $options );

                    foreach ($result as $key => $noticia) {
                      $ano = $noticia->getAnoPublicacao();
                      $mes = $noticia->getMesPublicacao();

                      if($key >= 1){
                        --$key;
                        $anoPrev = $result[($key)]->getAnoPublicacao();
                        $mesPrev = $result[($key)]->getMesPublicacao();

                        if($ano != $anoPrev || $mes != $mesPrev){
                            ?>
                            <li><a href="#"><?php echo $mes . ' ' . $ano; ?></a></li>
                            <?php 
                        }
                      }else{
                        ?>
                        <li><a href="#"><?php echo $mes . ' ' . $ano; ?></a></li>
                        <?php 
                      } 

                    }
                  ?>
                </ul>
              </div>
            </article>

          </div>
        </div>
      </div>
      <a href="#finalconteudo_ref" id="finalconteudo_ref" class="menu_access_ref">Final do Conte&uacute;do</a>

      <a href="#" class="bt_voltar_topo">Voltar ao topo</a>
    </div>

    <!-- footer -->
    <?php echo $this->element('footer'); ?>

  </body>
</html>

<?php } ?> 