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

	App::uses('CmsWrapper', 'View/Helper/Din');

	define('BAN_SEMLINK', 1);
	define('BAN_LINK', 2);
	define('BAN_PAGINA', 3);
	define('BAN_CATEGORIA', 4);

	class CmsBanner extends CmsWrapper {
		
		public function getLink() {
			switch ($this->bm_tipo_id) {
				case BAN_LINK : 
						$matches = array();
						if (preg_match("/^(www)|(.+?:\/\/).*$/", $this->link, $matches)){
							if ($matches[1]) return 'http://' . $this->link;
							//if ($matches[2]) return $this->link;
							return $this->link;
						} else {
							return Router::url($this->link , true);	
						}
						break;
				
				case BAN_PAGINA :
						$p = $this->_view->CmsPaginas->getPagina($this->pagina_id);
						return $p->getPath();
						
				case BAN_CATEGORIA :
						$c = $this->_view->CmsCategorias->getCategoria($this->categoria_id);
						return $c->getNoticiasPath();
						
				default :
						return '#';   	
			}
		}
		
		public function htmlBanner(array $options = array()) {
			$link = $this->getLink();
			// switch ($this->bm_tipo_id) {
			// 	case BAN_LINK: $link = $this->link; break;
			// 	case BAN_PAGINA: $link = $this->_view->CmsTemplate->raizPaginas() . "/visualizar/{$this->pagina_id}"; break;
			// 	case BAN_CATEGORIA: $link = $this->_view->CmsTemplate->raizNoticias() . "/listar/{$this->categoria_id}"; break;
			// }
			
			
			return $this->_view->Html->link($this->_view->Html->image(Router::url('/files/img/banner/' . $this->arquivo, true), array(
   							   "alt" => $this->descricao,
							  )), $link, $options + array('escape' => false));
		}
	}
