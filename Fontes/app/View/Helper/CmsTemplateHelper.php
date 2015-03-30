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

	App::uses('CmsSite', 'View/Helper/Din');

	class CmsTemplateHelper extends AppHelper{

		/**
		*	Helpers carregados
		*/
		private $_pool = array();
		
		/**
		 * Diretório raiz do template
		 * @return string Diretório raiz do template 
		 */
		public function raiz() {
			// Router::url

			return Router::url('/' . 'templates' . '/' . $this->diretorio(), true);
			//return $this->request->base . '/' . 'templates' . '/' . $this->diretorio();
		}
		
		/**
		 * Diretório da pasta que contêm o template a ser renderizado
		 * @return string Diretório do template 
		 */
		public function diretorio() {
			return Configure::read('Site.Template.Dir');
		}
		
		/**
		 * Diretório base do site
		 * @return string Diretório do site 
		 */
		public function raizSite() {

			return Router::url('/', true);
		}
		
		
		public function path($localPagEstatica) {
			return Router::url('/' . $localPagEstatica, true);
		}
		
		/**
		 * Diretório raiz para tratar as notícias
		 * @return string Diretório raiz das notícias 
		 */
		public function raizNoticias() {
			return $this->raizSite() . 'noticias';
		}
		
		/**
		 * Diretório raiz para tratar as páginas
		 * @return string Diretório raiz das páginas 
		 */
		public function raizPaginas() {
			return $this->raizSite() . 'paginas';
		}
		
		/**
		 * Localização do arquivo $path .css
		 * Por padrão este método pesquisa a partir da pasta 'css' definida no diretório do template
		 *  
		 * @param $path Caminho para o arquivo css
		 * @return string Localização do arquivo css 
		 */
		public function cssPath($path) {
		//	return '..' . '/' . 'templates' . '/' . $this->diretorio() . '/' . 'css' . '/' . $path . '.css'; 
			return str_replace(' ', '%20', $this->raiz() . '/' . 'css' . '/' . $path . '.css');
		}
		
		// public function css($path) {
			// return $this->_View->Html->css($this->cssLink($path));
		// }
		
		/**
		 * Localização do arquivo $path .js
		 * Por padrão este método pesquisa a partir da pasta 'js' definida no diretório do template 
		 * 
		 * @param $path Caminho para o arquivo js
		 * @return string Localização do arquivo js 
		 */
		public function jsPath($path) {
			//return '..' . '/' . 'templates' . '/' . $this->diretorio() . '/' . 'js' . '/' . $path . '.js';
			return str_replace(' ', '%20', $this->raiz() . '/' . 'js' . '/' . $path . '.js');
		}
		
		// public function js($path) {
			// return $this->_View->Html->script($this->jsLink($path), null, array('block' => 'layoutCss'));
		// }
		
		/**
		 * Localização do arquivo $path
		 * Por padrão este método pesquisa a partir da pasta 'images' definida no diretório do template 
		 * 
		 * @param $path Caminho para a imagem
		 * @return string Localização do arquivo css 
		 */
		public function imagemPath($path) {
			//return '..' . '/' . 'templates' . '/' . $this->diretorio() . '/' . 'images' . '/' . $path;
			return str_replace(' ', '%20', $this->raiz() . '/' . 'images' . '/' . $path);
						
		}
		
		/**
		 * Localização do arquivo $path
		 * Por padrão este método pesquisa a partir da pasta 'images' definida no diretório do template 
		 * 
		 * @param $path Caminho para a imagem
		 * @return string Localização do arquivo css 
		 */
		public function arquivoPath($path) {
			return str_replace(' ', '%20', $this->raiz() . '/' . 'file' . '/' . $path);
		}
		
		/**
		 * Gera o HTML para uma imagens contida na pasta de imagens padrão do CMS <nome_do_template>/images  
		 * @param nome Nome da imagem ('nome.ext') 
		 * @return string HTML
		 */
		public function htmlParaImagem($nome, array $options = array()) {
			return $this->_View->Html->image($this->imagemPath($nome), $options);
			//return preg_replace('/(src=)"([^"]+)"/', "$1" . $this->imagemPath($nome), $temp);
		}
		
		/**
		 * Retorna os parâmetros passados por GET.
		 * Caso $index não seja especificado o método irá retornar um array com todos os parâmetros GET 
		 * 
		 * @param $index Indice do parâmetro
		 * @return string|array Valor do parâmetros $index ou o array com todos os parâmetros 
		 */
		public function getParams($index = null) {
			if ($index !== null && isset($this->request->query[$index])) {
				return $this->request->query[$index];
			} else {
				return $this->request->query;
			}
		}
		
		/**
		*	Retorna as informações do site que está sendo acessado;
		*/
		public function getSite() {
			return new CmsSite(Configure::read('Site.Atual'), $this->_View);
		}

		/**
		*	Carrega helper informado em $path/$name dinâmicamente.
		*	Caso o $path não seja informado é inferido que o helper ja esteja carregado,
		* 	retornando somente sua referência do pool. Caso ele não esteja carregado, null será retornado.
		*	Exemplo: loadHelper('MyHelper', 'My.Helpers') carrega o helper app/My/Helpers/MyHelper.php
		*	@param $name Nome do helper
		*	@param $path Localização do helper
		*	@return instância do helper ou null
		*/
		public function loadHelper($name, $path = null)
		{
			$helper = null;
			if ($path) {
				App::uses($name, $path);
				$helper = new $name();
				$helper->_View = $this->_View;
				$this->_pool[$name] = $helper;
			} else {
				if (isset($this->_pool[$name]))
					$helper = $this->_pool[$name];
			}

    		return $helper;
		}

		public function localizacao() {
			$resID = $this->getParams(0);
			$whereYouAre = '';
			if (preg_match('/noticias\/visualizar/', $this->here)) {
				$whereYouAre = 'Notícia - ';
				$temp = $this->_View->CmsNoticias->getNoticia($resID); 
				$whereYouAre .= $temp->titulo;
			} else if (preg_match('/paginas\/visualizar/', $this->here)) {
				$whereYouAre = 'Página - ';
				$temp = $this->_View->CmsPaginas->getPagina($resID); 
				$whereYouAre .= $temp->titulo;
			}else if (preg_match('/noticias\/listar/', $this->here)) {
				$whereYouAre = 'Notícias';
				//$temp = $this->_View->CmsPaginas->getPagina($resID); 
				//$whereYouAre .= $temp->titulo;

			} else {
				$matches = array();
				preg_match('/\/(.*?)$/', $this->here, $matches);
				$whereYouAre = ucfirst($matches[1]);
			}

			return $whereYouAre;
		}
		
	}
