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
              <h2>Quem somos</h2>
            </div>
          </div>
        </div>
        
        <div class="container cinterno">
          <div class="row">

            <!-- Conteudo -->
            <article class="span12">
              <?php
                $this->Html->addCrumb('Quem somos');
                echo $this->element('breadcrumb');
              ?>
              <!-- <p class="breadCrumb">Você está em: <a title="Voltar á Página inicial" href="#">Página inicial</a> / Quem somos</p> -->
              
              <h3>Projeto de Acessibilidade Virtual</h3>
            </article>

            <div class="clear"></div>

            <article class="span12">
              <div class="inner-1"> 
                <h4>Sobre</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dapibus erat leo, a viverra erat laoreet vel. Donec tristique, lacus sit amet mollis porttitor, urna quam lobortis sem, id porta ex justo id nisl. Maecenas lacinia turpis ipsum, at maximus lacus accumsan vitae. Nunc eu dictum risus, non hendrerit ipsum. Proin ut mauris nibh. Praesent varius bibendum urna, vitae posuere diam mattis vitae. Integer fermentum nec ipsum quis porta.</p>
              </div>                      
            </article>

            <article class="span12">
              <div class="inner-1"> 
                <h4>Equipe</h4>
              </div>                      
            </article>

            <article class="span6">
              <div class="inner-1">  
                <ul class="equipe">
                  <li>
                    <img src="<?php echo $this->CmsTemplate->imagemPath('sem-imagem-circular.png') ?>" alt="" />
                    <h5><a href="#" title="curr&iacute;culo Lattes">Nome da Pessoa</a></h5>
                    <p><a href="#">Lorem ipsum</a> Lorem ipsum dolor sit amet</p>
                  </li>
                  <li>
                    <img src="<?php echo $this->CmsTemplate->imagemPath('sem-imagem-circular.png') ?>" alt="" />
                    <h5><a href="#" title="curr&iacute;culo Lattes">Nome da Pessoa</a></h5>
                    <p><a href="#">Lorem ipsum</a> Lorem ipsum dolor sit amet</p>
                  </li>
                  <li>
                    <img src="<?php echo $this->CmsTemplate->imagemPath('sem-imagem-circular.png') ?>" alt="" />
                    <h5><a href="#" title="curr&iacute;culo Lattes">Nome da Pessoa</a></h5>
                    <p><a href="#">Lorem ipsum</a> Lorem ipsum dolor sit amet</p>
                  </li>
                </ul>
              </div>                      
            </article>

            <article class="span6">
              <div class="inner-1">                  
                <ul class="equipe">
                  <li>
                    <img src="<?php echo $this->CmsTemplate->imagemPath('sem-imagem-circular.png') ?>" alt="" />
                    <h5><a href="#" title="curr&iacute;culo Lattes">Nome da Pessoa</a></h5>
                    <p><a href="#">Lorem ipsum</a> Lorem ipsum dolor sit amet</p>
                  </li>
                  <li>
                    <img src="<?php echo $this->CmsTemplate->imagemPath('sem-imagem-circular.png') ?>" alt="" />
                    <h5><a href="#" title="curr&iacute;culo Lattes">Nome da Pessoa</a></h5>
                    <p><a href="#">Lorem ipsum</a> Lorem ipsum dolor sit amet</p>
                  </li>
                  <li>
                    <img src="<?php echo $this->CmsTemplate->imagemPath('sem-imagem-circular.png') ?>" alt="" />
                    <h5><a href="#" title="curr&iacute;culo Lattes">Nome da Pessoa</a></h5>
                    <p><a href="#">Lorem ipsum</a> Lorem ipsum dolor sit amet</p>
                  </li>
                </ul>               
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