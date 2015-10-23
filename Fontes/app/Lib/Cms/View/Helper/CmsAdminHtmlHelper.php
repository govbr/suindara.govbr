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

App::uses('HtmlHelper', 'View/Helper');

class CmsAdminHtmlHelper extends HtmlHelper {

	private $modo_sistema = MODO_SISTEMA_PADRAO;

	public function __construct(View $View, $settings = array()) {
		parent::__construct($View, $settings);
		if($this->request['prefix'] == 'admin') {
			$this->modo_sistema = $this->requestAction(
				array(
					'ra' => true,
					'plugin' => 'usuarios', 
					'controller' => 'usuarios', 
					'action' => 'ra_modo_sistema',
					'admin' => true
				)
			);
		} else {
			$this->modo_sistema = MODO_SISTEMA_PADRAO;
		}
	}

	public function getModoSistema() {
		return $this->modo_sistema;
	}

	public function script($url, $options = array()) {
		if($this->modo_sistema == MODO_SISTEMA_PADRAO) {
			return parent::script($url, $options);
		}
	}

	public function scriptBlock($script, $options = array()) {
		if($this->modo_sistema == MODO_SISTEMA_PADRAO) {
			return parent::scriptBlock($script, $options);
		}
	}

	public function scriptStart($options = array()) {
		if($this->modo_sistema == MODO_SISTEMA_PADRAO) {
			return parent::scriptStart($options);
		}
	}

	public function scriptEnd() {
		if($this->modo_sistema == MODO_SISTEMA_PADRAO) {
			return parent::scriptEnd();
		}
	}

	public function getCrumbList($options = array(), $startText = false) {
		$defaults = array('firstClass' => 'first', 'lastClass' => 'last', 'separator' => '');
		$options = array_merge($defaults, (array)$options);
		$firstClass = $options['firstClass'];
		$lastClass = $options['lastClass'];
		$separator = $options['separator'];
		unset($options['firstClass'], $options['lastClass'], $options['separator']);

		$crumbs = $this->_prepareCrumbs($startText);
		if (empty($crumbs)) {
			return null;
		}

		$result = '';
		$crumbCount = count($crumbs);
		$ulOptions = $options;
		$lastItem = (count($crumbs) - 1);
		foreach ($crumbs as $which => $crumb) {
			$options = array();
			if (empty($crumb[1]) || $which == $lastItem) {
				$elementContent = $crumb[0];
			} else {
				$elementContent = $this->link($crumb[0], $crumb[1], $crumb[2]);
			}
			if (!$which && $firstClass !== false) {
				$options['class'] = $firstClass;
			} elseif ($which == $crumbCount - 1 && $lastClass !== false) {
				$options['class'] = $lastClass;
			}
			if (!empty($separator) && ($crumbCount - $which >= 2)) {
				$elementContent .= $separator;
			}
			$result .= $this->tag('li', $elementContent, $options);
		}
		return $this->tag('ul', $result, $ulOptions);
	}


}