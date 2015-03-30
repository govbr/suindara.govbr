<?php 
    if( isset($this->request['pass'][2]) && !empty($this->request['pass'][2]) ){ // se ouver id da categoria
        $idNoticia = $this->request['pass'][2];
        echo $this->element('head');
?>
  
  <body>

    <!-- Barra do Governo -->
    <?php echo $this->element('barraGoverno'); ?>

    <!-- header -->
    <header>
      <div class="container clearfix">
        <div class="row">
          <div class="span12">
            <div class="navbar navbar_">
              <div class="container menor">

                <!-- Logo -->
                <h1 class="brand brand_">
                  <a href="#">
                    <img src="<?php echo $this->CmsTemplate->imagemPath('logo-preto.png') ?>" alt="" />
                  </a>
                </h1>

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
      <div id="content">
        
        <!-- Topo -->
        <div class=" interno">
          <div class="center">
            <div class="block-slogan">
              <h2>Eventos</h2>
              
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
            ?>

            <!-- Conteudo -->
            <article class="span12">
              <h3>Últimos eventos</h3>
            </article>

            <div class="clear"></div>
          
            <article class="span8">
                <div class="inner-1">         
                    <ul class="list-blog">
                        <li>  

                        <?php 
                            if ($noticia) { 
                        ?>
                                
                            <h4><a href="<?php echo $noticia->getPath() ?>"><?php echo $noticia->titulo; ?></a></h4> 
                            <time datetime="2012-11-09" class="date-1"><i class="icon-calendar"></i><?php echo $noticia->htmlDataPublicacao(DATA_PONTO); ?></time>
                            <div class="name-author"><i class="icon-user"></i><?php echo $noticia->htmlAutor() ?></div>    
                            
                            <div class="clear"></div>

                            <?php 
                                $imgs = $noticia->getImagens();
                                if($imgs){
                                    foreach ($imgs as $img) {
                                        echo $img->htmlImagem(TIMG_MEDIA);
                                        ?> <!-- <img alt="" src="files/file-example-01.jpg"> --> <?php 
                                    }
                                }
                            ?>

                            <p><?php echo $noticia->htmlTexto(); ?></p>

                        <?php } ?>  

                            <!-- <h4>Morbi ullamcorper leo eget varius elementum</h4>     
                            <time datetime="2012-11-09" class="date-1"><i class="icon-calendar"></i> 9.11.2012</time>
                            <div class="name-author"><i class="icon-user"></i>Admin</div>
                            
                            <div class="clear"></div>            
                      
                            <img alt="" src="files/file-example-01.jpg" />   

                            <p>Morbi ullamcorper, leo eget varius elementum, orci leo feugiat lectus, vitae lobortis mauris velit tempor erat. Etiam eget orci at massa pretium fringilla ac non tortor. Fusce sed velit risus, vitae vehicula quam. Cras at turpis urna, eget volutpat neque. Nullam porttitor, est interdum placerat pharetra, erat sapien aliquet urna, at commodo risus tellus eu nunc.</p>                              
                            <p>Morbi ullamcorper, leo eget varius elementum, orci leo feugiat lectus, vitae lobortis mauris velit tempor erat. Etiam eget orci at massa pretium fringilla ac non tortor. Fusce sed velit risus, vitae vehicula quam. Cras at turpis urna, eget volutpat neque. Nullam porttitor, est interdum placerat pharetra, erat sapien aliquet urna, at commodo risus tellus eu nunc.</p>                               
                            <p>Morbi ullamcorper, leo eget varius elementum, orci leo feugiat lectus, vitae lobortis mauris velit tempor erat. Etiam eget orci at massa pretium fringilla ac non tortor. Fusce sed velit risus, vitae vehicula quam. Cras at turpis urna, eget volutpat neque. Nullam porttitor, est interdum placerat pharetra, erat sapien aliquet urna, at commodo risus tellus eu nunc.</p>         -->
                        </li>          
                    </ul>
                </div>  
            </article>

            <?php 
                $site = $this->CmsTemplate->getSite();
                $siteId = $site->id;

                $options = array(
                    'fields'     => array('Categoria.id', 'Categoria.titulo', 'Categoria.descricao', 'Categoria.identificador'),
                    'conditions' => array('Categoria.site_id' => $siteId),
                    'order'      => array('Categoria.lft' => 'ASC'),
                    'url'        => array('controller' => 'Categorias', 'action' => 'index', 'admin' => true)
                );

                $result = $this->CmsCategorias->getCategorias( $options );
            ?> 

            <article class="span4">
              <h3>Categorias</h3>
              <ul class="list extra extra1">
                <?php 
                    foreach ($result as $categoria) {
                ?>
                        <li><a href="<?php echo $categoria->getNoticiasPath(); ?>"> <?php echo $categoria->titulo; ?> </a></li>

                <?php } ?>
              </ul>

              <h3>Arquivo</h3>
              <div class="wrapper">
                <ul class="list extra2 list-pad ">
                  <?php 
                    $site = $this->CmsTemplate->getSite();
                    $siteId = $site->id;

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

      <a href="#" class="bt_voltar_topo">Voltar ao topo</a>
    </div>

    <!-- footer -->
    <?php echo $this->element('footer'); ?>

  </body>
</html>

<?php } ?> 