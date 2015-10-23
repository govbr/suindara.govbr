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
								   		$this->Html->addCrumb('Acessibilidade');
										echo $this->element('breadcrumb');
								  	?>
								</div>
							</div>
							
							<div class="">
								<div id="content">
									
									<div id="viewlet-above-content-title"></div>
									
									<h2 class="documentFirstHeading">Acessibilidade</h2>
									<p class="documentDescription description">Este portal segue as diretrizes do e-MAG (Modelo de Acessibilidade em Governo Eletrônico), conforme as normas do Governo Federal, em obediência ao Decreto 5.296, de 2.12.2004</p>
									
									<div id="viewlet-above-content-body"></div>
									
									<div id="content-core">
										<div id="parent-fieldname-text">
											<p><span>O termo acessibilidade significa incluir a pessoa com deficiência na participação de atividades como o uso de produtos, serviços e informações. Alguns exemplos são os prédios com rampas de acesso para cadeira de rodas e banheiros adaptados para deficientes.</span></p>
											<p>Na internet, acessibilidade refere-se principalmente às recomendações do WCAG (World Content Accessibility Guide) do W3C e no caso do Governo Brasileiro ao e-MAG (Modelo de Acessibilidade em Governo Eletrônico). O e-MAG está alinhado as recomendações internacionais, mas estabelece padrões de comportamento acessível para sites governamentais. </p>
											<p><span>Na parte superior do portal existe uma barra de acessibilidade onde se encontra atalhos de navegação padronizados e a opção para alterar o contraste. Essas ferramentas estão disponíveis em todas as páginas do portal.</span></p>
											<p>Os atalhos padrões do governo federal são:</p>
											
											<ul>
												<li>Teclando-se 1 em qualquer página do portal, chega-se diretamente ao começo do conteúdo principal da página.</li>
												<li>Teclando-se 2 em qualquer página do portal, chega-se diretamente ao início do menu principal.</li>
												<li>Teclando-se 3 em qualquer página do portal, chega-se diretamente em sua busca interna.</li>
												<li>Teclando-se 4 em qualquer página do portal, chega-se diretamente ao rodapé do site.</li>
											</ul>
											
											<br />
											
											<p>Esses atalhos valem para o navegador Chrome, mas existem algumas variações para outros navegadores.</p>
											<p>Quem prefere utilizar o Internet Explorer é preciso apertar o botão	Enter do seu teclado após uma das combinações acima. Portanto, para chegar ao campo de busca de interna é preciso pressionar Alt+3 e depois Enter.</p>
											<p>No caso do Firefox, em vez de Alt + número, tecle simultaneamente Alt + Shift + número.</p>
											<p>Sendo Firefox no Mac OS, em vez de Alt + Shift + número, tecle simultaneamente Ctrl + Alt + número.</p>
											<p>No Opera, as teclas são Shift + Escape + número. Ao teclar apenas Shift + Escape, o usuário encontrará uma janela com todas as alternativas de ACCESSKEY da página.</p>
											<p>Ao final desse texto, você poderá baixar alguns arquivos que explicam melhor o termo acessibilidade e como deve ser implementado nos sites da Internet.</p>
											
											<br />
											
											<h3>Leis e decretos sobre acessibilidade:</h3>
											<ul>
												<li><a class="external-link" href="http://www.planalto.gov.br/ccivil_03/_Ato2004-2006/2004/Decreto/D5296.htm">Decreto nº 5.296 de 02 de dezembro de 2004</a></li>
												<li><a href="http://www.planalto.gov.br/ccivil_03/_ato2007-2010/2009/decreto/d6949.htm">Decreto nº 6.949, de 25 de agosto de 2009 - Promulga a Convenção Internacional sobre os Direitos das Pessoas com Deficiência e seu rotocolo Facultativo, assinados em Nova York, em 30 de março de 2007</a></li>
												<li><a href="http://www.planalto.gov.br/ccivil_03/_ato2011-2014/2012/Decreto/D7724.htm">Decreto nº 7.724, de 16 de Maio de 2012 - Regulamenta a Lei No 12.527, que dispõe sobre o acesso a informações.</a></li>
												<li><a class="external-link" href="http://www.governoeletronico.gov.br/acoes-e-projetos/e-MAG">Modelo de Acessibilidade de Governo Eletrônico</a></li>
												<li class="last-item"><a href="http://www.governoeletronico.gov.br/biblioteca/arquivos/portaria-no-03-de-07-05-2007">Portaria nº 03, de 07 de Maio de 2007 - formato.pdf (35,5Kb) - Institucionaliza o Modelo de Acessibilidade em Governo Eletrônico – e-MAG</a></li>
											</ul>
											
											<br />
											
											<h3>Dúvidas, sugestões e críticas:</h3>
											<p>No caso de problemas com a acessibilidade do portal, favor <a class="external-link" href="http://tv1-lnx-04.grupotv1.com/portalmodelo/fale-conosco" target="_self">entrar em contato</a>.</p>
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
