<div class="navbar-inner">
    <div class="container">
        <a data-target=".nav-top-collapse" data-toggle="collapse" class="btn btn-navbar btn-navbar_ openAcess">Barra de Acessibilidade <span class="icon-bar"></span></a>
        <div class="nav-collapse collapse nav-top-collapse">
            <ul class="nav barraAcessibilidade">
              <?php 
                $barra_acessibilidade = $this->CmsMenu->getMenu('barra_acessibilidade'); 

                if($barra_acessibilidade){
                  $itens = $barra_acessibilidade->getItens();

                  if($itens){
                    foreach ($itens as $index => $item) {
                      $key = ($index > 1) ? ($index + 2) : ($index + 1);
              ?>
                      <li>
                        <a accesskey="<?php echo $key; ?>" href="<?php echo $item->getLink(); ?>" <?php echo ($item->identificador == "alto_contraste") ? "id='contraste'" : ""; ?> > <?php echo $item->nome; ?> <span>(<?php echo $key; ?>)</span> </a>
                      </li>
              <?php 
                    }
                  }
                }
              ?>

              <li id="webLibras"></li>
            </ul>
        </div>
    </div>
</div>