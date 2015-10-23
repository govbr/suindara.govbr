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
/**
 *
 * @package  Croogo
 * @since    1.4
 * @author   Rachman Chavik <rchavik@xintesa.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */

class CmsMenu extends Object {

/**
 * _items
 *
 * @var array
 */
	protected static $_items = array();

/**
 * _defaults
 *
 * @var array
 */
	protected static $_defaults = array(
		'title' => false,
		'url' => '#',
		'children' => array(),
		'htmlAttributes' => array(),
	);

/**
 * _setupOptions
 *
 * @param array $options
 */
	protected static function _setupOptions(&$options) {
		$options = self::_merge(self::$_defaults, $options);
		foreach ($options['children'] as &$child) {
			self::_setupOptions($child);
		}
	}

/**
 * Add a menu item
 *
 * @param string $path dot separated path in the array.
 * @param array $options menu options array
 * @return void
 */
	public static function add($path, $options) {
		$pathE = explode('.', $path);
		$pathE = array_splice($pathE, 0, count($pathE) - 2);
		$parent = join('.', $pathE);
		if (!empty($parent) && !Hash::check(self::$_items, $parent)) {
			$title = Inflector::humanize(end($pathE));
			$o = array('title' => $title);
			self::_setupOptions($o);
			self::add($parent, $o);
		}
		self::_setupOptions($options);
		$current = Hash::extract(self::$_items, $path);
		if (!empty($current)) {
			self::_replace(self::$_items, $path, $options);
		} else {
			self::$_items = Hash::insert(self::$_items, $path, $options);
		}
	}

/**
 * Replace a menu element
 *
 * @param array $target pointer to start of array
 * @param string $path path to search for in dot separated format
 * @param array $options data to replace with
 * @return void
 */
	protected static function _replace(&$target, $path, $options) {
		$pathE = explode('.', $path);
		$path = array_shift($pathE);
		$fragment = join ('.', $pathE);
		if (!empty($pathE)) {
			self::_replace($target[$path], $fragment, $options);
		} else {
			$target[$path] = self::_merge($target[$path], $options);
		}
	}

/**
 * Merge $firstArray with $secondArray
 *
 * Similar to Hash::merge, except duplicates are removed
 * @param array $firstArray
 * @param array $secondArray
 * @return array
 */
	protected static function _merge($firstArray, $secondArray) {
		$merged = Hash::merge($firstArray, $secondArray);
		foreach ($merged as $key => $val) {
			if (is_array($val) && is_int(key($val))) {
				$merged[$key] = array_unique($val);
			}
		}
		return $merged;
	}

/**
 * Remove a menu item
 *
 * @param string $path dot separated path in the array.
 * @return void
 */
	public static function remove($path) {
		self::$_items = Hash::remove(self::$_items, $path);
	}

/**
 * Clear all menus
 *
 * @return void
 */
	public static function clear() {
		self::$_items = array();
	}

/**
 * Sets or returns menu data in array
 *
 * @param $items array if empty, the current menu is returned.
 * @return array
 */
	public static function items($items = null) {
		if (!empty($items)) {
			self::$_items = $items;
		}
		return self::$_items;
	}

/**
 * Gets default settings for menu items
 * @return array
 */
	public static function getDefaults() {
		return self::$_defaults;
	}

}