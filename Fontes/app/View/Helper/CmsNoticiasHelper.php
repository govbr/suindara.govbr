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
	
	App::uses('CmsNoticia', 'View/Helper/Din');
	
	class CmsNoticiasHelper extends AppHelper{
		
		
		/**
		 * Retorna a nóticia com $id, ou null caso não exista
		 * @param $id ID da notícia 
		 * @return array Noticia 
		 */
		public function getNoticia($id = null) {
			if ($id) {
				$n = $this->requestAction(array('ra' => true, 
												  'plugin' => 'noticias', 
					      				          'controller' => 'noticias', 
					      				          'action' => 'ra_view'), array($id));
				return new CmsNoticia($n['Noticia'], $this->_View);
			} else {
				return null;
			}
		}
		
		
		/**
		 * Retorna a nóticia destaque da categoria informada, ou a notícia destaque 
		 * independente da categoria. 
		 * @param $categoria_id ID da categoria 
		 * @return arrya Noticia em destque 
		 */
		public function getNoticiaDestaque($categoria_id = null) {
			$conditions = array();
			if ($categoria_id) $conditions['Noticia.categoria_id'] = $categoria_id;
			
			$noticia = $this->getNoticias(array( 'conditions' => $conditions,
														'order' => array('Noticia.id DESC')));
			
			if (!empty($noticia)) {
				return $noticia[0];
			} else {
				return null;
			}
		}
		
		/**
		 * Retorna as notícias de acordo com os requisitos da query passada em '$options'.
		 * Filtros para resgatar somente a notícia publicada ja são aplicados automaticamente, não
		 * sendo necessário informa-los em $options. 
		 * @param $options requisitos da query no padrão CakePHP ()
		 * @param $regrasBasicas Ativa/Desativa o controle de acesso a notícias publicadas 
		 * @return array Noticias  
		 */
		public function getNoticias(array $options = array(), $regrasBasicas = true) {


			$opt = urlencode(json_encode($options));
			$noticias = $this->requestAction(array('ra' => true, 
												'plugin' => 'noticias', 
					      				        'controller' => 'noticias', 
					      				        'action' => 'ra_query', 'all', $opt, $regrasBasicas));

			
			$cmsNoticias = array();
			foreach ($noticias as $noticia) {
				$cmsNoticias[] = new CmsNoticia($noticia['Noticia'], $this->_View);
			}
												
			return $cmsNoticias;
		}
		
		
		/**
		 * Retorna as notícias recentes, respeitando o valor de limite $limite_noticias 
		 * @param $limite_noticias Número limite de resultados retornados 
		 * @return array Noticias  
		 */
		public function getNoticiasRecentes($limite_noticias = 2) {
			$result = $this->getNoticias(array('limit' => $limite_noticias, 
											'conditions' => array('Noticia.status_id' => 2),
										    'order' => array('Noticia.id DESC') ));

			
			foreach ($result as $key => $value) {
				pr($value->titulo);
			}

			return $result;
			// return $this->getNoticias(array('limit' => $limite_noticias, 
			// 							    'order' => array('Noticia.id DESC'), 
			// 							    'conditions' => array('Noticia.status_id' => 2) )); //colocar parametro: status_id == 1
		}

		public function getNoticiasRecentesSemDestaque($limite_noticias = 2) {
			$limite_noticias = $limite_noticias + 1;

			$result = $this->getNoticias(array('limit' => $limite_noticias, 
										       'order' => array('Noticia.id DESC') 
										      )
										);
			array_shift($result);

			return $result;
		}
		
		
	}
	