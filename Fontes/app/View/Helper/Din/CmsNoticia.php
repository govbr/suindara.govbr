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

	define('DATA_EXTENSO', 0);
	define('DATA_PADRAO', 1);
	define('DATA_PONTO', 2);

	class CmsNoticia extends CmsWrapper{
		
		 public static $months = array('Janeiro', 'Fevereiro', 'Março', 'Abril',
									   'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro',
									   'Outubro', 'Novembro', 'Dezembro');
									   
		protected $_dataPublicaBuffer;							   
		
		public function __construct(array $noticia, View $view) {
			
			parent::__construct($noticia, $view);
			$this->_dataPublicaBuffer = explode('-', $this->datahora_prog_pub);
			$day = explode(' ', $this->_dataPublicaBuffer[2]);
			$day = $day[0];
			$this->_dataPublicaBuffer[2] = $day;
		}
		
		public function getDiaPublicacao() {
			return $this->_dataPublicaBuffer[2];
		}
		
		public function getMesPublicacao() {
			return CmsNoticia::$months[$this->_dataPublicaBuffer[1] - 1];
		}
		
		public function getAnoPublicacao() {
			return $this->_dataPublicaBuffer[0];
		}
		
		public function getPath() {
			return $this->_view->CmsTemplate->raizNoticias() . '/' . 'visualizar' . '/' . $this->id;
		}

		public function createPath($plugin, $action = null, $noticia = null){
			$url = '';

			if($plugin != null){
				$url = '/' . strtolower($plugin);
			}

			$url .= '/';

			if($action != null){
				$url .= strtolower($action) . '/';
			}

			if($noticia == null){
				$url .= $this->id;
			}else{
				$url .= $noticia;
			}

			return Router::url($url, true);
		}
		
		/**
		 * Gera o HTML para o título da notícia
		 * @param string $nivel Nível do título <h1>, <h2>, ...
		 * @return string HTML
		 */
		public function htmlTitulo($nivel = 2, array $options = array()) {
			return $this->_view->Html->tag("h$nivel", $this->titulo, $options);
			//return "<h$nivel>" . $this->titulo . "</h$nivel>";
		}
		
		/**
		 * Gera o HTML para o resumo da notícia
		 * @return string HTML
		 */
		public function htmlResumo(array $options = array(), $tag = false, $pure = true) {
			$resumo = $this->resumo;
			if ($pure)
				$resumo = preg_replace("/(:?<p>)|(:?<\/p>)/", '', $resumo);
			if (!$tag) {
				return $resumo;	
			} else {
				return $this->_view->Html->tag($tag, $resumo, $options);	
			}
			//return $this->_view->Html->tag($tag, $this->resumo, $options);
			//return '<p>' . $this->resumo . '</p>';
		}
		
		/**
		 * Gera o HTML para o texto da notícia
		 * @return string HTML
		 */
		public function htmlTexto(array $options = array(), $tag = false, $pure = true) {
			$texto = $this->texto;
			if ($pure){
				$texto = preg_replace("/(:?<p>)|(:?<\/p>)/", '', $texto);
			}

			if (!$tag) {
				return $texto;	
			} else {
				$texto = $this->_view->Html->tag($tag, $texto, $options);	
				return $texto;
			}
		}
		
		/**
		 * Gera o HTML para a data
		 * @param string $str_time String com a data no formato mm-dd-yyyy 
		 * @param int $format Define o formato da data: 
		 * 		  DATA_PADRAO => dd/mm/yyyy 
		 * 		  DATA_EXTENSO => $DiaDaSemana$, $Dia$ de $Mês$ de $Ano$, $Hora$:$Minuto$:$Segundo$
		 * @param string $tag Define a <tag> que irá encapsular a data formatada 
		 * @return string HTML com a data
		 */
		protected function _htmlData($str_time, $format = DATA_PADRAO, array $options = array(), $tag = 'span') {
			switch ($format) {
				case DATA_PADRAO:
						return $this->_view->Html->tag($tag, $this->_view->Formatacao->data(strtotime($str_time)), $options);
						break;

				case DATA_PONTO:
						return $this->_view->Html->tag($tag, $this->_view->Formatacao->data(strtotime($str_time), array('formato' => 'd.m.y')), $options);
					break;

				case DATA_EXTENSO:
						return $this->_view->Html->tag($tag, $this->_view->Formatacao->dataCompleta(strtotime($str_time)), $options);
						break;
				
				default:
					# code...
					break;
			}
		}
		
		public function htmlDataPublicacao($format = DATA_PADRAO, array $options = array(),  $tag = 'span') {
			return $this->_htmlData($this->datahora_prog_pub, $format, $options, $tag);
		}
		
		public function htmlDataExpiracao($format = DATA_PADRAO, $options = array(), $tag = 'span') {
			return $this->_htmlData($this->datahora_prog_exp, $format, $options, $tag);
		}
		
		public function htmlCartola(array $options = array(), $tag = 'span') {
			return $this->_view->Html->tag($tag, $this->cartola, $options);
		}
		
		public function htmlAutor(array $options = array(), $tag = 'span') {
			return $this->_view->Html->tag($tag, $this->autor, $options);
		}
		
		public function htmlLink(array $options = array()) {
			$path = $this->getPath();
			return $this->_view->Html->link($this->titulo, $path, $options);
		}
		
		public function getImagemDestaque() {
			return $this->_view->CmsMidias->getImagemDestaque($this->id, TC_NOTICIA);
		}
		
		public function getImagens($comImagemDestaque = false, $maximoDeImagens = null) {
			return $this->_view->CmsMidias->getImagens($this->id, TC_NOTICIA, $comImagemDestaque, $maximoDeImagens);
		}
		
		public function getVideos() {
			return $this->_view->CmsMidias->getVideos($this->id, TC_NOTICIA);
		}
		
		public function getAudios() {
			return $this->_view->CmsMidias->getAudios($this->id, TC_NOTICIA);
		}
		
		public function getArquivos() {
			return $this->_view->CmsMidias->getArquivos($this->id, TC_NOTICIA);
		}

		public function getCategoria(){
			$categoria = $this->_view->CmsCategorias->getCategoria($this->categoria_id);
			return $categoria;
		}
		
	} 