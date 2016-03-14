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
              <h2>Mapa do Site</h2>
            </div>
          </div>
        </div>
        
        <div class="container cinterno">
          <div class="row">

            <!-- Conteudo -->
            <article class="span12">
              <?php
                $this->Html->addCrumb('Mapa do Site');
                echo $this->element('breadcrumb');
              ?>

              <!-- <p class="breadCrumb">Você está em: <a title="Voltar á Página inicial" href="#">Página inicial</a> / Mapa do Site</p> -->
              <h3>Navegue pelo site</h3>
            </article>

            <div class="clear"></div>


            <!-- manuais, noticias e projetos link para listar proprio   -->
            <?php 
                $menu_principal = $this->CmsMenu->getMenu('menu_principal_horizontal'); 

                if($menu_principal){
                    $itens = $menu_principal->getItens();
                    if($itens){
            ?> 
                        <article class="span12 inner-1">
                          <ul> 
            <?php 
                        foreach ($itens as $item) {
                            ?> <li><a href="<?php echo $item->getLink(); ?>" > <?php echo $item->nome; ?> </a> <?php

                            $categoria = $this->CmsCategorias->getCategoria($item->nome);
                            
                            if($categoria){
                              $filhos = $categoria->getFilhos();

                              if($filhos){
            ?>
                                <ul>
                              <?php 
                                foreach ($filhos as $filho) {
                                  switch ($categoria->identificador) {
                                    case 'manuais':
                                      ?> <li><a href="<?php echo $filho->createPath('manuais', 'listar'); ?>"><?php echo $filho->titulo ?></a></li> <?php 
                                      break;

                                    case 'projetos':
                                      ?> <li><a href="<?php echo $filho->createPath('projetos', 'listar'); ?>"><?php echo $filho->titulo ?></a></li> <?php 
                                      break;
                                    
                                    default:
                                      ?> <li><a href="<?php echo $filho->getNoticiasPath(); ?>"><?php echo $filho->titulo ?></a></li> <?php
                                      break;
                                  }
                                }
                              ?>
                                </ul>
                                </li>
            <?php           
                              }else{
                                ?> </li> <?php
                              }
                            }else{
                              ?> </li> <?php
                            }
                        }
            ?>  
                          </ul> 
                        </article>
            <?php
                    }
                }
            ?>
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