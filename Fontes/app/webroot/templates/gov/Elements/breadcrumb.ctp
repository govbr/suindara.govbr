<?php 
  $crumbs = $this->CmsUtil->getCrumbs('Página Inicial', $this->CmsTemplate->raizSite());

?>

<ul>
  <li id="breadcrumbs-you-are-here">Você está aqui:</li>
 
  <?php
    
    foreach ($crumbs as $i => $crumbLink) {
  ?>
  
    <?php if ($i == 0) { ?> 
        <li id="breadcrumbs-home">
    <?php } else { ?>
        <li id="breadcrumbs-<?php echo $i ?>">
    <?php } ?>
    
    <?php echo $crumbLink ?>
    </li>
        
    <?php if ($i != count($crumbs) - 1) { ?>    
        <li class="breadcrumbSeparator"> /  </li>
    <?php } ?>   
    
  <?php } ?>
</ul>