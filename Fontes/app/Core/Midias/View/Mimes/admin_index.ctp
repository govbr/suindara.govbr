<?php
	$this->Html->addCrumb('Extens&otilde;es de arquivos',  array('plugin' => 'midias', 'controller' => 'mimes', 'action' => 'index'));
?>

<h2 class="row">Listagem de <span>Extens&otilde;es de Arquivos</span></h2>
<div class="row controlist">
	<?php echo $this->Html->link('Adicionar nova extens&atilde;o<span></span>',  array('plugin' => 'midias', 'controller' => 'mimes', 'action' => 'add'), array('class' => 'threecol add', 'escape' => false)); ?>

	<div id="busca_simples" class="eightcol">
		<?php echo $this->element('../Mimes/_search'); ?>
		<a href="#" id="exp_busca"><span>Expandir op&ccedil;&otilde;es de busca avan&ccedil;ada</span></a>
	</div>

	<div id="busca_avancada" <?php echo ($this->Session->read('Auth.User.modo_sistema') == MODO_SISTEMA_PADRAO) ? 'style="display: none;"' : ''; ?>>
		<?php echo $this->element('../Mimes/_advanced_search'); ?>
	</div>
</div>


<?php $mimesCount = count($mimes); ?>

<?php if($mimesCount == 0) { ?>
    <p class="noInfo">Nenhum registro encontrado. 
    <?php echo $this->Html->link("Voltar para a listagem de extens&otilde;es de arquivos.", 
                                 Router::url(array('plugin' => 'midias', 'controller' => 'mimes', 'action' => 'index'), true),
                                 array('escape' => false) ); ?>
    </p>
<?php } else { ?>

	<?php  if(!$this->request->isGet()){ ?>
        <p class="noInfo">
            <?php
                if ($mimesCount > 1) {
             ?>
                Foram encontrados <?php echo $mimesCount ?> extens&otilde;es.
            
            <?php } else { ?>

                Foi encontrado 1 extens&atilde;o.

            <?php } ?>

            <?php echo $this->Html->link('Voltar para a listagem de extens&otilde;es de arquivos.', 
                                     Router::url(array('plugin' => 'midias', 'controller' => 'mimes', 'action' => 'index'), true),
                                     array('escape' => false) ); ?>            
        </p>
    <?php } ?>
	<table class="row" summary="Tabela de listagem das extens&otilde;es de arquivos">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('extensao', '<span class="bullet">Ordenar por </span><span class="texto">Extens&atilde;o</span>', array('escape' => false)); ?></th>
				<th><?php echo $this->Paginator->sort('Tipo.nome', '<span class="bullet">Ordenar por </span><span class="texto">Categoria</span>', array('escape' => false)); ?></th>
				<th><?php echo $this->Paginator->sort('mime', '<span class="bullet">Ordenar por </span><span class="texto">Tipo de Conte&uacute;do</span>', array('escape' => false)); ?></th>
				<th><?php echo $this->Paginator->sort('ativo', '<span class="bullet">Ordenar por </span><span class="texto">Ativar/Desativar</span>', array('escape' => false)); ?></th>
				<th class="two_actions">A&ccedil;&otilde;es</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($mimes as $mime): ?>
			<?php $status = ($mime['Mime']['ativo'] == 1) ? 'desativar' : 'ativar'; ?>
			<tr>
				<td><?php echo $mime['Mime']['extensao']; ?></td>
				<td><?php echo $mime['Tipo']['nome']; ?></td>
				<td><?php echo $mime['Mime']['mime']; ?></td>
				<td><?php echo $this->Html->link(ucwords($status).'<span class="oculto"> a extens&atilde;o: ' .$mime['Mime']['extensao'].'</span>',  array('plugin' => 'midias', 'controller' => 'mimes', 'action' => 'status', $mime['Mime']['id']), array('class' => $status, 'escape' => false)); ?></td>
				<td class="two_actions">
					<ul>
						<li>
							<?php echo $this->Html->link('Editar <span class="oculto">extens&atilde;o: '.$mime['Mime']['extensao'].'</span>', array('plugin' => 'midias', 'controller' => 'mimes', 'action' => 'edit', $mime['Mime']['id']), array('class' => 'edit', 'escape' => false)); ?>
						</li>
						<li>
							<?php echo $this->Html->link('Excluir <span class="oculto">extens&atilde;o: '.$mime['Mime']['extensao'].'</span>', array('plugin' => 'midias', 'controller' => 'mimes', 'action' => 'delete', $mime['Mime']['id']), array('class' => 'del', 'escape' => false), 'Voc&ecirc; tem certeza que deseja excluir a extens&atilde;o '.$mime['Mime']['extensao'].' ?'); ?>
						</li>
					</ul>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php }

echo $this->Element('paginator');