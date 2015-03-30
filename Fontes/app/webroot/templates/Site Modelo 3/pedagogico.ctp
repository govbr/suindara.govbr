<?php echo $this->element('head'); ?>

    <div class="bg-content"> 
      
      <!-- content -->
      <a id="conteudo_ref" class="menu_access_ref" accesskey="1" href="#conteudo_ref" title="In&iacute;cio do Conte&uacute;do">In&iacute;cio do Conte&uacute;do</a>
      <div id="content">

        <!-- Topo -->
        <div class=" interno">
          <div class="center">
            <div class="block-slogan">
              <h2>Pedagogico</h2>
              
              <div>
                <p>Garantir a acessibilidade na Web &eacute; permitir que qualquer indiv&iacute;duo, utilizando qualquer tecnologia de navega&ccedil;&atilde;o.</p>
              </div>
            </div>
          </div>
        </div>
        
        <div class="container cinterno">
          <!-- Conteudo -->
          <div class="row"> 
            <article class="span12">
              <h3>Projeto Pedagogico</h3>
              <p class="breadCrumb">Voc&ecirc; est&aacute; em: <a title="Voltar &aacute; P&aacute;gina inicial" href="#">P&aacute;gina inicial</a> / Pedagogico</p>
            </article>
          </div>

          <!-- Projetos -->
          <div class="row">
            <article class="span12 inner-1">
              <h4>Nossos Projetos</h4>
              <p>O trabalho de nossa equipe est&aacute; focado em diferentes projetos, que visam garantir a acessibilidade virtual. Conhe&ccedil;a aqui os projetos que v&ecirc;m sendo desenvolvidos em nossos n&uacute;cleos.</p>
            </article>

            <div class="clear"></div>

            <ul class="thumbnails thumbnails-1 list-services ">
              <?php 
                    $categoria = $this->CmsCategorias->getCategoria('pedagogico_projetos');

                    if($categoria){                   
                      foreach ($categoria->getNoticiasRecentes(3) as $key => $nt) {

                    ?>
                        <li class="span4">
                        <div class="thumbnail thumbnail-1">
                    <?php 
                          $imgs = $nt->getImagens();
                          if($imgs){
                              foreach ($imgs as $img) {
                                  echo $img->htmlImagem(TIMG_MEDIA);
                                  break;
                              }
                          }
                  ?>

                          <section> 
                            <h5><a href="<?php echo $nt->getPath() ?>" class="link-1"><?php echo $nt->titulo; ?> </a></h5>
                            <p><?php echo $nt->htmlCartola(); ?></p>
                          </section>

                        </div>
                      </li>


                  <?php 
                    }
                  }
              ?>
            </ul>
          </div>

          <!-- Manuais -->
          <div class="row">
            <article class="span12 inner-1">
              <h4>Nossos Manuais</h4>
              <p>Aqui voc&ecirc; encontrar&aacute; links para download dos &uacute;ltimos manuais desenvolvidos pela nossa equipe.</p>
            </article>

            <div class="clear"></div>

            <ul class="thumbnails thumbnails-1 list-services">
              <?php 
                    $categoria = $this->CmsCategorias->getCategoria('pedagogico_manuais');
                    if($categoria){

                      foreach ($categoria->getNoticiasRecentes(6) as $key => $nt) {
              ?>

                      <li class="span4">
                          <div class="thumbnail thumbnail-1"> 

                          <?php
                              $arquivos = $nt->getArquivos();

                              if($arquivos){
                                  foreach ($arquivos as $arquivo) {
                          ?>

                                          <section> 
                                            <h5><a href="<?php echo $arquivo->getPath(); ?>" class="link-1"><?php echo $arquivo->titulo; ?> <span>(Formato: <?php echo $arquivo->extensao; ?>, Tamanho: <?php echo $arquivo->tamanho; ?>)</span></a></h5>
                                            <p><?php echo $nt->cartola; ?></p>
                                          </section>

                                          <?php break;
                                  }
                              }

                          ?>
                            </div>
                          </li>
                <?php 
                      }
                    }
                ?>
            </ul>
          </div>

          <!-- Cursos -->
          <div class="row">
            <article class="span12 inner-1">
              <h4>Nossos Cursos</h4>
              <p>O Projeto de Acessibilidade Virtual, em parceria com a SECADI (Secretaria de Educa&ccedil;&atilde;o Continuada, Alfabetiza&ccedil;&atilde;o, Diversidade e Inclus&atilde;o), oferece, desde 2012, cursos de forma&ccedil;&atilde;o continuada na &aacute;rea de inclus&atilde;o escolar. Aqui, voc&ecirc; ir&aacute; encontrar os cursos que est&atilde;o em andamento ou com inscri&ccedil;&otilde;es abertas no momento.</p>
            </article>

            <div class="clear"></div>

            <ul class="thumbnails thumbnails-1 list-services">
              <?php 
                    $categoria = $this->CmsCategorias->getCategoria('pedagogico_cursos');

                    if($categoria){                   
                      foreach ($categoria->getNoticiasRecentes(3) as $key => $nt) {

                    ?>
                        <li class="span4">
                        <div class="thumbnail thumbnail-1">
                    <?php 
                          $imgs = $nt->getImagens();
                          if($imgs){
                              foreach ($imgs as $img) {
                                  echo $img->htmlImagem(TIMG_MEDIA);
                                  break;
                              }
                          }
                  ?>

                          <section> 
                            <h5><a href="<?php echo $nt->getPath() ?>" class="link-1"><?php echo $nt->titulo; ?> </a></h5>
                            <p><?php echo $nt->htmlCartola(); ?></p>
                          </section>

                        </div>
                      </li>


                  <?php 
                    }
                  }
              ?>
            </ul>
          </div>

          <!-- Objetos de Aprendizagem -->
          <div class="row">
            <article class="span12 inner-1">
              <h4>Nossos Objetos de aprendizagem</h4>
              <p>O trabalho de nossa equipe est&aacute; focado em diferentes projetos, que visam garantir a acessibilidade virtual. Conhe&ccedil;a aqui os projetos que v&ecirc;m sendo desenvolvidos em nossos n&uacute;cleos.</p>
            </article>

            <div class="clear"></div>

            <ul class="thumbnails thumbnails-1 list-services">
              <?php 
                    $categoria = $this->CmsCategorias->getCategoria('pedagogico_oas');

                    if($categoria){                   
                      foreach ($categoria->getNoticiasRecentes(3) as $key => $nt) {

                    ?>
                        <li class="span4">
                        <div class="thumbnail thumbnail-1">
                    <?php 
                          $imgs = $nt->getImagens();
                          if($imgs){
                              foreach ($imgs as $img) {
                                  echo $img->htmlImagem(TIMG_MEDIA);
                                  break;
                              }
                          }
                  ?>

                          <section> 
                            <h5><a href="<?php echo $nt->getPath() ?>" class="link-1"><?php echo $nt->titulo; ?> </a></h5>
                            <p><?php echo $nt->htmlCartola(); ?></p>
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
      <a href="#finalconteudo_ref" id="finalconteudo_ref" class="menu_access_ref">Final do Conte&uacute;do</a>

      <a href="#" class="bt_voltar_topo">Voltar ao topo</a>
    </div>

    <!-- footer -->
    <?php echo $this->element('footer'); ?>

  </body>
</html>