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
App::uses('MidiaConfig', 'Midias.Lib');

class BancoImagensController extends MidiasAppController {

	public $helpers =  array('Midias.Midias', 'Midias.Crop');

	public $cmsEvents = array('Cms.Service.Upload');

	public $name = 'BancoImagens';

	public $uses = 'Midias.Midia';

	public $paginate;

	public function beforeFilter(){
		parent::beforeFilter();
		
		$action = substr($this->action, strpos($this->action, '_') + 1);
		$titulo = '- Banco de Imagens';

		switch ($action) {
			case 'index':
						$titulo .= '- Listagem de Imagens';
						break;

			case 'add': 
						$titulo .= '- Adicionar Imagem';
						break;

			case 'edit':
						$titulo .= '- Editar Imagem';
						break;
		}

		$this->set('title_for_layout', $titulo);
	}

	public function admin_index() {
		$query = $this->params->query;

		$options = array(
            'fields' 	 => array('Midia.id', 'Midia.titulo', 'Midia.descricao', 'Midia.arquivo', 'Midia.fonte', 'Midia.versao_textual', 'Midia.tamanho', 'Midia.banco_imagens', 'Midia.mime_id', 'Midia.tipo_id', 'Midia.crop_x', 'Midia.crop_y', 'Midia.crop_x2', 'Midia.crop_y2', 'Midia.crop_w', 'Midia.crop_h', 'Midia.ativa', 'Midia.nome_original'),
            'conditions' => array('Midia.banco_imagens' => 1, 'Midia.tipo_id' => IMAGEM),
            'order' 	 => array('Midia_titulo' => 'DESC'),
            'limit' 	 => 16,
            'url' 		 => array('controller' => 'Midias', 'action' => '?', 'admin' => true)
        );

        $this->paginate = $options;
		
		// $this->paginate['conditions']['Midia.banco_imagens'] = 1;
  		// $this->paginate['conditions']['Midia.tipo_id'] = IMAGEM;
		
		if(!empty($query)) {
			
	    	if(isset($query['search']) && trim($query['search']) != "") {

	    		$like = '%' . $query['search'] . '%';
	    		$this->paginate['conditions'] = array(
	    			'OR' => array(
		    			'Midia.titulo LIKE' => $like,
		    			'Midia.descricao LIKE' => $like,
		    			'Midia.fonte LIKE' => $like
	    			),
	    			array('Midia.banco_imagens' => 1,
		    			  'Midia.tipo_id' => IMAGEM)
	    		);
	    		$this->data = array('Midia' => $query);

				$this->set('midias', $this->paginate());

	    	}  else if(isset($query['limit'])) {
	    		
	    		$this->paginate['limit'] = $query['limit'];
	    		$this->set('midias', $this->paginate());

	    	} else {
	    		
	    		// Simula o retorno da chamada $this->paginate() sem resultados do banco.
				$this->params['paging'] = array
	                (
	                    'Midia' => array
	                        (
	                            'page' => 1,
	                            'current' => 0,
	                            'count' => 0,
	                            'prevPage' => null,
	                            'nextPage' => null,
	                            'pageCount' => 0,
	                            //'order' => 
	                            'limit' => 1,
	                            'options' => array(),
	                            'paramType' => 'named'
	                        )

	                );


	    		$this->set('midias', array());
	    	} 
	    	
    	} else {
    		
    		$this->set('midias', $this->paginate());
    	} 
    	
	}

	public function admin_add() {

		$this->set('mimes', implode(', ', $this->Midia->Mime->find('allowed', array('conditions' => array('Mime.tipo_id' => IMAGEM)))));
		$fileSize = ini_get('upload_max_filesize');
        if(preg_match('/B$/', $fileSize))
            $fileSize .= "B";

        $this->Midia->validator()->getField('arquivo')->getRule('tamanho')->rule[1] = $fileSize;
		if($this->request->is('post')) {

			$this->Midia->validator()->getField('arquivo')->getRule('mime')->rule[1] = IMAGEM;
			if(!isset($this->data['midias']))
				return;

			$errors = array();
			
			$midiaConfig = new MidiaConfig();
			foreach($this->data['midias'] as $midia) {
				$midia['Midia']['banco_imagens'] = 1;
				$new = $this->Midia->create($midia);
				$arqName = isset($new['Midia']['arquivo']['name']) ? $new['Midia']['arquivo']['name'] : 'Arquivo desconhecido';

		        $this->Midia->validator()->getField('arquivo')->getRule('tamanho')->message[1] = $arqName;
		        $this->Midia->validator()->getField('arquivo')->getRule('tamanho')->message[2] = $fileSize;
				$this->Midia->validator()->getField('arquivo')->getRule('isUnique')->message[1] = $arqName;
				$this->Midia->validator()->getField('arquivo')->getRule('mime')->message[1] = $arqName;
				

				$new['Midia']['titulo'] = $midiaConfig->removeExt($new['Midia']['arquivo']['name']);
				
				if(!$this->Midia->save($new)) {
					$errors[] = $this->Midia->validationErrors['arquivo'][0];
				}
			}
			if(empty($errors)) {
				$this->Session->setFlash('Todos os arquivos selecionados foram salvos com sucesso', 'success');
				$this->redirect(array('plugin' =>'midias', 'controller' => 'banco_imagens', 'action' => 'index'));
			} 
			// else {
			// 	$this->Session->setFlash('Não foi possível salvar todos os arquivos selecionados');
			// }

			$this->set('errors', $errors);
		}
	}

	public function admin_delete($id_midia=null) {
		if($this->Midia->delete($id_midia)) {
			$this->Session->setFlash('Mídia deletada com sucesso', 'success');
		} else {
			$this->Session->setFlash('Erro ao deletar mídia');
		}
		$this->redirect($this->referer());
	}

	public function admin_edit($id_midia=null) {

		if( isset($this->data['restaurar_valores']) )
		{
			$old = $this->Midia->read(null, $this->data['Midia']['id']);
			$camposModificados = $this->modificado($this->request->data, $old);

			if(count($camposModificados) > 0)
			{
				$this->Session->setFlash('Dados da imagem recuperado com sucesso', 'success');
			}

			$this->redirect($this->referer());
		}

		if($this->request->isPut()) {
			$old = $this->Midia->read(null, $this->data['Midia']['id']);
			$this->Midia->validator()->remove('versao_textual');
			$this->request->data['Midia']['ativa'] = 1;

			$camposModificados = $this->modificado($this->request->data, $old);

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
				//$this->Session->setFlash('Mídia ' . $this->request->data['Midia']['titulo'] .  ' alterada com sucesso', 'success');

				$mensagem = "";
				$qtd = count($camposModificados);
				if( $qtd > 0 )
				{
					foreach ($camposModificados as $key => $value) {
						if($key == (count($camposModificados) - 1) && $mensagem != "")
						{
							$mensagem .= ' e ' . $value;
						} 
						else
						{
							( ($key == 0) ? $mensagem .= $value : $mensagem .= ', ' . $value);
						}
					}

					if($qtd == 1)
					{
						$this->Session->setFlash('Campo ' . $mensagem . ' alterado com sucesso na mídia ' . $this->request->data['Midia']['titulo'], 'success');
					}
					else
					{
						$this->Session->setFlash('Campos ' . $mensagem . ' alterados com sucesso na mídia ' . $this->request->data['Midia']['titulo'], 'success');
					}
					
				}
				else
				{
					$this->Session->setFlash('Formulário salvo com sucesso e sem alteração nos dados', 'success');
				}

				$this->redirect(array('plugin' =>'midias', 'controller' => 'banco_imagens', 'action' => 'index'));

				
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
        		$this->redirect(array('plugin' =>'midias', 'controller' => 'banco_imagens', 'action' => 'index'));
        	}
        }
    }


    private function modificado($data, $user)
	{
		$fieldsModificated = array();

		// (strcmp( $data['Midia']['crop_x'], $user['Midia']['crop_x']) == 0 && 
		//  strcmp( $data['Midia']['crop_y'], $user['Midia']['crop_y']) == 0 &&
		//  strcmp( $data['Midia']['crop_x2'], $user['Midia']['crop_x2']) == 0 &&
		//  strcmp( $data['Midia']['crop_y2'], $user['Midia']['crop_y2']) == 0
		// ) 
		//  ? 'ok' : array_push($fieldsModificated, 'Imagem');

		(strcmp( $data['Midia']['titulo'],  $user['Midia']['titulo']) == 0) ? 'ok' : array_push($fieldsModificated, 'Título');
		(strcmp( $data['Midia']['descricao'],  $user['Midia']['descricao']) == 0) ? 'ok' : array_push($fieldsModificated, 'Descrição');
		(strcmp( $data['Midia']['fonte'],  $user['Midia']['fonte']) == 0) ? 'ok' : array_push($fieldsModificated, 'Fonte');

		return $fieldsModificated;
	}

	public function isAuthorized($user) {
		if(!$this->administracao)
			return false;
        parent::isAuthorized($user);
    }

}