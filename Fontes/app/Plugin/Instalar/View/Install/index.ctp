<?php echo $this->element('progress', array('porcentagem' => '25')); ?>

<?php $check = true; ?>

<div class="row">
    <div class="col-xs-12">
        <?php
            // tmp is writable
            if (is_writable(TMP)):
        ?>
                <div class="alert alert-success">
                    <p>Seu diret&oacute;rio "tmp" suporta escrita.</p>
                </div>
        <?php
            else:
                $check = false;
        ?>
                <div class="alert alert-warning">
                    <p>Seu diret&oacute;rio "tmp" <strong>N&Atilde;O</strong> suporta escrita.</p>
                </div>
        <?php
            endif;
        ?>

        <?php
            // config is writable
            if (is_writable(APP . 'Config') 
                && is_writable(APP . 'Config/database.php') 
                && is_writable(APP . 'Plugin/Instalar/Config/bootstrap.php')):
        ?>
                <div class="alert alert-success">
                    <p>Seus diret&oacute;rios "Config" e "Plugin/Instalar/Config" suportam escrita.</p>
                </div>
        <?php
            else:
                $check = false;
        ?>
                <div class="alert alert-warning">
                    <p>Os arquivos "Config/database.php", "Plugin/Instalar/Config/bootstrap.php" e o diret&oacute;rio "Config" <strong>N&Atilde;O</strong> suportam escrita.</p>
                </div>
        <?php
            endif;
        ?>

        <?php
            // php version
            $minPhpVersion = '5.2.8';
            $operator = '>=';
            if (version_compare(phpversion(), $minPhpVersion, $operator)):
        ?>
                <div class="alert alert-success">
                    <p>Vers&atilde;o do PHP <?php printf('%s %s %s', phpversion(), $operator, $minPhpVersion); ?></p>
                </div>
        <?php
            else:
                $check = false;
        ?>
                <div class="alert alert-warning">
                    <p>Vers&atilde;o do PHP <?php printf('%s < %s', phpversion(), $minPhpVersion); ?></p>
                </div>
        <?php
            endif;
        ?>

        <?php
            // cakephp version
            $minCakeVersion = '2.3.1';
            $cakeVersion = Configure::version();
            $operator = '>=';
            if (version_compare($cakeVersion, $minCakeVersion, $operator)):
        ?>
                <div class="alert alert-success">
                    <p>Vers&atilde;o do PHP <?php printf('%s %s %s', $cakeVersion, $operator, $minCakeVersion); ?></p>
                </div>
        <?php
            else:
                $check = false;
        ?>
                <div class="alert alert-warning">
                    <p>Vers&atilde;o do PHP <?php printf('%s < %s', $cakeVersion, $minCakeVersion); ?></p>
                </div>
        <?php
            endif;
        ?>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <?php
            if ($check):
                echo $this->Html->link('Continuar', 
                Router::url('/instalar/database', true)
                , array(
                    'class' => 'btn btn-primary',
                ));
            else:
        ?>
                <div class="alert alert-danger">
                    <p>A instala&ccedil;&atilde;o n&atilde;o pode prossegir pois os requisitos m&iacute;nimos n&atilde;o foram atingidos.</p>
                </div>
        <?php
            endif;
        ?>
    </div>
</div>