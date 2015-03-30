<?php echo $this->element('progress', array('porcentagem' => '75')); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="control-group">
        <?php
            echo $this->Form->create('Usuarios.Usuario');
                echo $this->Form->input('Usuario.nome', array('type' => 'text', 'label' => 'Nome do Usuário'));
                echo $this->Form->input('Usuario.email', array('type' => 'text', 'label' => 'E-mail'));
                echo $this->Form->input('Usuario.departamento', array('type' => 'text', 'label' => 'Departamento'));
                echo $this->Form->input('Usuario.telefone', array('type' => 'text', 'label' => 'Telefone'));
                echo $this->Form->input('Usuario.instituicao', array('type' => 'text', 'label' => 'Instituição'));
                echo $this->Form->input('Usuario.senha', array('type' => 'password', 'label' => 'Senha'));
                echo $this->Form->input('Usuario.confirmacao', array('type' => 'password', 'label' => 'Repita a Senha'));
            echo $this->Form->end('Criar Administrador');
        ?>
        </div>
    </div>
</div>