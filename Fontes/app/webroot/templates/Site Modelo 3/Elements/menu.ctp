<a class="btn btn-navbar btn-navbar_" data-toggle="collapse" data-target=".nav-collapse_">Menu <span class="icon-bar"></span></a>

<div class="nav-collapse nav-collapse_  collapse">
  <a id="menu_ref"  href="#menu_ref" class="menu_access_ref" accesskey="2" title="In&iacute;cio do Menu">In&iacute;cio do Menu</a>
  <ul class="nav sf-menu">
    <?php 
        try{
            $rodape = $this->CmsMenu->getMenu('SiteModelo3Menu');

            $itens = $rodape->getItens();
            //pr($itens);

            if( !empty($itens) ){

                foreach ($itens as $key => $it) {      
    ?>

                    <li><a href="<?php echo $it->getLink(); ?>" > <?php echo $it->nome; ?> </a></li>

    <?php 
            }
        }
    ?>

    <?php
        } catch (Exception $e) {
            //apenas não mostra o rodape
        }
    ?>
  </ul>
  <a href="#finaldomenu" id="finaldomenu" class="menu_access_ref">Final do Menu</a>
</div>