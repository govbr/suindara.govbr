<a class="btn btn-navbar btn-navbar_" data-toggle="collapse" data-target=".nav-collapse_">Menu <span class="icon-bar"></span></a>
<div class="nav-collapse nav-collapse_  collapse">
    <?php 
        $menu_principal = $this->CmsMenu->getMenu('menu_principal_horizontal'); 

        if($menu_principal){
            $itens = $menu_principal->getItens();
            if($itens){
    ?> 
                <a id="menu_ref"  href="#menu_ref" class="menu_access_ref">In&iacute;cio do Menu</a>
                <ul class="nav sf-menu"> 
    <?php 
                foreach ($itens as $item) {
                    ?> <li><a href="<?php echo $item->getLink(); ?>" > <?php echo $item->nome; ?> </a></li> <?php
                }
    ?> 
                </ul> 
                <a id="finaldomenu" href="#finaldomenu" class="menu_access_ref">Final do Menu</a>
    <?php
            }
        }
    ?>
</div>