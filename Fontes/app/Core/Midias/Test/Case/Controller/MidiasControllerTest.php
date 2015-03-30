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

App::uses('MidiaFixture', 'Fixture');

class MidiasControllerTest extends ControllerTestCase {

	public $fixtures = array('plugin.midias.midia', 'plugin.midias.tipo', 'plugin.midias.mime');

	public function setUp() {
		parent::setUp();
		$this->MockController = $this->generate('Midias.Midias',array('models' => array('Midias.Midia' => array('exists', 'save', 'delete', 'read'))));
		$this->Fixture = new MidiaFixture();
	}

	public function testListagem() {
		$vars = $this->testAction('/admin/midias/midias/index', array('return' => 'vars'));
		$this->assertInternalType('array', $vars);
		debug($vars);
		$this->assertEquals(count($vars['midias']), count($this->Fixture->records));
	}

	public function testAdd() {
		$vars = $this->testAction('admin/midias/midias/add', array('method' => 'get', 'return' => 'vars'));
		$this->assertInternalType('array', $vars);
	}

	public function testAddSave() {
		$this->MockController->Midia->expects($this->once())->method('save')->will($this->returnValue(true));
		$headers = $this->testAction('/admin/midias/midias/add',array('return' => 'headers', 'method' => 'post'));
		$vars = $this->testAction('/admin/midias/midias/add',array('return' => 'vars'));
		$this->assertArrayHasKey('tipos', $vars);
		$this->assertContains('/admin/midias/midias/index', $headers['Location']);
	}

	public function testAddError() {
		$this->MockController->Midia->expects($this->once())->method('save')->will($this->returnValue(false));
		$contents = $this->testAction('/admin/midias/midias/add',array('return' => 'contents', 'method' => 'post'));
		$this->assertContains('Erro ao salvar a mídia', $contents);
	}

	public function testEdit() {
		$midia = $this->Fixture->records[0];
		$this->MockController->Midia->expects($this->once())->method('exists')->will($this->returnValue(true));
		$contents = $this->testAction('/admin/midias/midias/edit/1', array('return' => 'view'));
		$vars = $this->testAction('/admin/midias/midias/edit',array('return' => 'vars'));
		$this->assertArrayHasKey('tipos', $vars);
		$this->assertTrue($contents != null);
	}

	public function testEditSave() {
		$this->MockController->Midia->expects($this->once())->method('save')->will($this->returnValue(true));
		$headers = $this->testAction('/admin/midias/midias/edit/1',array('return' => 'headers', 'method' => 'put'));
		$this->assertContains('/admin/midias/midias/index', $headers['Location']);
	}

	public function testEditError() {
		$this->MockController->Midia->expects($this->once())->method('save')->will($this->returnValue(false));
		$contents = $this->testAction('/admin/midias/midias/edit/1',array('return' => 'contents', 'method' => 'put'));
		$this->assertContains('Erro ao salvar a mídia', $contents);
	}

	public function testEditMidiaDoesNotExist() {
		$this->MockController->Midia->expects($this->once())->method('exists')->will($this->returnValue(false));
		$headers = $this->testAction('/admin/midias/midias/edit/1', array('return' => 'headers'));
		$this->assertContains('/admin/midias/midias/index', $headers['Location']);
	}

	public function testDelete() {
		$this->MockController->Midia->expects($this->once())->method('delete')->will($this->returnValue(true));
		$headers = $this->testAction('/admin/midias/midias/delete/1',array('return' => 'headers'));
		$this->assertContains('/admin/midias/midias/index', $headers['Location']);
	}

	public function testDeleteError() {
		$this->MockController->Midia->expects($this->once())->method('delete')->will($this->returnValue(false));
		$headers = $this->testAction('/admin/midias/midias/delete/',array('return' => 'headers'));
		$this->assertContains('/admin/midias/midias/index', $headers['Location']);
	}

	public function tearDown() {
		
	}
}
