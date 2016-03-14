				<!-- Footer -->
				<div id="footer">
					<div id="doormat-container" class="columns-4">					
						<?php 
							
							$rodape = $this->CmsMenu->getMenu('GovRodape');
							$menus = array( $this->CmsMenu->getMenu('GovPrincipal')->getSubMenu('assuntos'),  
										    $this->CmsMenu->getMenu('GovTopo')->getSubMenu('servicos'),
										    $rodape->getSubMenu('redes_sociais'),
										    $rodape->getSubMenu('rss'),
										    $rodape->getSubMenu('sobre_o_site'));

										  
							foreach ($menus as $i => $m) {			  
						 ?>
						
						<?php if ($i != 4) { ?>
						<div class="doormatColumn column-<?php echo $i ?>">
					    <?php } ?>
					    		
					    	<h4 class="doormatSectionHeader"><?php echo $m->nome ?></h4>
							<ul class="doormatSection">
							
							<?php 
								$menu = $m;
								if ($menu && $menu->getItens()) {
									foreach ($menu->getItens() as $it) {
							?>
							
								<li class="doormatSectionBody">
									<a href="<?php echo $it->getLink() ?>" class="external-link"><?php echo $it->nome ?></a>
								</li>
							
							<?php 
									}
								}
							?>	
								
							</ul>
							
						<?php if ($i != 3) { ?>	
						</div>
						<?php } ?>
						
						<?php  } ?>
						
					
					
					<div class="clear"></div>
					
					<div>
						<ul>
							<li>
								<a href="#" class="logo-acesso"> <img src="<?php echo $this->CmsTemplate->imagemPath('acesso-a-infornacao.png') ?>" alt="Acesso a Informação" /></a>
							</li>
							<li>
								<a href="#" class="logo-brasil"> <img src="<?php echo $this->CmsTemplate->imagemPath('brasil.png') ?>" alt="Brasil - Governo Federal" /> </a>
							</li>
						</ul>
					</div>
				</div>
				
				<div id="extra-footer">
					<p>Desenvolvido com o CMS de código aberto <a href="#">CMS Suindara</a></p>
				</div>
				
				<!-- /Footer-->
			</div>
		</div>

		<script type="text/javascript" src="http://barra.brasil.gov.br/barra.js?cor=verde"></script>
	</body>
</html>