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
						
						
						<?php
							$categoria_id = $this->CmsTemplate->getParams(0);
							$categoria = $this->CmsCategorias->getCategoria($categoria_id);
						?>
						
						<!-- Conteudo -->
						<div id="portal-column-content" class="cell width-3:4 position-1:4">
							<div id="viewlet-above-content">
								<div id="portal-breadcrumbs">
									<?php
										$this->Html->addCrumb($categoria->titulo, $categoria->getNoticiasPath());
										echo $this->element('breadcrumb');
									?>
								</div>
							</div>
							
							<div class="">
								<div id="content">
									
									
									<div class="row">
										<div class="cell width-15 position-0 ">
											<div>
												<div class="tile roxo" id="fb6330c53f2440f49eda90b8a2f64bdf">
													<div class="outstanding-header">
														<h2 class="outstanding-title"><?php echo $categoria->descricao ?></h2>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									
									<?php
										$noticias = $categoria->getNoticiasRecentes(4);
										
										if ($noticias) {
									?>
									<div class="row">
										<div class="cell width-8 position-0 ">
										<?php for ($i = 0; $i < count($noticias) - 1; $i++) {?>
											<div>
												<div class="tile" id="c1e7e8f45dc4438296670befba1af889">
													<div>
														<p class="tile-subtitle"><?php echo $noticias[$i]->cartola ?></p>
														<a class="imag" href="<?php echo $noticias[$i]->getPath() ?>">
															<?php 
																$img = $noticias[$i]->getImagemDestaque();
																if ($img) {
																	echo $img->htmlImagem(TIMG_PEQUENA, array('width' => 200, 'height' => 130, 'class' => 'left'));
																} else {
																	echo $this->CmsTemplate->htmlParaImagem('imagem-indisponivel.jpg', array('width' => '200', 'height' => '130', 
																			 																				 'class' => 'left',
																																							 'alt' => 'Imagem indisponível'));
																}	
															 ?>
														</a>
														
														<h3><a href="<?php echo $noticias[$i]->getPath() ?>"><?php echo $this->CmsUtil->limitarTexto($noticias[$i]->titulo, 50, '...') ?></a></h3>
														<p class="tile-description"><?php echo $this->CmsUtil->limitarTexto($noticias[$i]->htmlResumo(), 110, '...') ?></p>
														
														<div class="visualClear"></div>
													</div>
												</div>
											</div>
									<?php 
											} 
										
										} else {
											
											echo '<p> Nenhuma notícia cadastrada </p>';  
										}		
									?>
										
									  </div>
											

										<div class="cell width-7 position-8 ">
											<div class="tile" id="eba7851c6a8b42b9955c31ea87657979">
												<div>
												   <?php 
														if (isset($noticias[count($noticias) - 1])):
															$n = $noticias[count($noticias) - 1];
													?>
													<p class="tile-subtitle"><?php echo $n->cartola ?>
														
													</p><h3><a href="<?php echo $n->getPath() ?>" >
														<?php echo $this->CmsUtil->limitarTexto($n->titulo, 50, '...') ?>
													</a></h3>
													<p class="tile-description"><?php echo $this->CmsUtil->limitarTexto($n->htmlResumo(), 2000, '...') ?></p>
													
													<?php endif; ?>	
													<div class="visualClear"></div>
												</div>
											</div>
										</div>
									</div>

								
									
									<div class="row">
										
										<?php 
											
											$posicoes = array('position-0', 'position-5', 'position-10');
											$cores = array('azul-claro', 'verde', 'laranja');
											//$categorias = array('Suindara', 'TA Projetos', 'Pedagogico Cursos');
											$categorias = array('Suindara', 'Notícias', 'Destaques');
											
											// Títulos das categorias
											//$assuntoTitulos = array('Suindara', 'Notícias', 'Destaques');
											
											for ($i = 0; $i < 3; $i++) {
												
												$assunto = $this->CmsCategorias->getCategoria($categorias[$i]);
										 ?>
										
											<div class="cell width-5 <?php echo $posicoes[$i] ?> ">
												<div>
													<div class="tile <?php echo $cores[$i] ?>">
														<div class="outstanding-header">
															<h2 class="outstanding-title"><?php echo $assunto->titulo ?></h2>
														</div>
													</div>
												</div>
											
												
										<?php 
											$noticia = $assunto->getNoticiasRecentes(1);
											if ($noticia) {			
										?>			
											
											<div>
												<div class="tile verde" id="b0730eabce904e26af69e73b7199228f">
													<div>
														<p class="tile-subtitle"><?php echo $noticia[0]->cartola ?></p>
														<h4><a href="<?php echo $noticia[0]->getPath() ?>"><?php echo $this->CmsUtil->limitarTexto($noticia[0]->titulo, 50, '...') ?></a></h4>
														<p class="tile-description"><?php echo $this->CmsUtil->limitarTexto($noticia[0]->htmlResumo(), 90, '...') ?></p>
														
														<div class="visualClear"></div>
													</div>
												</div>
											</div>
										
										 
									    <?php } ?>	
									     </div>
									  <?php } ?>		
									</div>
									
									<div class="row">
										<div class="cell width-15 position-0 ">
											<div>
												<div class="tile roxo" id="c60d6fae2c5a41f58f819d9b97bad486">
													<div class="outstanding-header">
														<h2 class="outstanding-title">Últimas notícias</h2>
													</div>
												</div>
											</div>
											
											<div>
												<div class="tile roxo" id="d9927e558ef8467a8fdf0c3680d88c85">
													<div class="cover-collection-tile">
														
														<?php 
															$noticias = $this->CmsNoticias->getNoticiasRecentes(8);
															if ($noticias):
															foreach ($noticias as $n) {
														?>
														
														<div class="collection-item">
															<p><?php echo $n->htmlDataPublicacao() ?></p>
															<h3><a href="<?php echo $n->getPath() ?>"><?php echo $n->titulo ?></a></h3>
															
															<div class="visualClear"></div>
														</div>
														
														<?php 
															}

															endif;
														?>

														
														<div class="visualClear"></div>
													</div>
												</div>
											</div>
											
											<div>
												<div class="tile roxo" id="fe529bd809de4888b48f84e849ba7ada">
													<div class="outstanding-header">
														<a class="outstanding-link" href="<?php echo $this->CmsTemplate->raizSite() ?>">Acesse últimas notícias</a>
													</div>
												</div>
											</div>
										</div>
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
