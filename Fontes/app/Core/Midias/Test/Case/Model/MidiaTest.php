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
	App::uses('Midia', 'Midias.Model');
	class MidiaTest extends CakeTestCase {

		public $fixtures = array('plugin.midias.midia', 'plugin.midias.tipo', 'plugin.midias.mime');

		private $fileData;

		private $fileObject;

		private $files = array();

		public function setUp() {
			parent::setUp();
			$this->Midia = ClassRegistry::init('Midias.Midia');
			$this->Fixture = new MidiaFixture();
			$this->fileObject = new File(WWW_ROOT . 'img' . DS . 'test.jpg');
			$this->prepareFileData();
		}

		private function prepareFileData() {
			$file = new File(WWW_ROOT . 'files' . DS . md5(uniqid()) . '.jpg', true, 775);
			$file->write($this->fileObject->read());
			$this->files[] = $file;
			$this->fileData = array('name' => $file->name,'type' => $file->mime(),'size' => $file->size(),'tmp_name' => $file->path,'error' => 0);
		}
		
		public function testSave() {
			$this->prepareFileData();
			$unsaved = array('Midia'=> array('id' => 5, 'titulo' => 'Outra mídia', 'descricao' => 'Mídia de teste', 'arquivo' => $this->fileData, 'fonte' => 'Google', 'versao_textual' => 'imagem teste salvar :)', 'banco_imagens' => 0));
			$this->Midia->create($unsaved);
			$saved = $this->Midia->save();
			$this->assertTrue(is_array($saved) && !empty($saved));
		}

		public function testEdit() {
			$this->Midia->id = 4;
			$midia = $this->Midia->read();
			$midia['Midia']['titulo'] .= ' Final';
			unset($midia['Midia']['arquivo']);
			$editada = $this->Midia->save($midia);
			$this->assertEquals($editada, $midia);
		}

		public function testDeleteFileAfterDataFromDB() {
			$this->prepareFileData();
			$unsaved = array('Midia'=> array('id' => 5, 'titulo' => 'Outra mídia', 'descricao' => 'Mídia de teste', 'arquivo' => $this->fileData, 'fonte' => 'Google', 'tipo_id' => 1, 'versao_textual' => 'imagem teste salvar :)', 'tamanho' => '100000', 'mime_id' => 1, 'banco_imagens' => 0));
			$midia = $this->Midia->save($unsaved);
			$deletar = $this->Midia->delete(5);
			$this->assertTrue($deletar);
		}

		public function testMime() {
			$this->prepareFileData();
			$this->assertTrue($this->Midia->mime(array('arquivo' => $this->fileData)));
			$this->assertFalse($this->Midia->mime(array('arquivo' => array('type' => 'mime/naoexistente'))));
		}

		public function testRename() {
			$this->prepareFileData();
			$this->assertEquals($this->fileObject->md5() . '.' . $this->fileObject->ext(), $this->Midia->rename($this->fileData));
		}

		public function testDeleteFile() {
			$this->prepareFileData();
			$this->assertTrue($this->Midia->deleteFile($this->fileData['tmp_name']));
			$this->assertFalse($this->Midia->deleteFile(WWW_ROOT . DS . 'img' . DS . 'arquivo_nao_existente.pdf'));
		}

		public function tearDown() {
			foreach($this->files as $file) {
				$file->delete();
			}
			unset($this->files);
			unset($this->fileData);
			unset($this->fileObject);
		}
	}
