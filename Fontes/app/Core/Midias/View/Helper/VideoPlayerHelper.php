<?php 
 /*
 * @copyright Copyright (c) 2014 BRASIL. (http://www.softwarepublico.gov.br/)
 *
 * This file is part of CMS Suindara.
 *
 * CMS Suindara is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * The CMS Suindara is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with CMS Suindara.  If not, see the oficial website 
 * <http://www.gnu.org/licenses/> or the Brazilian Public Software
 * Portal <www.softwarepublico.gov.br>
 *
 * *********************
 *
 * Direitos Autorais Reservados (c) 2014 BRASIL. (http://www.softwarepublico.gov.br/)
 *
 * Este arquivo é parte do programa CMS Suindara.
 *
 * CMS Suindara é um software livre; você pode redistribui-lo e/ou
 * modifica-lo dentro dos termos da Licença Pública Geral GNU como
 * publicada pela Fundação do Software Livre (FSF); na versão 2 da
 * Licença, ou qualquer versão posterior
 *
 * O CMS Suindara é distribuido na esperança que possa ser útil,
 * porém, SEM NENHUMA GARANTIA; nem mesmo a garantia implicita de 
 * ADEQUAÇÃO a qualquer  MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a
 * Licença Pública Geral GNU para maiores detalhes.
 *
 * Você deve ter recebido uma cópia da Licença Pública Geral GNU
 * junto com este programa, se não, acesse no website oficial
 * <http://www.gnu.org/licenses/> ou o Portal do Software Público 
 * Brasileiro <www.softwarepublico.gov.br>
 *
 */

App::uses('MidiaConfig', 'Midias.Lib');

class VideoPlayerHelper extends AppHelper {

	public $helpers = array('Html', 'Midias');

	public function create($data) {
		
		if(array_key_exists('Midia', $data))
				$data = $data['Midia'];

		$config = new MidiaConfig();
		$video = $config->changeExt($data['arquivo'], 'flv');
		$url = $this->Midias->fileUrl($video, VIDEO, 'flv');
		
		echo $this->Html->script('/midias/js/jquery.min.js',array('inline' => false));
		echo $this->Html->script('/midias/js/swfobject.js',array('inline' => false));
		echo $this->Html->scriptBlock('
			var flashvars = {video: "'.$url.'"};
			var params = {wmode: "transparent", scale: "noScale", menu: "false", allowFullScreen: "true"};
			var attributes = { id: "flv-player", name: "flv-player", swLiveConnect: "true" };
			
			swfobject.embedSWF("'.$this->Html->url('/midias/swf/flv-player.swf?v=6').'", "flv-player", "420", "280", "10.0.0", "'.$this->Html->url('/midias/swf/expressInstall.swf').'", flashvars, params, attributes);
		
			// -- controle -- //
			
			var movieName = "flv-player";
			function thisMovie(movieName) {
			  if (navigator.appName.indexOf ("Microsoft") !=-1) {
			    return window[movieName]
			  } else {
			    return document[movieName]
			  }
			}
			
			$(document).ready(function() {
				$("#reproduzir").click(function() {
					thisMovie(movieName).TGotoFrame(\'controleJavascript\', 1);
					return false
				});
				
				$("#pausar").click(function() {
					thisMovie(movieName).TGotoFrame(\'controleJavascript\', 2);
					return false
				});
				
				$("#diminuirVolume").click(function() {
					thisMovie(movieName).TGotoFrame(\'controleJavascript\', 3);
					return false
				});
				
				$("#AumentarVolume").click(function() {
					thisMovie(movieName).TGotoFrame(\'controleJavascript\', 4);
					return false
				});
			});
		');
?>
		<div>
			<div id="flv-player"></div>
			<noscript><p>Seu browser n&atilde; possui suporte a Javascript!</p></noscript>
			<ul id="controle-flv-player">
				<li><a href="#" id="reproduzir">Reproduzir v&iacute;deo</a></li>
				<li><a href="#" id="pausar">Pausar v&iacute;deo</a></li>
				<li><a href="#" id="diminuirVolume">Desligar som</a></li>
				<li><a href="#" id="AumentarVolume">Ligar som</a></li>
			</ul>
		</div>
<?php 
 /*
 * @copyright Copyright (c) 2014 BRASIL. (http://www.softwarepublico.gov.br/)
 *
 * This file is part of CMS Suindara.
 *
 * CMS Suindara is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * The CMS Suindara is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with CMS Suindara.  If not, see the oficial website 
 * <http://www.gnu.org/licenses/> or the Brazilian Public Software
 * Portal <www.softwarepublico.gov.br>
 *
 * *********************
 *
 * Direitos Autorais Reservados (c) 2014 BRASIL. (http://www.softwarepublico.gov.br/)
 *
 * Este arquivo é parte do programa CMS Suindara.
 *
 * CMS Suindara é um software livre; você pode redistribui-lo e/ou
 * modifica-lo dentro dos termos da Licença Pública Geral GNU como
 * publicada pela Fundação do Software Livre (FSF); na versão 2 da
 * Licença, ou qualquer versão posterior
 *
 * O CMS Suindara é distribuido na esperança que possa ser útil,
 * porém, SEM NENHUMA GARANTIA; nem mesmo a garantia implicita de 
 * ADEQUAÇÃO a qualquer  MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a
 * Licença Pública Geral GNU para maiores detalhes.
 *
 * Você deve ter recebido uma cópia da Licença Pública Geral GNU
 * junto com este programa, se não, acesse no website oficial
 * <http://www.gnu.org/licenses/> ou o Portal do Software Público 
 * Brasileiro <www.softwarepublico.gov.br>
 *
 */
	}
}