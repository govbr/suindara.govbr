<?php 
	$crumbs = $this->CmsUtil->getCrumbs("P&aacute;gina Inicial", $this->CmsTemplate->raizSite());
?>

<p class="breadCrumb">Voc&ecirc; est&aacute; em: <?php echo $crumbs[0]; ?> 

<?php 
	foreach ($crumbs as $i => $crumbLink) {
		if($i > 0){
			echo ' / ' . $crumbLink; 
		}
	}
?>

</p>
