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

App::uses('CmsAclMainSiteOnly', 'Cms');

class CmsAdminMenuHelper extends AppHelper {
	
	public $helpers = array(
		'Html' => array('className'=>'CmsAdminHtml')
	);

	private $_items = array();

	private $Acl = null;

/**
 * Default Constructor
 *
 * @param View $View The View this helper is being attached to.
 * @param array $settings Configuration settings for the helper.
 */
	public function __construct(View $View, $settings = array()) {
		$this->_items = CmsMenu::items();
		$this->Acl = ClassRegistry::init('HabtmDbAcl');
		$this->Acl->settings = array('userModel' => 'Usuarios.Usuario', 'groupAlias' => 'Perfis.Perfil');
		parent::__construct($View, $settings);
	}

	public function adminMenus() {
		return $this->_adminMenus($this->_items);
	}
	private function _adminMenus($menus, $options = array(), $depth = 0) {
		$options = Hash::merge(array(
			'children' => true,
			'htmlAttributes' => array(
				
			),
		), $options);

		if($depth == 0)
			$options['htmlAttributes']['id'] = 'menu';

		$userId = AuthComponent::user('id');
		$dominio = AuthComponent::user('SiteAtual.Site.id');
		
		if (empty($userId)) {
			return '';
		}

		$out = null;
		$sorted = Hash::sort($menus, '{s}.title', 'ASC');

		foreach ($sorted as $menu) {
			$htmlAttributes = $options['htmlAttributes'];

			$aco = '';
			if($menu['url'] != '#') {
				$plugin = $menu['url']['plugin'];
				$controller = $menu['url']['controller'];
				$action = $menu['url']['action'];

				$aco = 'controllers' . DS . $plugin . DS . $controller . DS . $action;
				$aro = array('model'=>'Usuario', 'foreign_key' => $userId);

				$check = $this->Acl->check($aro, $aco);

				if(!$check)
					continue;
			}

			// if (empty($menu['htmlAttributes']['class'])) {
			// 	$menuClass = Inflector::slug(strtolower('menu-' . $menu['title']), '-');
			// 	$menu['htmlAttributes'] = Hash::merge(array(
			// 		'class' => $menuClass
			// 	), $menu['htmlAttributes']);
			// }

			$title = $menu['title'];
			$children = '';
			if (!empty($menu['children'])) {
				// $childClass = 'nav nav-stacked sub-nav ';
				// $childClass .= ' submenu-' . Inflector::slug(strtolower($menu['title']), '-');
				// if ($depth > 0) {
				// 	$childClass .= ' dropdown-menu';
				// }
				$children = $this->_adminMenus($menu['children'], array(
					'children' => true,
					//'htmlAttributes' => array('class' => $childClass),
				), $depth + 1);

				if(!$children)
					continue;
				
				//$menu['htmlAttributes']['class'] .= ' hasChild dropdown-close';
			}

			//$menu['htmlAttributes']['class'] .= ' sidebar-item';

			$menuUrl = $this->url($menu['url']);
			$controller = false;
			$selecionado = false;
			if(isset($menu['url']['controller'])) {
				$controller = $menu['url']['controller'];
				if($controller == 'menus' && ($this->request['controller'] == 'menu_itens' || $this->request['controller'] == 'menuItens'))
					$selecionado = true;
			}

			// if ($menuUrl == env('REQUEST_URI')) {
			if ($controller == $this->request['controller'] || $selecionado) {
				if (isset($menu['htmlAttributes']['class'])) {
					$menu['htmlAttributes']['class'] .= ' selecionado';
				} else {
					$menu['htmlAttributes']['class'] = 'selecionado';
				}
			}
			$liOptions = array();
			// if (!empty($children) && $depth > 0) {
			// 	//$liOptions['class'] = ' dropdown-submenu';
			// }
			$link = null;
			if($menu['url'] == '#') {
				$link = '<span>'.$menu['title'].'</span>';
			} else {
				if($menu['title'] === 'Sites' || $menu['title'] === 'Templates' || $menu['title'] === 'Banners' || $menu['title'] === 'Banners' || $menu['title'] === 'Menus'){
					//$menu['htmlAttributes']['escape'] = 'false';
					$menu['htmlAttributes']['lang'] = 'en';
					$link = $this->Html->link($menu['title'], $menu['url'], $menu['htmlAttributes']);
				}else if($menu['title'] === 'Acl')
					$link = $this->Html->link('Gerenciamento de <span lang="en">'.strtoupper($menu['title']).'</span>' . '<span class="oculto">(Lista de controle de acesso)</span>' , $menu['url'], array('escape' => false));
				else
					$link = $this->Html->link($menu['title'], $menu['url'], $menu['htmlAttributes']);
			}
			$out .= $this->Html->tag('li', $link . $children, $liOptions);
		}
		if($out == null)
			return null;
		return $this->Html->tag('ul', $out, $htmlAttributes);
	}

}