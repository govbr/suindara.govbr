<?php 
	$crumbs = $this->CmsUtil->getCrumbs("P&aacute;gina Inicial", $this->CmsTemplate->raizSite());
?>

<?php if(!isset($class)){ ?>
	<p class="breadCrumb" id="breadcrumb">Voc&ecirc; est&aacute; em: <?php echo $crumbs[0]; ?>
<?php }else{ ?>
	<p class="breadCrumb <?php echo $class; ?>" id="breadcrumb">Voc&ecirc; est&aacute; em: <?php echo $crumbs[0];  ?>
<?php } ?>

<?php 
	foreach ($crumbs as $i => $crumbLink) {
		if($i > 0){
			echo ' / ' . $crumbLink; 
		}
	}
?>

</p>
