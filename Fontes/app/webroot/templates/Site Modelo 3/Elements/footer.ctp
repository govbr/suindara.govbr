<a id="rodape_ref" class="menu_access_ref" accesskey="3" href="#rodape_ref" title="Início do Rodapé">Início do Rodapé</a>

<footer>
	<div class="container clearfix">

		<?php
			try {
				$rodape = $this->CmsMenu->getMenu('SiteModelo3Rodape');
			

				$itens = array( $rodape->getSubMenu('modelo_face'),
								$rodape->getSubMenu('modelo_youtube'),
							    $rodape->getSubMenu('modelo_twitter'),
							    $rodape->getSubMenu('modelo_googleplus'));

				if( count($itens) == 4 ){
		?>
				<!-- Social -->
				<ul class="list-social pull-right">
					<li><a class="icon-1" href="<?php echo $itens[0]->getLink(); ?>"></a></li>
					<li><a class="icon-2" href="<?php echo $itens[1]->getLink(); ?>"></a></li>
					<li><a class="icon-3" href="<?php echo $itens[2]->getLink(); ?>"></a></li>
					<li><a class="icon-4" href="<?php echo $itens[3]->getLink(); ?>"></a></li>
				</ul>

			<?php
				}
			?>

		<?php
			} catch (Exception $e) {
  				//apenas não mostra o rodape
			}
		?>

		<div class="privacy pull-left">Desenvolvido pelo Projeto de Acessibilidade Virtual</div>
	</div>
</footer>