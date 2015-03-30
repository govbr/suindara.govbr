<?php echo $this->element('progress', array('porcentagem' => '50')); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="control-group">
        <?php
            echo $this->Form->create(false, array(
                'url' => Router::url('/instalar/database', true),
            ));
        ?>

        <?php
            echo $this->Form->input('host', array(
                'label' => 'Endereço do Servidor',
                'default' => 'localhost',
            ));

            echo $this->Form->input('port', array(
                'label' => 'Porta (deixe em branco para usar o padrão)',
            ));

            echo $this->Form->input('login', array(
                'label' => 'Login',
                'default' => 'root',
            ));

            echo $this->Form->input('password', array(
                'label' => 'Senha',
            ));

            echo $this->Form->input('database', array(
                'label' => 'Nome do BD',
                'default' => 'cms3',
            ));

            echo $this->Form->end('Continuar');
        ?>
        </div>
    </div>
</div>