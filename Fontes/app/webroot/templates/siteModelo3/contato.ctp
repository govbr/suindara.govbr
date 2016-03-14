<!DOCTYPE html>

<html lang="pt-BR">
  
  <?php echo $this->element('head'); ?>
  
  <body>
    <!-- barra de acessibilidade -->
    <div id="panel">
      <div class="navbar navbar-inverse navbar-fixed-top" id="advanced" style="margin-top: 0px; position: relative; ">
        <span class="trigger">
          <strong></strong>
          <em></em>
        </span>

        <?php echo $this->element('barra_acessibilidade'); ?>
      </div>
    </div>

    <!-- header -->
    <header>
      <div class="container clearfix">
        <div class="row">
          <div class="span12">
            <div class="navbar navbar_">
              <div class="container menor">

                <!-- Logo -->
                <?php echo $this->element('logo_preto'); ?>

                <!-- Menu -->
                <?php echo $this->element('menu'); ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <div class="bg-content"> 
  
      <!-- content -->
      <a id="conteudo_ref" href="#conteudo_ref" class="menu_access_ref">In&iacute;cio do Conte&uacute;do</a>
      <div id="content">
        
        <!-- Topo -->
        <div class=" interno">
          <div class="center">
            <div class="block-slogan">
              <h2>Contato</h2>
            </div>
          </div>
        </div>

        <div class="ic"></div>
    
        <div class="container cinterno">
          <div class="row">
            
            <article class="span8">
              <?php
                $this->Html->addCrumb('Contato');
                echo $this->element('breadcrumb');
              ?>

              <h3>Formulário de contato</h3>
              
              <?php @session_start(); ?>

              <?php if(isset($_SESSION['enviado'])) { ?>
                <?php if($_SESSION['enviado'] == true){ ?>
                  <em>Mensagem enviada com sucesso!</em>
                <?php } else { ?>
                  <em>Houve um erro ao enviar a mensagem. Por favor tente novamente!</em>
                <?php } ?>
                <?php unset($_SESSION['enviado']); ?>
              <?php } ?>

              <div class="inner-1">
                <form id="contact-form" action="action/contato" method="post">                  

                    <?php if(isset($_SESSION['nome']['error'])) { ?>
                      <?php unset($_SESSION['nome']); ?>
                      <em class="error">Este campo &eacute; obrigat&oacute;rio!</em>
                    <?php } ?>
                    <label for="nome" class="name">
                      Seu nome:
                      <input type="text" id="nome" name="nome" required />
                    </label>
                    
                    <?php if(isset($_SESSION['email']['error'])) { ?>
                      <?php unset($_SESSION['email']); ?>
                      <em class="error">Este campo &eacute; obrigat&oacute;rio!</em>
                    <?php } ?>
                    <label for="email" class="email">
                      Seu e-mail:
                      <input type="email" id="email" name="email" required />
                    </label>

                    <?php if(isset($_SESSION['mensagem']['error'])) { ?>
                      <?php unset($_SESSION['mensagem']); ?>
                      <em class="error">Este campo &eacute; obrigat&oacute;rio!</em>
                    <?php } ?>
                    <label for="message" class="message">
                      Mensagem:
                      <textarea id="message" name="message" required></textarea>
                    </label>
                       
                    <input type="submit" class="btn btn-1 send" value="Enviar" />
                    <!-- <input type="reset" class="btn btn-1" value="Limpar campos" /> -->
        
                </form>
              </div>
            </article>

            <article class="span4">
              <h3>Endereço</h3>
              
              <h4>Lorem ipsum dolor sit amet</h4>
              <address class="address-1">
                
                <strong>
                  Lorem ipsum dolor sit amet,<br>
                  Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet<br>
                </strong>

                <p class="overflow"> 
                  <span>Telefone:</span><a href="tel:Lorem ipsum dolor sit amet" class="mail-1">Lorem ipsum dolor si</a><br>
                  <span>E-mail:</span> <a href="mailto:Lorem ipsum dolor sit amet" class="mail-1">Lorem ipsum dolor si</a>
                </p>
              </address>
            </article> 
        </div>
      </div>
      
      </div>
      <a id="finalconteudo_ref" href="#finalconteudo_ref" class="menu_access_ref">Final do Conte&uacute;do</a>

      <a href="#menu_ref" class="bt_voltar_topo">Voltar ao topo</a>
    </div>

    <!-- footer -->
    <?php echo $this->element('footer'); ?>

  </body>
</html>