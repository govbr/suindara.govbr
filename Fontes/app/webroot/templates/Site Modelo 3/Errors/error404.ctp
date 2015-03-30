<?php echo $this->element('head'); ?>

    <div class="bg-content">  

      <!--  content  -->
      <div id="content"> 
       
         <!-- Topo -->
        <div class=" interno">
          <div class="center">
            <div class="block-slogan">
              <h2>404</h2>
              
              <div>
                <p>Este é o site do Projeto de Acessibilidade Virtual.</p>
                <p>Aqui você poderá conhecer um pouco sobre o nosso projeto e as ações que estamos desenvolvendo.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row ">
            <div class="span12">
              <div class="block-404">  
                
                <img src="<?php echo $this->CmsTemplate->imagemPath('404.jpg') ?>" class="img-404" alt="" />      
                
                <div class="box-404">
                  <h2>Oopss!</h2>
                  <h3>404 page not found</h3>        	

                  <p>Nam liber tempor cum soluta nobis eleifend option congue nihil doming id quod mazim placerat facer possim assum orem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy euismod.</p>
                </div>

              </div>
            </div>
          </div>
        </div>  
      </div>

      <a href="#" class="bt_voltar_topo">Voltar ao topo</a>
    </div>

    <!-- footer -->
    <?php echo $this->element('footer'); ?>

  </body>
</html>