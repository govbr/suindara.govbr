<?php
	$this->Html->addCrumb('Cursos',  array('plugin' => 'cursos', 'controller' => 'cursos', 'action' => 'index'));
	$this->Html->addCrumb('Visualizar',  array('plugin' => 'cursos', 'controller' => 'cursos', 'action' => 'visualizar'));
?>

<h2 class="row">Visualiza&ccedil;&atilde;o de <span><?php echo $this->name; ?></span></h2>

<div class="row exibicao">
	<?php 
		//if(isset($categoria_pai['Categoria']['titulo'])){
	?>
			<!-- <p>Categoria Pai <span class="w40"><?php echo $categoria_pai['Categoria']['titulo'] ?></span></p> -->
	<?php
		//}
	?>
	<p>Nome: <span class="w40"><?php echo $curso['Curso']['nome'] ?></span></p>
	<p>Descri&ccedil;&atilde;o: <span class="w97"><?php echo $curso['Curso']['descricao'] ?></span></p>

	<p>Modalidade: <span class="w40"><?php echo $curso['Modalidade']['titulo'] ?></span></p>
	<p>Manhã <span class="w40"><?php echo $curso['Curso']['turno_manha'] ?></span></p>
	<p>Tarde <span class="w40"><?php echo $curso['Curso']['turno_tarde'] ?></span></p>
	<p>Vespertino <span class="w40"><?php echo $curso['Curso']['turno_vespertino'] ?></span></p>
	<p>Noite <span class="w40"><?php echo $curso['Curso']['turno_noite'] ?></span></p>
	<p>Dura&ccedil;&atilde;o: <span class="w40"><?php echo $curso['Curso']['duracao'] ?></span></p>
	<p>Tipo da Dura&ccedil;&atilde;o: <span class="w40"><?php echo $curso['Curso']['tipo_duracao'] ?></span></p>
	<p>Nome do Coordenador: <span class="w40"><?php echo $curso['Curso']['nome_coordenador'] ?></span></p>
	<p>Email do Coordenador: <span class="w40"><?php echo $curso['Curso']['email_coordenador'] ?></span></p>
	<p>Pr&eacute;-requisito do curso: <span class="w40"><?php echo $curso['Curso']['pre_requisito'] ?></span></p>
	<p>Formas de ingresso: <span class="w40"><?php echo $curso['Curso']['formas_ingresso'] ?></span></p>
	
	<?php echo $this->Html->link('Voltar', array('plugin' => 'cursos', 'controller' => 'cursos', 'action' => 'index'), array('id'=>'voltar')); ?> 
</div>




	