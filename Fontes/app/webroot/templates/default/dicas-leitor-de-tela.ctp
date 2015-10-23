<?php echo $this->element('head'); ?>

		<!-- CSS -->
		<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
	    	<link href="<?php echo $this->CmsTemplate->cssPath('dicas-de-acessibilidade') ?>" rel="stylesheet" type="text/css" media="screen" />
    </head>
    
    <body class="dicas"> 
    	<div id="principal">
    				
    		<?php echo $this->element('funcionalidades'); ?>
    	
	    	<div id="topo">
				<h1>
					<a href="index.php">Acessibilidade Virtual</a>
					<span>Informa&ccedil;&atilde;o ao alcance de todos</span>
				</h1>
			</div>
			
			<?php echo $this->element('menu'); ?>
			
			<div id="content">
				<a id="conteudo_ref" class="menu_access_ref" accesskey="1" href="#conteudo_ref" title="In&iacute;cio do Conte&uacute;do">In&iacute;cio do Conte&uacute;do</a>
				<p id="breadCrumb">Voc&ecirc; est&aacute; em: <a href="#" title="Voltar &aacute; P&aacute;gina inicial">P&aacute;gina inicial</a> / Dicas Leitor de telas</p>
				
            	<h2>Dicas Leitor de telas</h2>
                <p>Os leitores de tela representam um importante recurso de tecnologia assistiva, permitindo que pessoas com defici&ecirc;ncia visual tenham acesso ao mundo virtual. Encontre aqui dicas para a utiliza&ccedil;&atilde;o dos principais leitores de tela.</p>
            
            	<div class="leitor-de-telas">
					<h3><a href="#" title="Expandir / Retrair">Leitor de Telas JAWS <span class="controle-evento">Expandir</span></a></h3>
                    <div>
                    	<h4>Leitura</h4>
	                    <ul>
	                        <li>Tab: faz a leitura por links (pr&oacute;ximo)</li> 
	                        <li>Shift Tab: faz a leitura por links (anterior)</li> 
	                        <li>Seta baixo: faz a leitura por linhas (vai para a pr&oacute;xima linha)</li> 
	                        <li>Seta cima : faz a leitura por linhas (vai para a linha anterior)</li> 
	                        <li>Seta direita: faz a leitura por caracter (pr&oacute;ximo)</li> 
	                        <li>Seta esquerda: faz a leitura por caracter (anterior)</li> 
	                        <li>Control: interrompe a leitura </li>
	                        <li>Control Home: vai para o in&iacute;cio da p&aacute;gina </li>
	                        <li>Control End: vai para o final da p&aacute;gina </li>
	                        <li>Control Seta Baixo: avan&ccedil;a par&aacute;grafo por par&aacute;grafo (nos textos)</li>
	                        <li>Control Seta Cima: vai para o par&aacute;grafo anterior (nos textos)</li>
	                        <li>Control seta direita: avan&ccedil;a para a pr&oacute;xima palavra</li>
	                        <li>Control seta esquerda: volta uma palavra</li>
	                        <li>Control F: Localizar</li>
	                        <li>Alt Seta Esquerda: Volta para a p&aacute;gina anterior (retroceder)</li>
	                        <li>Alt Seta Direita: Vai para a p&aacute;gina seguinte (avan&ccedil;ar)</li>
	                        <li>Alt N: Vai direto ao campo de edi&ccedil;&atilde;o da URL</li> 
	                        <li>Insert F7: Lista todos os links da p&aacute;gina</li>
	                        <li>Insert + A: Ler barra de endere&ccedil;os</li>
	                        <li>Insert F9: Listar Frames</li>
	                        <li>Insert seta baixo: leitura da p&aacute;gina inteira</li>
	                    </ul>
	                    
	                    <h4>Em Formul&aacute;rios:</h4>
	                    <h4>Leitura</h4>
	                    <ul>
	                        <li>Se estiver em um campo de edi&ccedil;&atilde;o: 
	                            <ul>
	                                <li>Enter liga o formul&aacute;rio </li>
	                                <li>Mais (&quot;+&quot;) do teclado num&eacute;rico desliga o formul&aacute;rio.</li>
	                            </ul>
	                        </li>
	                        <li>Se pressionar Enter ap&oacute;s ter ligado o formul&aacute;rio ele automaticamente desliga e submete a busca.</li>		
	                    </ul>
	                    
	                    <h4>Em Tabelas:</h4>
	                    <ul>
	                        <li>Tecla Windows + seta para baixo: Pr&oacute;xima Linha</li> 
	                        <li>Tecla Windows + seta para cima: Linha Anterior </li>
	                        <li>Tecla Windows+v&iacute;rgula (,): Ler Linha </li>
	                        <li>Tecla Windows+ponto (.): Ler Coluna </li>
	                        <li>Alt + Control + seta para a direita: Pr&oacute;xima C&eacute;lula na Linha </li>
	                        <li>Alt + Control + seta para a esquerda: C&eacute;lula Anterior na Linha</li> 
	                        <li>Alt + Control + seta para baixo: C&eacute;lula Inferior na Coluna </li>
	                        <li>Alt + Control + seta para cima: C&eacute;lula Superior na Coluna</li> 
	                        <li>Control + J: Saltar para a c&eacute;lula de Tabela </li>
	                        <li>Control + Shift + J: Regressar &agrave; C&eacute;lula Anterior</li>
	                    </ul>
	                    
	                    <h4>Em caixas combinadas:</h4>
	                    <ul>
	                        <li>Com o cursor posicionado na caixa combinada:
	                            <ul>
	                                <li>Tecla Enter para acion&aacute;-la (o Jaws liga o &quot;Modo Formul&aacute;rio&quot;).</li> 
	                                <li>Em seguida, teclar Alt + seta para abaixo para abr&iacute;-la.</li>
	                            </ul>
	                        </li>
	                        <li>Para navegar entre os itens, utilize as setas de movimenta&ccedil;&atilde;o para cima e para baixo.</li>
	                        <li>Para escolher o conte&uacute;do selecionado &eacute; s&oacute; teclar Enter novamente, pois o Jaws desliga o &quot;Modo Formul&aacute;rio&quot; e submete a busca.
	                        </li>
	                    </ul>
                    </div>
					
                    <h3><a href="#" title="Expandir / Retrair">Leitor de Telas VIRTUAL VISION <span class="controle-evento">Expandir</span></a></h3>
                    <div>
	                    <ul>
	                        <li>Tab: faz a leitura por links (pr&oacute;ximo)</li>
	                        <li>Shift Tab: faz a leitura por links (anterior)</li> 
	                        <li>No Menu, l&ecirc; apenas o primeiro n&iacute;vel. Tab: avan&ccedil;a no menu</li>  
	                        <li>Shift Tab:retrocede no menu </li> 
	                        <li>Num 1 ou Seta cima: Vai para o item anterior no menu</li> 
	                        <li>Num 2 ou Seta baixo: Vai para o pr&oacute;ximo item de menu</li> 
	                        <li>Num 1 e Num 2 ou Seta cima e Seta baixo leem todos os n&iacute;veis de menu</li> 
	                        <li>menus e submenus</li> 
	                        <li>Control: interrompe a leitura</li>  
	                        <li>Control + Home: vai para o in&iacute;cio da p&aacute;gina</li> 
	                        <li>Control + End: vai para o final da p&aacute;gina</li> 
	                        <li>Control + F: Localizar</li> 
	                        <li>Alt + Seta Esquerda: Volta para a p&aacute;gina anterior (retroceder)</li> 
	                        <li>Alt + Seta Direita: Vai para a p&aacute;gina seguinte (avan&ccedil;ar)</li> 
	                        <li>Alt + N: Vai direto ao campo de edi&ccedil;&atilde;o da URL (endere&ccedil;o)</li> 
	                        <li>Num 1: volta ao elemento anterior em uma p&aacute;gina</li> 
	                        <li>Num 2: avan&ccedil;a para o pr&oacute;ximo elemento em uma p&aacute;gina</li> 
	                        <li>Alt + Num 1: volta para o link anterior</li> 
	                        <li>Alt + Num 2: avan&ccedil;a para o pr&oacute;ximo link</li> 
	                        <li>Control + Num 5: mostra a lista dos links da p&aacute;gina atual</li> 
	                        <li>Alt + Num 5: mostra a lista de Frames da p&aacute;gina atual</li>  
	                        <li>Control + V&iacute;rgula (do teclado num&eacute;rico): l&ecirc; toda a p&aacute;gina </li> 
	                        <li>Alt + Num: L&ecirc; todos os elementos da p&aacute;gina &agrave; partir do ponto em que se encontra o foco.</li>
	                        <li>Quando a op&ccedil;&atilde;o (do Painel de Controle do Virtual Vision) &quot;Usar setas para navegar em p&aacute;ginas web&quot; estiver ligada:
	                            <ul>
	                                <li>Seta cima: volta ao elemento anterior em uma p&aacute;gina</li>
	                                <li>Seta baixo: avan&ccedil;a para o pr&oacute;ximo elemento em uma p&aacute;gina</li> 
	                                <li>Enter: entra em modo de edi&ccedil;&atilde;o quando estiver em um campo de formul&aacute;rio que requer o uso das setas (listas, caixas combinadas, etc).</li>
	                                <li>Esc: sai do modo de edi&ccedil;&atilde;o quando estiver em um campo de formul&aacute;rio que requer o uso das setas (listas, caixas combinadas,etc).</li>
	                            </ul>
	                        </li>
	                        <li>Observa&ccedil;&atilde;o: Para um guia completo dos comandos do Virtual Vision, siga os seguintes passos:
	                            <ul>
	                                <li>Acesse o Painel de Controle do programa (Control + Num 0)</li>
	                                <li>Acesse a Ajuda</li>
	                                <li>Guia Conte&uacute;do</li>
	                                <li>Navega&ccedil;&atilde;o em p&aacute;ginas web</li>
	                                <li>Anexo 1 - Guia de Refer&ecirc;ncia</li> 
	                                <li>Comandos para Internet Explorer.</li>
	                            </ul>
	                        </li>
	                    </ul>
                    </div>
                    
                    <h3><a href="#" title="Expandir / Retrair">Leitor de Telas VOICE OVER <span class="controle-evento">Expandir</span></a></h3>
	                <div>    
	                    <h4>Leitura</h4>
	                    <ul>
	                    	<li>VO + A: Iniciar leitura</li>
							<li>control: Para leitura</li>
							<li>VO + seta para direita: Ler o item seguinte</li>
							<li>VO + seta para esquerda: Ler o item anterior</li>
							<li>VO + P: Ler o par&aacute;grafo</li>
							<li>VO + S: Ler a frase</li>
							<li>VO + W: Ler a palavra (pressione W v&aacute;rias vezes para soletrar)</li>
							<li>VO + B: Ler do topo at&eacute; a localiza&ccedil;&atilde;o atual</li>
							<li>VO + Home: Pular para o topo (em laptops, o comando Home &eacute; fn + seta para esquerda)</li>
							<li>VO + End: Pular para o rodap&eacute; (em laptops, o comando End &eacute; fn + seta para direita)</li>
							<li>VO + command + seta para esquerda / seta para direita: Selecionar as op&ccedil;&otilde;es de configura&ccedil;&atilde;o de voz (velocidade, sintetizador, entona&ccedil;&atilde;o, etc.). Use VO + command + seta para cima / seta para baixo para modificar a configura&ccedil;&atilde;o da op&ccedil;&atilde;o selecionada</li>
	                    </ul>
	                    
	                    <h4>Navega&ccedil;&atilde;o</h4>
	                    <ul>
	                    	<li>tab: Pr&oacute;ximo link ou controle de formul&aacute;rio</li>
							<li>VO + command + L: Pr&oacute;ximo link</li>
							<li>VO + command + H: Pr&oacute;ximo cabe&ccedil;alho</li>
							<li>VO + command + J: Pr&oacute;ximo controle de formul&aacute;rio</li>
							<li>VO + command + T: Pr&oacute;xima tabela</li>
							<li>VO + command + X: Pr&oacute;xima lista</li>
							<li>VO + command + G: Pr&oacute;xima imagem</li>
							<li>VO + space: Ativar o link ou controle de formul&aacute;rio</li>
	                    </ul>
	                    
	                    <h4>Comandos &uacute;teis</h4>
	                    <ul>
	                    	<li>shift + VO + F: Menu de busca – permite realizar busca por elementos da p&aacute;gina</li>
							<li>shift + VO + I: Ler estat&iacute;sticas do site – vis&atilde;o geral dos conte&uacute;dos do site</li>
							<li>shift + VO + M: Abrir menu de contexto – o mesmo que clicar com o bot&atilde;o direito do mouse em um item</li>
							<li>shift + VO + ?: Ajuda online</li>
							<li>VO + F8: Mudar configura&ccedil;&otilde;es e customizar o VoiceOver</li>
							<li>command + L: Barra de endere&ccedil;o do navegador</li>
							<li>VO + M: Navegar pelos menus do navegador</li>
	                    </ul>
                    </div>
                    
                    <h3><a href="#" title="Expandir / Retrair">Leitor de Telas ORCA <span class="controle-evento">Expandir</span></a></h3>
                    <div>
	                    <h4>Comandos para ajustar os par&acirc;metros de voz</h4>
						<ul>
							<li>Insert+Seta para direita: Aumentar a velocidade da voz</li>
							<li>Insert+Seta para esquerda: Diminuir a velocidade da voz</li>
							<li>Insert+Seta para cima: Subir o tom</li>
							<li>Insert+Seta para baixo: Baixar o tom</li>
						</ul>
						<p>Nota: Nas vers&otilde;es mais atuais do Orca, as teclas de ajustes de voz est&atilde;o vindo desativadas. Para ativ&aacute;-las temos que entrar nas configura&ccedil;&otilde;es do Orca e na guia Associa&ccedil;&otilde;es de Teclas, definirmos manualmente as teclas para cada ajuste.</p>
						
						<h4>Comandos de revis&atilde;o de tela</h4>
						<ul>
							<li>-(Menos) num&eacute;rico - Entra e sai do modo de revis&atilde;o de tela.</li>
							<li>7-num&eacute;rico: Move o cursor de revis&atilde;o &agrave; linha anterior e a l&ecirc;.</li>
							<li>Insert+7-num&eacute;rico: Move o cursor de revis&atilde;o plana para a posi&ccedil;&atilde;o inicial.</li>
							<li>8-num&eacute;rico: Ler a linha atual.</li>
							<li>8-num&eacute;rico duas vezes: Soletra a linha atual.</li>
							<li>8-num&eacute;rico 3 vezes: Soletra foneticamente a linha atual.</li>
							<li>9-num&eacute;rico: Move o cursor de revis&atilde;o a seguinte linha e a l&ecirc;.</li>
							<li>Insert+9-num&eacute;rico: Move o cursor de revis&atilde;o plana para a posi&ccedil;&atilde;o final.</li>
							<li>4-num&eacute;rico: Move o cursor de revis&atilde;o &agrave; palavra anterior e a l&ecirc;.</li>
							<li>Insert+4-num&eacute;rico: Move o cursor de revis&atilde;o plana para a palavra acima da palavra atual.</li>
							<li>5-num&eacute;rico: Ler a palavra atual.</li>
							<li>Insert+5 num&eacute;rico – Ler o objeto atual</li>
							<li>6-num&eacute;rico: Move o cursor de revis&atilde;o a seguinte palavra e a l&ecirc;.</li>
							<li>Insert+6-num&eacute;rico: Move o cursor de revis&atilde;o plana para a palavra abaixo da palavra atual.</li>
							<li>1-num&eacute;rico: Move o cursor de revis&atilde;o ao car&aacute;ter anterior e o l&ecirc;.</li>
							<li>Insert+1-num&eacute;rico: Move o cursor de revis&atilde;o plana para o final da linha.</li>
							<li>2-num&eacute;rico: Ler o car&aacute;ter atual.</li>
							<li>2-num&eacute;rico duas vezes: Ler foneticamente o caractere atual.</li>
							<li>3-num&eacute;rico: Move o cursor de revis&atilde;o ao seguinte car&aacute;ter e o l&ecirc;.</li>
							<li>/ (Barra)-num&eacute;rico: Realiza um click com o bot&atilde;o esquerdo do mouse.na posi&ccedil;&atilde;o do cursor de revis&atilde;o.</li>
							<li>* (Asterisco)-num&eacute;rico: Realiza um click com o bot&atilde;o direito do mouse na posi&ccedil;&atilde;o do cursor de revis&atilde;o.</li>
						</ul>
						<p>Nota: Os comandos anteriores se aplicam quando se trabalha com objetos ou com texto. Por exemplo, se o cursor de revis&atilde;o estiver posicionado sobre uma barra de menu, pressionando o comando de ler linha atual, seriam lidos os nomes dos menus vis&iacute;veis. Similarmente, pressionando ler palavra seguinte, seria lido o objeto &agrave; direita do cursor de revis&atilde;o na mesma linha, ou seria movido o cursor de revis&atilde;o &agrave; linha seguinte, caso n&atilde;o fossem encontrados mais objetos.</p>
						
						<h4>Comandos para trabalhar com marcas</h4>
						<ul>
							<li>Alt+Insert+[1-6]: Acrescenta uma marca no lugar especificado (1 a 6).</li> 
							<li>Insert+[1-6]: Vai &agrave; posi&ccedil;&atilde;o armazenada na marca correspondente de 1 a 6.</li>
							<li>Alt+Caps Lock+[1-6]: Informa&ccedil;&atilde;o sobre onde estou, relativa &agrave; posi&ccedil;&atilde;o atual do ponteiro.</li>
							<li>Insert+B e Insert+Caps Lock+B: move-se pelas distintas marcas estabelecidas na p&aacute;gina ou na aplica&ccedil;&atilde;o atual.</li>
							<li>Alt+Insert+B: Guarda as marcas fixadas para a p&aacute;gina ou aplica&ccedil;&atilde;o atual.</li>
						</ul>
						
						<h4>Fun&ccedil;&otilde;es Diversas</h4>
						<ul>
							<li>Insert+H: Entrar no modo de aprendizagem (pressionar escape para sair).</li>
							<li>Insert+f: L&ecirc; informa&ccedil;&atilde;o sobre a fonte e os atributos do caractere atual.</li>
							<li>Insert+espa&ccedil;o: Lan&ccedil;a o di&aacute;logo de configura&ccedil;&atilde;o do Orca.</li>
							<li>Insert+Control+espa&ccedil;o: Recarregar a configura&ccedil;&atilde;o de usu&aacute;rio do Orca e reiniciar os servi&ccedil;os, se for necess&aacute;rio. Nas &uacute;ltimas vers&otilde;es do Orca, lan&ccedil;a o di&aacute;logo de configura&ccedil;&atilde;o do Orca para a aplica&ccedil;&atilde;o atual.</li>
							<li>Insert+S: Ativar/desativar a voz.</li>
							<li>Insert+F11: Alternar a leitura de entre c&eacute;lula ou toda linha.</li>
							<li>Insert-+ (mais do teclado num&eacute;rico): comando Dizer Tudo. L&ecirc; do caractere atual at&eacute; o final do documento.</li>
							<li>Enter do teclado num&eacute;rico: Informa&ccedil;&atilde;o b&aacute;sica de onde estou.</li>
							<li>Enter do teclado num&eacute;rico duas vezes: Informa&ccedil;&atilde;o detalhada de onde estou.</li>
							<li>Insert-Enter do teclado num&eacute;rico: L&ecirc; a Barra de T&iacute;tulo da aplica&ccedil;&atilde;o que tem o foco.</li>
							<li>Insert+Enter do teclado num&eacute;rico duas vezes: L&ecirc; a barra de Status da aplica&ccedil;&atilde;o que tem o foco.</li>
							<li>. (Ponto) do teclado num&eacute;rico: Abre o di&aacute;logo localizar do Orca.</li>
							<li>Insert+. (Ponto) do teclado num&eacute;rico: Pesquisa pela pr&oacute;xima ocorr&ecirc;ncia do texto pesquisado.</li>
							<li>Insert+q: Sair do orca.</li>
						</ul>
						
						<h4>Comandos de depura&ccedil;&atilde;o</h4>
						<ul>
							<li>Insert-F3: D&aacute; informa&ccedil;&atilde;o sobre o script e aplica&ccedil;&atilde;o atualmente ativos.</li>
							<li>Insert-F4: troca entre os diferentes n&iacute;veis de depura&ccedil;&atilde;o de Orca.</li>
							<li>
								<ul>
									<li>Nota: para que os seguintes comandos possam ser utilizados, o Orca precisa ser iniciado de um console virtual ou via gnome-terminal. A sa&iacute;da se envia unicamente ao console (n&atilde;o se envia &agrave; voz nem ao braile):</li>
								</ul>
							</li>
							<li>Insert-F5: Imprime uma lista de depura&ccedil;&atilde;o de todas as aplica&ccedil;&otilde;es que se conhecem o console onde Orca est&aacute; executando-se.</li>
							<li>Insert-F7: Imprime informa&ccedil;&atilde;o de depura&ccedil;&atilde;o sobre o ancestro do objeto que tem o foco.</li>
							<li>Insert-F8: Imprime informa&ccedil;&atilde;o de depura&ccedil;&atilde;o sobre a aplica&ccedil;&atilde;o que tem o foco.</li>
						</ul>
					</div>
					                 
                    <h3><a href="#" title="Expandir / Retrair">Interface Especializada Dosvox <span class="controle-evento">Expandir</span></a></h3>
                    <div>
	                    <h4>Op&ccedil;&otilde;es antes de trazer uma p&aacute;gina;</h4>
	                    <ul>
	                        <li>t - Trazer p&aacute;gina da rede (digita-se o endere&ccedil;o)</li>
	                        <li>l - Ler p&aacute;gina (ap&oacute;s ter trazido alguma p&aacute;gina)</li> 
	                        <li>v - Voltar &agrave; &uacute;ltima p&aacute;gina lida</li> 
	                        <li>g - Gravar p&aacute;gina em texto (formato .txt)</li> 
	                        <li>o - Gravar no formato original </li>
	                        <li>e - Exportar texto da p&aacute;gina para a &aacute;rea de transfer&ecirc;ncia</li> 
	                        <li>c - Configurar o programa</li>
	                        <li>Esc - Terminar</li>
	                    </ul>
	                    
	                    <h4>Comandos para movimenta&ccedil;&atilde;o dentro de uma p&aacute;gina (utilizados ap&oacute;s trazer uma p&aacute;gina)</h4>
	                    <ul>
	                        <li>Seta cima/baixo: caminham e leem o texto</li> 
	                        <li>Seta direita: avan&ccedil;a para o pr&oacute;ximo texto ou link</li>  
	                        <li>Espa&ccedil;o ou Control F1: leitura cont&iacute;nua</li>  
	                        <li>Enter: entra em um link / continua ou interrompe leitura </li> 
	                        <li>Tab: pula para ler pr&oacute;ximo link</li>  
	                        <li>Backspace: l&ecirc; link anterior</li>  
	                        <li>PageUp/PageDown: pula par&aacute;grafo </li> 
	                        <li>Control PageUp: vai para o in&iacute;cio da p&aacute;gina</li>  
	                        <li>Control PageDown: vai para o final da p&aacute;gina </li> 
	                        <li>Home: detalha cl&aacute;usula de HTML </li> 
	                        <li>F3: l&ecirc; o nome da p&aacute;gina atual</li>  
	                        <li>F4: configura a velocidade da fala </li> 
	                        <li>F5: busca texto ap&oacute;s esta posi&ccedil;&atilde;o </li> 
	                        <li>Control F5: busca texto novamente</li>  
	                        <li>F6: informa percentual lido da p&aacute;gina </li> 
	                        <li>Esc: termina leitura, sai da p&aacute;gina</li> 
	                    </ul>
                    </div>
				</div>
				
				<a href="#finalconteudo_ref" id="finalconteudo_ref" class="menu_access_ref">Final do Conte&uacute;do</a>
			</div>
			
			<?php echo $this->element('footer'); ?>
    	</div>
    </body>
</html>