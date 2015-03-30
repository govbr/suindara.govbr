<?php
	$this->Html->addCrumb('Acessibilidade',  array('admin' => true, 'plugin' => 'informacoes', 'controller' => 'pages', 'action' => 'display', 'acessibilidade'));
?>

<div class="content">
	<h2 class="row">Dicas<span> de acessibilidade</span></h2>
	
	<div class="defaults dicas">
		<p>Garantir a acessibilidade na Web é permitir que qualquer indivíduo, utilizando qualquer tecnologia de navegação, visite qualquer site e obtenha completo entendimento das informações contidas nele, além de ter total habilidade de interação. Para tal, é preciso que o site tenha sido desenvolvido levando-se em considerações as diretrizes de acessibilidade.</p>
		<p>Nesse ambiente, buscou-se contemplar as recomendações do <a href="http://www.w3.org/TR/ATAG20/">ATAG 2.0</a> – Authoring Tool Accessibility Guidelines ou Recomendações de Acessibilidade para Ferramentas de Autoria. Também foi disponibilizada uma barra de acessibilidade, na parte superior do ambiente, que contém as opções de acessibilidade, incluindo fonte para dislexia, alto contraste, modo HTML básico e atalhos de teclado:</p>
		
		<ul>
			<li>Fonte para dislexia: ativando esta opção a fonte utilizada no sistema passará a ser a <a href="http://opendyslexic.org/">OpenDyslexic</a>, a qual apresenta caracteres com um formato diferenciado, específico para melhorar a leitura de pessoas com dislexia. Esse formato procura proporcionar uma maior distinção entre os caracteres, evitando causar confusão e dificuldade na hora da leitura.</li>
			<li>Alto Contraste: com esta opção ativada, todo o ambiente apresentará um contraste otimizado, facilitando a navegação de pessoas com baixa visão. É possível escolher entre as cores preto / verde / azul para alto contraste.</li>
			<li>Modo HTML básico: esse é o modo sem Javascript, utilizado principalmente por usuários da interface especializada DOSVOX.</li>
			<li>Atalhos: são teclas de acesso rápido a seções do conteúdo. Esse ambiente disponibiliza duas teclas de atalho, sendo 1 para ir ao conteúdo principal e 2 para ir ao menu. Para utilizar as teclas de atalho, existem comandos específicos de cada navegador:
				<ul>
					<li>Google Chrome: Alt + número</li>
					<li>Mozilla Firefox: Alt + Shift + número</li>
					<li>Internet Explorer: Alt + número</li>
					<li>Opera: Shift + Escape + número</li>
					<li>Safari: Option + número</li>
				</ul>
			</li>
			
			<p>Caso você encontre problemas de acessibilidade ou tenha sugestões de melhorias, entre em contato</p>
		</ul>
	</div>
</div>
