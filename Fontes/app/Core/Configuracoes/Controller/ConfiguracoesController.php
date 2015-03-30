<?php 
	App::uses('ConfiguracoesAppController', 'Configuracoes.Controller');

	class ConfiguracoesController extends ConfiguracoesAppController {

		public $name = 'Configuracoes';

		public function admin_edit(){

			if ($this->request->isPost() || $this->request->isPut()) {

				if ($this->Configuracao->save($this->data)) {

					$this->Session->setFlash('Configuração editado com sucesso', 'success');
					$this->redirect(array('controller' => 'configuracoes', 'action' => 'edit', 'admin' => true));

				} else {
					$array = array($this->Configuracao->validationErrors, $this->modelClass);  //ModelClass = name model
					$this->Session->setFlash( $array, 'flash_form_error' );
				}
			}else{
				// $this->Grupo->id = $id;
				// if($this->Grupo->exists()){
				// 	$this->data = $this->Grupo->read();
				// 	$this->isAllowed($id, 'Você não pode editar este grupo', '/admin/grupos');
				// }else{
				// 	$this->Session->setFlash('Grupo não encontrado');
				// 	$this->redirect(array('controller' => 'grupos', 'action' => 'index', 'admin' => true));
				// }
			}

			$configuracao = $this->Configuracao->find('first');
			$this->set('tempo_sessao', $configuracao['Configuracao']['tempo_sessao']);
			$this->set('upload', $configuracao['Configuracao']['upload_tamanho']);
			$this->set('memoria', $configuracao['Configuracao']['memoria_tamanho']);
			$this->set('post', $configuracao['Configuracao']['post_tamanho']);

			$this->set('titulo_modulo', 'Edição');
		}

		public function beforeFilter(){
	    	parent::beforeFilter();
			$this->set('title_for_layout', $this->stringAction($this->action, 'configuracao') );
		}

		public function isAuthorized($user) {
			parent::isAuthorized($user);
		}

	}
?>
