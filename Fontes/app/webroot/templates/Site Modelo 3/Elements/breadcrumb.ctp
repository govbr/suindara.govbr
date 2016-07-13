<?php 
  $crumbs = $this->CmsUtil->getCrumbs('Página Inicial', $this->CmsTemplate->raizSite());
?>

<p class="breadCrumb">Você está em: <?php echo $crumbs[0]; ?> 

<?php 
  foreach ($crumbs as $i => $crumbLink) {
    if($i > 0){
      echo ' / ' . $crumbLink; 
    }
  }
?>

</p>
