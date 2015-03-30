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

	App::uses('CmsBanner', 'View/Helper/Din');
	App::uses('CmsGrupoBanners', 'View/Helper/Din');

	class CmsBannersHelper extends AppHelper {
			
			/**
			 * Retorna os banners de acordo com os requisitos de query informados em '$options'.
			 * @param $options requisitos da query no padrão CakePHP () 
			 * @return array Banners  
			 */
			public function getBanners(array $options = array()) {
				$opt = urlencode(json_encode($options));
			
				$banners = $this->requestAction(array('ra' => true, 
													'plugin' => 'banners', 
						      				        'controller' => 'banners', 
						      				        'action' => 'ra_query', 'all', $opt));
																
				
				$cmsBanners = array();
				foreach ($banners as $banner) {
					$cmsBanners[] = new CmsBanner($banner['Banner'], $this->_View);
				}
													
				return $cmsBanners;	
			}
			
			
			/**
			 * Retorna os grupos de banners de acordo com os requisitos de query informados em '$options'.
			 * @param $options requisitos da query no padrão CakePHP () 
			 * @return array Grupos  
			 */
			public function getGrupos(array $options = array()) {
				$opt = urlencode(json_encode($options));
				//print_r(json_decode(urldecode($opt), true)); die();
			
				$grupos = $this->requestAction(array('ra' => true, 
													'plugin' => 'banners', 
						      				        'controller' => 'grupos', 
						      				        'action' => 'ra_query', 'all', $opt));
																			
				$cmsGrupos = array();
				foreach ($grupos as $grupo) {
					$cmsGrupos[] = new CmsGrupoBanners($grupo['Grupo'], $this->_View);
				}
								
												
													
				return $cmsGrupos;	
			}
			
			
			public function getGrupo($id_titulo) {
				$grupo = null;
				
				if (is_numeric($id_titulo)) {
					$grupo = $this->getGrupos(array('conditions' => array('Grupo.id' => $id_titulo)));
				} else {
					$grupo = $this->getGrupos(array('conditions' => array('Grupo.nome' => $id_titulo)));
				}
				
				if (!empty($grupo)) {
					return $grupo[0];
				} else {
					return null;
				}
			}
			
			
			/**
			 * Retorna o Banner com id ou titulo $id_titulo
			 * @param $id_titulo ID ou título do banner 
			 * @return array Banner 
			 */
			public function getBanner($id_titulo) {
				$banner = null;
				
				if (is_numeric($id_titulo)) {
					$banner = $this->getBanners(array('conditions' => array('Banner.id' => $id_titulo)));
				} else {
					$banner = $this->getBanners(array('conditions' => array('Banner.titulo' => $id_titulo)));
				}
				
				if (!empty($banner)) {
					return $banner[0];
				} else {
					return null;
				}
			}
			
			
	}		
			