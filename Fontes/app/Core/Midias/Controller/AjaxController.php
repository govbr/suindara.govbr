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

App::uses('AppController', 'Controller');
App::uses('CmsAdminSessionHelper', 'View/Helper');
App::uses('View', 'View');
App::uses('MidiasAppController', 'Midias.Controller');

class AjaxController extends MidiasAppController {
	
	public $name = 'Ajax';

	public $uses = array('Midias.Midia', 'Midias.MidiasConteudo');

    private $tipo_conteudo; 

    private $id_conteudo; 

    private $tipo_midia;

    private $id_midia;

    private $id_midia_conteudo;
	
	public function admin_add() {
        $this->autoRender = false;
        $error = $this->verifyMidiasError();
        if($error)
            return $this->response($error, 400);

    	$this->Midia->id = $this->id_midia;
    	if($this->Midia->exists()) {
    		$midiaConteudo = $this->MidiasConteudo->findByMidiaId($this->id_midia);
    		if(!empty($midiaConteudo) && $midiaConteudo['MidiasConteudo'][$this->tipo_conteudo.'_id'] == $this->id_conteudo) {
    			return $this->response('Esta mídia já foi adicionada ao conteúdo', 400);
    		}

	    	$new = $this->MidiasConteudo->create();
	    	$new['MidiasConteudo']['midia_id'] = $this->id_midia;
            if($this->tipo_conteudo == 'noticia') {  
                $new['MidiasConteudo']['noticia_id'] = $this->id_conteudo;
            } else {
                $new['MidiasConteudo']['pagina_id'] = $this->id_conteudo;
            }
            $save = $this->MidiasConteudo->save($new);
			if($save) {
                 $midiaTemp = $this->Midia->read(array('Midia.titulo', 'Midia.id', 'Midia.arquivo', 'Midia.tipo_id'), $this->id_midia);
   //              $midia['MidiasConteudo'] = $save['MidiasConteudo'];
   //              $midia['MidiasConteudo']['id'] = $this->MidiasConteudo->id;

   //              $this->set('midia', $midia);
   //              $this->set('tipo_conteudo', $this->tipo_conteudo);
   //              $this->set('id_conteudo', $this->id_conteudo);
   //              $this->set('tipos', $this->Midia->Tipo->find('list'));
                $this->reload();
                return $this->response('Mídia ' . $midiaTemp['Midia']['titulo'] . ' adicionada com sucesso', 200, '_midias');
			} else {
                return $this->response('Erro ao tentar adicionar a mídia', 400);
            }
        } else {
            return $this->response('Mídia não encontrada', 400);
        }
	}

	public function admin_midia_conteudo_delete() {
        $this->autoRender = false;
        $error = $this->verifyMidiasConteudoError();
        if($error)
            return $this->response($error, 400);

		if($this->MidiasConteudo->delete($this->id_midia_conteudo)) {
            $midia = $this->Midia->read(array('Midia.titulo', 'Midia.id', 'Midia.arquivo', 'Midia.tipo_id'), $this->id_midia);
            
            $this->set('midia', $midia);
            $this->set('tipo_conteudo', $this->tipo_conteudo);
            $this->set('id_conteudo', $this->id_conteudo);
            $this->reload();
            
            $view = new View($this->Controller);
            $session = new CmsAdminSessionHelper($view);

            $this->Session->setFlash('Mídia ' . $midia['Midia']['titulo'] . ' deletada com sucesso', 'success');

            $response1 = $this->render('_midias'); 
            $html1 = $response1->body();

            $response2 = $this->render('admin_midia_conteudo_delete'); 
            $html2 = $response2->body();

            return new CakeResponse(
                array(
                    'body'=> json_encode(
                        array(
                            'message' => $session->flash(),
                            'html1' => $html1,
                            'html2' => $html2,
                        )
                    ),
                    'status' => 200
                )
            );
		} else {
			return $this->response('Erro ao deletar a mídia', 400);
		}
    }

    public function admin_delete() {
        $this->autoRender = false;
        $error = $this->verifyMidiasError();
        if($error)
            return $this->response($error, 400);

        $this->Midia->id = $this->id_midia;
        $midiaTemp = $this->Midia->read();

        if($this->Midia->delete($this->id_midia)) {
            $this->reload();
            return $this->response("Mídia "  . " deletada com ", 200, '_midias');
        } else {
            return $this->response('Erro ao deletar a mídia', 400);
        }
    }

    public function admin_move_up() {
        $this->autoRender = false;
        $error = $this->verifyMidiasConteudoError();
        if($error)
            return $this->response($error, 400);
    	if($this->MidiasConteudo->moveUp($this->id_midia_conteudo)) {
            $this->reload();
    		return $this->response('Ordem alterada com sucesso.', 200, '_midias');
		} else {
            return $this->response('Não foi possível reordenar esta mídia, verifique se a mesma não é a primeira da lista.', 400);
        }
    }

    public function admin_move_down() {
        $this->autoRender = false;
        $error = $this->verifyMidiasConteudoError();
        if($error)
            return $this->response($error, 400);

    	if($this->MidiasConteudo->moveDown($this->id_midia_conteudo)) {
            $this->reload();
    		return $this->response('Ordem alterada com sucesso', 200, '_midias');
		} else {
            return $this->response('Não foi possível reordenar esta mídia, verifique se a mesma não é a última da lista.', 400);
        }
    }

    public function admin_destaque() {
    	$this->autoRender = false;
    	$error = $this->verifyMidiasConteudoError();
        if($error)
            return $this->response($error, 400);

    	$this->MidiasConteudo->id = $this->id_midia_conteudo;
    	if($this->MidiasConteudo->exists()) {
    		$midiaConteudo = $this->MidiasConteudo->read();
    		if(empty($midiaConteudo)) {
    			return $this->response('Mídia não encontrada.', 400);
    		}
            if($midiaConteudo['Midia']['tipo_id'] == ARQUIVO) {
                return $this->response('Este tipo de mídia não pode ser utilizado como destaque.', 400);
            }

    		$destaque = $this->MidiasConteudo->find('first', array(
                    'conditions' => array(
            			'MidiasConteudo.destaque' => 1,
            			'MidiasConteudo.noticia_id' => $midiaConteudo['MidiasConteudo']['noticia_id'],
            			'MidiasConteudo.pagina_id' => $midiaConteudo['MidiasConteudo']['pagina_id']
        			),
            		'recursive' => -1
                )
            );

    		if(!empty($destaque)) {
    			$destaque['MidiasConteudo']['destaque'] = 0;
    			$this->MidiasConteudo->save($destaque);
    		}

	    	$midiaConteudo['MidiasConteudo']['destaque'] = 1;
			if($this->MidiasConteudo->save($midiaConteudo)) {
                $this->reload();
                return $this->response('Mídia destaque adicionada com sucesso.', 200, '_midias');
            } else {
                return $this->response('Erro ao tentar adicionar mídia destaque.', 400);
            }
        } else {
            return $this->response('Mídia não encontrada', 400);
        }
    }

    private function reload() {
        $tipos = array(IMAGEM,AUDIO,VIDEO);

        $conditions = array();
        if($this->tipo_conteudo == 'noticia') {
            $conditions['MidiasConteudo.noticia_id'] = $this->id_conteudo;
        } else {
            $conditions['MidiasConteudo.pagina_id'] = $this->id_conteudo;
        }

        $conditions['Midia.tipo_id'] = $tipos;
        $midiasConteudo = $this->Midia->MidiasConteudo->find('all', array(
            'fields' => array('Midia.*', 'MidiasConteudo.*'),
            'order' => 'posicao asc',
            'conditions' => $conditions,
            'recursive' => 2
            )
        );

        $this->set('tipo_conteudo', $this->tipo_conteudo);
        $this->set('id_conteudo', $this->id_conteudo);
        $this->set('tipos', $this->Midia->Tipo->find('list'));
        $this->set('midias', $midiasConteudo);
    }

    private function verifyMidiasConteudoError() {
    	if(!isset($this->request->query['tipo_conteudo'])||!isset($this->request->query['id_conteudo'])||!isset($this->request->query['id_midia']))
	    	return 'Url inválida.';

        $this->tipo_conteudo = $this->request->query['tipo_conteudo'];
        $this->id_conteudo = $this->request->query['id_conteudo'];
        $this->id_midia = $this->request->query['id_midia'];
        
        if($this->action == 'admin_add') {
            $this->id_midia = null;
        } else {
            $this->MidiasConteudo->id = $this->id_midia;
            if(!$this->MidiasConteudo->exists())
                return "Mídia não encontrada";

            $midiaConteudo = $this->MidiasConteudo->read(array('midia_id', 'id'));
            $this->id_midia = $midiaConteudo['MidiasConteudo']['midia_id'];
            $this->id_midia_conteudo = $midiaConteudo['MidiasConteudo']['id'];
        }

        if(!$this->isAllowedMidia($this->tipo_conteudo, $this->id_conteudo, $this->id_midia)) {
            return 'Você não tem permissão para executar esta ação.';
        }
        return false;
    }

     private function verifyMidiasError() {
        if(!isset($this->request->query['tipo_conteudo'])||!isset($this->request->query['id_conteudo'])||!isset($this->request->query['id_midia']))
            return 'Url inválida.';

        $this->tipo_conteudo = $this->request->query['tipo_conteudo'];
        $this->id_conteudo = $this->request->query['id_conteudo'];
        $this->id_midia = $this->request->query['id_midia'];

        if(!$this->isAllowedMidia($this->tipo_conteudo, $this->id_conteudo, $this->id_midia)) {
            return 'Você não tem permissão para executar esta ação.';
        }
        return false;
    }

	public function beforeFilter() {
        parent::beforeFilter();

        if(!$this->RequestHandler->isAjax()) {
    		$this->redirect(array('plugin' =>'midias', 'controller' => 'midias', 'action' => 'index'));
    	}
    }
}