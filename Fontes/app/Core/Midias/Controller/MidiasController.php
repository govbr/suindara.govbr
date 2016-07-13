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
App::uses('MidiasAppController', 'Midias.Controller');
class MidiasController extends MidiasAppController {

	public $helpers =  array('Midias.Midias', 'Midias.Crop');

	public $cmsEvents = array('Cms.Service.Upload');

	public $name = 'Midias';

	public $paginate;

	public function admin_midias($tipo_conteudo=null,$id_conteudo=null) {

		if(!isset($tipo_conteudo)||!isset($id_conteudo)) {
            $this->Session->setFlash('Endereço inválido');
            $this->redirect($this->referer());
        }
		$tipos = array(IMAGEM,AUDIO,VIDEO);

		$conditions = array();
		if($tipo_conteudo == 'noticia') {
			$conditions['MidiasConteudo.noticia_id'] = $id_conteudo;
		} else {
			$conditions['MidiasConteudo.pagina_id'] = $id_conteudo;
		}

		if($this->request->is('post')) {
			$tipo_conteudo_ko = $tipo_conteudo . 's';
			$midia0 = false;
			if(!isset($this->data['midias']))
				$midia0 = $this->request->data['midias'][0];
			if (isset($this->request->data['avancar'])){	
				if (isset($midia0['Midia']['arquivo']['tmp_name'])) $this->_add($tipos, 0, $id_conteudo, $tipo_conteudo);
				
				return $this->redirect(array('plugin' => 'midias', 'controller' => 'midias', 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'action' => 'arquivos'));
				
			} else if (isset($this->request->data['descartar'])) {
				return $this->redirect(array('admin' => true, 'plugin' => $tipo_conteudo_ko, 'controller' => $tipo_conteudo_ko, 'action' => 'delete', $id_conteudo));
					
			} else if (isset($this->request->data['voltar'])) {
				return $this->redirect(array('admin' => true, 'plugin' => $tipo_conteudo_ko, 'controller' => $tipo_conteudo_ko, 'action' => 'edit', $id_conteudo));
				
			} else {
				$this->_add($tipos, 0, $id_conteudo, $tipo_conteudo);	
			}
			
		}

		$midiasConteudoIds = $this->Midia->MidiasConteudo->find('list', array(
			'fields' => array('MidiasConteudo.midia_id'),
			'order' => 'posicao asc',
			'conditions' => array(
					$conditions
				)
			)
		);

		$conditions['Midia.tipo_id'] = $tipos;
		$midiasConteudo = $this->Midia->MidiasConteudo->find('all', array(
			'fields' => array('Midia.*', 'MidiasConteudo.*'),
			'order' => 'posicao asc',
			'conditions' => $conditions
			)
		);
		$this->set('midias', $midiasConteudo);
		
		
		$query = $this->params->query;
    	if(isset($query['search']) && trim($query['search']) != "") {
    		$like = '%' . $query['search'] . '%';
    		$this->paginate['conditions'] = array(
    			'OR' => array(
	    			'Midia.titulo LIKE' => $like,
	    			'Midia.descricao LIKE' => $like,
	    			'Midia.fonte LIKE' => $like
    			)
    		);
    		$this->data = array('Midia' => $query);
    	}

		$this->set('id_conteudo', $id_conteudo);
		$this->set('conteudo', $tipo_conteudo);
    	
    	$this->paginate['conditions']['Midia.banco_imagens'] = 1;
    	$this->paginate['conditions']['Midia.ativa'] = 1;
    	$this->paginate['conditions']['Midia.tipo_id'] = IMAGEM;
    	$this->paginate['conditions']['NOT']['Midia.id'] = $midiasConteudoIds;
		$this->set('banco_imagens', $this->paginate());
		
		$this->set('mimes', implode(', ', $this->Midia->Mime->find('allowed', array('conditions' => array('Mime.tipo_id' => $tipos)))));
		$this->set('tipos', $this->Midia->Tipo->find('list'));
	}

	public function admin_arquivos($tipo_conteudo=null,$id_conteudo=null) {

		if(!isset($tipo_conteudo)||!isset($id_conteudo)) {
            $this->Session->setFlash('Endereço inválido');
            $this->redirect($this->referer());
        }
		if($this->request->is('post')) {
			$midia0 = false;
			if(!isset($this->data['midias']))
				$midia0 = $this->request->data['midias'][0];
			if (isset($this->request->data['avancar'])){
					
				if (isset($midia0['Midia']['arquivo']['tmp_name'])) $this->_add(ARQUIVO,0,$id_conteudo,$tipo_conteudo);
				
				$tipo_conteudo_ko = $tipo_conteudo . 's';
				
				if ($tipo_conteudo == 'pagina') {
					return $this->redirect(array('plugin' => $tipo_conteudo_ko, 'controller' => $tipo_conteudo_ko, 'action' => 'add', $id_conteudo, 'banners'));	
				} else {
					return $this->redirect(array('plugin' => $tipo_conteudo_ko, 'controller' => $tipo_conteudo_ko, 'action' => 'view', $id_conteudo));
				}
			} else if (isset($this->request->data['voltar'])) {
				return $this->redirect($this->redirect(array('plugin' => 'midias', 
											   'controller' => 'midias',
											   'action' => 'midias',
											   'tipo_conteudo' => $tipo_conteudo,
											   'id_conteudo' => $id_conteudo)));
				
			} else if (isset($this->request->data['descartar'])) { 
				return $this->redirect(array('admin' => true, 'plugin' => $tipo_conteudo_ko, 'controller' => $tipo_conteudo_ko, 'action' => 'delete', $id_conteudo));
				
			} else {
				$this->_add(ARQUIVO,0,$id_conteudo,$tipo_conteudo);	
			}			
		}
		
		$this->set('id_conteudo', $id_conteudo);
		$this->set('conteudo', $tipo_conteudo);
		$midiasConteudo =  $this->_midias_preview($tipo_conteudo, $id_conteudo, ARQUIVO);
		$this->set('midias', $midiasConteudo);
		$this->set('mimes', implode(', ', $this->Midia->Mime->find('allowed', array('conditions' => array('Mime.tipo_id' => ARQUIVO)))));
	}

	public function admin_midias_preview($tipo_conteudo=null,$id_conteudo=null) {
		if(!isset($tipo_conteudo)||!isset($id_conteudo)) {
            return null;
        }
		$tipos = array(IMAGEM,AUDIO,VIDEO);
		return $this->_midias_preview($tipo_conteudo, $id_conteudo, $tipos);
	}

	public function admin_arquivos_preview($tipo_conteudo=null,$id_conteudo=null) {
		if(!isset($tipo_conteudo)||!isset($id_conteudo)) {
            return null;
        }
		return $this->_midias_preview($tipo_conteudo, $id_conteudo, ARQUIVO);
	}

	private function _midias_preview($tipo_conteudo=null,$id_conteudo=null, $tipos=null) {
		$conditions = array(
			'Midia.tipo_id' => $tipos
		);
		if($tipo_conteudo == 'noticia') {
			$conditions['MidiasConteudo.noticia_id'] = $id_conteudo;
		} else {
			$conditions['MidiasConteudo.pagina_id'] = $id_conteudo;
		}
		$midiasConteudo = $this->Midia->MidiasConteudo->find('all', array(
			'fields' => array('Midia.*', 'MidiasConteudo.*'),
			'order' => 'posicao asc',
			'conditions' => $conditions
			)
		);
		return $midiasConteudo;
	}

	public function admin_delete($tipo_conteudo=null,$id_conteudo=null,$id_midia=null) {
		if(!isset($tipo_conteudo)||!isset($id_conteudo)||!isset($id_midia)) {
            $this->Session->setFlash('Endereço inválido');
            $this->redirect($this->referer());
        }
        $this->Midia->id = $id_midia;
		if($this->Midia->exists()){
			$midiaTemp = $this->Midia->read();
		}

		$tipo = $mensagem = '';
		if($midiaTemp['Tipo']['nome'] == 'Imagem')
		{
			$tipo = 'Mídia';
			$mensagem = ($tipo . ' ' . $midiaTemp['Midia']['nome_original'] . ' deletada com sucesso' );
		}
		elseif ($midiaTemp['Tipo']['nome'] == 'Arquivo')
		{
			$tipo = 'Documento';
			$mensagem = ($tipo . ' ' . $midiaTemp['Midia']['nome_original'] . ' deletado com sucesso' );
		}

		if($this->Midia->delete($id_midia)) {
				$this->Session->setFlash($mensagem, 'success');
		} else {
			$this->Session->setFlash('Erro ao deletar ' . $tipo);
		}
		$this->redirect($this->referer());
	}

	public function admin_imagem($tipo_conteudo=null,$id_conteudo=null,$id_midia=null){
		if(!isset($tipo_conteudo)||!isset($id_conteudo)||!isset($id_midia)) {
            $this->Session->setFlash('Endereço inválido');
            $this->redirect($this->referer());
        }

  		if( isset($this->request->data['voltar']) )
  		{
  			$this->redirect(array('plugin' => 'midias', 'controller' => 'midias', 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'action' => 'midias'));
  		}

		if($this->request->isPut()) {
			$old = $this->Midia->read(null, $this->data['Midia']['id']);
			$this->Midia->validator()->remove('versao_textual');
			$this->request->data['Midia']['ativa'] = 1;
			if($this->Midia->save($this->data)) {
				$this->data = $this->Midia->read(null, $this->data['Midia']['id']);
				if(!($old['Midia']['crop_x'] == $this->data['Midia']['crop_x'] && $old['Midia']['crop_y'] == $this->data['Midia']['crop_y'] &&
					$old['Midia']['crop_x2'] == $this->data['Midia']['crop_x2'] && $old['Midia']['crop_y2'] == $this->data['Midia']['crop_y2'] &&
					$old['Midia']['crop_w'] == $this->data['Midia']['crop_w'] && $old['Midia']['crop_h'] == $this->data['Midia']['crop_h'])) {

					$this->Midia->generateImages($this->data['Midia']['arquivo'],
						$this->data['Midia']['crop_x'],$this->data['Midia']['crop_y'],
						$this->data['Midia']['crop_x2'],$this->data['Midia']['crop_y2'],
						$this->data['Midia']['crop_w'],$this->data['Midia']['crop_h']);
				}
				$this->Session->setFlash('Mídia ' . $this->data['Midia']['nome_original'] . ' alterada com sucesso', 'success');
				$this->redirect(array('plugin' => 'midias', 'controller' => 'midias', 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'action' => 'midias'));
				
			} else {
				$array = array($this->Midia->validationErrors, $this->modelClass);  //ModelClass = name model
				$this->Session->setFlash( $array, 'flash_form_error' );
			}
    	} else {
           	$this->Midia->id = $id_midia;
           	if($this->Midia->exists()) {
           		$this->data = $this->Midia->read();
           		if(!$this->data['Midia']['ativa'])
           			$this->request->data['Midia']['titulo'] = $this->data['Midia']['nome_original'];
        	} else {
        		$this->Session->setFlash('Mídia não encontrada');
        		$this->redirect(array('plugin' => 'midias', 'controller' => 'midias', 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'action' => 'midias'));
        	}
        }
    }

    public function admin_video($tipo_conteudo=null,$id_conteudo=null,$id_midia=null){
    	if(!isset($tipo_conteudo)||!isset($id_conteudo)||!isset($id_midia)) {
            $this->Session->setFlash('Endereço inválido');
            $this->redirect($this->referer());
        }
		$this->_edit($tipo_conteudo, $id_conteudo, $id_midia);
    }

    public function admin_audio($tipo_conteudo=null,$id_conteudo=null,$id_midia=null){
    	if(!isset($tipo_conteudo)||!isset($id_conteudo)||!isset($id_midia)) {
            $this->Session->setFlash('Endereço inválido');
            $this->redirect($this->referer());
        }
		$this->_edit($tipo_conteudo, $id_conteudo, $id_midia);
    }

    public function admin_arquivo($tipo_conteudo=null,$id_conteudo=null,$id_midia=null) {

     	if (isset($this->request->data['voltar'])) {
				return $this->redirect($this->redirect(array('plugin' => 'midias', 
											   'controller' => 'midias',
											   'action' => 'arquivos',
											   'tipo_conteudo' => $tipo_conteudo,
											   'id_conteudo' => $id_conteudo)));
		 }

    	if(!isset($tipo_conteudo)||!isset($id_conteudo)||!isset($id_midia)) {
            $this->Session->setFlash('Endereço inválido');
            $this->redirect($this->referer());
        }
    	$this->_edit($tipo_conteudo, $id_conteudo, $id_midia);
    }

    private function _add($tipos, $banco_imagens, $id_conteudo = null, $tipo_conteudo = null) {
		$this->Midia->validator()->getField('arquivo')->getRule('mime')->rule[1] = $tipos;
		$fileSize = ini_get('upload_max_filesize');
        if(preg_match('/B$/', $fileSize))
            $fileSize .= "B";
        
        $this->Midia->validator()->getField('arquivo')->getRule('tamanho')->rule[1] = $fileSize;

		if(!isset($this->data['midias']) || $this->data['midias'][0]['Midia']['arquivo'] == null)
			return;

		$errors = array();
		
		
		//if (!empty($this->data['midias']) && isset($this->data))
		foreach($this->data['midias'] as $midia) {
			$midia['Midia']['banco_imagens'] = $banco_imagens;

			$new = $this->Midia->create($midia);
			$arqName = isset($new['Midia']['arquivo']['name']) ? $new['Midia']['arquivo']['name'] : 'Arquivo desconhecido';

	        $this->Midia->validator()->getField('arquivo')->getRule('tamanho')->message[1] = $arqName;
	        $this->Midia->validator()->getField('arquivo')->getRule('tamanho')->message[2] = $fileSize;
			$this->Midia->validator()->getField('arquivo')->getRule('isUnique')->message[1] = $arqName;
			$this->Midia->validator()->getField('arquivo')->getRule('mime')->message[1] = $arqName;


			$new['Midia']['nome_original'] = $arqName;

			$this->Midia->arq = $new['Midia']['arquivo'];
			//pr ($this->Midia->arq); die;
			if($this->Midia->save($new)) {
				if($id_conteudo) {
					if($tipo_conteudo == 'noticia') {
						$midiaConteudo['MidiasConteudo']['noticia_id'] = $id_conteudo;
					} else {
						$midiaConteudo['MidiasConteudo']['pagina_id'] = $id_conteudo;
					}
					$midiaConteudo['MidiasConteudo']['midia_id'] = $this->Midia->id;
					$newMidiaConteudo = $this->Midia->MidiasConteudo->create($midiaConteudo);
					$this->Midia->MidiasConteudo->save($newMidiaConteudo);
				}
			} else {
				$errors[] = $this->Midia->validationErrors['arquivo'][0];
			}
		}
		if(empty($errors)) {
			$this->Session->setFlash('Todos os arquivos selecionados foram salvos com sucesso', 'success');
		} else {
			$this->Session->setFlash('Não foi possível salvar todos os arquivos selecionados');
		}

		$this->set('errors', $errors);
	}

    private function _edit($tipo_conteudo=null,$id_conteudo=null,$id_midia=null) {
    	
    	//$action = ($this->action == 'admin_arquivo') ? 'arquivos' : 'midias';
    	if($this->action == 'admin_arquivo')
    	{
    		$action = 'arquivos';
    		$tipoConteudo = 'Documento';
    	}
    	else
    	{
    		$action = 'midias';
    		$tipoConteudo = 'Mídia';
    	}

		if($this->request->isPut()) {
			$this->request->data['Midia']['ativa'] = 1;
			if($this->Midia->save($this->data)) {
				$this->Session->setFlash($tipoConteudo . ' ' . $this->request->data['Midia']['titulo'] . ' alterado com sucesso.', 'success');

				$this->redirect(array('plugin' => 'midias', 'controller' => 'midias', 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'action' => $action));
			} else {
				$array = array($this->Midia->validationErrors, $this->modelClass);  //ModelClass = name model
				$this->Session->setFlash( $array, 'flash_form_error' );
			}
		} else {
			$this->Midia->id = $id_midia;
			if($this->Midia->exists()) {
				$this->data = $this->Midia->read();
				if(!$this->data['Midia']['ativa'])
           			$this->request->data['Midia']['titulo'] = $this->data['Midia']['nome_original'];
			} else {
				$this->Session->setFlash('Mídia não encontrada.');
				$this->redirect(array('plugin' => 'midias', 'controller' => 'midias', 'tipo_conteudo' => $tipo_conteudo, 'id_conteudo' => $id_conteudo, 'action' => $action));
			}
		}
	}

	public function beforeFilter() {
        parent::beforeFilter();

        if($this->request->params['admin']) {
            $tipo_conteudo = $this->request->params['tipo_conteudo'];
            $id_conteudo = $this->request->params['id_conteudo'];
            $id_midia = isset($this->request->params['id_midia']) ? $this->request->params['id_midia'] : null;

            if(!$this->isAllowedMidia($tipo_conteudo, $id_conteudo, $id_midia)) {
                $this->Session->setFlash('Você não tem permissão para executar esta ação');
                $this->redirect(array('plugin' =>'usuarios', 'controller' => 'usuarios', 'action' => 'meus_sites'));
            }
        }
        
        $this->set('title_for_layout', $this->stringAction($this->action, 'mídia') );
    }

	public function isAuthorized($user) {
        parent::isAuthorized($user);
    }

}