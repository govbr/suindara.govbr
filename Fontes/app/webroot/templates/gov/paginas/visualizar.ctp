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
								   		$pagina_id = $this->CmsTemplate->getParams(0);;
								   		$pagina = $this->CmsPaginas->getPagina($pagina_id);
								   
								   
								   		$this->Html->addCrumb($pagina->titulo);
										echo $this->element('breadcrumb');
								  	?>
								</div>
							</div>
							
							<div class="">
								<div id="content">
									
									<div id="viewlet-above-content-title"></div>
									
									<h2 class="documentFirstHeading"><?php echo $pagina->titulo ?></h2>
							
									
									<div id="content-core">
										<div id="parent-fieldname-text">
											<?php echo $pagina->texto ?>
										</div>


										<?php 
											$imagens = $pagina->getImagens();
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
											$arquivos = $pagina->getArquivos();
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
											$audios = $pagina->getAudios();
											if ($audios):

												foreach ($audios as $k => $audio):
										?>
													<div id="aplayer-<?php echo $k ?>" class="audio">
														<h4><?php echo $audio->titulo; ?></h4>
														<p><?php echo $audio->descricao; ?></p>

														<?php echo $audio->htmlAudio(array('id' => "flv-player-$k")); ?>
													</div>
										<?php 
											endforeach;
											endif;
										?>			


										<?php 
											$videos = $pagina->getVideos();
											if ($videos):
												foreach ($videos as $k => $video):
										?>
													<div id="vplayer-<?php echo $k ?>" class="video">
														<h4><?php echo $video->titulo; ?></h4>
														<p><?php echo $video->descricao; ?></p>

														<?php echo $video->htmlVideo(array('id' => "mp3-player-$k")); ?>
													</div>
										<?php 
											endforeach;
											endif;
										?>
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
