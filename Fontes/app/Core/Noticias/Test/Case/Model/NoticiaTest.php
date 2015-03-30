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
	
	App::uses('Noticia', 'Noticias.Model');
	
	define('DATATESTE', '2011-01-01 01:01:01');
	define('DATANULL' , '0000-00-00 00:00:00');
	
	class NoticiaTemp extends Noticia {
		public $useDbConfig = 'test';
		
		protected function hoje() {
			return DATATESTE;
		}
	}
	
	class NoticiaTest extends CakeTestCase {
		
		public $fixtures = array('plugin.noticias.noticia', 
								 'plugin.noticias.status',
								 'plugin.categorias.categoria');
		
		
		public function setUp() {
			$this->Noticia = ClassRegistry::init('Noticias.Noticia');
			
		}
		
		public function testCriarNoticia() {
			$this->Noticia->create(array( 
				  'resumo' 			    => 'Resumo testeCriaNoticia' , 
				  'texto' 			=> 'texto testeCriaNoticia',
				  'datahora_prog_pub'   => '2013-04-17 00:00:00', 
				  'datahora_prog_exp'	=> '2013-08-05 10:00:00',
				  'categoria_id'		=> 1,
				  'autor_id'			=> 1,
				  'status_id'			=> 1
			));
			
			$result = $this->Noticia->save();
			debug($result);
			
			$this->assertTrue(empty($this->Noticia->validationErrors), 'Notícia deveria ser salva normalmente');
		}
		
		public function testCriarNoticiaIncorreta() {
			$this->Noticia->create(array( 
				  'resumo' 			    => 'Resumo testeCriaNoticia' , 
				  'texto' 			=> '',
				  'datahora_prog_pub'   => null, 
				  'datahora_prog_exp'	=> '2013-08-05 10:00:00',
				  'categoria_id'		=> 1,
				  'autor_id'			=> 1,
				  'status_id'			=> Noticia::STATUS_PUBLICO
			));
			
			$result = $this->Noticia->save();
			debug($this->Noticia->validationErrors);
			debug($result);
			
			$this->assertFalse(empty($this->Noticia->validationErrors), 'Noticia não deveria ser salva incorretamente');
		}
		
		public function testAlterarNoticia() {
			$result = $this->Noticia->find('first');
			debug($result);
			$this->Noticia->set($result['Noticia']);
			$resumo = $result['Noticia']['resumo'] . ' Editado';
			$this->Noticia->set('resumo', $resumo);
			$saved = $this->Noticia->save();
			debug($saved); 
		
			$this->Noticia->id = $saved['Noticia']['id'];
			$this->assertTrue($saved != false, 'Notícia não atualizada');
			$this->assertEqual($this->Noticia->field('resumo'), $resumo, 'Campo com valores diferentes');
			
		}
		
		public function testPublicarNoticia() {
			$noticaTempModel = new NoticiaTemp();
			$result = $noticaTempModel->find('first');
			debug($result);
			$result['Noticia']['status_id'] = Noticia::STATUS_PUBLICO;
			$r = $noticaTempModel->save($result);
			debug($r);
			
			$result = $this->Noticia->find('first');
			debug($result); 
			$this->assertEqual($result['Noticia']['datahora_publicacao'], DATATESTE);
		}
		
		public function testRascunhoNoticia() {
			$noticaTempModel = new NoticiaTemp();
			$result = $noticaTempModel->find('first');
			debug($result);
			$result['Noticia']['status_id'] = Noticia::STATUS_RASCUNHO;
			$r = $noticaTempModel->save($result);
			debug($r);
			
			$result = $this->Noticia->find('first');
			debug($result); 
			$this->assertEqual($result['Noticia']['datahora_publicacao'], DATANULL);
		}
		
		public function testDeletarNoticia() {
			$this->Noticia->delete(2);
			
			$result = $this->Noticia->find('first', array('conditions'=>array('Noticia.id' => 2)));
			debug($result); 
			$this->assertTrue($result == false);
		}
		
		
		public function tearDown() {
			
		}
	}
