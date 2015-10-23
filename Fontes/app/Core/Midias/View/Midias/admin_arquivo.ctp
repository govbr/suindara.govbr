<?php
	
$tipo_conteudo = $this->request->params['tipo_conteudo'];
$id_conteudo = $this->request->params['id_conteudo'];

//pr($this->Session->read('tipo_request'));
if( $this->Session->read('tipo_request') == 'edit' ){
	$acao = 'Edição';
}else{
	$acao = 'Cadastro';
}


switch ($tipo_conteudo) {
	case 'noticia':
		//Titulo da página
		$title = 'Notícias';

		// Botao cancelar
		$botaoVoltar = $this->Html->link('Cancelar', array('plugin' => 'noticias', 'controller' => 'noticias', 'action' => 'index'), array('id'=>'cancelar'));

		// Criacao dos breadCrumb
		$this->Html->addCrumb('Notícias',  array('plugin' => 'noticias', 'controller' => 'noticias', 'action' => 'index'));
		$this->Html->addCrumb("{$acao} de Notícia - Mídias",  array('plugin' => 'midias', 'controller' => 'midias', 'tipo_conteudo' => $this->params['tipo_conteudo'], 'id_conteudo' => $this->params['id_conteudo'], 'action' => 'arquivos'));
		break;

	case 'pagina':
		//Titulo da página
		$title = 'Páginas';

		// Botao cancelar
		$botaoVoltar = $this->Html->link('Cancelar', array('plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'index'), array('id'=>'cancelar'));

		// Criacao dos breadCrumb
		$this->Html->addCrumb('Páginas',  array('plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'index'));
		$this->Html->addCrumb("{$acao} de Página - Mídias",  array('plugin' => 'midias', 'controller' => 'midias', 'tipo_conteudo' => $this->params['tipo_conteudo'], 'id_conteudo' => $this->params['id_conteudo'], 'action' => 'arquivos'));
		break;

	case 'curso':
		//Titulo da página
		$title = 'Curso';

		// Botao cancelar
		$botaoVoltar = $this->Html->link('Cancelar', array('plugin' => 'cursos', 'controller' => 'cursos', 'action' => 'index'), array('id'=>'cancelar'));

		// Criacao dos breadCrumb
		$this->Html->addCrumb('Cursos',  array('plugin' => 'cursos', 'controller' => 'cursos', 'action' => 'index'));
		$this->Html->addCrumb("{$acao} de Cursos - Mídias",  array('plugin' => 'midias', 'controller' => 'midias', 'tipo_conteudo' => $this->params['tipo_conteudo'], 'id_conteudo' => $this->params['id_conteudo'], 'action' => 'arquivos'));
		break;

	case 'edital':
		//Titulo da página
		$title = 'Edital';

		// Botao cancelar
		$botaoVoltar = $this->Html->link('Cancelar', array('plugin' => 'editais', 'controller' => 'editais', 'action' => 'index'), array('id'=>'cancelar'));

		// Criacao dos breadCrumb
		$this->Html->addCrumb('Editais',  array('plugin' => 'editais', 'controller' => 'editais', 'action' => 'index'));
		$this->Html->addCrumb("{$acao} de Editais - Mídias",  array('plugin' => 'midias', 'controller' => 'midias', 'tipo_conteudo' => $this->params['tipo_conteudo'], 'id_conteudo' => $this->params['id_conteudo'], 'action' => 'arquivos'));
		break;

	default:
		$this->Html->addCrumb('Edição de Documentos',  array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias', 'action' => 'arquivo', 'id_midia' => $this->data['Midia']['id']));
		break;
}

// if($tipo_conteudo == 'noticia') {
// 	$this->Html->addCrumb('Notícias',  array('plugin' => 'noticias', 'controller' => 'noticias', 'action' => 'index'));
// 	$this->Html->addCrumb("{$acao} de Notícia - Mídias",  array('plugin' => 'midias', 'controller' => 'midias', 'tipo_conteudo' => $this->params['tipo_conteudo'], 'id_conteudo' => $this->params['id_conteudo'], 'action' => 'arquivos'));
// } else {
// 	$this->Html->addCrumb('Páginas',  array('plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'index'));
// 	$this->Html->addCrumb("{$acao} de Página - Mídias",  array('plugin' => 'midias', 'controller' => 'midias', 'tipo_conteudo' => $this->params['tipo_conteudo'], 'id_conteudo' => $this->params['id_conteudo'], 'action' => 'arquivos'));
// }
// $this->Html->addCrumb('Edição de Documentos',  array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias', 'action' => 'arquivo', 'id_midia' => $this->data['Midia']['id']));

?>

<div class="content form">

	<h2 class="row"> <?php echo $acao; ?> de <span><?php echo $title; ?></span></h2>
	<h3>Edição de <span>arquivo</span></h3>
	<?php echo $this->Form->create('Midia'); ?>
	<fieldset>
		<legend class="oculto">Informações sobre o documento</legend>
		<?php
		echo $this->Form->input('Midia.id');
		echo $this->Form->input('Midia.titulo', array('label' => 'T&iacute;tulo', 'class'=>'w40'));
		echo $this->Form->input('Midia.descricao', array('label' => 'Descri&ccedil;&atilde;o', 'class'=>'w97'));
		echo $this->Form->input('Midia.fonte', array('label' => 'Fonte', 'class'=>'w97'));
		?>
	</fieldset>

	<?php 
		echo '<fieldset id="acaoForm">';
			echo '<legend class="oculto">A&ccedil&atildeo do formul&aacute;rio</legend>';
		
			echo $this->Form->input('voltar', array('type' => 'submit', 'label' => false,  'value' => 'Voltar', 'name' => 'voltar', 'class' => 'controle'));

			if ($this->data['Midia']['descricao'] && $this->data['Midia']['titulo']) 
			{
				echo $this->Form->submit('Restaurar valores', array('type' => 'reset', 'div' => false));
			}
			
			echo $this->Form->submit('Salvar');
		echo '</fieldset>';
			
		echo $this->Form->end();
	?>

	<?php
		// Mostrar botao voltar na pagina - setado a partir da linha 13
		// dependendo o tipo do conteudo
		echo $botaoVoltar;
	?>

</div>