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
	App::uses('Noticia', 'Noticias.Model');
	App::uses('Categoria', 'Categorias.Model');

	class CmsCategoria extends CmsWrapper {
		public function __construct(array $dbData, View $view) {
			parent::__construct($dbData, $view);
			
		}
		
		public function getNoticiasRecentes($limite = 5) {
			$noticias = $this->_view->CmsNoticias->getNoticias(array('conditions' => array('Noticia.categoria_id' => $this->id), 
															 'order' => 'Noticia.id DESC',
															 'limit' => $limite));
			
			return $noticias;												 
			// if ($noticia) { 
				// return $noticia[0];
			// } else {
				// return null;
			// }
		}
		
		public function getNoticias() {
			return $this->_view->CmsNoticias->getNoticias(array('conditions' => array('Noticia.categoria_id' => $this->id), 
															    'order' => 'Noticia.datahora_prog_pub DESC'));
		}
		
		public function getProximasNoticias() {
			$cond = array(
							'Noticia.status_id' => Noticia::STATUS_PUBLICO,
							'Noticia.datahora_prog_pub >' => date('Y-m-d H:i:s'),
							//'OR' => array('Noticia.datahora_prog_exp >' => 'NOW()',
								//		  'Noticia.datahora_prog_exp' => null)
						 );
						 
			return $this->_view->CmsNoticias->getNoticias(array('conditions' => $cond), 0);
		}
		
		public function getNoticiasPath() {
			return Router::url('/' . 'noticias' . '/' . 'listar' . '/' . $this->id, true);
		}

		public function getDescricao() {
			return $this->descricao;
		}

		public function getFilhos() {
			return $this->_view->CmsCategorias->getCategorias(array('conditions' => array('Categoria.parent_id' => $this->id), 
															    'order' => 'Categoria.titulo ASC'));	
		}
		
		public function htmlNoticiasLink(array $options = array()) {
			$path = $this->getNoticiasPath($options);
			return $this->_view->Html->link($this->titulo, $path, $options);
		}
		
		public function htmlTitulo($nivel = 3, array $options = array()) {
			return $this->_view->Html->tag("h$nivel", $this->titulo, $options);
		}
		
		
		
	}
