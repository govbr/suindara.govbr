<?php 
	$error = $message[0];
	$model = ucfirst($message[1]);
	$html = array();

	recursividade_array($error, $model, $html);
	
?>

	<div id="flashMessage" class="message">
		<div class="row">
			<?php $html = array_unique($html); ?>
			
			<?php echo (count($html) == 1) ? "<a href=\"#message\" id=\"message\"> O seguinte erro foi encontrado:</a>" 
										   : "<a href=\"#message\" id=\"message\"> Os seguintes erros foram encontrados:</a>" ; ?> 
	
			<ul>

				<?php
					foreach ($html as $mensagem) 
					{
						echo $mensagem;
					}
				?>

			</ul>
			
			<a href="#closeMesage" id="closeMessage">Fechar mensagem</a>
		</div>
	</div>

<?php 
	function recursividade_array($array, $ancora, &$html)
	{
		foreach ($array as $key => $value) 
		{
			if(is_array($value))
			{	
				// Procura pelo indice do "_", se tiver...
				$indice = strrpos($key, "_");

				// Coloca a primeira palavra em maiuscula e remove "_"
				$key = ucfirst(str_replace("_", "", $key)); 
				if($indice){
					
					// Se tiver "_ ", coloca em maiuscula a primeira letra após o "_"
					$key = str_replace($key[$indice], strtoupper($key[$indice]), $key);
				}

				// Chama a função recursividade
				recursividade_array($value, $ancora . $key, $html);
			}
			else
			{
				$html[] = '<li> <a href=\'#' . $ancora . '\' > ' . $value . '</a></li>';
			}
		}
	}
?>