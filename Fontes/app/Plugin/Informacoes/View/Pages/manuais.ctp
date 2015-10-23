<div class="content">
	<h2 class="row">Manuais <span>do CMS Suindara</span></h2>
	
	<div class="defaults dicas">
		<ul>
			<li>
				<h3>Manual de utiliza&ccedil;&atilde;o</h3>
				<p>Este manual explica todo o funcionamento do CMS Suindara. Os utilizadores do sistema ao lerem este manual compreeder&atilde;o como alimentar e gerenciar os sites administrados atrav&eacute;s deste poderoso sistema.</p>
				<ol>
					<li><?php echo $this->Html->link('Manual de utilização - PDF (1.6MB)', '/files/manuais/manual_uso.pdf'); ?></li>
					<li><?php echo $this->Html->link('Manual de utilização - ODT (2.7MB)', '/files/manuais/manual_uso.odt'); ?></li>
				</ol>
			</li>
			<li>
				<h3>Manual de cria&ccedil;&atilde;o e insta&ccedil;&atilde;o de templates</h3>
				<p>Atrav&eacute;s deste manual os desenvolvedores poder&aatilde;o compreender como se dar&aacute; a cria&ccedil;&atilde;o e instala&ccedil;&atilde;o de templates para o CMS Suindara.</p>
				<ol>
					<li><?php echo $this->Html->link('Manual de criação e instação de templates - PDF (0.7MB)', '/files/manuais/manual_template.pdf'); ?></li>
					<li><?php echo $this->Html->link('Manual de criação e instação de templates - ODT (0.7MB)', '/files/manuais/manual_template.odt'); ?></li>
				</ol>
			</li>
		</ul>
	</div>
</div>

<?php
	$this->Html->addCrumb('Suporte',  array('admin' => true, 'plugin' => 'informacoes', 'controller' => 'pages', 'action' => 'display', 'suporte'));