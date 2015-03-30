<?php echo $this->element('progress', array('porcentagem' => '100')); ?>

<div class="row">
    <div class="col-xs-12">
        <p>Parabéns! O sistema foi instalado com sucesso!</p>
        
        <?php
            echo $this->Html->link('Ir para a Administração', Router::url('/admin', true), array('class' => 'btn btn-primary'));
        ?>
    </div>
</div>