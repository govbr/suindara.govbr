<?php

	App::uses('CmsMontadorMenu', 'View/Helper/Util');
	App::uses('CmsMenuElement', 'View/Helper/Din');

	class CmsMontadorMenuPadrao implements CmsMontadorMenu
	{
		public function htmlMenu(CmsMenuElement $baseMenu)
		{
			$result = '';
			
			$tagOpt = $baseMenu->getTagOptions();
			$main = isset($tagOpt['main']) ? $tagOpt['main'] : array();
			$second = isset($tagOpt['second']) ? $tagOpt['second'] : array();
			
			if ($baseMenu->getTipo() == MENU_LINK && count($baseMenu->getItens()) > 0) {
				$result = $baseMenu->getView()->Html->tag('li', null, $second);
				$link = $baseMenu->getLink();//Router::url($baseMenu->link, true);
				$result .= "<a href=\"{$link}\">{$baseMenu->nome}</a>";
				$result .= "<p><a href=\"#\" class=\"expandir\">Expandir menu {$baseMenu->nome}</a></p>";
				$result .= $baseMenu->getView()->Html->tag('ul', null, $main);
				if ($baseMenu->getItens()) {
					foreach ($baseMenu->getItens() as $item) {
						$result .= $item->htmlMenu($this);
					}
				} 
				$result .= '</ul>';
				$result .= '</li>';
			} else if ($baseMenu->getTipo() == MENU_LINK) {
				$result .= $baseMenu->getView()->Html->tag('li', null, $second) . $baseMenu->getView()->Html->link($baseMenu->nome, $baseMenu->getLink(), $main) . '</li>';
			} else if ($baseMenu->getTipo() == MENU_PAGINA) {
				$p = $baseMenu->getView()->CmsPaginas->getPagina($baseMenu->pagina_id);
				$result .= $baseMenu->getView()->Html->tag('li', null, $second) . $baseMenu->getView()->Html->link($baseMenu->nome, $p->getPath()) . '</li>';
			} else if ($baseMenu->getTipo() == MENU_CATEGORIA) {
				$c = $baseMenu->getView()->CmsCategorias->getCategoria($baseMenu->categoria_id);
				$result .= $baseMenu->getView()->Html->tag('li', null, $second) . $c->htmlNoticiasLink($main) . '</li>';
			} else {
				if ($baseMenu->isRoot()) { 
					$result = $baseMenu->getView()->Html->tag('ul', null, $main);
				} else {
					$result = $baseMenu->getView()->Html->tag('li', null, $second);
					$result .= "<a href=\"#\">{$baseMenu->nome}</a>";
    				$result .= "<p><a href=\"#\" class=\"expandir\">Expandir menu {$baseMenu->nome}</a></p>";
					$result .= $baseMenu->getView()->Html->tag('ul', null, $main);
				}
				//$result .= '(' . $baseMenu->nome . ')';
				if ($baseMenu->getItens()) {
					foreach ($baseMenu->getItens() as $item) {
						$result .= $item->htmlMenu($this);
					}
				} 
				
				$result .= '</ul>';
				if (!isset($baseMenu->site_id)) {
					$result .= '</li>';
				}
			}	
			
			return $result;
		}
	}