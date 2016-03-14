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
              <h2>Acessibilidade</h2>
            </div>
          </div>
        </div>
        
        <div class="container cinterno">
          <div class="row">

            <!-- Conteudo -->
            <article class="span12">
              <?php
                $this->Html->addCrumb('Página de Acessibilidade');
                echo $this->element('breadcrumb');
              ?>
              <!-- <p class="breadCrumb">Você está em: <a title="Voltar á Página inicial" href="#">Página inicial</a> / Página de Acessibilidade</p> -->
              
              <h3>Página de Acessibilidade</h3>
            </article>

            <div class="clear"></div>

            <article class="span12">
              <div class="inner-1"> 
                <h4>Acessibilidade de nosso site</h4>
                <p>De acordo com o <a href="http://www.w3c.br/">W3C</a> (World Wide Web Consortium), Acessibilidade na Web significa garantir que todas as pessoas, incluindo pessoas com deficiência, possam utilizar a Web. Mais especificamente, significa permitir que pessoas com deficiência consigam perceber, compreender, navegar, interagir e contribuir com a Web. Uma Web acessível beneficia a todos, incluindo pessoas idosas, pessoas com pouca habilidade em utilizar a Web, aqueles com uma conexão mais lenta, entre outros.</p>
                <p>Em nosso site, seguimos as recomendações de acessibilidade dos documentos <a href="http://www.w3.org/Translations/WCAG20-pt-br/ ">WCAG 2.0</a> (Web Content Accessibility Guidelines – internacional) e <a href="http://emag.governoeletronico.gov.br/">eMAG 3.1</a> (Modelo de Acessibilidade em Governo Eletrônico – nacional).</p>
                
                <p>No topo das páginas de nosso site, disponibilizamos uma barra de acessibilidade, que contém:</p>
                <ul>
                  <li><strong>Atalhos de teclado:</strong> permitem ir diretamente a um bloco do site, facilitando a navegação para quem utiliza o teclado, como pessoas cegas e com certas limitações físicas;</li>
                  <li><strong>Página de acessibilidade:</strong> apresenta informações sobre a acessibilidade do site, recursos oferecidos e testes realizados;</li>
                  <li><strong>Alto contraste:</strong> passa a apresentar a página com um contraste otimizado, facilitando a navegação para quem tem baixa visão;</li>
                  <li><strong>Mapa do site:</strong> disponibiliza todas as páginas do site de forma hierárquica, permitindo que o usuário conheça toda a estrutura do site e acesse diretamente a página desejada.</li>
                </ul>

                <h5>Utilizando os atalhos</h5>
                <p>Em nosso site, disponibilizamos três atalhos de teclado:</p>
                <ul>
                  <li>1: Ir para o conteúdo principal da página</li>
                  <li>2: Ir para o menu</li>
                  <li>4: Ir para página Acessibilidade</li>
                  <li>5: Alterar Alto Contraste</li>
                  <li>6: Ir para página Mapa do Site</li>
                </ul>

                <p>Cada navegador possui tecla ou teclas específicas para ativar os atalhos:</p>
                <ul>
                  <li>Chrome: <strong>Alt + [número do atalho]</strong> (Windows/Linux) ou <strong>Control + Option + [número do atalho]</strong> (Mac)</li>
                  <li>Firefox: <strong>Alt + Shift + [número do atalho]</strong> (Windows/Linux) ou <strong>Control + Option + [número do atalho]</strong> (Mac)</li>
                  <li>Internet Explorer 8+: <strong>Alt + [número do atalho]</strong> (Windows/Linux) ou <strong>Control + [número do atalho]</strong> (Mac)</li>
                  <li>Safari 4+: <strong>Alt + [número do atalho]</strong> (Windows/Linux) ou <strong>Control + Option + [número do atalho]</strong> (Mac)</li>
                </ul>

                <h5>Ampliando o texto no navegador</h5>
                <ul>
                  <li>Pressione <strong>“Ctrl”</strong> + <strong>“+”</strong> (sinal de mais) para aumentar a fonte do texto;</li>
                  <li>Pressione <strong>“Ctrl”</strong> + <strong>“-”</strong> (sinal de menos) para diminuir a fonte do texto;</li>
                  <li>Pressione <strong>“Ctrl”</strong> + <strong>“0”</strong> (zero) para retornar ao tamanho padrão da fonte.</li>
                </ul>

                <p>No Mac OS, substitua o “Ctrl’ pela tecla “Command”.</p>
              </div> 
            </article>

            <div class="clear"></div>

            <article class="span12">
              <div class="inner-1"> 
                <h4>Testes de acessibilidade</h4>
                <p>A avaliação de acessibilidade de nosso site é realizada por meio de ferramentas automáticas e, também, por avaliação manual de usuários com deficiência utilizando recursos de Tecnologia Assistiva. Os métodos automáticos são geralmente rápidos, mas não são capazes de identificar todas as vertentes da acessibilidade. Sendo assim, a avaliação humana ou manual ajuda a garantir a clareza da linguagem e a facilidade da navegação do usuário pelo site.</p>
                <ul>
                  <li>
                    Última avaliação automática: julho/2015
                    <ul>
                      <li><a href="https://validator.w3.org/">Validador de marcação do W3C</a>: todas as páginas sem erros de marcação</li>
                      <li><a href="http://www.acessibilidade.gov.pt/accessmonitor/">Validador automático de acessibilidade AccessMonitor</a>: nota 10 em todas as páginas</li>
                    </ul>
                  </li>
                  <li>Última avaliação manual: julho/2015</li>
                </ul>
              </div> 
            </article>

            <div class="clear"></div>

            <article class="span12">
              <div class="inner-1"> 
                <h4>Ajude nosso site a ser cada vez mais acessível</h4>
                <p>Estamos sempre buscando melhorar a acessibilidade de nosso site. Caso encontre algum problema de acessibilidade, ou tenha sugestão de melhoria, entre em contato pelo e-mail <a href="mailto:nav@ifrs.edu.br">nav@ifrs.edu.br</a></p>
              </div> 
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