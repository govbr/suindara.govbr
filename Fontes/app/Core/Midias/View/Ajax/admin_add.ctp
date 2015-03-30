<li class="<?php echo ($midia['Midia']['ativa']) ? 'ativo' : 'inativo';?> parent_li" <?php echo ($midia['MidiasConteudo']['destaque'] == "1") ? 'id="destaque"' : '';?>>
    <div class="preview">
      <ul class="opcoesMidia">
        <li class="numero"><?php echo ($midia['MidiasConteudo']['posicao']); ?></li>

        <li class="ant"><?php
          echo $this->Html->link('<span class="oculto">Mover "'.$midia['Midia']['titulo'].'" para a</span> posição anterior', array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias_conteudos', 'action' => 'move_up', 'id_midia' => $midia['MidiasConteudo']['id']), array('class' => 'move_up', 'escape' => false)); ?></li>

        <li class="prox"><?php
          echo $this->Html->link('<span class="oculto">Mover "'.$midia['Midia']['titulo'].'" para a</span> próxima posição', array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias_conteudos', 'action' => 'move_down', 'id_midia' => $midia['MidiasConteudo']['id']), array('class' => 'move_down', 'escape' => false)); ?></li>

        <li class="principal"><?php
            echo $this->Html->link('<span class="oculto">Definir "'.$midia['Midia']['titulo'].'" como imagem</span> principal', array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias_conteudos', 'action' => 'destaque', 'id_midia' => $midia['MidiasConteudo']['id']), array('class' => 'adicionar_destaque', 'escape' => false)); 
        ?></li>
      </ul>

      <?php echo $this->Midias->thumb($midia['Midia']['arquivo'], $midia['Midia']['tipo_id']); ?>

      <p>
        <span><?php echo $midia['Midia']['titulo']; ?></span>
      </p>
    </div>

    <ul class="action">
      <li><?php
        echo $this->Html->link('Remover imagem <span class="oculto"> '.$tipos[$midia['Midia']['tipo_id']].' "'.$midia['Midia']['titulo'].'"</span>', array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias_conteudos', 'action' => 'delete', 'id_midia' => $midia['MidiasConteudo']['id']), array('class' => 'midia_conteudo_delete remove', 'escape' => false), 'Você tem certeza que deseja remover '.$midia['Midia']['titulo'].' ?');
      ?></li>
    </ul>
</li>