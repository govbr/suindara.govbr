<?php
  $tipo_conteudo = $this->request->params['tipo_conteudo'];
  $id_conteudo = $this->request->params['id_conteudo'];

  if( $this->Session->read('tipo_request') == 'edit' )
      $acao = 'Edição';
  else
      $acao = 'Cadastro';

  if($tipo_conteudo == 'noticia') {
  	$this->Html->addCrumb('Notícias',  array('plugin' => 'noticias', 'controller' => 'noticias', 'action' => 'index'));
    $this->Html->addCrumb("{$acao} de Notícia - Mídias", array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias' ,'action' => 'midias'));
  } else {
  	$this->Html->addCrumb('Páginas',  array('plugin' => 'paginas', 'controller' => 'paginas', 'action' => 'index'));
    $this->Html->addCrumb("{$acao} de Página - Mídias", array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias' ,'action' => 'midias'));
  }

  
?>

<?php 
  $nomeConteudo = ($tipo_conteudo == 'noticia') ? 'notícia' : 'página';
  $countImgsSemDescricao = 0;
?>

<h2 class="row"><?php echo $acao; ?> de <span><?php echo ($tipo_conteudo=='noticia') ? 'Notícia' : 'Página'; ?></span></h2>
<?php echo $this->element('../Midias/_form', array('mimes' => $mimes)); ?>

<div class="imagensNoticia">
  <h3>Mídias da <span><?php echo ucfirst($nomeConteudo); ?></span></h3>
  
  <?php if(empty($midias)){ ?>
 
    <p class="noInfo">Voc&ecirc; n&atilde;o possu&iacute; m&iacute;dias cadastradas para esta <?php echo ($tipo_conteudo == 'noticia') ? 'not&iacute;cia' : 'p&aacute;gina'; ?>!</p>

  <?php } else { ?>
 
  <ul class="midias_conteudo_lista banco_imagens_lista">
    <?php foreach($midias as $k => $midia): ?>
      <?php if(!$midia['Midia']['ativa']) $midia['Midia']['titulo'] = $midia['Midia']['nome_original']; ?>
      <li class="<?php echo ($midia['Midia']['ativa']) ? 'ativo' : 'inativo';?> parent_li">
        <div class="preview">
          <ul class="opcoesMidia">
            <li class="numero"><?php echo ($midia['MidiasConteudo']['posicao']); ?></li>

            <?php if ($k != 0) {   ?>
              <li class="ant"><?php
                echo $this->Html->link('<span class="oculto">Mover "'.$midia['Midia']['titulo'].'" para a</span> posição anterior', array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias_conteudos', 'action' => 'move_up', 'id_midia' => $midia['MidiasConteudo']['id']), array('class' => 'move_up', 'escape' => false)); ?></li>

            <?php } ?>
            
            <?php if ($k != count($midias) - 1) {   ?>    
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

        <?php if($midia['Midia']['ativa'] != 1){
            $countImgsSemDescricao++;
        ?>
            <p class="aviso">Imagem sem texto alternativo!</p>
        <?php } ?>

        <ul class="action">
          <li>
            <?php
            if($midia['Midia']['banco_imagens'] == 0) {
            //não vem do banco de imagens
            echo $this->Html->link('Editar <span class="oculto"> ' . $tipos[$midia['Midia']['tipo_id']] . ' ' . $midia['Midia']['titulo'] . ' </span>', 
                                      array('admin'         => true,
                                            'tipo_conteudo' => $tipo_conteudo,
                                            'id_conteudo'   => $id_conteudo,
                                            'controller'    => 'midias',
                                            'action'        => $this->Midias->editAction($midia['Midia']['tipo_id']), 
                                            'id_midia'      => $midia['Midia']['id']
                                           ), 
                                      array('id'     => 'editar_midia_' . $midia['Midia']['id'],
                                            'escape' => false,
                                            'class'  => 'edit'
                                           )
                                  ); 
            ?>
          </li>

          <li class="iconControll">
            <?php
              echo $this->Html->link('Deletar <span class="oculto"> ' . $tipos[$midia['Midia']['tipo_id']] . ' ' . $midia['Midia']['titulo'] . ' </span>', 
                                        array('admin'         => true,
                                              'tipo_conteudo' => $tipo_conteudo,
                                              'id_conteudo'   => $id_conteudo,
                                              'controller'    => 'midias',
                                              'action'        => 'delete',
                                              'id_midia'      => $midia['Midia']['id']
                                             ), 
                                        array(
                                              'class'  => 'del',
                                              //'class'  => 'midia_delete del', // Erro, ignora return false do confirm
                                              'escape' => false
                                             ), 
                                        'Você tem certeza que deseja deletar ' . $midia['Midia']['titulo'] . ' ?'
                                    );

            } else {
            //vem do banco de imagens
              // echo $this->Html->link('Remover imagem <span class="oculto"> ' . 'Remover ' . $tipos[$midia['Midia']['tipo_id']] . ' ' . $midia['Midia']['titulo'] . ' </span>',
              //                           array('admin'        => true,
              //                                'tipo_conteudo' => $tipo_conteudo,
              //                                'id_conteudo'   => $id_conteudo,
              //                                'controller'    => 'midias_conteudos',
              //                                'action'        => 'delete',
              //                                'id_midia'      => $midia['MidiasConteudo']['id']
              //                               ), 
              //                           array('class' => 'midia_conteudo_delete remove',
              //                                'escape' => false),
              //                           'Você tem certeza que deseja remover ' . $midia['Midia']['titulo'] . ' ?'
              //                         );
            }
            ?>
          </li>
        </ul>
      </li>
    <?php endforeach; ?>
  </ul>
 
  <?php } ?>
</div>

<div class="imagensBanco">
  <h3>Imagens do <span>Banco de Imagens</span></h3>
  <?php echo $this->element('../Midias/_search'); ?>
  
  <?php if(count($banco_imagens) == 0) { ?>
  
    <p class="noInfo">Nenhuma imagem encontrada!</p>
  
  <?php } else { ?>
  <ul id="itemContainer" class="banco_imagens_lista">
  
    <?php foreach($banco_imagens as $midia): ?>
      <li class="ativo parent_li">
        <div class="preview">
          <?php echo $this->Midias->thumb($midia['Midia']['arquivo'], $midia['Midia']['tipo_id']); ?>
          <p><span><?php echo $midia['Midia']['titulo']; ?></span></p>
        </div>

        <ul class="action">
          <li><?php echo $this->Html->link('Adicionar imagem <span class="oculto"> "'.$midia['Midia']['titulo'].'" ao conteúdo</span>', array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias_conteudos', 'action' => 'add', 'id_midia' => $midia['Midia']['id']), array('class' => 'midia_add add', 'escape' => false)); ?></li>
        </ul>
      </li>
    <?php endforeach; ?>
  </ul>

  <?php } ?>

  <div class="holder"></div>
</div>

<?php
  $this->Html->scriptBlock("
  $(document).ready(function () {
  	var conteudoId = '" .$id_conteudo. "';
  	var tipoConteudo = '" .$tipo_conteudo. "';

      $(document).on('click', 'a.adicionar_destaque', function(e) {
        var originalLink = $(this).parent().html();
      	var parent_li = $(this).parents('.parent_li');
      	var path = $(this).attr('href');
  		  var remove = '".$this->Html->url(array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias_conteudos', 'action' => 'destaque', 'id_midia' => 1))."';
  		  remove = remove.substring(0, (remove.length-1));

  		  var midiaId = path.replace(remove, '');

        $(this).parent().html('<img alt=\"Aguarde\" class=\"loader\" src=\"".$this->Html->url('/img/loader.gif')."\">');

          $.ajax({
              url: '".$this->Html->url(array('controller' => 'ajax', 'action' => 'destaque'))."',
              data: {id_midia : midiaId, id_conteudo : conteudoId, tipo_conteudo : tipoConteudo},
              success: function(XMLHttpRequest) {
              	var response = JSON.parse(XMLHttpRequest);
                	
                  $('.imagensNoticia .banco_imagens_lista').html(response.html);
                	flashMessage(response.message);
              },
              error: function(XMLHttpRequest) {
                $(parent_li).find('.principal').html(originalLink);
              	var response = JSON.parse(XMLHttpRequest.responseText);
              	flashMessage(response.message);
              }
          });
          e.preventDefault();
      });

  	$(document).on('click', 'a.move_up', function(e) {
      	var originalLink = $(this).parent().html();
        var parent_li = $(this).parents('.parent_li');
      	var prev_li = $(parent_li).prev();
      	var path = $(this).attr('href');
  		var remove = '".$this->Html->url(array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias_conteudos', 'action' => 'move_up', 'id_midia' => 1))."';
  		remove = remove.substring(0, (remove.length-1));

  		var midiaId = path.replace(remove, '');
          $(this).parent().html('<img alt=\"Aguarde\" class=\"loader\" src=\"".$this->Html->url('/img/loader.gif')."\">');

          $.ajax({
              url: '".$this->Html->url(array('controller' => 'ajax', 'action' => 'move_up'))."',
              data: {id_midia : midiaId, id_conteudo : conteudoId, tipo_conteudo : tipoConteudo},
              success: function(XMLHttpRequest) {
              	var response = JSON.parse(XMLHttpRequest);
                	
                	$('.imagensNoticia .banco_imagens_lista').html(response.html);
                	flashMessage(response.message);
              },
              error: function(XMLHttpRequest) {
                $(parent_li).find('.ant').html(originalLink);
                
              	var response = JSON.parse(XMLHttpRequest.responseText);
              	flashMessage(response.message);
              }
          });
          e.preventDefault();
      });

  	$(document).on('click', 'a.move_down', function(e) {
      	var originalLink = $(this).parent().html();
        var parent_li = $(this).parents('.parent_li');
      	var next_li = $(parent_li).next();
      	var path = $(this).attr('href');
  		  var remove = '".$this->Html->url(array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias_conteudos', 'action' => 'move_down', 'id_midia' => 1))."';
  		remove = remove.substring(0, (remove.length-1));

  		var midiaId = path.replace(remove, '');
          $(this).parent().html('<img alt=\"Aguarde\" class=\"loader\" src=\"".$this->Html->url('/img/loader.gif')."\">');

          $.ajax({
              url: '".$this->Html->url(array('controller' => 'ajax', 'action' => 'move_down'))."',
              data: {id_midia : midiaId, id_conteudo : conteudoId, tipo_conteudo : tipoConteudo},
              success: function(XMLHttpRequest) {
              	var response = JSON.parse(XMLHttpRequest);
                	
                  $('.imagensNoticia .banco_imagens_lista').html(response.html);
                	flashMessage(response.message);
              },
              error: function(XMLHttpRequest) {
                $(parent_li).find('.prox').html(originalLink);

              	var response = JSON.parse(XMLHttpRequest.responseText);
              	flashMessage(response.message);
              }
          });
          e.preventDefault();
      });

  	$(document).on('click', 'a.midia_conteudo_delete', function(e) {
        var originalLink = $(this).parent().html();
      	var parent_li = $(this).parents('.parent_li');
      	var path = $(this).attr('href');
  		  var remove = '".$this->Html->url(array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias_conteudos', 'action' => 'delete', 'id_midia' => 1))."';
  		remove = remove.substring(0, (remove.length-1));

  		var midiaId = path.replace(remove, '');
          $(this).parent().html('<img alt=\"Aguarde\" class=\"loader midia_banco_imagens\" src=\"".$this->Html->url('/img/loader.gif')."\">');

          $.ajax({
              url: '".$this->Html->url(array('controller' => 'ajax', 'action' => 'midia_conteudo_delete'))."',
              data: {id_midia : midiaId, id_conteudo : conteudoId, tipo_conteudo : tipoConteudo},
              success: function(XMLHttpRequest) {
              	var response = JSON.parse(XMLHttpRequest);
                $('.imagensNoticia .banco_imagens_lista').html(response.html1);
                $('.imagensBanco .banco_imagens_lista').find('.noInfo').remove();
                $('.imagensBanco .banco_imagens_lista').append(response.html2);

                	flashMessage(response.message);

                  imageList();
              },
              error: function(XMLHttpRequest) {
                $(parent_li).find('.iconControll').html(originalLink);

              	var response = JSON.parse(XMLHttpRequest.responseText);
              	flashMessage(response.message);
              }
          });
          e.preventDefault();
      });

  	$(document).on('click', 'a.midia_delete', function(e) {
        var originalLink = $(this).parent().html();
      	var parent_li = $(this).parents('.parent_li');
      	var path = $(this).attr('href');
  		  var remove = '".$this->Html->url(array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias', 'action' => 'delete', 'id_midia' => 1))."';
  		
      remove = remove.substring(0, (remove.length-1));

  		var midiaId = path.replace(remove, '');
          $(this).parent().html('<img alt=\"Aguarde\" class=\"loader\" src=\"".$this->Html->url('/img/loader.gif')."\">');

          $.ajax({
              url: '".$this->Html->url(array('controller' => 'ajax', 'action' => 'delete'))."',
              data: {id_midia : midiaId, id_conteudo : conteudoId, tipo_conteudo : tipoConteudo},
              success: function(XMLHttpRequest) {
              	var response = JSON.parse(XMLHttpRequest);
                	
                	$('.imagensNoticia .banco_imagens_lista').html(response.html);
                  flashMessage(response.message);
              },
              error: function(XMLHttpRequest) {
                $(parent_li).find('ul.action li').html(originalLink);

              	var response = JSON.parse(XMLHttpRequest.responseText);
              	flashMessage(response.message);
              }
          });
          e.preventDefault();
      });

  	$(document).on('click', 'a.midia_add', function(e) {
        var originalLink = $(this).parent().html();
        var parent_li = $(this).parents('.parent_li');
        var path = $(this).attr('href');
      var remove = '".$this->Html->url(array('admin' => true, 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'controller' => 'midias_conteudos', 'action' => 'add', 'id_midia' => 1))."';
      remove = remove.substring(0, (remove.length-1));

      var midiaId = path.replace(remove, '');
          $(this).parent().html('<img alt=\"Aguarde\" class=\"loader midia_banco_imagens\" src=\"".$this->Html->url('/img/loader.gif')."\">');

          $.ajax({
              url: '".$this->Html->url(array('controller' => 'ajax', 'action' => 'add'))."',
              data: {id_midia : midiaId, id_conteudo : conteudoId, tipo_conteudo : tipoConteudo},
              success: function(XMLHttpRequest) {
                var response = JSON.parse(XMLHttpRequest);
                  $(parent_li).remove();
                  
                  if($.trim($('.imagensBanco .banco_imagens_lista').html()) == '') {
                    $('.imagensBanco .banco_imagens_lista').html('<p class=\"noInfo\">Nenhuma imagem encontrada!</p>');
                  }

                  $('.imagensNoticia .banco_imagens_lista').html(response.html);
                  flashMessage(response.message);

                  imageList();
              },
              error: function(XMLHttpRequest) {
                 $(parent_li).find('ul.action li').html(originalLink);
                 
                var response = JSON.parse(XMLHttpRequest.responseText);
                flashMessage(response.message);
              }
          });
          e.preventDefault();
      });


      $('#avancar').on('click', function(e) {
          var numImgSemDescricao =  " . $countImgsSemDescricao . ";
          
          if (numImgSemDescricao > 0 ) {
            var strExiste = 'Existem ' ;
            var strImagem = ' mídias ';

            if (numImgSemDescricao == 1) {
              strExiste = 'Existe ';
              strImagem = ' mídia '
            } 

            return confirm(strExiste + numImgSemDescricao + strImagem + 'sem descrição, deseja prosseguir mesmo assim ?');
          } 

          return true;
      });

  });", array('inline' => false));

  echo '<div class="form">';
    echo $this->Form->create('Midia', array('type' => 'file', 'id' => 'MidiaArquivoFormAdd'));	
        
      echo '<fieldset id="acaoForm">';
        echo '<legend class="oculto">A&ccedil&atildeo do formul&aacute;rio</legend>';


      echo $this->Form->input('midias..Midia.arquivo', array('type' => 'hidden'));
            
      echo $this->Form->input('voltar', array('type' => 'submit', 'label' => false,  'value' => 'Voltar', 'name' => 'voltar', 'class' => 'controle'));						  
      echo $this->Form->input('Avançar', array('type' => 'submit', 'label' => false,  'value' => 'Avançar', 'name' => 'avancar', 'id' => 'avancar', 'class' => 'controle'));
      
       echo $this->Form->input('descartar', array('type' => 'submit', 'label' => false, 'value' => 'Descartar', 
                    'class' => 'controle',
                    'onclick' => "return confirm('Você tem certeza que deseja deletar esta {$nomeConteudo} ?');"));
      echo $this->Form->input('salvar', array('type' => 'submit', 'label' => false, 'value' => 'Salvar'));
    echo '</fieldset>';

    echo $this->Form->end();
    
    $tp = $tipo_conteudo . 's';
    echo $this->Html->link('Cancelar', array('plugin' => $tp, 'controller' => $tp, 'action' => 'index'), array('id'=>'cancelar'));
  echo '</div>';