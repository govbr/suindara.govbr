<?php echo $this->element('topo'); ?>
			
			<!-- content -->
			<div id="main">
				<div id="portal-features">
					
				</div>
				
				<div id="plone-content">
					<div id="portal-columns" class="row">
						
						<!-- Column 1 -->
						<div id="navigation">
							<?php echo $this->element('menu'); ?>
						</div>
						
						<?php 
		                	// Resgata o primeiro parâmetro da URL que informa a ID da notícia
		                	$noticia_id = $this->CmsTemplate->getParams(0);

							// Carrega a notícia
		                	$noticia = $this->CmsNoticias->getNoticia($noticia_id); 
		     
		                ?>
						
						<!-- Conteudo -->
						<div id="portal-column-content" class="cell width-3:4 position-1:4">
							<div id="viewlet-above-content">
								<div id="portal-breadcrumbs">
								    <?php
								    	$categoria = $this->CmsCategorias->getCategoria($noticia->categoria_id);
								    	$this->Html->addCrumb($categoria->titulo, $categoria->getNoticiasPath());
								   		$this->Html->addCrumb($noticia->titulo, $noticia->getPath());
										echo $this->element('breadcrumb');
								  	?>
								</div>
								
								
							</div>
							
							<div class="">
								<div id="content">
									
									<div id="viewlet-above-content-title"></div>
									<p class="section"><?php echo $categoria->descricao ?></p>
									
									<h2 class="documentFirstHeading"><?php echo $noticia->titulo ?></h2>
									<h3 class="nitfSubtitle"><?php echo $noticia->cartola ?></h3>
									
									<div id="viewlet-below-content-title"></div>
									
									<!-- Subtítulo -->
									<h4 class="documentDescription"><?php echo $noticia->htmlResumo() ?></h4>
									
									<p class="nitfByline">
										<span>Por</span>
										<span><?php echo $noticia->autor ?></span>
									</p>
									
									<div id="viewlet-above-content-body"></div>
									
									<div id="content-core">
										<div class="newsImageContainer">
											<a rel="#pb_2" href="#" class="parent-nitf-image link-overlay">
												<?php 
													$img = $noticia->getImagemDestaque();
													if ($img) {
														echo $img->htmlImagem(TIMG_PEQUENA, array('width' => 200, 'height' => 135, 'class' => 'newsImage nitf'));
													} else {
														echo $this->CmsTemplate->htmlParaImagem('imagem-indisponivel.jpg', array('width' => '200', 'height' => '135', 'class' => 'newsImage nitf', 'alt' => 'Imagem indisponível'));
													}	
												 ?>
											</a>
											<p class="discreet">
												<?php 
													if ($img) {
														echo $img->descricao;
													} else {
														echo 'Imagem indisponível';
													}
												?>
											</p>
										</div>
										
										<div>
											<?php echo $noticia->texto ?>
										</div>

										<?php 
											$imagens = $noticia->getImagens();
											if ($imagens):
										?>
										<div class="imgs">
										<?php
												foreach ($imagens as $k => $img):
										?>
													<div id="arquivo-<?php echo $k ?>">
														<?php 
															echo $img->htmlImagem(TIMG_PEQUENA, array('width' => '165', 'height' => '120', 'id' => "img-$k"));
														?>
													</div>
										<?php 
											endforeach;
										?>
										</div>
										<?php
											endif;
										?>

										<?php 
											$arquivos = $noticia->getArquivos();
											if ($arquivos):
										?>
										<div class="arquivo">
											<h4>Arquivos para download</h4>
										<?php
												foreach ($arquivos as $k => $arquivo):
										?>
													<div id="arquivo-<?php echo $k ?>">
														<?php echo $arquivo->htmlArquivo(array('id' => "file-$k")); ?>
													</div>
										<?php 
											endforeach;
										?>
										</div>
										<?php
											endif;
										?>

										<?php 
											$audios = $noticia->getAudios();
											if ($audios):

												foreach ($audios as $k => $audio):
										?>
													<div id="aplayer-<?php echo $k ?>" class="audio">
														<h4><?php echo $audio->titulo; ?></h4>
														<p><?php echo $audio->descricao; ?></p>

														<?php echo $audio->htmlAudio(array('id' => "mp3-player-$k")); ?>
													</div>
										<?php 
											endforeach;
											endif;
										?>			


										<?php 
											$videos = $noticia->getVideos();
											if ($videos):
												foreach ($videos as $k => $video):
										?>
													<div id="vplayer-<?php echo $k ?>" class="video">
														<h4><?php echo $video->titulo; ?></h4>
														<p><?php echo $video->descricao; ?></p>

														<?php echo $video->htmlVideo(array('id' => "flv-player-$k")); ?>
													</div>
										<?php 
											endforeach;
											endif;
										?>

										
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
			

<?php echo $this->element('rodape'); ?>