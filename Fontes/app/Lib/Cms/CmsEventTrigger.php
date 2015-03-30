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

/**
 * 	Representa o listener, gerando uma requisção do Controller atual ao 
 * 	módulo->controller->action destino.
 * 
 * 	
 * 
 * 	@version 0.1
 */
App::uses('CmsController', 'Cms');
class CmsEventTrigger {
	
	/**
	 * 	Controller (Não utilizado no momento)
	 * 	@var Controller
	 */
	private $_controller;
	
	
	/**
	 * 	Local do listener
	 * 	@var array
	 */
	private $_uri;
	
	/**
	 * @param array $uri listener a ser invocado
	 */
	public function __construct(array $uri) {
		$this->_controller = new CmsController();
		$this->_controller->constructClasses();
		$this->_uri = $uri;
	}
	
	/**
	 * 	(Não utilizado no momento)
	 */
	public function setController(Controller $controller) {
		$this->_controller = $controller;
	}
	
	/**
	 * 	Informa o listener($_uri) que o evento esperado ocorreu.
	 * 
	 * 	O evento estará contido na array 'data' do CakeRequest, com a chave 'eventData'
	 * 	Segue um exemplo para acessar os dados do evento em um listener:
	 * 
	 * 	1) $locals = $this->request->data['eventData']->data;
	 * 	2) $source = $locals['source'];
	 * 	
	 * 	O último 'data' em 1 são os dados armazendos no CakeEvent.
	 * 
	 * 	@param CakeEvent $cakeEvent Evento do Cake a ser repssado ao listener. 
	 */
	public function shoot(CakeEvent $cakeEvent) {
		$this->_controller->requestAction($this->_uri, array('data' => array('eventData' => $cakeEvent)));
	}
	
}