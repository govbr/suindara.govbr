<?php
$this->Html->addCrumb('Listagem de Notícias',  array('plugin' => 'noticias', 'controller' => 'noticias', 'action' => 'index'));
?>

<h2 class="row">Listagem de <span>Not&iacute;cias</span></h2>
<div class="row controlist">
	<?php echo $this->Html->link('Adicionar nova notícia<span></span>', '/admin/noticias/add/', array('class' => 'threecol add', 'escape' => false)); ?>

	<div id="busca_simples" class="eightcol">
		<?php echo $this->element('Form/_search'); ?>
		<a href="#" id="exp_busca"><span>Expandir opções de busca avançada</span></a>
	</div>

	<div id="busca_avancada" <?php echo ($this->Session->read('Auth.User.modo_sistema') == MODO_SISTEMA_PADRAO) ? 'style="display: none;"' : ''; ?>>
		<?php echo $this->Element('Form/_advanced_search'); ?>
	</div>
</div>

<?php $noticiasCount = count($noticias); ?>
<?php if($noticiasCount == 0) { ?>
	<p class="noInfo">Nenhum registro encontrado. 
    <?php echo $this->Html->link('Voltar para a listagem de notícias.', 
                                 Router::url(array('plugin' => 'noticias', 'controller' => 'noticias', 'action' => 'index'), true)); ?>
    </p>

<?php } else { ?>

  <?php  if (!$this->request->isGet()) { ?>
        <p class="noInfo">
            <?php
                if ($noticiasCount > 1) {
             ?>
                Foram encontradas <?php echo $noticiasCount ?> notícias.
            
            <?php } else { ?>

                Foi encontrada 1 notícia.

            <?php } ?>

            <?php echo $this->Html->link('Voltar para a listagem de notícias.', 
                                     Router::url(array('plugin' => 'noticias', 'controller' => 'noticias', 'action' => 'index'), true)); ?>

            
        </p>
    <?php } ?>


    <table class="row" summary="Tabela de listagem de notícias">
    	<thead>
        <tr>
            
            <th><?php echo $this->Paginator->sort('titulo', '<span class="bullet">Ordenar por </span><span class="texto">Título</span>', array('escape' => false)); ?></th>
			<th><?php echo $this->Paginator->sort('status_id', '<span class="bullet">Ordenar por </span><span class="texto">Status</span>', array('escape' => false)); ?></th>
			<th>A&ccedil;&otilde;es</th>
        </tr>
        </thead>
           <?php foreach ($noticias as $noticia): ?>
        <tbody>   	
        <tr>
        	
        	<td><?php echo $noticia['Noticia']['titulo'] ?> </td>
            <td>
            	<?php
            		$spanClass = ($noticia['Status']['nome'] == 'Rascunho') ? 'rascunho' : 'publico';
            		echo "<span class=\"{$spanClass}\">" . $noticia['Status']['nome'] . '</span>'; 
            	?> 
            </td>
			
			<td>
				<ul>
					<li><?php echo $this->Html->link('Visualizar <span class="oculto">notícia: '.$noticia['Noticia']['titulo'].'</span>', '/admin/noticias/view/' . $noticia['Noticia']['id'], array('class' => 'view', 'escape' => false)); ?></li>
					<li><?php echo $this->Html->link('Editar <span class="oculto">notícia: '.$noticia['Noticia']['titulo'].'</span>', '/admin/noticias/edit/' . $noticia['Noticia']['id'], array('class' => 'edit', 'escape' => false)); ?></li>
					<li><?php echo $this->Html->link('Deletar <span class="oculto">notícia: '.$noticia['Noticia']['titulo'].'</span>', '/admin/noticias/delete/' . $noticia['Noticia']['id'], array('class' => 'del', 'escape' => false), 'Você tem certeza que deseja deletar a notícia \''.$noticia['Noticia']['titulo'].'\' ?'); ?></li>
				</ul>
			</td>

        </tr>
        </tbody>
        <?php endforeach; ?>
    </table>
<?php } ?>

	<?php echo $this->Element('paginator');
