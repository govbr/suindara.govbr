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
	App::uses('CmsWrapper', 'View/Helper/Din');


	class CmsPagina extends CmsWrapper {
		
		public function __construct(array $pagina, View $view) {
			parent::__construct($pagina, $view);
		}
		
		public function getGruposDeBanners() {
			$cond = array('GrupoBanners.grupo_id = Grupo.id');
			$joins = array('alias' => 'GrupoBanners', 'table' => 'pagina_grpbanners', 'type' => 'INNER', 
						   'conditions' => array('GrupoBanners.pagina_id' => $this->id));
						   
			return $this->_view->CmsBanners->getGrupos(array('joins' => array($joins), 'conditions' => $cond));
		}
		
		public function getPath() {
			return $this->_view->CmsTemplate->raizPaginas() . '/' . 'visualizar' . '/' . $this->id;
			//return '/' . 'paginas' . '/' . 'visualizar' . '/' . $this->id;
		}
		
		/**
		 * Gera o HTML para o título da página
		 * @param string $nivel Nível do título <h1>, <h2>, ...
		 * @return string HTML
		 */
		public function htmlTitulo($nivel = 2, array $options = array()) {
			return $this->_view->Html->tag("h$nivel", $this->titulo, $options);
			//return "<h$nivel>" . $this->titulo . "</h$nivel>";
		}
		
		/**
		 * Gera o HTML para o texto da página
		 * @return string HTML
		 */
		public function htmlTexto(array $options = array(), $tag = false, $pure = true) {
			$texto = $this->texto;
			if ($pure)
				$texto = preg_replace("/(:?<p>)|(:?<\/p>)/", '', $texto);
			if (!$tag) {
				return $texto;	
			} else {
				return $this->_view->Html->tag($tag, $texto, $options);	
			}
		}
		
		public function getImagens($comImagemDestaque = false, $maximoDeImagens = null) {
			return $this->_view->CmsMidias->getImagens($this->id, TC_PAGINA, $comImagemDestaque, $maximoDeImagens);
		}
		
		public function getVideos() {
			return $this->_view->CmsMidias->getVideos($this->id, TC_PAGINA);
		}
		
		public function getAudios() {
			return $this->_view->CmsMidias->getAudios($this->id, TC_PAGINA);
		}
		
		public function getArquivos() {
			return $this->_view->CmsMidias->getArquivos($this->id, TC_PAGINA);
		}
	}