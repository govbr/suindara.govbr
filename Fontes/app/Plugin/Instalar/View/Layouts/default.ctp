<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="robot" content="noindex, nofollow" />
        <meta name="author" content="Ricardo Moro" />
        
        <title>Suindara Instala&ccedil;&atilde;o</title>
        
        <?php
            echo $this->Html->meta('icon');
            
            echo $this->Html->css(array('bootstrap.min', 'bootstrap-theme.min', 'instalador', 'principal', '1140/1140', 'jPages', 'animate', 'resolucoes', 'hacks-safari'));
            echo $this->Html->script(array('jquery-1.10.1.min', 'jquery-migrate-1.2.1.min', 'jquery.maskedinput', 'instalador'));

            echo $this->fetch('meta');
            echo $this->fetch('css');   
            echo $this->fetch('script');
        ?>
    </head>

    <body>
        <header class="container">
            <div class="well">
                <div class="row">
                    <div class="col-xs-12">
                        <h1>Instala&ccedil;&atilde;o do Suindara</h1>
                    </div>
                </div>
            </div>
        </header>
        
        <section class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2><?php echo $title_for_layout; ?></h2>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <?php echo $this->Session->flash(); ?>
                </div>
            </div>
        </section>

        <section class="container" role="main">
            <?php echo $this->fetch('content'); ?>

            <hr />

            <?php echo $this->element('sql_dump'); ?>

            <hr />
        </section>
        
        <footer class="container">
            <div class="row">
                <div class="col-xs-12">

                    <div class="well">
                        <div class="row">
                            <div class="col-xs-12 col-md-6 col-md-push-6">
                                <a href="#menu" class="pull-right hidden-sm hidden-xs">Voltar para o topo&nbsp;<span class="glyphicon glyphicon-circle-arrow-up"></span></a>
                            </div>

                            <div class="col-xs-12 col-md-6 col-md-pull-6">
                                <p>
                                    <strong>Projeto Suidara</strong><br/>
                                    <em>Desenvolvimento</em><br/>
                                </p>
                                <a href="http://www.ifrs.edu.br/"><strong>Instituto Federal do Rio Grande do Sul</strong></a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <a href="https://bitbucket.org/ricardomoro/comuniquese/" class="pull-right hidden-sm hidden-xs">C&oacute;digo-fonte sob a licen&ccedil;a GPLv3</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </footer>
    </body>
</html>