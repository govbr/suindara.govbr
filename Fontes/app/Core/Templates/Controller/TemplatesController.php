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
App::uses('TemplatesAppController', 'Templates.Controller');
App::uses('Folder', 'Utility');
App::uses('Decompress', 'Templates.Lib');
App::uses('TemplateConfig', 'Templates.Lib');

class TemplatesController extends TemplatesAppController {

	public $name = 'Templates';

	public function admin_index() {
		$this->set('templates', $this->paginate());
	}

	public function admin_add(){
		if($this->request->isPost()) {
			$fileSize = ini_get('upload_max_filesize');
	        if(preg_match('/B$/', $fileSize))
	            $fileSize .= "B";

	        $this->Template->validator()->getField('arquivo')->getRule('tamanho')->rule[1] = $fileSize;
	        $this->Template->validator()->getField('arquivo')->getRule('tamanho')->message[1] = $this->data['Template']['arquivo']['name'];
	        $this->Template->validator()->getField('arquivo')->getRule('tamanho')->message[2] = $fileSize;

			if($this->Template->save($this->data)) {
				$this->Session->setFlash('Template salvo com sucesso', 'success');
				$this->redirect(array('plugin' => 'templates', 'controller' => 'templates', 'action' => 'index'));
			} else {
				$array = array($this->Template->validationErrors, $this->modelClass);  //ModelClass = name model
				$this->Session->setFlash( $array, 'flash_form_error' );
			}
		}
	}

	public function admin_delete($id) {
		$this->Template->id = $id;
		if($this->Template->exists()) {
			if($this->Template->delete($id)) {
				$this->Session->setFlash('Template deletado com sucesso', 'success');
			} else {
				$this->Session->setFlash($this->Template->errorMessage);
			}
		} else {
			$this->Session->setFlash('Template não encontrado.');
		}
		$this->redirect(array('plugin' => 'templates', 'controller' => 'templates', 'action' => 'index'));
	}

	public function admin_ra_getTemplates(){
		if(!$this->request->params['requested']){
			return null;
		}
		return $this->Template->find('list', array('Templates.id', 'Templates.nome'));
	}

	public function admin_criar_template(){

		$templateConfig = new TemplateConfig();
		$code = uniqid();
		$name = 'Template_' . $code;
		$dirName = $name;
		$dirBase = new Folder($templateConfig->templatesDir() . $dirName, true, 0755);
		$decompress = new Decompress();
		$decompress->unpack(APP . 'Dev' . DS . 'sample.zip', $dirBase->path);
		
		$this->Template->create(array(
				'nome' => $name,
				'print' => 'default.png',
				'autor' => 'Acessibilidade Virtual',
				'descricao' => 'Template exemplo',
				'caminho' => $dirName,
				'nome_original' => $name

			));

		if ($this->Template->save()) {
			$this->Session->setFlash("Template gearado com sucesso no diretório {$dirBase->path}" , 'success');
		} else {
			$this->Session->setFlash('Ocorreu um erro ao gerar os arquivos do template, 
									  verifique se você possui permissão para criação de arquivos');
		}

		$this->redirect('index');
	}

	public function beforeFilter(){
		parent::beforeFilter();
		$this->set('title_for_layout', $this->stringAction($this->action, 'template') );
	}

	public function isAuthorized($user) {
		parent::isAuthorized($user);
	}
}
