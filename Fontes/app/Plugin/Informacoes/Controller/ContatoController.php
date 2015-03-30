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

App::uses('InformacoesAppController', 'Informacoes.Controller');
App::uses('CakeEmail', 'Network/Email');

class ContatoController extends InformacoesAppController {

	public $name = 'Contato';

	public $uses = array('Informacoes.Contato');

	public function admin_index() {
		if($this->request->isPost()) {
			$this->Contato->set($this->data);
			if($this->Contato->validates()) {
				$this->loadModel('Usuarios.Usuario');
				$root = $this->Usuario->find('first', array('conditions' => array('Usuario.root' => 1), 'recursive' => -1));
				
				$email = new CakeEmail();
                $email->from(array($this->data['Contato']['email'] => $this->data['Contato']['nome']));
                $email->to($root['Usuario']['email']);
                $email->subject($this->data['Contato']['assunto']);

				if($email->send($this->data['Contato']['descricao'])) {
					$this->Session->setFlash('E-mail enviado com sucesso', 'success');
				} else {
					
					$this->Session->setFlash('Houve um erro ao tentar enviar o e-mail. Por favor tente novamente!');
				}
			} else {
				$array = array($this->Contato->validationErrors, $this->modelClass);  //ModelClass = name model
				$this->Session->setFlash( $array, 'flash_form_error' );
			}
		}
	}

	public function isAuthorized($user) {
		return true;
		// return parent::isAuthorized($user);
	}	
}