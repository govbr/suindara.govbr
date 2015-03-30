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
						
						<!-- Conteudo -->
						<div id="portal-column-content" class="cell width-3:4 position-1:4">
							<div id="viewlet-above-content">
								<div id="portal-breadcrumbs">
								    <?php
								   		$this->Html->addCrumb('Contato');
										echo $this->element('breadcrumb');
								  	?>
								</div>
							</div>
							
							<div class="">
								<div id="content">
									
									<h2 class="documentFirstHeading">Contato</h2>
									
									<p class="documentDescription description">Área reúne as formas de contato entre o visitante do portal e o órgão</p>
									
									<div id="viewlet-above-content-body"></div>
									
									<div id="content-core">
										<div id="parent-fieldname-text">
											<p>Esta seção do portal deverá fornecer ao internauta todas as formas de contato disponíveis para ele interagir com o órgão.&nbsp;</p>
											<p>Aqui devem ser publicados os telefones de contato, a ouvidoria, o&nbsp;endereço físico e eletrônico do órgão, além do formulário de contato (<a target="_self" class="internal-link" href="#">veja um exemplo de formulário de contato</a>).</p>
										</div>
									</div>
										
									<div id="viewlet-below-content-body">
											<div class="visualClear"></div>
											<div class="documentActions"></div>
									</div>
									
									<div class="pfg-form formid-contato">
										<form name="edit_form" method="post" enctype="multipart/form-data" class="fgBaseEditForm enableUnloadProtection enableAutoFocus" action="#" id="fg-base-edit">
											<div id="pfg-fieldwrapper">
												<fieldset class="PFGFieldsetWidget" id="pfg-fieldsetname-informacoes-de-contato">
													<legend>Informações de Contato</legend>
													
													<div class="formHelp" id="informacoes-de-contato_help"></div>
													
													<div class="field ArchetypesStringWidget " id="archetypes-fieldname-replyto">
														<span></span>
														<label class="formQuestion" for="replyto"> Seu endereço de e-mail <span class="required">Campo Obrigatório</span> <span class="formHelp" id="replyto_help"></span> </label>
														<div class="fieldErrorBox"></div>
														<input name="replyto" class="blurrable firstToFocus" id="replyto" size="30" maxlength="255" type="text" />
													</div>
													
													<div class="field ArchetypesStringWidget " id="archetypes-fieldname-topic">
														<span></span>
														<label class="formQuestion" for="topic"> Assunto <span class="required" title="Obrigatório">Campo Obrigatório</span> <span class="formHelp" id="topic_help"></span> </label>
														<div class="fieldErrorBox"></div>
														<input name="topic" class="blurrable firstToFocus" id="topic" size="30" maxlength="255" type="text" />
													</div>
													
													<div class="field ArchetypesTextAreaWidget " id="archetypes-fieldname-comments" >
														<span></span>
														<label class="formQuestion" for="comments"> Comentários <span class="required" title="Obrigatório">Campo Obrigatório</span> <span class="formHelp" id="comments_help"></span> </label>
														<div class="fieldErrorBox"></div>
														<textarea class="blurrable firstToFocus" name="comments" id="comments" cols="40" rows="5"></textarea>
													</div>												
												</fieldset>
											</div>
											
											<div class="formControls">
												<input class="context" name="form_submit" value="Enviar" type="submit" />
											</div>
										</form>
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
