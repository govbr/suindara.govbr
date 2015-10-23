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
								   		$this->Html->addCrumb('Cursos e Modalidades');
										echo $this->element('breadcrumb');
								  	?>
								</div>
							</div>
							
							<div class="">
								<div id="content">
									
									<h2 class="documentFirstHeading">Cursos e Modalidades</h2>
									
									<p class="documentDescription description">Exemplo para recuperar os cursos e as modalidades</p>
									
									<div id="viewlet-above-content-body"></div>
									
									<div id="content-core">
										<div id="parent-fieldname-text">
											<p></p>
											<p></p>
											<p>
												<?php 
													echo '<strong>Recuperando um curso pelo id</strong>';
													echo "<br>";

													$curso = $this->CmsCursos->getCurso(56);
													echo 'id: ' . $curso->id;
													echo "<br>";
													echo 'Nome: ' . $curso->nome;
													echo "<br>";
													echo 'Descricao: ' . $curso->descricao;
													
													echo '</br></br></br>';
													echo '<strong>Recuperando todos os cursos</strong>';
													echo "<br>";

													$cursos = $this->CmsCursos->getCursos();
													foreach ($cursos as $index => $object) {
														echo 'id: ' . $object->id;
														echo "<br>";
														echo 'Nome: ' . $object->nome;
														echo "<br>";
														echo 'Descricao: ' . $object->descricao;
														echo "</br></br>";
													}

													echo '</br></br></br>';
													echo '<strong>Recuperando todos os cursos ordenado pelas modalidades</strong>';
													echo "<br>";

													$cursos = $this->CmsCursos->getCursosByModalidade();
													foreach ($cursos as $index => $object) {
														echo 'id: ' . $object->id;
														echo "<br>";
														echo 'Nome: ' . $object->nome;
														echo "<br>";
														echo 'Descricao: ' . $object->descricao;
														echo "<br>";
														echo 'Modalidade: ' . $object->modalidade_id;
														echo "</br></br>";
													}

													echo '</br></br></br>';
													echo '<strong>Recuperando todos os cursos ordenado pelo campus</strong>';
													echo "<br>";

													$cursos = $this->CmsCursos->getCursosByCampus();
													foreach ($cursos as $index => $object) {
														echo 'id: ' . $object->id;
														echo "<br>";
														echo 'Nome: ' . $object->nome;
														echo "<br>";
														echo 'Descricao: ' . $object->descricao;
														echo "<br>";
														echo 'Site: ' . $object->site_id;
														echo "</br></br>";
													}

													echo '</br></br></br>';
													echo '<strong>Recuperando todos os cursos ordenado pelos turnos </strong>';
													echo "<br>";

													$cursos = $this->CmsCursos->getCursosByTurnos();
													foreach ($cursos as $index => $object) {
														echo 'id: ' . $object->id;
														echo "<br>";
														echo 'Nome: ' . $object->nome;
														echo "<br>";
														echo 'Descricao: ' . $object->descricao;
														echo "<br>";
														echo 'Turno Manhã: ' . $object->turno_manha;
														echo "<br>";
														echo 'Turno Tarde: ' . $object->turno_tarde;
														echo "<br>";
														echo 'Turno Vespertino: ' . $object->turno_vespertino;
														echo "<br>";
														echo 'Turno noite: ' . $object->turno_noite;
														echo "</br></br>";
													}

													echo '</br></br></br>';
													echo '<strong>Recuperando todos os cursos pelo filtro dos turnos (turnos ordenados) </strong>';
													echo "<br>";

													$cursos = $this->CmsCursos->getCursosByFilterTurno(false, true, false, false);
													foreach ($cursos as $index => $object) {
														echo 'id: ' . $object->id;
														echo "<br>";
														echo 'Nome: ' . $object->nome;
														echo "<br>";
														echo 'Descricao: ' . $object->descricao;
														echo "<br>";
														echo 'Turno Manhã: ' . $object->turno_manha;
														echo "<br>";
														echo 'Turno Tarde: ' . $object->turno_tarde;
														echo "<br>";
														echo 'Turno Vespertino: ' . $object->turno_vespertino;
														echo "<br>";
														echo 'Turno noite: ' . $object->turno_noite;
														echo "</br></br>";
													}

													echo '</br></br></br>';
													echo '<strong>Teste</strong>';
													echo "<br>";

													$modalidade = $this->CmsModalidades->getModalidade(8);
													echo 'Nome: ' . $modalidade->titulo;
													$cursosAux = $modalidade->getCursos();
													foreach ($cursosAux as $index => $object) {
														echo 'id: ' . $object->id;
														echo "<br>";
														echo 'Nome: ' . $object->nome;
														echo "</br></br>";
													}
													
												?>
											</p>
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
			
<?php echo $this->element('rodape'); ?>
