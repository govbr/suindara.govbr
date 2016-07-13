<?php echo $this->element('head'); ?>

    <div class="bg-content">
      <div class="container">
        
        <!-- Topo -->
        <div class="row">
          <div class="span12"> 
            <img src="<?php echo $this->CmsTemplate->imagemPath('topo-art.png') ?>" class="topo_art" alt="" />
        
            <span id="responsiveFlag"></span>
        
            <div class="block-slogan">
              <h2>Bem-vindo(a)</h2>
              
              <div>
                <p>Este é o site do Projeto de Acessibilidade Virtual.</p>
                <p>Aqui você poderá conhecer um pouco sobre o nosso projeto e as ações que estamos desenvolvendo.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
      
      <!-- content -->
      <a id="conteudo_ref" class="menu_access_ref" accesskey="1" href="#conteudo_ref" title="In&iacute;cio do Conte&uacute;do">In&iacute;cio do Conte&uacute;do</a>
      <div id="content" class="content-extra">

        <div class="ic"></div>
        
        <div class="row-1">
          <div class="container">
            <div class="row">
            
              <!-- Noticias -->
              <article class="span12">
                <h3>Últimas notícias</h3>
              </article>



              <!-- Acessibilidade -->
              <ul class="thumbnails thumbnails-1">
                <li class="span3">
                  <div class="thumbnail thumbnail-1">
                    <h4>Acessibilidade</h4>

                    <?php 
                        $eventos = $this->CmsCategorias->getCategoria('Acessibilidade');
                        if ($eventos) { 
                    ?>
                        <?php foreach ($eventos->getNoticiasRecentes(1) as $nt) { ?>
                            <?php 
                                $imgs = $nt->getImagens();
                                if($imgs){
                                    foreach ($imgs as $img) {
                                        echo $img->htmlImagem(TIMG_MEDIA);
                                    }
                                }
                            ?>
                               
                            <section>
                                <h5><a href="<?php echo $nt->getPath() ?>"><?php echo $nt->titulo; ?> </a></h5>
                                
                                <div class="meta">
                                    <time datetime="2012-11-09" class="date-1"><i class="icon-calendar"></i> <?php echo $nt->htmlDataPublicacao(DATA_PONTO); ?> </time>
                                    <div class="name-author"><i class="icon-user"></i> <?php echo $nt->htmlAutor() ?></div>
                                </div>

                                <div class="clear"></div>

                                <!-- <p><?php $nt->htmlCartola(); ?></p> -->
                                <p><?php echo $nt->htmlCartola(); ?></p>
                            </section> 

                        <?php } ?>
                        <!-- fim lista ultimos eventos -->
                    <?php } ?>
                  </div>
                </li>

                <!-- Pedagogico -->
                <li class="span3">
                  <div class="thumbnail thumbnail-1">
                    <h4>Pedagógico</h4>

                    <?php 
                        $eventos = $this->CmsCategorias->getCategoria('Pedagogico');
                        if ($eventos) { 
                    ?>
                        <?php foreach ($eventos->getNoticiasRecentes(1) as $nt) { ?>
                            <?php 
                                $imgs = $nt->getImagens();
                                if($imgs){
                                    foreach ($imgs as $img) {
                                        echo $img->htmlImagem(TIMG_ORIGINAL);
                                    }
                                }
                            ?>
                               
                            <section>
                                <h5><a href="<?php echo $nt->getPath() ?>"><?php echo $nt->titulo; ?> </a></h5>
                                
                                <div class="meta">
                                    <time datetime="2012-11-09" class="date-1"><i class="icon-calendar"></i><?php echo $nt->htmlDataPublicacao(DATA_PONTO); ?> </time>
                                    <div class="name-author"><i class="icon-user"></i> <?php echo $nt->htmlAutor() ?></div>
                                </div>

                                <div class="clear"></div>

                                <p><?php echo $nt->htmlCartola(); ?></p>
                            </section> 

                        <?php } ?>
                        <!-- fim lista ultimos eventos -->
                    <?php } ?>
                  </div>
                </li>

                <!-- TA -->
                <li class="span3">
                  <div class="thumbnail thumbnail-1">
                    <h4>Tecnologia Assistiva</h4>

                    <?php 
                        $eventos = $this->CmsCategorias->getCategoria('TA');
                        if ($eventos) { 
                    ?>
                        <?php foreach ($eventos->getNoticiasRecentes(1) as $nt) { ?>
                            <?php 
                                $imgs = $nt->getImagens();
                                if($imgs){
                                    foreach ($imgs as $img) {
                                        echo $img->htmlImagem(TIMG_ORIGINAL);
                                    }
                                }
                            ?>
                               
                            <section>
                                <h5><a href="<?php echo $nt->getPath() ?>"><?php echo $nt->titulo; ?> </a></h5>
                                
                                <div class="meta">
                                    <time datetime="2012-11-09" class="date-1"><i class="icon-calendar"></i><?php echo $nt->htmlDataPublicacao(DATA_PONTO); ?> </time>
                                    <div class="name-author"><i class="icon-user"></i> <?php echo $nt->htmlAutor() ?></div>
                                </div>

                                <div class="clear"></div>

                                <p><?php echo $nt->htmlCartola(); ?></p>
                            </section> 

                        <?php } ?>
                        <!-- fim lista ultimos eventos -->
                    <?php } ?>
                  </div>
                </li>

                <!-- Eventos -->
                <li class="span3">
                  <div class="thumbnail thumbnail-1">
                    <h4>Eventos</h4>

                    <?php 
                        $eventos = $this->CmsCategorias->getCategoria('Eventos');
                        if ($eventos) { 
                    ?>
                        <?php foreach ($eventos->getNoticiasRecentes(1) as $nt) { ?>
                            <?php 
                                $imgs = $nt->getImagens();
                                if($imgs){
                                    foreach ($imgs as $img) {
                                        echo $img->htmlImagem(TIMG_ORIGINAL);
                                    }
                                }
                            ?>
                               
                            <section>
                                <h5><a href="<?php echo $nt->getPath() ?>"><?php echo $nt->titulo; ?> </a></h5>
                                
                                <div class="meta">
                                    <time datetime="2012-11-09" class="date-1"><i class="icon-calendar"></i><?php echo $nt->htmlDataPublicacao(DATA_PONTO); ?> </time>
                                    <div class="name-author"><i class="icon-user"></i> <?php echo $nt->htmlAutor() ?></div>
                                </div>

                                <div class="clear"></div>

                                <p><?php echo $nt->htmlCartola(); ?></p>
                            </section> 

                        <?php } ?>
                        <!-- fim lista ultimos eventos -->
                    <?php } ?>

                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Download Site -->
        <div class="row-2">
          <div class="container">
            <h3>Download Site Modelo</h3>
            <p>Clique aqui e faça download do site modelo, disponibilizado sobre as licenças GPL</p>
            <a href="#" class="btn btn-1">Download do Site Modelo</a>
          </div>
        </div>

        <div class="row-1 espaco">
          <div class="container">
            <div class="row">
              
              <!-- Projetos -->
              <article class="span4">

                <?php 
                    $categoria = $this->CmsCategorias->getCategoria('projetos');

                    if(!empty($categoria)){

                    ?>
                        <h3>Projetos</h3>

                        <p><?php echo $categoria->getDescricao() ?></p>
                        <ul class="projetos">
                    <?php 
                        $noticias =  $categoria->getNoticiasRecentes(3);

                        if(!empty($noticias)){
                            foreach ($noticias as $noticia) {
                                $arquivos = $noticia->getArquivos();

                                if(!empty($arquivos)){
                                    foreach ($arquivos as $arquivo) {
                                        ?>
                                        <li>
                                        <a href="<?php echo $arquivo->getPath(); ?>">
                                        <?php echo $arquivo->titulo; ?>
                                        <span>Formato: <?php echo $arquivo->extensao; ?></span>
                                        <span>Tamanho: <?php echo $arquivo->tamanho; ?> KB</span>
                                        </a>
                                        </li>
                                        <?php
                                        break;
                                    }
                                }
                            }
                        }
                        ?>
                        </ul>
                        <?php
                        //listar os documentos que possuem dentro da noticia desta categoria
                    }
                ?>
              </article>

              <!-- Manuais -->
              <article class="span4">
              <?php 
                    $categoria = $this->CmsCategorias->getCategoria('Manual');

                    if(!empty($categoria)){

                        $filhos = $categoria->getFilhos();
                    ?>
                        <h3>Manuais</h3>

                        <p><?php echo $categoria->getDescricao() ?></p>
                        <ul class="manuais">
                    <?php 

                        if(!empty($filhos)){
                            foreach ($filhos as $categoria_filho ) {
                                $noticia = $categoria_filho->getNoticiasRecentes(3);

                                if(!empty($noticia)){
                                    foreach ($noticia as $not) {
                                        $arquivos = $not->getArquivos();

                                        if(!empty($arquivos)){
                                            foreach ($arquivos as $arquivo) {
                                                ?>

                                                <li>
                                                <a href="<?php echo $arquivo->getPath(); ?>">
                                                <?php echo $arquivo->titulo; ?>
                                                <span>Formato: <?php echo $arquivo->extensao; ?></span>
                                                <span>Tamanho: <?php echo $arquivo->tamanho; ?> KB</span>
                                                </a>
                                                </li>

                                                <?php break;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        ?>
                        </ul>
                        <?php
                    }
                ?>
              </article>

              <!-- Banners -->
              <article class="span4">
                <?php

                $grupo = $this->CmsBanners->getGrupo('Home');

                if(!empty($grupo)){
                    $banners = $grupo->getBanners();

                    if(!empty($banners)){
                ?>
                    <ul class="banners">

                <?php  
                        foreach ($banners as $banner) {
                            echo '<li>' . $banner->htmlBanner() . '</li>';  
                        }
                ?>
                    </ul>
                <?php 
                    }
                    
                }
              ?>
              </article>
      
              <div class="clear"></div>
         
            </div>
          </div>
        </div>
        <a href="#finalconteudo_ref" id="finalconteudo_ref" class="menu_access_ref">Final do Conte&uacute;do</a>

        <!-- Rodape -->
        <div class="container rodape">
          <div class="row">
         
            <!-- Sobre -->
            <article class="span6">
              <h3>Sobre nós</h3>
              
              <div class="wrapper">
                <div class="inner-1 overflow extra">
                  <p class="txt-1">Mauris scelerisque odio quis leo viverra ac porttitor sem blandit. Sed tincidunt mattis varius. Nunc sodales ipsum nisl, eget lacinia nibh.</p>
                  <p class="txt-1">Cras lacus tortor, tempus vitae porta nec, hendrerit id dolor. Nam volutpat gravida porta. Suspendisse turpis nibh, volutpat. </p>
                </div>
              </div>
            </article>

            <!-- Mapa -->
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

            <article class="span6">
                <h3>Categorias</h3>

                <div class="wrapper">
                    <?php 
                        $count = 0; 
                        foreach ($result as $categoria) {
                    ?>

                    <?php if($count == 0) { ?>
                        <ul class="list list-pad">
                    <?php } ?>
                        
                        <li><a href="<?php echo $categoria->getNoticiasPath(); ?>"> <?php echo $categoria->titulo; ?> </a></li>

                    <?php      
                        if( $count == 3 ) {
                            $count = 0;
                    ?>
                        </ul>
                        <?php } else {?>
                        <?php $count++; ?>
                        <?php }?>
                    <?php } ?>
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