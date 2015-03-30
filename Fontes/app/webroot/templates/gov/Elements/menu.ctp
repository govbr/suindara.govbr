							
							
							<span class="menuTrigger">Menu</span>
							<div id="portal-column-one" class="cell width-1:4 position-0">
								<span class="portletWrapper" id="portletwrapper-706c6f6e652e6c656674636f6c756d6e0a636f6e746578740a2f706f7274616c0a61706f696f">
									<!-- <dl class="portlet portletNavigationTree">
										<dt class="portletHeader hiddenStructure">
											<span class="portletTopLeft"></span>
											Navegação
											<span class="portletTopRight"></span>
										</dt>
										
										<dd class="portletItem lastItem">
											<ul class="navTree navTreeLevel0">
												<li class="navTreeItem visualNoMarker section-nova-identidade-digital">
													<a href="#" class="state-published contenttype-link"> <span>Conheça a identidade digital do governo</span> </a>
												</li>
											</ul>
											
											<span class="portletBottomLeft"></span>
											<span class="portletBottomRight"></span>
										</dd>
									</dl> -->
								</span>
								
								<?php
									$menu = $this->CmsMenu->getMenu('GovPrincipal');
																
									foreach ($menu->getItens() as $lv1) {
								?>
								
								
								<div class="portletWrapper" id="portletwrapper-706c6f6e652e6c656674636f6c756d6e0a636f6e746578740a2f706f7274616c0a617373756e746f73">
									<dl class="portlet portletNavigationTree">
										<dt class="portletHeader">
											<span class="portletTopLeft"></span>
											<?php echo $lv1->nome ?> 
											<span class="portletTopRight"></span>
										</dt>
										
										
										<?php if ($lv1->getItens()) { ?>
										<dd class="portletItem lastItem">
											<ul class="navTree navTreeLevel0">
												<?php foreach ($lv1->getItens() as $lv2) { 
													
													  $subLinks = array();	
													  if ($lv2->getItens()) {
													  		foreach ($lv2->getItens() as $it) {
													  			$subLinks[] = $it->getLink();
													  		}
													  }	
													
													$here = Router::url(null, true);
													// echo $here;
													// echo Router::url('/', true);
													
												?>
													<?php if ($here != Router::url('/', true) && ($here == $lv2->getLink() || in_array($here, $subLinks))) { ?>			
															<li class="navTreeItem visualNoMarker navTreeCurrentNode navTreeFolderish section-editoria-a">
															<a class="state-published navTreeCurrentItem navTreeCurrentNode navTreeFolderish contenttype-folder" href="#">
																<span><?php echo $lv2->nome ?></span>
															</a>
															
															 <?php if ($lv2->getItens()) { ?>
															<ul class="navTree navTreeLevel1">
																<?php
																	$lv2Items =  $lv2->getItens();
																	foreach ($lv2Items as $lv3) { 
																 		//$lastItem = ($lv2Items[count($lv2Items) - 1] == $lv3) ? 'last-item' : '';
																?>
																	<li class="navTreeItem visualNoMarker navTreeFolderish section-segundo-nivel">
																		<a href="<?php echo $lv3->getLink() ?>" class="state-published navTreeFolderish contenttype-folder" >
																			<span><?php echo $lv3->nome ?></span>
																		</a>
																	</li>
																<?php } ?>
															</ul>
															<?php } ?>
														</li>
													<?php } else { ?>
															<li class="navTreeItem visualNoMarker navTreeFolderish section-editoria-a">
															<a href="<?php echo $lv2->getLink() ?>" class="state-published navTreeFolderish contenttype-folder">
																<span><?php echo $lv2->nome ?></span>
															</a>
															
														</li>
													<?php } ?>
												
												<?php } ?>
											</ul>
											
											<span class="portletBottomLeft"></span>
											<span class="portletBottomRight"></span>
										</dd>
										<?php } ?>
										
									</dl>
								</div>
								
							 	
							<?php } ?>	
						</div>		
