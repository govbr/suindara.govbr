
<?php echo $this->element('topo'); ?>

<!-- content -->
	<div id="main">
		<div id="plone-content">
			<div id="portal-columns" class="row">
				<div class="pesquisa">
					<div id="content">

						<?php
							$termo = $this->Session->read('Pesquisar.textoBusca');
							$resultados = $this->CmsBusca->noticias();
						?>

						<p class="section">Pesquisa: <?php echo $termo ?> </p>

						<?php if (count($resultados) <= 0): ?>
							<p>Nenhum resultado encontrado!</p>
						<?php else: ?>
							<h3 class="nitfSubtitle">Resultados:</h3>
							<ul>
							<?php foreach ($resultados as $r): ?>
								<li>
									<h4 class="documentDescription"><a href="<?php echo $r->getPath() ?>"><?php echo preg_replace("/(.*)($termo)(.*)/i", "$1<span class=\"blink\">$2</span>$3", $r->titulo); ?></a></h4>
									<p>
										<?php 
											$temp = preg_replace("/(.*)($termo)(.*)/i", "$1<span class=\"blink\">$2</span>$3", $r->htmlResumo());
											echo $this->CmsUtil->limitarTexto($temp, 150, '...'); 
										?>  
									</p>
								</li>
							<?php endforeach ?>
							</ul>
						<?php endif ?>

						<?php echo $this->element('paginacao'); ?>
					</div>
				</div>
			</div>
		</div>

		<div class="clear"></div>
				
		<div id="voltar-topo">
			<a href="#header">Voltar para o topo</a>
		</div>
	</div>


<?php echo $this->element('rodape'); ?>