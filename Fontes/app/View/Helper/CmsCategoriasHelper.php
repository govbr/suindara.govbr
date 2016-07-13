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
		App::uses('CmsCategoria', 'View/Helper/Din');
		
		class CmsCategoriasHelper extends AppHelper {
			
			/**
			 * Retorna as categorias de acordo com os requisitos de query informados em '$options'.
			 * @param $options requisitos da query no padrão CakePHP () 
			 * @return array Categorias  
			 */
			public function getCategorias(array $options = array()) {
				$opt = urlencode(json_encode($options));
			
				$categorias = $this->requestAction(array('ra' => true, 
													'plugin' => 'categorias', 
						      				        'controller' => 'categorias', 
						      				        'action' => 'ra_query', 'all', $opt));
																
				$cmsCategorias = array();
				foreach ($categorias as $categoria) {
					$cmsCategorias[] = new CmsCategoria($categoria['Categoria'], $this->_View);
				}
													
				return $cmsCategorias;	
			}
			
			public function getCategoriasComPrefixo($prefix) {
				$prefix .= '%';
				return $this->getCategorias(array('conditions' => array('Categoria.identificador LIKE' => $prefix)));	
			}
			
			/**
			 * Retorna a categoria com id ou titulo $id_titulo
			 * @param $id_titulo ID ou título da categoria 
			 * @return array Categoria 
			 */
			public function getCategoria($id_titulo) {
				$categoria = null;
				if (is_numeric($id_titulo)) {
					$categoria = $this->getCategorias(array('conditions' => array('Categoria.id' => $id_titulo)));
				} else {

					$categoria = $this->getCategorias(array('conditions' => array('Categoria.identificador' => $id_titulo)));
				
				}
				
				if (!empty($categoria)) {
					return $categoria[0];
				} else {
					return null;
				}
			}
			
			/**
			 * Retorna as últimas categorias registradas
			 * @param $ilimite_de_categorias número máximo de categorias retornadas 
			 * @return array Categoria 
			 */
			public function getCategoriasRecentes($limite_de_categorias = 3) {
				return $this->getCategorias(array('limit' => $limite_de_categorias, 
												  'order' => array('Categoria.id DESC')));
			}
			
			
			
		}
