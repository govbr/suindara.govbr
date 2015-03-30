<?php echo $this->element('head'); ?>

    <div class="bg-content"> 
      
      <!-- content -->
      <a id="conteudo_ref" class="menu_access_ref" accesskey="1" href="#conteudo_ref" title="In&iacute;cio do Conte&uacute;do">In&iacute;cio do Conte&uacute;do</a>
      <div id="content">

        <!-- Topo -->
        <div class=" interno">
          <div class="center">
            <div class="block-slogan">
              <h2>Dicas de acessibilidade</h2>
              
              <div>
                <p>Esta se&ccedil;&atilde;o apresenta os recursos de acessibilidade presentes em nosso site, detalhes sobre testes de acessibilidade realizados, al&eacute;m de dicas e informa&ccedil;&otilde;es pertinentes a respeito de sua acessibilidade.</p>
              </div>
            </div>
          </div>
        </div>
        
        <div class="container cinterno">
          <div class="navegar">

            <!-- Conteudo -->
            <article class="span12">
              <h3>Como navegar?</h3>
              <?php
                $this->Html->addCrumb('Dicas de acessibilidade');
                echo $this->element('breadcrumb');
              ?>
            </article>

            <div class="clear"></div>

            <article class="span12 inner-1">
              <h4><a href="#" title="Expandir / Retrair" class="expandir">Tamanho do texto <span class="controle-evento oculto">Expandir</span></a></h4>
              <div>
                <ul>
                  <li>Diminuir letra</li>
                  <li>Tamanho normal</li>
                  <li>Aumentar letra</li>
                </ul>
              </div>
                
              <h4><a href="#" title="Expandir / Retrair" class="expandir">Alto contraste <span class="controle-evento oculto">Expandir</span></a></h4>
              <div>
                <ul>
                  <li>Preto</li>
                </ul>
              </div>            
                
              <h4><a href="#" title="Expandir / Retrair" class="expandir">Teclas de acesso <span class="controle-evento oculto">Expandir</span></a></h4>
              <div>
                <p>Teclas de acesso s&atilde;o um recurso de navega&ccedil;&atilde;o que permitem a voc&ecirc; navegar neste web site com o seu teclado.</p>
              </div>

              <h4><a href="#" title="Expandir / Retrair" class="expandir">Teclas de acesso dispon&iacute;veis <span class="controle-evento oculto">Expandir</span></a></h4>
              <div> 
                <p>Este site usa uma configura&ccedil;&atilde;o que se aproxima da maioria das recomenda&ccedil;&otilde;es internacionais sobre teclas de acesso. S&atilde;o elas:</p>
      
                <ol>
                  <li>Conte&uacute;do</li>
                  <li>Menu</li>
                  <li>Foco no campo de busca</li>
                </ol>
              </div>

              <h4><a href="#" title="Expandir / Retrair" class="expandir">Valida&ccedil;&atilde;o <span class="controle-evento oculto">Expandir</span></a></h4>
              <div> 
                <p>N&oacute;s estamos usando XHTML 1.0 e CSS que obedecem &agrave;s especifica&ccedil;&otilde;es, como &eacute; proposto pela W3C porque n&oacute;s acreditamos que acessibilidade e usabilidade devem ter um embasamento s&oacute;lido. Se alguma coisa neste site n&atilde;o est&aacute; validando corretamente, por favor entre em contato com a Administra&ccedil;&atilde;o do Site.</p>
                <p>A valida&ccedil;&atilde;o da acessibilidade foi realizada por meio de ferramentas autom&aacute;ticas e de revis&atilde;o direta atrav&eacute;s de programas leitores de tela. Os m&eacute;todos autom&aacute;ticos s&atilde;o geralmente r&aacute;pidos, mas n&atilde;o s&atilde;o capazes de identificar todas as vertentes da acessibilidade. Sendo assim, a avalia&ccedil;&atilde;o humana ou manual ajuda a garantir a clareza da linguagem e a facilidade da navega&ccedil;&atilde;o do usu&aacute;rio pelo s&iacute;tio.</p>
              </div>
              
              <h4><a href="#" title="Expandir / Retrair" class="expandir">Terminologias <span class="controle-evento oculto">Expandir</span></a></h4>
              <div>
                <h5>A&ccedil;&atilde;o Afirmativa</h5>
                <p>O termo a&ccedil;&atilde;o afirmativa &eacute; muito amplo e controverso, com espa&ccedil;os para diferentes interpreta&ccedil;&otilde;es e sin&ocirc;nimos utilizados. Muitos autores apontam que a pr&oacute;pria defini&ccedil;&atilde;o j&aacute; &eacute; um palco para disputas pol&iacute;ticas e te&oacute;ricas, mas de uma forma sucinta, podemos conceituar que A&ccedil;&otilde;es afirmativas s&atilde;o medidas especiais com o objetivo de eliminar as desigualdades existentes entre grupos ou parcelas da sociedade que, em raz&atilde;o da discrimina&ccedil;&atilde;o sofrida, se encontram em situa&ccedil;&atilde;o desvantajosa na distribui&ccedil;&atilde;o das oportunidades. MARQUES, Luiz Guilherme. A&ccedil;&otilde;es Afirmativas, Discrimina&ccedil;&atilde;o Positiva e Cidadania Plena. Portal Jur&iacute;dico Investidura, Florian&oacute;polis/SC, 24 Set. 2009. Dispon&iacute;vel em: <a href="www.investidura.com.br/biblioteca-juridica/artigos/direito-constitucional/6983">www.investidura.com.br/biblioteca-juridica/artigos/direito-constitucional/6983</a>. Acesso em: mar&ccedil;o/ 2012.</p>
                
                <h5>Acessibilidade</h5>
                <p>&Eacute; definida pela Lei 10.098, art. 2º (BRASIL, 2000) como possibilidade e condi&ccedil;&atilde;o de alcance para utiliza&ccedil;&atilde;o, com seguran&ccedil;a e autonomia, dos espa&ccedil;os, mobili&aacute;rios e equipamentos urbanos, das edifica&ccedil;&otilde;es, dos transportes e dos sistemas e meios de comunica&ccedil;&atilde;o, por pessoa com defici&ecirc;ncia ou com mobilidade reduzida. Lei 10.098 (BRASIL, 2000).</p>
                
                <h5>Ajuda t&eacute;cnica</h5>
                <p>Qualquer elemento que facilite a autonomia pessoal ou possibilite o acesso e o uso de meio f&iacute;sico. Lei 10.098, art. 2º (BRASIL, 2000).</p>
                
                <h5>Altas Habilidades/Superdota&ccedil;&atilde;o</h5>
                <p>S&atilde;o pessoas que demonstram potencial elevado em qualquer uma das seguintes &aacute;reas (isoladas ou combinadas): intelectual, acad&ecirc;mica, lideran&ccedil;a, psicomotricidade e artes. Pol&iacute;tica Nacional de Educa&ccedil;&atilde;o Especial na Perspectiva da Educa&ccedil;&atilde;o Inclusiva (BRASIL, 2008).</p>
                
                <h5>Atendimento Educacional Especializado (AEE)</h5>
                <p>Conjunto de atividades, recursos de acessibilidade e pedag&oacute;gicos organizados institucional e continuamente, prestado de forma complementar (&agrave; forma&ccedil;&atilde;o dos estudantes com defici&ecirc;ncia, transtornos globais do desenvolvimento, como apoio permanente e limitado no tempo e na frequ&ecirc;ncia dos estudantes &agrave;s salas de recursos multifuncionais) ou suplementar (&agrave; forma&ccedil;&atilde;o de estudantes com altas habilidades ou superdota&ccedil;&atilde;o) com o objetivo de eliminar as barreiras que possam obstruir o processo de escolariza&ccedil;&atilde;o de estudantes - p&uacute;blico alvo da Educa&ccedil;&atilde;o Especial - com defici&ecirc;ncia, transtornos globais do desenvolvimento e altas habilidades ou superdota&ccedil;&atilde;o. Decreto 7.611, (BRASIL,2011).</p>
                
                <h5>Atendimento Hospitalar ou Domiciliar</h5>
                <p>Atendimento educacional prestado ao aluno com defici&ecirc;ncia, transtornos globais do desenvolvimento e altas habilidades/superdota&ccedil;&atilde;o, no ambiente hospitalar ou em sua casa, em face da impossibilidade de sua frequ&ecirc;ncia &agrave; escola. Parecer (CNE/CEB/17/2001).</p>
                
                <h5>Barreiras</h5>
                <p>&Eacute; definida pela Lei 10.098, art. 2º (BRASIL, 2000) como  qualquer entrave ou obst&aacute;culo que limite ou impe&ccedil;a o acesso, a liberdade de movimento e circula&ccedil;&atilde;o com seguran&ccedil;a de todas as pessoas. Sendo classificadas em barreiras arquitet&ocirc;nicas urban&iacute;sticas; barreiras arquitet&ocirc;nicas na edifica&ccedil;&atilde;o; barreiras arquitet&ocirc;nicas nos transportes e barreiras na comunica&ccedil;&atilde;o. Lei 10.098 (BRASIL, 2000).</p>           
                
                <h5>Defici&ecirc;ncia</h5>
                <p>Pessoas com defici&ecirc;ncia s&atilde;o aquelas que t&ecirc;m impedimentos de longo prazo de natureza f&iacute;sica, mental, intelectual ou sensorial, os quais, em intera&ccedil;&atilde;o com diversas barreiras, podem obstruir sua participa&ccedil;&atilde;o plena e efetiva na sociedade em igualdades de condi&ccedil;&otilde;es com as demais pessoas. Conven&ccedil;&atilde;o sobre os Direitos das Pessoas com Defici&ecirc;ncia, publicada pela ONU em 2006 (BRASIL, 2009); Sendo considerada pessoa com defici&ecirc;ncia a que se enquadrar, em uma das cinco categorias: defici&ecirc;ncia f&iacute;sica; defici&ecirc;ncia auditiva; defici&ecirc;ncia visual; defici&ecirc;ncia intelectual; defici&ecirc;ncia m&uacute;ltipla. Decreto 3.298, art. 4º (BRASIL, 1999) e Decreto 5.626 (BRASIL, 2004).</p>
                
                <h5>Defici&ecirc;ncia auditiva</h5>
                <p>Perda bilateral, parcial ou total, de quarenta e um decib&eacute;is (dB) ou mais, aferida por audiograma nas frequ&ecirc;ncias de 500Hz, 1.000Hz, 2.000Hz e 3.000Hz. Decreto 3.298, art. 4º (BRASIL, 1999).</p>
                
                <h5>Defici&ecirc;ncia f&iacute;sica</h5>
                <p>Altera&ccedil;&atilde;o completa ou parcial de um ou mais segmentos do corpo humano, acarretando o comprometimento da fun&ccedil;&atilde;o f&iacute;sica, apresentando-se sob a forma de paraplegia, paraparesia, monoplegia, monoparesia, tetraplegia, tetraparesia, triplegia, triparesia, hemiplegia, hemiparesia, ostomia, amputa&ccedil;&atilde;o ou aus&ecirc;ncia de membro, paralisia cerebral, nanismo, membros com deformidade cong&ecirc;nita ou adquirida, exceto as deformidades est&eacute;ticas e as que n&atilde;o produzam dificuldades para o desempenho de fun&ccedil;&otilde;es. Decreto 3.298, art. 4º (BRASIL, 1999).</p>
                
                <h5>Defici&ecirc;ncia intelectual</h5>
                <p>Funcionamento intelectual significativamente inferior &agrave; m&eacute;dia, com manifesta&ccedil;&atilde;o antes dos dezoito anos e limita&ccedil;&otilde;es associadas a duas ou mais &aacute;reas de habilidades adaptativas, tais como: comunica&ccedil;&atilde;o; cuidado pessoal; habilidades sociais; utiliza&ccedil;&atilde;o dos recursos da comunidade; sa&uacute;de e seguran&ccedil;a;  habilidades acad&ecirc;micas;  lazer; e  trabalho. Decreto 3.298, art. 4º (BRASIL, 1999).</p>
              
                <h5>Defici&ecirc;ncia m&uacute;ltipla</h5>
                <p>Associa&ccedil;&atilde;o de duas ou mais defici&ecirc;ncias; e pessoa com mobilidade reduzida, aquela que, n&atilde;o se enquadrando no conceito de ‘pessoa com defici&ecirc;ncia’, tenha, por qualquer motivo, dificuldade de movimentar-se, permanente ou temporariamente, gerando redu&ccedil;&atilde;o efetiva da mobilidade, flexibilidade, coordena&ccedil;&atilde;o motora e percep&ccedil;&atilde;o. Decreto 3.298, art. 4º (BRASIL, 1999).</p>
                
                <h5>Defici&ecirc;ncia visual</h5>
                <p>Cegueira, na qual a acuidade visual &eacute; igual ou menor que 0,05 no melhor olho, com a melhor corre&ccedil;&atilde;o &oacute;ptica; a baixa vis&atilde;o, que significa acuidade visual entre 0,3 e 0,05 no melhor olho, com a melhor corre&ccedil;&atilde;o &oacute;ptica; os casos nos quais a somat&oacute;ria da medida do campo visual em ambos os olhos for igual ou menor que 60o; ou a ocorr&ecirc;ncia simult&acirc;nea de quaisquer das condi&ccedil;&otilde;es anteriores. Decreto 3.298, art. 4º (BRASIL, 1999).</p>
                
                <h5>Desenho universal</h5>
                <p>Significa a concep&ccedil;&atilde;o de produtos, ambientes, programas e servi&ccedil;os a serem usados, at&eacute; onde for poss&iacute;vel, por todas as pessoas, sem necessidade de adapta&ccedil;&atilde;o ou projeto espec&iacute;fico. O “desenho universal” n&atilde;o excluir&aacute; tecnologia assistiva para grupos espec&iacute;ficos de pessoas com defici&ecirc;ncia, quando necess&aacute;rias. Decreto 6.949, (BRASIL, 2009). </p>
                
                <h5>Educa&ccedil;&atilde;o Especial</h5>
                <p>Como modalidade transversal a todos os n&iacute;veis, etapas e modalidades de ensino, &eacute; parte integrante da educa&ccedil;&atilde;o regular, devendo ser prevista no projeto pol&iacute;tico-pedag&oacute;gico da unidade escolar, com o objetivo de assegurar recursos e servi&ccedil;os educacionais especiais, organizados institucionalmente para apoiar, complementar, suplementar e, em alguns casos, substituir os servi&ccedil;os educacionais comuns, de modo a garantir a educa&ccedil;&atilde;o escolar e promover o desenvolvimento das potencialidades do educando que apresenta necessidades educacionais especiais. Sendo considerado como p&uacute;blico alvo da Educa&ccedil;&atilde;o Especial &agrave;s pessoas com defici&ecirc;ncia, com transtornos globais do desenvolvimento e com altas habilidades ou superdota&ccedil;&atilde;o.  Resolu&ccedil;&atilde;o (CNE/CEB/ 4/2010).</p>
              
                <h5>Educa&ccedil;&atilde;o inclusiva</h5>
                <p>Constitui um paradigma educacional fundamentado na concep&ccedil;&atilde;o de direitos humanos, que conjuga igualdade e diferen&ccedil;a como valores indissoci&aacute;veis, e que avan&ccedil;a em rela&ccedil;&atilde;o &agrave; ideia de equidade formal ao contextualizar as circunst&acirc;ncias hist&oacute;ricas da produ&ccedil;&atilde;o da exclus&atilde;o dentro e fora da escola. Pol&iacute;tica Nacional de Educa&ccedil;&atilde;o Especial na Perspectiva da Educa&ccedil;&atilde;o Inclusiva (BRASIL, 2008).</p>
              
                <h5>Enriquecimento Curricular</h5>
                <p>Voltado para o atendimento das altas habilidades/superdota&ccedil;&atilde;o para explora&ccedil;&atilde;o dos interesses e promo&ccedil;&atilde;o do desenvolvimento potencial dos alunos nas &aacute;reas intelectual, acad&ecirc;mica, art&iacute;stica, de lideran&ccedil;a e de psicomotricidade. Parecer (CNE/CEB/17/2001).</p>
              
                <h5>Equipe multiprofissional (EM)</h5>
                <p>A composi&ccedil;&atilde;o dessa equipe pode abranger pedagogo, m&eacute;dicos, psic&oacute;logos, fonoaudi&oacute;logos, fisioterapeutas, terapeutas ocupacionais, assistentes sociais, psicopedagogos e outros; podendo a equipe multiprofissional (EM) ser composta por profissionais que j&aacute; fazem parte da institui&ccedil;&atilde;o de ensino ou profissionais de diferentes institui&ccedil;&otilde;es. Parecer (CNE/CEB/17/2001).</p>
              
                <h5>Estimula&ccedil;&atilde;o precoce</h5>
                <p>Atendimento de crian&ccedil;as com defici&ecirc;ncia, defasagem no desenvolvimento e de alto risco, de zero a tr&ecirc;s anos e onze meses de idade, no qual s&atilde;o desenvolvidas atividades terap&ecirc;uticas e educacionais voltadas para o desenvolvimento global, contando fundamentalmente com a participa&ccedil;&atilde;o da fam&iacute;lia. Parecer (CNE/CEB/17/2001).</p>
              
                <h5>Igualdade Formal</h5>
                <p>Podemos conceituar a Igualdade Formal como sendo aquela que manda que todos sejam tratados de uma forma igualit&aacute;ria perante uma situa&ccedil;&atilde;o, independentemente se &eacute; respeitada ou n&atilde;o, a igualdade entre as pessoas. Em suma, &eacute; a que d&aacute; tratamento igual perante a lei sem qualquer privil&eacute;gio, ou seja, tratar a todos da mesma forma. Esta defini&ccedil;&atilde;o est&aacute; esculpida no caput do artigo 5º da Constitui&ccedil;&atilde;o da Rep&uacute;blica Federativa do Brasil, ao declarar que “todos s&atilde;o iguais perante a lei, sem distin&ccedil;&atilde;o de qualquer natureza” (BRASIL, 1988).</p>

                <h5>Igualdade Material</h5>
                <p>O tratamento com o realce de certos valores contidos na Constitui&ccedil;&atilde;o de 88 e legisla&ccedil;&otilde;es emanadas da mesma, como o direito de pessoas ou grupos que necessitam de prote&ccedil;&atilde;o especial, caracteriza-se a igualdade material, ou igualdade da lei. Esta diferencia&ccedil;&atilde;o da lei &eacute; perfeitamente aceita, j&aacute; que procura adequar-se a realidade vivida por grupos sociais postos em desvantagem de oportunidades perante outros, ocorrendo assim, a dita desiguala&ccedil;&atilde;o em busca da igualdade. FERRAZ, S&eacute;rgio Vallad&atilde;o,Curso de Direito Constitucional: Teoria, Jurisprud&ecirc;ncia e 1000 Quest&otilde;es. 3ª Edi&ccedil;&atilde;o. Rio de Janeiro, 2006.</p>
                
                <h5>Inclus&atilde;o escolar</h5>
                <p>Entendido como o processo de adequa&ccedil;&atilde;o da escola para que todos os alunos recebam uma educa&ccedil;&atilde;o de qualidade, cada um a partir da realidade com que chega &agrave; escola, independentemente de ra&ccedil;a, etnia, g&ecirc;nero, situa&ccedil;&atilde;o socioecon&ocirc;mica, defici&ecirc;ncias etc. &Eacute; a escola que deve ser capaz de acolher todo tipo de aluno e de lhe oferecer educa&ccedil;&atilde;o de qualidade, ou seja, respostas educativas compat&iacute;veis com as suas habilidades, necessidades e expectativas. SASSAKI (MEC/SECADI, 2002).</p>
              
                <h5>Integra&ccedil;&atilde;o escolar</h5>
                <p>Entendido como o processo tradicional de adequa&ccedil;&atilde;o do aluno &agrave;s estruturas f&iacute;sica, administrativa, curricular, pedag&oacute;gica e pol&iacute;tica da escola. A integra&ccedil;&atilde;o trabalha com o pressuposto de que o aluno precisa ser capaz de aprender no n&iacute;vel pr&eacute;-estabelecido pelo sistema de ensino.  SASSAKI (MEC/SECADI, 2002).</p>
                
                <h5>Int&eacute;rprete de libras</h5>
                <p>&Eacute; um profissional capacitado e/ou habilitado em processos de interpreta&ccedil;&atilde;o da l&iacute;ngua de sinais, deve ter titula&ccedil;&atilde;o, certifica&ccedil;&atilde;o e registro profissional. Atua em situa&ccedil;&otilde;es formais e em situa&ccedil;&otilde;es informais. Decreto 5.626, (BRASIL, 2005).</p>
                
                <h5>Isonomia</h5>
                <p>O conceito de isonomia consiste num "princ&iacute;pio que determina a igualdade de todos perante a lei, ou seja, os m&eacute;ritos iguais devem ser tratados igualmente, e situa&ccedil;&otilde;es desiguais, desigualmente." Destacado na Constitui&ccedil;&atilde;o Federal, art. 5º, "caput", inc. I, VIII, XXXVII e XLII, e 7º, inc. XXX, XXXI e XXXIV e na Consolida&ccedil;&atilde;o das Leis Trabalhistas art. 3º, 5º e 8º).</p>
                
                <h5>Itiner&acirc;ncia</h5>
                <p>Servi&ccedil;o de orienta&ccedil;&atilde;o e supervis&atilde;o pedag&oacute;gica desenvolvida por professores especializados que fazem visitas peri&oacute;dicas &agrave;s escolas para trabalhar com os alunos que apresentem necessidades educacionais especiais e com seus respectivos professores de classe comum da rede regular de ensino. Parecer  (CNE/CEB/17/2001).</p>    
                
                <h5>NAPNE</h5>
                <p>O N&uacute;cleo de Atendimento &agrave;s Pessoas com Necessidades Educacionais Especiais - NAPNE &eacute; um &oacute;rg&atilde;o que foi institucionalizado por interm&eacute;dio do programa TECNEP - Educa&ccedil;&atilde;o, Tecnologia e Profissionaliza&ccedil;&atilde;o para Pessoas com Necessidades Educacionais Especiais. (MEC/SECADI, 2004).</p>
                
                <h5>Necessidades Educacionais Espec&iacute;ficas (NEE)</h5>
                <p>Conceito que surge na medida em que se constroem novos entendimentos a cerca do ensinar e do aprender; em vez de focalizar a necessidade especial do aluno que pode ser decorrente de defici&ecirc;ncia, faixa et&aacute;ria, outras; enfatiza as formas e condi&ccedil;&otilde;es de aprendizagem - o ensino e a escola – procura pelo tipo de resposta educativa e de recursos de apoio que a escola deve ajustar para que o aluno na sua singularidade obtenha sucesso escolar. Nesta nova abordagem acredita-se que todo e qualquer aluno pode apresentar, ao longo do processo ensino aprendizagem, alguma necessidade educacional especial (NEE), tempor&aacute;ria ou permanente vinculada ou n&atilde;o ao p&uacute;blico alvo da Educa&ccedil;&atilde;o Especial, que no conceito da necessidade educacional especial &eacute; compreendido em dois grupos: As necessidades educacionais especiais n&atilde;o vinculadas a uma causa org&acirc;nica espec&iacute;fica e as necessidades educacionais especiais relacionadas a condi&ccedil;&otilde;es, disfun&ccedil;&otilde;es, limita&ccedil;&otilde;es ou defici&ecirc;ncias. Parecer (CNE/CEB/17/2001).</p>
                
                <h5>Pessoa com defici&ecirc;ncia ou com mobilidade reduzida</h5>
                <p>&Eacute; definida pela Lei 10.098, art. 2º (BRASIL, 2000), como aquela que tempor&aacute;ria ou permanentemente tem limitada sua capacidade de relacionar-se com o meio e de utiliz&aacute;-lo. Lei 10.098 (BRASIL, 2000).</p>
                
                <h5>Reabilita&ccedil;&atilde;o</h5>
                <p>Processo destinado a capacitar pessoas com defici&ecirc;ncia a atingirem e manterem seus n&iacute;veis &oacute;timos em termos f&iacute;sicos, sensoriais, intelectuais, psiqui&aacute;tricos e/ou funcionais sociais dando assim ferramentas para mudar sua vida em dire&ccedil;&atilde;o a um n&iacute;vel elevado de independ&ecirc;ncia. Normas sobre a equipara&ccedil;&atilde;o de oportunidade para pessoas com defici&ecirc;ncia, Na&ccedil;&otilde;es Unidas, (MEC/SECADI, 1996).</p>

                <h5>Sala de recurso</h5>
                <p>Local com equipamentos, materiais e recursos pedag&oacute;gicos espec&iacute;ficos &agrave; natureza das necessidades educacionais especiais do aluno onde se oferece o atendimento educacional especializado, complementando o atendimento educacional realizado em classe comum do ensino regular. Parecer (CNE/CEB/17/2001).</p>
              
                <h5>Salas de recursos multifuncional</h5>
                <p>Local da escola no qual se realiza o atendimento educacional especializado para alunos com defici&ecirc;ncia, transtornos globais do desenvolvimento e altas habilidades/superdota&ccedil;&atilde;o, por meio do desenvolvimento de estrat&eacute;gias de aprendizagem centradas em um fazer pedag&oacute;gico que favore&ccedil;a a constru&ccedil;&atilde;o de conhecimentos pelos alunos, subsidiando-os para que desenvolvam o curr&iacute;culo e participem da vida escolar. Parecer (CNE/CEB/17/2001)</p>
              
                <h5>Sistema braille</h5>
                <p>Sistema de leitura e escrita em relevo, com base em 64 (sessenta e quatro) s&iacute;mbolos resultantes da combina&ccedil;&atilde;o de 6 (seis) pontos, dispostos em duas colunas de 3 (tr&ecirc;s) pontos. &Eacute; tamb&eacute;m denominado C&oacute;digo Braille. (MEC/SECADI/1999).</p>
                
                <h5>TECNEP</h5>
                <p>TECNEP - Programa que promove a inser&ccedil;&atilde;o das Institui&ccedil;&otilde;es Federais de Educa&ccedil;&atilde;o Tecnol&oacute;gica para o atendimento dos alunos com necessidades educacionais especiais nos cursos de n&iacute;vel b&aacute;sico, t&eacute;cnico e tecnol&oacute;gico; como parte da pol&iacute;tica p&uacute;blica inclusiva no &acirc;mbito da educa&ccedil;&atilde;o, e tem como objetivo principal a consolida&ccedil;&atilde;o dos direitos das pessoas com necessidades educacionais especiais, sendo coordenado pelo Minist&eacute;rio da Educa&ccedil;&atilde;o/Secretaria de Educa&ccedil;&atilde;o T&eacute;cnica e Profissionalizante. (MEC/SECADI, 2004). </p>

                <h5>Tecnologia Assistiva (TA)</h5>
                <p>Segundo Berch e Tonolli (2012) &eacute; um termo , “utilizado para identificar todo o arsenal de Recursos e Servi&ccedil;os que contribuem para proporcionar ou ampliar habilidades funcionais de pessoas com defici&ecirc;ncia e consequentemente promover vida independente e inclus&atilde;o. O prop&oacute;sito das Tecnologias Assistiva reside em ampliar a comunica&ccedil;&atilde;o, a mobilidade, o controle do ambiente, as possibilidades de aprendizado, trabalho e integra&ccedil;&atilde;o na vida familiar, com os amigos e na sociedade em geral” (SONZA, 2008).</p>
              
                <h5>Transtornos Globais do Desenvolvimento</h5>
                <p>S&atilde;o pessoas que apresentam altera&ccedil;&otilde;es qualitativas das intera&ccedil;&otilde;es sociais rec&iacute;procas e na comunica&ccedil;&atilde;o, um repert&oacute;rio de interesses e atividades restrito, estereotipado e repetitivo. Pol&iacute;tica Nacional de Educa&ccedil;&atilde;o Especial na Perspectiva da Educa&ccedil;&atilde;o Inclusiva (BRASIL, 2008).</p>      
              </div>
            </article>

          </div>
        </div>
      </div>
      <a href="#finalconteudo_ref" id="finalconteudo_ref" class="menu_access_ref">Final do Conte&uacute;do</a>

      <a href="#" class="bt_voltar_topo">Voltar ao topo</a>
    </div>

    <!-- footer -->
    <?php echo $this->element('footer'); ?>

  </body>
</html>