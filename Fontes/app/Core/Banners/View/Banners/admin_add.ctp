<?php
	$this->Html->addCrumb('Grupos',  array('plugin' => 'banners', 'controller' => 'grupos', 'action' => 'index'));
	$this->Html->addCrumb('Banners',  array('plugin' => 'banners', 'controller' => 'banners', 'action' => 'index', $grupo_id));
	$this->Html->addCrumb('Adicionar novo banner',  array('plugin' => 'banners', 'controller' => 'banners', 'action' => 'add'));
?>

<?php
	if(isset($errors)){ 
		foreach ($errors as $key => $value) {
			echo "<ul><li>" . implode("</li><li>", $value) . "</li></ul>";
		}
	}

	echo $this->Element('../Banners/_form');