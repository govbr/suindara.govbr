<?php if(empty($midias)) { ?>
  <p class="noInfo">Voc&ecirc; n&atilde;o possu&iacute; m&iacute;dias cadastradas para esta <?php echo ($tipo_conteudo == 'noticia') ? 'not&iacute;cia' : 'p&aacute;gina'; ?>!</p>
<?php } else { ?>
  <?php foreach($midias as $k => $midia): ?>
    <li class="<?php echo ($midia['Midia']['ativa']) ? 'ativo' : 'inativo';?> parent_li">
      <div class="preview">
        <ul class="opcoesMidia">
          <li class="numero"><?php echo ($midia['MidiasConteudo']['posicao']); ?></li>

          <?php if ($k != 0) { ?>
          <li class="ant"><?php
            echo $this->Html->link('<span class="oculto">Mover "'.$midia['Midia']['titulo'].'" para a</span> posição anterior', array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias_conteudos', 'action' => 'move_up', 'id_midia' => $midia['MidiasConteudo']['id']), array('class' => 'move_up', 'escape' => false)); ?></li>
          <?php } ?>


          <?php if ($k != count($midias) - 1) { ?>
          <li class="prox"><?php
            echo $this->Html->link('<span class="oculto">Mover "'.$midia['Midia']['titulo'].'" para a</span> próxima posição', array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias_conteudos', 'action' => 'move_down', 'id_midia' => $midia['MidiasConteudo']['id']), array('class' => 'move_down', 'escape' => false)); ?></li>
          <?php } ?>

          <?php if($midia['Midia']['tipo_id'] == IMAGEM && $midia['Midia']['ativa']) { ?>
          <li class="principal" <?php echo ($midia['MidiasConteudo']['destaque']) ? 'id="destaque"' : '';?>><?php
              echo $this->Html->link('<span class="oculto">Definir "'.$midia['Midia']['titulo'].'" como imagem</span> principal', array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias_conteudos', 'action' => 'destaque', 'id_midia' => $midia['MidiasConteudo']['id']), array('class' => 'adicionar_destaque', 'escape' => false)); 
          ?></li>
          <?php } ?>
        </ul>

        <?php echo $this->Midias->thumb($midia['Midia']['arquivo'], $midia['Midia']['tipo_id']); ?>

        <p>
          <?php if(!$midia['Midia']['ativa']) $midia['Midia']['titulo'] = $midia['Midia']['nome_original']; ?>
          <span><?php echo $midia['Midia']['titulo']; ?></span>
        </p>

      </div>

      <?php if($midia['Midia']['ativa'] != 1){ ?>
        <p class="aviso">Imagem sem texto alternativo!</p>
      <?php } ?>

      <ul class="action">
        <li><?php
          if($midia['Midia']['banco_imagens'] == 0) {
          //não vem do banco de imagens
          echo $this->Html->link('Editar <span class="oculto"> '.$tipos[$midia['Midia']['tipo_id']].' "'.$midia['Midia']['titulo'].'"</span>', array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias', 'action' => $this->Midias->editAction($midia['Midia']['tipo_id']), 'id_midia' => $midia['Midia']['id']), array('id' => 'editar_midia', 'escape' => false, 'class'  => 'edit')); ?></li>

        <li class="iconControll"><?php
          echo $this->Html->link('Deletar <span class="oculto"> '.$tipos[$midia['Midia']['tipo_id']].' "'.$midia['Midia']['titulo'].'"</span>', array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias', 'action' => 'delete', 'id_midia' => $midia['Midia']['id']), array('class' => 'midia_delete del', 'escape' => false), 'Você tem certeza que deseja deletar '.$midia['Midia']['titulo'].' ?');

          } else {
          //vem do banco de imagens
          echo $this->Html->link('Remover imagem <span class="oculto"> '.$tipos[$midia['Midia']['tipo_id']].' "'.$midia['Midia']['titulo'].'"</span>', array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias_conteudos', 'action' => 'delete', 'id_midia' => $midia['MidiasConteudo']['id']), array('class' => 'midia_conteudo_delete remove', 'escape' => false), 'Você tem certeza que deseja remover '.$midia['Midia']['titulo'].' ?');
          }
        ?></li>
      </ul>
    </li>
  <?php endforeach; ?>
<?php } ?>