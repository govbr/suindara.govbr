<table>
    <tr>
        <th><?php echo $this->Paginator->sort('resumo', '<span class="bullet">Ordenar por </span><span class="texto">Resumo</span>', array('escape' => false)); ?></th>
        <th><?php echo $this->Paginator->sort('status_id', '<span class="bullet">Ordenar por </span><span class="texto">Status</span>', array('escape' => false)); ?></th>
        <th></th>
        <th></th>
    </tr>
       <?php foreach ($noticias as $noticia): ?>
    <tr>
        <td><?php echo $noticia['Noticia']['resumo']; ?> </td>
        <td><?php print_r($noticia['Status']['nome']); ?> </td>
        <td><?php echo $this->Html->link('Editar', '/admin/noticias/edit/' . $noticia['Noticia']['id']) ?></td>
        <td><?php echo $this->Html->link('Excluir', '/admin/noticias/delete/' . $noticia['Noticia']['id']) ?></td>
    </tr
    </tr>
    <?php endforeach; ?>
</table>