<a id="menu_ref"  href="#menu_ref" class="menu_access_ref" accesskey="2" title="In&iacute;cio do Menu">In&iacute;cio do Menu</a>

<?php 
	$menu = $this->CmsMenu->getMenu('AcessibilidadeVirtual');
	$menu->addTagOptions(array('main'=>array('id'=>'menu', 'class'=>'topnav')));
	
	$tagOptions = array('class' => 'subnav');
	
	foreach ($menu->getItensDoTipo(MENU_SEMLINK) as $t) {
		$t->addTagOptions(array('main'=>$tagOptions));
	}
	
	foreach ($menu->getItensDoTipo(MENU_LINK) as $t) {
		if ($t->getItens()) {
			$t->addTagOptions(array('main'=>$tagOptions));
		}
	} 

	$ultimoLink = end(($menu->getItensDoTipo(MENU_LINK)));
	
	if($ultimoLink){
		$ultimoLink->addTagOptions(array('second'=>array('class'=>'sem_background')));
	}

	App::uses('CmsMontadorMenuPadrao', 'View/Helper/Util');
	$montador = new CmsMontadorMenuPadrao();
	echo $menu->htmlMenu($montador);
?>


<a href="#finaldomenu" id="finaldomenu" class="menu_access_ref">Final do Menu</a> 