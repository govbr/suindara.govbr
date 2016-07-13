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
                <p>Esta seção apresenta os recursos de acessibilidade presentes em nosso site, detalhes sobre testes de acessibilidade realizados, além de dicas e informações pertinentes a respeito de sua acessibilidade.</p>
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
                <h5>Ação Afirmativa</h5>
                <p>O termo ação afirmativa é muito amplo e controverso, com espaços para diferentes interpretações e sinônimos utilizados. Muitos autores apontam que a própria definição já é um palco para disputas políticas e teóricas, mas de uma forma sucinta, podemos conceituar que Ações afirmativas são medidas especiais com o objetivo de eliminar as desigualdades existentes entre grupos ou parcelas da sociedade que, em razão da discriminação sofrida, se encontram em situação desvantajosa na distribuição das oportunidades. MARQUES, Luiz Guilherme. Ações Afirmativas, Discriminação Positiva e Cidadania Plena. Portal Jurídico Investidura, Florianópolis/SC, 24 Set. 2009. Disponível em: <a href="www.investidura.com.br/biblioteca-juridica/artigos/direito-constitucional/6983">www.investidura.com.br/biblioteca-juridica/artigos/direito-constitucional/6983</a>. Acesso em: março/ 2012.</p>
                
                <h5>Acessibilidade</h5>
                <p>É definida pela Lei 10.098, art. 2º (BRASIL, 2000) como possibilidade e condição de alcance para utilização, com segurança e autonomia, dos espaços, mobiliários e equipamentos urbanos, das edificações, dos transportes e dos sistemas e meios de comunicação, por pessoa com deficiência ou com mobilidade reduzida. Lei 10.098 (BRASIL, 2000).</p>
                
                <h5>Ajuda técnica</h5>
                <p>Qualquer elemento que facilite a autonomia pessoal ou possibilite o acesso e o uso de meio físico. Lei 10.098, art. 2º (BRASIL, 2000).</p>
                
                <h5>Altas Habilidades/Superdotação</h5>
                <p>São pessoas que demonstram potencial elevado em qualquer uma das seguintes áreas (isoladas ou combinadas): intelectual, acadêmica, liderança, psicomotricidade e artes. Política Nacional de Educação Especial na Perspectiva da Educação Inclusiva (BRASIL, 2008).</p>
                
                <h5>Atendimento Educacional Especializado (AEE)</h5>
                <p>Conjunto de atividades, recursos de acessibilidade e pedagógicos organizados institucional e continuamente, prestado de forma complementar (à formação dos estudantes com deficiência, transtornos globais do desenvolvimento, como apoio permanente e limitado no tempo e na frequência dos estudantes às salas de recursos multifuncionais) ou suplementar (à formação de estudantes com altas habilidades ou superdotação) com o objetivo de eliminar as barreiras que possam obstruir o processo de escolarização de estudantes - público alvo da Educação Especial - com deficiência, transtornos globais do desenvolvimento e altas habilidades ou superdotação. Decreto 7.611, (BRASIL,2011).</p>
                
                <h5>Atendimento Hospitalar ou Domiciliar</h5>
                <p>Atendimento educacional prestado ao aluno com deficiência, transtornos globais do desenvolvimento e altas habilidades/superdotação, no ambiente hospitalar ou em sua casa, em face da impossibilidade de sua frequência à escola. Parecer (CNE/CEB/17/2001).</p>
                
                <h5>Barreiras</h5>
                <p>É definida pela Lei 10.098, art. 2º (BRASIL, 2000) como  qualquer entrave ou obstáculo que limite ou impeça o acesso, a liberdade de movimento e circulação com segurança de todas as pessoas. Sendo classificadas em barreiras arquitetônicas urbanísticas; barreiras arquitetônicas na edificação; barreiras arquitetônicas nos transportes e barreiras na comunicação. Lei 10.098 (BRASIL, 2000).</p>           
                
                <h5>Deficiência</h5>
                <p>Pessoas com deficiência são aquelas que têm impedimentos de longo prazo de natureza física, mental, intelectual ou sensorial, os quais, em interação com diversas barreiras, podem obstruir sua participação plena e efetiva na sociedade em igualdades de condições com as demais pessoas. Convenção sobre os Direitos das Pessoas com Deficiência, publicada pela ONU em 2006 (BRASIL, 2009); Sendo considerada pessoa com deficiência a que se enquadrar, em uma das cinco categorias: deficiência física; deficiência auditiva; deficiência visual; deficiência intelectual; deficiência múltipla. Decreto 3.298, art. 4º (BRASIL, 1999) e Decreto 5.626 (BRASIL, 2004).</p>
                
                <h5>Deficiência auditiva</h5>
                <p>Perda bilateral, parcial ou total, de quarenta e um decibéis (dB) ou mais, aferida por audiograma nas frequências de 500Hz, 1.000Hz, 2.000Hz e 3.000Hz. Decreto 3.298, art. 4º (BRASIL, 1999).</p>
                
                <h5>Deficiência física</h5>
                <p>Alteração completa ou parcial de um ou mais segmentos do corpo humano, acarretando o comprometimento da função física, apresentando-se sob a forma de paraplegia, paraparesia, monoplegia, monoparesia, tetraplegia, tetraparesia, triplegia, triparesia, hemiplegia, hemiparesia, ostomia, amputação ou ausência de membro, paralisia cerebral, nanismo, membros com deformidade congênita ou adquirida, exceto as deformidades estéticas e as que não produzam dificuldades para o desempenho de funções. Decreto 3.298, art. 4º (BRASIL, 1999).</p>
                
                <h5>Deficiência intelectual</h5>
                <p>Funcionamento intelectual significativamente inferior à média, com manifestação antes dos dezoito anos e limitações associadas a duas ou mais áreas de habilidades adaptativas, tais como: comunicação; cuidado pessoal; habilidades sociais; utilização dos recursos da comunidade; saúde e segurança;  habilidades acadêmicas;  lazer; e  trabalho. Decreto 3.298, art. 4º (BRASIL, 1999).</p>
              
                <h5>Deficiência múltipla</h5>
                <p>Associação de duas ou mais deficiências; e pessoa com mobilidade reduzida, aquela que, não se enquadrando no conceito de ‘pessoa com deficiência’, tenha, por qualquer motivo, dificuldade de movimentar-se, permanente ou temporariamente, gerando redução efetiva da mobilidade, flexibilidade, coordenação motora e percepção. Decreto 3.298, art. 4º (BRASIL, 1999).</p>
                
                <h5>Deficiência visual</h5>
                <p>Cegueira, na qual a acuidade visual é igual ou menor que 0,05 no melhor olho, com a melhor correção óptica; a baixa visão, que significa acuidade visual entre 0,3 e 0,05 no melhor olho, com a melhor correção óptica; os casos nos quais a somatória da medida do campo visual em ambos os olhos for igual ou menor que 60o; ou a ocorrência simultânea de quaisquer das condições anteriores. Decreto 3.298, art. 4º (BRASIL, 1999).</p>
                
                <h5>Desenho universal</h5>
                <p>Significa a concepção de produtos, ambientes, programas e serviços a serem usados, até onde for possível, por todas as pessoas, sem necessidade de adaptação ou projeto específico. O “desenho universal” não excluirá tecnologia assistiva para grupos específicos de pessoas com deficiência, quando necessárias. Decreto 6.949, (BRASIL, 2009). </p>
                
                <h5>Educação Especial</h5>
                <p>Como modalidade transversal a todos os níveis, etapas e modalidades de ensino, é parte integrante da educação regular, devendo ser prevista no projeto político-pedagógico da unidade escolar, com o objetivo de assegurar recursos e serviços educacionais especiais, organizados institucionalmente para apoiar, complementar, suplementar e, em alguns casos, substituir os serviços educacionais comuns, de modo a garantir a educação escolar e promover o desenvolvimento das potencialidades do educando que apresenta necessidades educacionais especiais. Sendo considerado como público alvo da Educação Especial às pessoas com deficiência, com transtornos globais do desenvolvimento e com altas habilidades ou superdotação.  Resolução (CNE/CEB/ 4/2010).</p>
              
                <h5>Educação inclusiva</h5>
                <p>Constitui um paradigma educacional fundamentado na concepção de direitos humanos, que conjuga igualdade e diferença como valores indissociáveis, e que avança em relação à ideia de equidade formal ao contextualizar as circunstâncias históricas da produção da exclusão dentro e fora da escola. Política Nacional de Educação Especial na Perspectiva da Educação Inclusiva (BRASIL, 2008).</p>
              
                <h5>Enriquecimento Curricular</h5>
                <p>Voltado para o atendimento das altas habilidades/superdotação para exploração dos interesses e promoção do desenvolvimento potencial dos alunos nas áreas intelectual, acadêmica, artística, de liderança e de psicomotricidade. Parecer (CNE/CEB/17/2001).</p>
              
                <h5>Equipe multiprofissional (EM)</h5>
                <p>A composição dessa equipe pode abranger pedagogo, médicos, psicólogos, fonoaudiólogos, fisioterapeutas, terapeutas ocupacionais, assistentes sociais, psicopedagogos e outros; podendo a equipe multiprofissional (EM) ser composta por profissionais que já fazem parte da instituição de ensino ou profissionais de diferentes instituições. Parecer (CNE/CEB/17/2001).</p>
              
                <h5>Estimulação precoce</h5>
                <p>Atendimento de crianças com deficiência, defasagem no desenvolvimento e de alto risco, de zero a três anos e onze meses de idade, no qual são desenvolvidas atividades terapêuticas e educacionais voltadas para o desenvolvimento global, contando fundamentalmente com a participação da família. Parecer (CNE/CEB/17/2001).</p>
              
                <h5>Igualdade Formal</h5>
                <p>Podemos conceituar a Igualdade Formal como sendo aquela que manda que todos sejam tratados de uma forma igualitária perante uma situação, independentemente se é respeitada ou não, a igualdade entre as pessoas. Em suma, é a que dá tratamento igual perante a lei sem qualquer privilégio, ou seja, tratar a todos da mesma forma. Esta definição está esculpida no caput do artigo 5º da Constituição da República Federativa do Brasil, ao declarar que “todos são iguais perante a lei, sem distinção de qualquer natureza” (BRASIL, 1988).</p>

                <h5>Igualdade Material</h5>
                <p>O tratamento com o realce de certos valores contidos na Constituição de 88 e legislações emanadas da mesma, como o direito de pessoas ou grupos que necessitam de proteção especial, caracteriza-se a igualdade material, ou igualdade da lei. Esta diferenciação da lei é perfeitamente aceita, já que procura adequar-se a realidade vivida por grupos sociais postos em desvantagem de oportunidades perante outros, ocorrendo assim, a dita desigualação em busca da igualdade. FERRAZ, Sérgio Valladão,Curso de Direito Constitucional: Teoria, Jurisprudência e 1000 Questões. 3ª Edição. Rio de Janeiro, 2006.</p>
                
                <h5>Inclusão escolar</h5>
                <p>Entendido como o processo de adequação da escola para que todos os alunos recebam uma educação de qualidade, cada um a partir da realidade com que chega à escola, independentemente de raça, etnia, gênero, situação socioeconômica, deficiências etc. É a escola que deve ser capaz de acolher todo tipo de aluno e de lhe oferecer educação de qualidade, ou seja, respostas educativas compatíveis com as suas habilidades, necessidades e expectativas. SASSAKI (MEC/SECADI, 2002).</p>
              
                <h5>Integração escolar</h5>
                <p>Entendido como o processo tradicional de adequação do aluno às estruturas física, administrativa, curricular, pedagógica e política da escola. A integração trabalha com o pressuposto de que o aluno precisa ser capaz de aprender no nível pré-estabelecido pelo sistema de ensino.  SASSAKI (MEC/SECADI, 2002).</p>
                
                <h5>Intérprete de libras</h5>
                <p>É um profissional capacitado e/ou habilitado em processos de interpretação da língua de sinais, deve ter titulação, certificação e registro profissional. Atua em situações formais e em situações informais. Decreto 5.626, (BRASIL, 2005).</p>
                
                <h5>Isonomia</h5>
                <p>O conceito de isonomia consiste num "princípio que determina a igualdade de todos perante a lei, ou seja, os méritos iguais devem ser tratados igualmente, e situações desiguais, desigualmente." Destacado na Constituição Federal, art. 5º, "caput", inc. I, VIII, XXXVII e XLII, e 7º, inc. XXX, XXXI e XXXIV e na Consolidação das Leis Trabalhistas art. 3º, 5º e 8º).</p>
                
                <h5>Itinerância</h5>
                <p>Serviço de orientação e supervisão pedagógica desenvolvida por professores especializados que fazem visitas periódicas às escolas para trabalhar com os alunos que apresentem necessidades educacionais especiais e com seus respectivos professores de classe comum da rede regular de ensino. Parecer  (CNE/CEB/17/2001).</p>    
                
                <h5>NAPNE</h5>
                <p>O Núcleo de Atendimento às Pessoas com Necessidades Educacionais Especiais - NAPNE é um órgão que foi institucionalizado por intermédio do programa TECNEP - Educação, Tecnologia e Profissionalização para Pessoas com Necessidades Educacionais Especiais. (MEC/SECADI, 2004).</p>
                
                <h5>Necessidades Educacionais Específicas (NEE)</h5>
                <p>Conceito que surge na medida em que se constroem novos entendimentos a cerca do ensinar e do aprender; em vez de focalizar a necessidade especial do aluno que pode ser decorrente de deficiência, faixa etária, outras; enfatiza as formas e condições de aprendizagem - o ensino e a escola – procura pelo tipo de resposta educativa e de recursos de apoio que a escola deve ajustar para que o aluno na sua singularidade obtenha sucesso escolar. Nesta nova abordagem acredita-se que todo e qualquer aluno pode apresentar, ao longo do processo ensino aprendizagem, alguma necessidade educacional especial (NEE), temporária ou permanente vinculada ou não ao público alvo da Educação Especial, que no conceito da necessidade educacional especial é compreendido em dois grupos: As necessidades educacionais especiais não vinculadas a uma causa orgânica específica e as necessidades educacionais especiais relacionadas a condições, disfunções, limitações ou deficiências. Parecer (CNE/CEB/17/2001).</p>
                
                <h5>Pessoa com deficiência ou com mobilidade reduzida</h5>
                <p>É definida pela Lei 10.098, art. 2º (BRASIL, 2000), como aquela que temporária ou permanentemente tem limitada sua capacidade de relacionar-se com o meio e de utilizá-lo. Lei 10.098 (BRASIL, 2000).</p>
                
                <h5>Reabilitação</h5>
                <p>Processo destinado a capacitar pessoas com deficiência a atingirem e manterem seus níveis ótimos em termos físicos, sensoriais, intelectuais, psiquiátricos e/ou funcionais sociais dando assim ferramentas para mudar sua vida em direção a um nível elevado de independência. Normas sobre a equiparação de oportunidade para pessoas com deficiência, Nações Unidas, (MEC/SECADI, 1996).</p>

                <h5>Sala de recurso</h5>
                <p>Local com equipamentos, materiais e recursos pedagógicos específicos à natureza das necessidades educacionais especiais do aluno onde se oferece o atendimento educacional especializado, complementando o atendimento educacional realizado em classe comum do ensino regular. Parecer (CNE/CEB/17/2001).</p>
              
                <h5>Salas de recursos multifuncional</h5>
                <p>Local da escola no qual se realiza o atendimento educacional especializado para alunos com deficiência, transtornos globais do desenvolvimento e altas habilidades/superdotação, por meio do desenvolvimento de estratégias de aprendizagem centradas em um fazer pedagógico que favoreça a construção de conhecimentos pelos alunos, subsidiando-os para que desenvolvam o currículo e participem da vida escolar. Parecer (CNE/CEB/17/2001)</p>
              
                <h5>Sistema braille</h5>
                <p>Sistema de leitura e escrita em relevo, com base em 64 (sessenta e quatro) símbolos resultantes da combinação de 6 (seis) pontos, dispostos em duas colunas de 3 (três) pontos. É também denominado Código Braille. (MEC/SECADI/1999).</p>
                
                <h5>TECNEP</h5>
                <p>TECNEP - Programa que promove a inserção das Instituições Federais de Educação Tecnológica para o atendimento dos alunos com necessidades educacionais especiais nos cursos de nível básico, técnico e tecnológico; como parte da política pública inclusiva no âmbito da educação, e tem como objetivo principal a consolidação dos direitos das pessoas com necessidades educacionais especiais, sendo coordenado pelo Ministério da Educação/Secretaria de Educação Técnica e Profissionalizante. (MEC/SECADI, 2004). </p>

                <h5>Tecnologia Assistiva (TA)</h5>
                <p>Segundo Berch e Tonolli (2012) é um termo , “utilizado para identificar todo o arsenal de Recursos e Serviços que contribuem para proporcionar ou ampliar habilidades funcionais de pessoas com deficiência e consequentemente promover vida independente e inclusão. O propósito das Tecnologias Assistiva reside em ampliar a comunicação, a mobilidade, o controle do ambiente, as possibilidades de aprendizado, trabalho e integração na vida familiar, com os amigos e na sociedade em geral” (SONZA, 2008).</p>
              
                <h5>Transtornos Globais do Desenvolvimento</h5>
                <p>São pessoas que apresentam alterações qualitativas das interações sociais recíprocas e na comunicação, um repertório de interesses e atividades restrito, estereotipado e repetitivo. Política Nacional de Educação Especial na Perspectiva da Educação Inclusiva (BRASIL, 2008).</p>      
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