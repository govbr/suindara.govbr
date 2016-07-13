<?php echo $this->element('topo'); ?>
			
			<!-- content -->
			<div id="main">
				<div id="portal-features">
					<div id="featured-content">
						<div id="em-destaque">
    						<ul class="sortable-tile cover-list-tile"><li id="em-destaque-titulo">Em destaque</li>
    							<?php 
    								
    								$noticias = $this->CmsNoticias->getNoticiasRecentes(3);
									foreach ($noticias as $n) {
    							?>
							    	<li class="" >
	          							<a href="<?php echo $n->getPath() ?>"><?php echo $this->CmsUtil->limitarTexto($n->titulo, 50, '...') ?></a>
	        						</li>
	        					<?php } ?>
							</ul>
							<div class="visualClear"></div>
						</div>
					</div>
				</div>
				
				<div id="plone-content">
					<div id="portal-columns" class="row">
						
						<!-- Column 1 -->
						<div id="navigation">
							<?php echo $this->element('menu'); ?>
						</div>
						
						<!-- Conteudo -->
						<div id="portal-column-content" class="cell width-3:4 position-1:4">
							<div id="viewlet-above-content">
								<div id="portal-breadcrumbs">
									<?php echo $this->element('breadcrumb'); ?>
								</div>	
							</div>
							
							<div class="">
								<div id="content">
									<!-- Inicio Cabecalho -->
									<div class="row">
										<div class="cell width-15 position-0 ">
											<div>
												<div class="tile">
													<div class="outstanding-header">
														<h2 class="outstanding-title">Portal Modelo</h2>
													</div>
												</div>
											</div>
											
											<div>
												<div class="tile">
													<div>
														<h3><a href="#">Conheça o novo modelo de plataforma digital do governo federal</a></h3>
														<p class="tile-description">Estrutura reúne o que há de mais adequado em soluções digitais de acessibilidade e de divulgação de informações nos mais variados formatos; conheça todos os detalhes deste novo modelo</p>
														
														<div class="visualClear"></div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- Fim Cabecalho -->
									
									<!-- Inicio Noticia -->
									<div class="row">
										<?php 
											$posicoes = array('position-0', 'position-5', 'position-10');
											$cores = array('azul-claro', 'verde', 'laranja');
											//$categorias = array('Suindara', 'TA Projetos', 'Pedagogico Cursos');
											$categorias = array('Suindara', 'Notícias', 'Destaques');
											
											for ($i = 0; $i < 3; $i++) {
												
												$assunto = $this->CmsCategorias->getCategoria($categorias[$i]);
												if (!$assunto) break;
										 ?>
										 
											 <div class="cell width-5 <?php echo $posicoes[$i] ?> ">
												<div>
													<div class="tile <?php echo $cores[$i] ?>">
														<div class="outstanding-header">
															<?php if ($assunto) { ?>
															<h2 class="outstanding-title"><?php echo $assunto->descricao ?></h2>
															<?php } ?>
														</div>
													</div>
												</div>
												
											<?php 

												if ($assunto) {
													$noticias = $assunto->getNoticiasRecentes(3);
													if ($noticias) {
														$noticia1 = $noticias[0];

											 ?>	
											 	
											 	<div>
													<div class="tile">
														<div>
															<a class="imag" href="<?php echo $noticia1->getPath() ?>">
																<?php 
																 	$img = $noticia1->getImagemDestaque();
																	if ($img) {
																		
																		echo $img->htmlImagem(TIMG_PEQUENA, array('width' => 220, 'height' => 130, 'class' => 'left'));
																 	 } else { 
																 		echo $this->CmsTemplate->htmlParaImagem('imagem-indisponivel.jpg', array('width' => '220', 'height' => '130', 
																 																				 'class' => 'left',
																																				 'alt' => 'Imagem indisponível'));
																  } ?>
															</a>
															
															<?php foreach ($noticias as $noticia) { ?>
																<p class="tile-subtitle"> <?php echo $noticia->cartola ?></p>
																<h3><a href="<?php echo $noticia->getPath() ?>" title="<?php echo $noticia->titulo ?>"><?php echo $this->CmsUtil->limitarTexto($noticia->titulo, 50, '...') ?></a></h3>
																<div class="visualClear"></div>
															<?php } ?>
														</div>
													</div>
												</div>
											 	
											 	<div>
													<div class="tile <?php echo $cores[$i] ?>">
														<div class="outstanding-header">
															<a href="<?php echo $assunto->getNoticiasPath() ?>" title="Mais sobre <?php echo $assunto->titulo ?> " class="outstanding-link">
																Mais sobre o assunto <?php echo $assunto->descricao ?>
															</a>
														</div>
													</div>
												</div>
											 	
											 <?php } else { ?>
											 	<p> Sem not&iacute;cias cadastradas </p>
											 <?php } ?>	
										</div>
									<?php } // End Assuntos  ?>	
									<?php } // For end ?>
									
								</div>
								<!-- Fim Noticia -->
									
								<!-- Inicio Noticias -->	
								<?php 
									//$assunto = $this->CmsCategorias->getCategoria('Eventos');
								?>
								<!--
								<div class="row">
									<div class="cell width-15 position-0 ">
										<div>
											<div class="tile">
												<div class="outstanding-header">
													<?php //if ($assunto) { ?>
														<h2 class="outstanding-title">+ <?php //echo $assunto->titulo ?></h2>
														<p><?php //echo $assunto->descricao ?></p>
													<?php //} ?>
												</div>
											</div>
										</div>
									</div>
								</div>
								-->
								<div class="row">
									
									<?php 
										/*$posicoes = array('position-0', 'position-5', 'position-10');
									
										if ($assunto) {
											$noticias = $assunto->getNoticiasRecentes(6);
											
											for ($i = 0; $i < 3; $i++) {
												
											$p = $posicoes[$i];
											
											if (isset($noticias[$i])) {	*/
									 ?>
									 
										<!--	 <div class="cell width-5 <?php //echo $posicoes[$i] ?> ">
												<div>
													<div class="tile">
														<div>
															<p class="tile-subtitle"><?php //echo $noticias[$i]->cartola ?></p>
															<a class="imag" href="#"> 
																<?php 
															 		/* $img = $noticias[$i]->getImagemDestaque();
																	if ($img) {
																	
																		echo $img->htmlImagem(TIMG_PEQUENA, array('width' => 220, 'height' => 130, 'class' => 'left')); */
																?>
															 
															 	<?php /* } else { 
															 			echo $this->CmsTemplate->htmlParaImagem('imagem-indisponivel.jpg', array('width' => '220', 'height' => '130', 
															 																				 'class' => 'left',
																																			 'alt' => 'Imagem indisponível')); 
															  	} */ ?>
															</a>

															<h3>
																<a href="<?php //echo $noticias[$i]->getPath() ?>" title="<?php //echo $noticias[$i]->titulo ?>"><?php //echo $this->CmsUtil->limitarTexto($noticias[$i]->titulo, 50, '...') ?></a>
															</h3>
															<p class="tile-description"><?php //echo $this->CmsUtil->limitarTexto($noticias[$i]->htmlResumo(array(), false, true), 110, '...') ?></p>
															
															<div class="visualClear"></div>
														</div>
													</div>
												</div>
											</div>-->
										
									<?php 
										/*}
										  } 
									} */ // Fim for ?>										
									</div>
									
								<!--	<div class="visualClear sep"></div>
									
									<div class="row">
									
									<?php 
										/* for ($i = 3; $i < 6; $i++) {
										
										if (isset($noticias[$i])) {	
									 ?>
									 
											 <div class="cell width-5 <?php //echo $posicoes[$i - 3] ?> ">
												<div>
													<div class="tile">
														<div>
															<p class="tile-subtitle"><?php //echo $noticias[$i]->cartola ?></p>
															<h3>
																<a href="<?php //echo $noticias[$i]->getPath() ?>" title="<?php //echo $noticias[$i]->titulo ?>"><?php //echo $this->CmsUtil->limitarTexto($noticias[$i]->titulo, 80, '...') ?></a>
															</h3>
															<div class="visualClear"></div>
														</div>
													</div>
												</div>
											</div>
											
									<?php 
										/*} 
									} */ // Fim for ?>										
									</div> -->

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
				
<?php echo $this->element('rodape'); ?>
