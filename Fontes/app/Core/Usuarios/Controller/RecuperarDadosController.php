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
App::uses('UsuariosAppController', 'Usuarios.Controller');
App::uses('CakeEmail', 'Network/Email');
class RecuperarDadosController extends UsuariosAppController {

	public $name = 'RecuperarDados';

	public $uses = array('Usuarios.Usuario', 'Usuarios.RecuperarDado');


	public function recuperar_senha() {
		if($this->Auth->User())
	        return $this->redirect($this->Auth->redirect());

		if($this->request->isPost()) {
			$user = $this->RecuperarDado->Usuario->findByEmail($this->data['Usuario']['email']);
			if($user) {
				$this->RecuperarDado->usuario_id = $user['Usuario']['id'];
				$create = true;
				$data;
				if($this->RecuperarDado->exists()) {
					$data = $this->RecuperarDado->read();
					$data['RecuperarDado']['expires'] = date('Y-m-d',mktime(0,0,0,date('m'),date('d')+2,date('Y')));
					$create = false;
				}

				if($create) {
					$data['RecuperarDado']['usuario_id'] = $user['Usuario']['id'];
					$data['RecuperarDado']['expires'] = date('Y-m-d',mktime(0,0,0,date('m'),date('d')+2,date('Y')));
				}
				
				$data['RecuperarDado']['token'] = md5(uniqid(rand(), true));

				if($this->RecuperarDado->save($data)) {
					$email = new CakeEmail();
	                $email->from(array('mail@teste.com' => 'Site'));
	                $email->to($user['Usuario']['email']);
	                $email->subject('Recuperação de senha');

	                $link =  Router::url(
	                	array(
		                	'admin' => false,
	                		'plugin' => 'usuarios',
						    'controller' => 'recuperar_dados',
						    'action' => 'trocar_senha', 
						    'token' => $data['RecuperarDado']['token']
						),
						true
					);

	                $msg = "";
	                $msg .= "\n\r" . 'Uma requisição de redefinição de senha foi feita para este e-mail.';
	                $msg .= "\n\r" . 'Se não foi você quem a fez, por favor ignore o conteúdo deste e-mail,';
	                $msg .= "\n\r" . 'Caso foi você quem requisitou esta ação, copie e cole o endereço abaixo na barra de endereços do seu navegador e siga as instruções para redefinir sua senha.';
	                $msg .= "\n\r" . $link;

	                if($email->send($msg)){
	                    $this->Session->setFlash('E-mail enviado com sucesso', 'success');
	                }else{
	                    $this->Session->setFlash('Houve um erro ao tentar enviar o e-mail');
	                }
				} else {
					$this->Session->setFlash('Não foi possível enviar o e-mail para recuperação');
				}

			} else {
				$this->Session->setFlash('Usuário não encontrado');
			}
		}
		$this->layout = 'login';
	}

	public function trocar_senha($token = null) {
		if($this->Auth->User())
	        return $this->redirect($this->Auth->redirect());
	    
		if(isset($this->data['RecuperarDado']['token']))
			$token = $this->data['RecuperarDado']['token'];

		$dados = $this->RecuperarDado->findByToken($token);

		if(empty($dados)) {
			$this->Session->setFlash('Endereço inválido');
			$this->redirect('/');
		}

		if($dados['RecuperarDado']['expires'] < date('Y-m-d')) {
			$this->Session->setFlash('O tempo para redefinição de senha expirou');
			$this->redirect('/');
		}

		$this->request->data['RecuperarDado']['token'] = $dados['RecuperarDado']['token'];

		if($this->request->isPost()) {

			if($this->data['Usuario']['email'] != $dados['Usuario']['email']) {
				$this->Session->setFlash('O E-mail informado não confere');

			} else if($this->data['Usuario']['senha'] != $this->data['Usuario']['confirmacao']) {
				$this->Session->setFlash('A senha e confirmação não conferem');

			} else {
				$dados['Usuario']['senha'] = $this->data['Usuario']['senha'];
				$dados['Usuario']['confirmacao'] = $this->data['Usuario']['confirmacao'];
				$this->Usuario->id = $dados['Usuario']['id'];
				$user = $this->Usuario->read();
				$dados['Usuario']['Perfil'] = array();
				foreach($user['Perfil'] as $perfil) {
					$dados['Usuario']['Perfil'][] = $perfil['id'];
				}
				if($this->RecuperarDado->Usuario->save($dados['Usuario'])) {
					$this->RecuperarDado->delete($dados['RecuperarDado']['usuario_id']);
					$this->Session->setFlash('Senha alterada com sucesso, você pode logar-se com sua nova senha', 'success');
					$this->redirect(array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'login', 'admin' => true));
                }else{
                    $this->Session->setFlash('Houve um erro ao tentar redefinir a nova senha');
                }
			}
		}
	}

	public function isAuthorized($user) {
		return parent::isAuthorized($user);
	}

}