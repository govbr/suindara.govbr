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
App::uses('AppHelper', 'View/Helper');
App::uses('MidiaConfig', 'Midias.Lib');

class MidiasHelper extends AppHelper {

	public $helpers = array('Html');

	private $config;

	public function __construct(View $view, $settings = array()) {
        parent::__construct($view, $settings);
        $this->config = new MidiaConfig();
    }

    public function size($bytes) {
    	$unity = 'MB';
    	$return = $bytes / 1024 / 1024;
    	if($return < 1) {
    		$return = $bytes / 1024;
    		$unity = 'KB';
    	} 
    	$return = number_format($return, 2 , ',' , '.');
    	return $return . ' ' . $unity;
    }

	public function fileUrl($arquivo, $tipo_id, $append = false) {
		$base = $this->config->midiaBase($tipo_id, $append);
	 	return $this->Html->url($base . $arquivo, false);
	}

	public function fileExt($arquivo, $tipo_id) {
		$base = $this->config->midiaDir($tipo_id);
		return $this->config->getExt($base . $arquivo);
	}

	public function thumb($arquivo, $tipo_id, $options = array()) {
		$base = $this->config->midiaBase($tipo_id);
		switch ($tipo_id) {
			case IMAGEM:
				$base .= 'th/';
				break;

			case VIDEO:
				$base .= 'thumb/';
				$arquivo = $this->config->changeExt($arquivo, 'jpg');
				break;

			case AUDIO:
				return $this->Html->image(Router::url('/img/icone_audio.png', true), $options);
				break;

			case ARQUIVO:
				return $this->Html->image(Router::url('/img/icone_' . $this->arquivoThumb($arquivo) . '.png', true), $options);
		}
	 	return $this->Html->image($this->Html->url($base . $arquivo), $options);
	}

	public function editAction($tipo_id) {
		$action;
		switch ($tipo_id) {
			case IMAGEM:
				$action = 'imagem';
				break;
			
			case VIDEO:
				$action = 'video';
				break;

			case AUDIO:
				$action = 'audio';
				break;

			case ARQUIVO:
				$action = 'arquivo';
				break;
		}
		return $action;
	}

	private function arquivoThumb($arquivo) {
		$ext = $this->config->getExt($arquivo);
		switch($ext) {
			case 'doc':
			case 'docx':
			case 'odt':
				return 'doc';

			case 'xls':
			case 'xlsx':
			case 'ods':
			case 'csv':
				return 'xls';

			case 'pdf':
				return 'pdf';

			case 'ppt':
			case 'pptx':
			case 'pps':
			case 'odp':
				return 'ppt';

			case 'zip':
			case 'rar':
			case '7z':
			case '7e':
			case 'tar':
			case 'xz':
			case 'gz':
			case 'bz':
			case 'bz2':
				return 'zip';

			default:
				return 'file';
		}

	}
}