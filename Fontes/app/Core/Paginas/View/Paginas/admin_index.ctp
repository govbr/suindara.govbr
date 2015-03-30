<?php
$this->Html->addCrumb('Listagem de Páginas',  array('plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'index'));
?>

<h2 class="row">Listagem de <span>P&aacute;ginas</span></h2>
<div class="row controlist">
	<?php echo $this->Html->link('Adicionar nova página<span></span>', '/admin/paginas/add/', array('class' => 'threecol add', 'escape' => false)); ?>

	<div id="busca_simples" class="eightcol">
		<?php echo $this->element('Form/_search'); ?>
	</div>
</div>


<?php
 

?>
<?php if(count($paginas) == 0) { ?>
	<p class="noInfo">Nenhum registro encontrado</p>
<?php } else { ?>
    <table class="row" summary="Tabela de listagem de páginas">
    	<thead>
            <tr>
            	<th><?php echo $this->Paginator->sort('titulo', '<span class="bullet">Ordenar por </span><span class="texto">Título</span>', array('escape' => false)); ?></th>
    			<th><?php echo $this->Paginator->sort('status_id', '<span class="bullet">Ordenar por </span><span class="texto">Status</span>', array('escape' => false)); ?></th>
                <th>A&ccedil;&otilde;es</th>
                
            </tr>
        </thead>
           <?php foreach ($paginas as $pagina): ?>
        <tbody>	
            <tr>
                <td><?php echo $pagina['Pagina']['titulo'] ?> </td>
                <td><?php print_r($pagina['Status']['nome']); ?> </td>
                <td>
                	<ul>
    					<li><?php echo $this->Html->link('Visualizar <span class="oculto">página: '.$pagina['Pagina']['id'].'</span>', '/admin/paginas/view/' . $pagina['Pagina']['id'], array('class' => 'view', 'escape' => false)); ?></li>
    					<li><?php echo $this->Html->link('Editar <span class="oculto">página: '.$pagina['Pagina']['id'].'</span>', '/admin/paginas/edit/' . $pagina['Pagina']['id'], array('class' => 'edit', 'escape' => false)); ?></li>
    					<li><?php echo $this->Html->link('Deletar <span class="oculto">página: '.$pagina['Pagina']['id'].'</span>', '/admin/paginas/delete/' . $pagina['Pagina']['id'], array('class' => 'del', 'escape' => false), 'Você tem certeza que deseja deletar a página ' . $pagina['Pagina']['titulo'] . '?'); ?></li>
    				</ul>
    			</td>
            </tr>
            <?php endforeach; ?>
       </tbody>
    </table>
<?php }

echo $this->Element('paginator');