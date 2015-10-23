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

	App::uses('NoticiasController', 'Noticias.Controller');

	class NoticiasControllerTest extends ControllerTestCase {
		
		public $fixtures = array('plugin.noticias.noticia', 
								 'plugin.noticias.status', 
								 'plugin.categorias.categoria');
		
		public function setUp() {

		}
		
		public function testAdminIndex() {
			$result = $this->testAction('/admin/noticias/index');
			debug($result);
		}
		
		public function testAdminViewNoticia() {
			$result = $this->testAction('/admin/noticias/view/1', array('method' => 'get', 'return' => 'view'));
			
			debug($result);  
			
		}
		
		public function testAdminAddNoticiaGet() {
			$result = $this->testAction('/admin/noticias/add', array('data' => array(), 
																			  'method' => 'get',
																			  'return' => 'view'));
			debug($result);
			// $this->assertTags($result, array('form' => array('action' => '', 'method' => 'post'),
											 // 'label',
											 // 'input', 
										     // '/form'),
											 // 'Faltam campos no form');
		}
		
		public function testAdminAddValidNoticiaPost() {
			$data = array( 
				  'titulo'              => 'hahaha',
				  'resumo' 			    => 'testAdminAddValidNoticia' , 
				  'texto' 				=> 'testAdminAddValidNoticia',
				  'datahora_prog_pub'   => array('day' => '1', 'month' => '02', 'year' => '2000'),
				  'datahora_prog_exp'	=> '2013-08-05 00:00:00',
				  'categoria_id'		=> 1,
				  'autor_id'			=> 1,
				  'status_id'			=> 1
			);
			
			$result = $this->testAction('/admin/noticias/add', array('data' => $data, 
																			  'method' => 'post',
																			  'return' => 'view'));
			debug($result);
			
			$this->assertTrue(strstr($this->headers['Location'], '/admin/noticias/index') > -1, 
															     'Não está redirecionando para o Index após a inserção');
			
			
		}
		
		
		public function testAdminAddInvalidNoticiaPost() {
			$controller = $this->controller;
			$this->controller = $this->generate('Noticias.Noticias', array(
				'components' => array('Session') 
			));
			$this->controller->Noticia = ClassRegistry::init('Noticias.Noticia');
			
			$this->controller->Session->expects($this->once())->method('setFlash')
														      ->with('Erro ao salvar notícia');					
			$data = array( 
				  'titulo'			    => null,
				  'resumo' 			    => null , 
				  'texto' 			    => 'testAdminAddNoticia',
				  'datahora_prog_pub'   => array(), 
				  'datahora_prog_exp'	=> '2013-08-05 00:00:00',
				  'categoria_id'		=> 1,
				  'autor_id'			=> 1,
				  'status_id'			=> 1
			);	
			
			
			$result = $this->testAction('/admin/noticias/add', array('data' => $data, 
																			  'method' => 'post',
																			  
																			  ));
																			  
			 // $sessionMsg = $this->controller->Session->read('Message');																  
			 // debug($sessionMsg['flash']['message']);
			 // debug($result);
// 
			 // $this->assertEqual($sessionMsg['flash']['message'], 'Erro ao salvar notícia');			//$this->assertEqual($result, -1);					}
		}	 
			  
			 			 
		function testAdminUpdateValidNoticiaPost() {
			
			$result = $this->testAction('/admin/noticias/edit/1', array( 'method' => 'get',
																			  	  'return' => 'view'
																			  ));
																			  
																			  
			debug($result);
			
			$this->assertRegExp('/<form.*\/>/', $result, 'Não está retornando o Form de edição');
			$this->assertEqual($this->controller->Session->read('Noticia.Edit.Id'), '1', 'Não está editando a notícia correta');
			
			$resumo = 'Resumo para teste';
			$data = array('Noticia' => array( 'id' 	   => 1,
											  'resumo' => $resumo	
											));
											
			$result = $this->testAction('/admin/noticias/edit', array('method' => 'post', 
																			   'data' => $data,
																			   'return' => 'vars'));
			
			
			debug($result);
			
			$this->Noticia = ClassRegistry::init('Noticias.Noticia');
			$this->Noticia->find('first', array('conditions'=>array('Noticia.id' => 1)));
			
			$this->assertEqual($this->Noticia->field('resumo'), $resumo);
				
		}

		function testAdminDeleteNoticia() {
			$id = 1;
			$this->testAction('/admin/noticias/delete/' . $id, array('method' => 'get'));
			
			$this->Noticia = ClassRegistry::init('Noticias.Noticia');
			$this->Noticia->find('first', array('conditions'=>array('Noticia.id' => $id)));
			
			debug($this->Noticia->id);
			
			$this->assertFalse($this->Noticia->id, 'A notícia não deveria existir');
			
		}
		
		function tearDown() {
			
		}
		
		
	}
