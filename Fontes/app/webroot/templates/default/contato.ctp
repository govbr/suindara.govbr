<?php echo $this->element('head'); ?>

		<!-- CSS -->
		<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
	    	<link href="<?php echo $this->CmsTemplate->cssPath('contato')?>" rel="stylesheet" type="text/css" media="screen" />
    </head>
    
    <body class="contato"> 
    	<div id="principal">
    		
    		<?php echo $this->element('funcionalidades'); ?>
    	
	    	<div id="topo">
				<h1>
					<a href="/index">Acessibilidade Virtual</a>
					<span>Informa&ccedil;&atilde;o ao alcance de todos</span>
				</h1>
			</div>
			
			<?php echo $this->element('menu'); ?>
			
			<div id="content">		
            	<a id="conteudo_ref" class="menu_access_ref" accesskey="1" href="#conteudo_ref" title="In&iacute;cio do Conte&uacute;do">In&iacute;cio do Conte&uacute;do</a>
            	<p id="breadCrumb">Voc&ecirc; est&aacute; em: <a href="#" title="Voltar &aacute; P&aacute;gina inicial">P&aacute;gina inicial</a> / Contato</p>
            	
            	<h2>Contato</h2>
                <p>Entre em contato conosco se desejar esclarecer d&uacute;vidas ou colaborar com cr&iacute;ticas e sugest&otilde;es.</p>
				<p>e-mail do projeto: nav@ifrs.edu.br</p>
            
				<div id="esquerda">			
					<h3>Formul&aacute;rio de contato</h3>
					
					<form method="post" action="#" id="contato">
						<!-- nome -->
						<label for="nome">
							<span>Campo Obrigat&oacute;rio</span> Nome completo:
							
							<script type="text/javascript">$(document).ready(function(){ $('#nome').focus(); });</script>
							<em>Este campo &eacute; obrigat&oacute;rio!</em>
						</label>
						<input type="text" name="nome" id="nome" title="Insira o seu nome" />
						
						<!-- email -->
						<label for="email">
							<span>Campo Obrigat&oacute;rio</span> E-mail:
							
							<script type="text/javascript">$(document).ready(function(){ $('#email').focus(); });</script>
							<em>Este campo &eacute; obrigat&oacute;rio!</em>
						</label>					
						<input type="text" name="email" id="email" title="Insira o seu e-mail" />
						
						<!-- telefone -->
						<label for="telefone">
							<span>Campo Obrigat&oacute;rio</span> Telefone:
							
							<script type="text/javascript">$(document).ready(function(){ $('#telefone').focus(); });</script>
							<em>Este campo &eacute; obrigat&oacute;rio!</em>
						</label>
						<input type="text" name="telefone" id="telefone" title="Insira seu telefone" />
						
						<!-- mensagem -->
						<label for="msg">
							<span>Campo Obrigat&oacute;rio</span> Mensagem:

							<script type="text/javascript">$(document).ready(function(){ $('#mensagem').focus(); });</script>
							<em>Este campo &eacute; obrigat&oacute;rio!</em>
						</label>
						<textarea name="msg" id="msg" rows="10" cols="1" title="Insira sua mensagem"></textarea>
						
						<fieldset>
							<em>Mensagem enviada com sucesso!</em>
							
							<input type="reset" name="reset" id="reset" value="Limpar" />
							<input type="submit" name="enviar" id="enviar" value="Enviar" />
						</fieldset>
					</form>
				</div>	
				
				<div id="direita">			
                    <h3>Endere&ccedil;os</h3>
                    
                    <h4>N&uacute;cleo Bento Gon&ccedil;alves</h4>
                    <address>IFRS - Campus Bento Gon&ccedil;alves<br />
					Av, Osvaldo Aranha, 540<br />
					Bento Gon&ccedil;alves, RS – 95700-000<br />
					Fone: (54) 3455-3219
					</address>
					
					<h4>N&uacute;cleo Catu</h4>
					<address>IF Baiano - Campus Catu<br />
					Rua Bar&atilde;o de Cama&ccedil;ari, 118 - Centro<br />
					Catu, Bahia - CEP: 48.110-000<br />
					Fone: (71) 3641-7917
					</address>

					<h4>N&uacute;cleo Fortaleza</h4>
					<address>IFCE – Campus Fortaleza<br />
					Av. Treze de Maio, 2081 - Benfica<br />
					Fortaleza, CE - CEP: 60040-531<br />
					Fone: (85) 3307-3791
					</address>
					
					<h4>N&uacute;cleo Guanambi</h4>
					<address>IF Baiano - Campus Guanambi<br />
					Distrito de Cera&iacute;ma, S/N<br />
					Guanambi, BA - CEP: 46430-000<br />
					Fone: (77) 3493-2100 - Ramal: 215
					</address>             
				</div>
				
				<a href="#finalconteudo_ref" id="finalconteudo_ref" class="menu_access_ref">Final do Conte&uacute;do</a>
			</div>
			
			<?php $this->element('footer'); ?>
    	</div>
    </body>
</html>