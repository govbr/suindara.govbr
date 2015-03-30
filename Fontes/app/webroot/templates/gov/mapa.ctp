<?php echo $this->element('topo') ?>
			
			<!-- content -->
			<div id="main">
				<div id="portal-features">
					
				</div>
				
				<div id="plone-content">
					<div id="portal-columns" class="row">
						
						<!-- Column 1 -->
						<div id="navigation">
							<?php echo $this->element('menu') ?>
						</div>
						
						<!-- Conteudo -->
						<div id="portal-column-content" class="cell width-3:4 position-1:4">
							<div id="viewlet-above-content">
								<div id="portal-breadcrumbs">
								   	<?php
								   		$this->Html->addCrumb('Mapa do site');
										echo $this->element('breadcrumb');
								  	?>
								</div>
							</div>
							
							<div class="">
								<div id="content">
									
									<div id="viewlet-above-content-title"></div>
									
									<h2 class="documentFirstHeading">Mapa do site</h2>
									
									
									<div id="viewlet-above-content-body"></div>
									
									<div id="content-core">
										<div id="parent-fieldname-text">
											<ul>
											<?php 
												$menus = array('GovPrincipal', 'GovTopo', 'GovRodape');
												foreach ($menus as $nome) {
													$m = $this->CmsMenu->getMenu($nome);
													
													if ($m->getItens()) {
														foreach ($m->getItens() as $it) {
											?>
											
														  <?php if ($it->getTipo() != MENU_SEMLINK) { ?>	
																<li><a href="<?php echo $it->getLink()?>"><?php echo $it->nome ?></a></li>
														  <?php } else { ?>		
														  		<li>
														  			<p><?php echo $it->nome ?></p>
														  			<?php if ($it->getItens()) { ?>
														  				<ul>
														  				<?php foreach ($it->getItens() as $it2) { ?>
														  					<li><a href="<?php echo $it2->getLink()?>"><?php echo $it2->nome ?></a></li>
														  				<?php } ?>
														  				</ul> 	
														  			<?php } ?>
														  		</li>
														  <?php } ?>
											<?php 
														}
													}
												}
											?>
											</ul>
										</div>
									</div>
									
									<div id="viewlet-below-content-body">
										<div class="visualClear"></div>
										<div class="documentActions"></div>
									</div>
									
								</div>
							</div>							
						</div>
					</div>
				</div>
				
				<div class="clear"></div>
				
				<div id="voltar-topo">
					<a href="#header">Voltar para o topo</a>
				</div>
			</div>
			
<?php echo $this->element('rodape') ?>
