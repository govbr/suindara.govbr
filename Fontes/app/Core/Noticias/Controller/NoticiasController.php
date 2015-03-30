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

App::uses('NoticiasAppController', 'Noticias.Controller');
App::uses('Status', 'Noticias.Model');
App::uses('Noticia', 'Noticias.Model');

class NoticiasController extends NoticiasAppController {

	public $helpers =  array('Midias.Midias',
							 'CakePtbr.Formatacao',
							 'CmsUtil');

	public $cmsEvents = array('Cms.Service.Upload');

	public $name = 'Noticias';
	
	public $paginate = array(
		'Noticia' => array(
      	  'limit' => 10,
       	 'order' => array(
            'Noticia.id' => 'desc'
        )),
        
		'Status' 
		
    );

    public function beforeFilter(){
    	parent::beforeFilter();
		//$this->set('title_for_layout', 'Not&iacute;cias');
		if( isset($this->params['pass'][1]) && $this->params['pass'][1] == 'publicar' )
		{
			$this->set('title_for_layout', $this->stringAction($this->action, 'notícia', 'publicação') );
		}
		else
		{
			$this->set('title_for_layout', $this->stringAction($this->action, 'notícia') );
		}	
	}

	public function ra_query($type = 'all', $options = array(), $basicRules = true) {

		if (!empty($this->request->params['requested'])) {
			$siteAtual = Configure::read('Site.Atual');
			if ($options) {
				$opt = json_decode(urldecode($options), true);
				if ($basicRules) {
					$now = date('Y-m-d H:i:s');
					if (isset($opt['conditions'])) {
						$opt['conditions']['Noticia.site_id'] = $siteAtual['id'];
						$opt['conditions']['Noticia.status_id'] = Noticia::STATUS_PUBLICO;
						$opt['conditions']['NOT'] = array('Noticia.datahora_publicacao' => null);
						$opt['conditions']['Noticia.datahora_prog_pub <'] = $now;
						$opt['conditions']['OR'] =  array('Noticia.datahora_prog_exp >' => $now,
														  'Noticia.datahora_prog_exp' => null) ;

					} else {
						$opt['conditions'] = array('Noticia.status_id' => Noticia::STATUS_PUBLICO,
												  'NOT' => array('Noticia.datahora_publicacao' => null),
												  'Noticia.datahora_prog_pub <' => $now,
												  'OR' =>  array('Noticia.datahora_prog_exp >' => $now,
														  	'Noticia.datahora_prog_exp' => null),
												  'Noticia.site_id' => $siteAtual['id']
												  );
					}
				}
				
				return $this->Noticia->find($type, $opt);
			} else {
				return $this->Noticia->find($type, array('condiditions' => array('Noticia.status_id' => Noticia::STATUS_PUBLICO,
																				 'Noticia.site_id' => 	$siteAtual['id']
																				)));
			}		
		}
	}
	
	public function ra_view($id = null) {
		
		if (!empty($this->request->params['requested']) && $id > 0) {
			$noticia = $this->Noticia->findById($id);
			if (!$noticia) return $this->redirect(Router::url('/', true));
			return $noticia;
		} else {
			$this->redirect(Router::url('/', true));
		}
			
	}
	
	// public function index() {
		// $data = $this->paginate('Noticia');
		// $this->set('noticias', $data);
	// }


	public function admin_index() {
		$emptySearches = false;
		$conditions = array('Noticia.site_id' => $this->site_id);

		$options = array(
            'conditions' => $conditions,
            'limit' => 15
        );
        $this->paginate = $options;

		if(isset($this->params->query['limit'])){
	    	$this->paginate['limit'] = $this->params->query['limit'];
	    }
		
		if ($this->request->isPost()) {
			$emptySearches = true;
			//$author = $this->request->data['Noticia']['author'];
			// $agendado = $this->request->data['Noticia']['sheduled'];
			// $data_inicio = $this->request->data['Noticia']['start_date'];
			// $data_fim = $this->request->data['Noticia']['end_date'];
			// $categoria = $this->request->data['Noticia']['category'];
		
			if (isset($this->request->data['Noticia']['keyword'])) {
				$palavra_chave = $this->request->data['Noticia']['keyword'];
				if (!empty($palavra_chave)) {
					$conditions[] = "(Noticia.titulo LIKE '%$palavra_chave%' 
									 OR Noticia.cartola LIKE '%$palavra_chave%'
									 OR Noticia.resumo LIKE '%$palavra_chave%'
									 OR Noticia.texto LIKE '%$palavra_chave%')";
					$emptySearches = false;
				} 

			}
			
			if (isset($this->request->data['Noticia']['author'])) {
				$palavra_chave = $this->request->data['Noticia']['author'];
				if (!empty($palavra_chave)) {
					$conditions[] = "Noticia.autor LIKE '%$palavra_chave%'";
					$emptySearches = false;
				}
			}


			if (isset($this->request->data['Noticia']['sheduled'])) {
				$palavra_chave = (int)$this->request->data['Noticia']['sheduled'];
				
				$data_inicio = $this->request->data['Noticia']['start_date'];
				$data_fim = $this->request->data['Noticia']['end_date'];
				$data_inicio = $data_inicio['year'] . '-' . $data_inicio['month'] . '-' . $data_inicio['day'] . ' 00:00:00';
				$data_fim = $data_fim['year'] . '-' . $data_fim['month'] . '-' . $data_fim['day'] . ' 00:00:00';
				
				if ($palavra_chave == 1) { // Agendado
					$conditions[] = "(Noticia.datahora_prog_pub >= '$data_inicio' AND Noticia.datahora_prog_exp <= '$data_fim')";
				} else if ($palavra_chave == 2) { // Não agendado
					$conditions[] = "(Noticia.datahora_prog_pub < '$data_inicio' || Noticia.datahora_prog_exp > '$data_fim')";
				}
			}
			
			if (isset($this->request->data['Noticia']['category'])) {
				$palavra_chave = (int)$this->request->data['Noticia']['category'];
				if ($palavra_chave > 0) {
					$conditions[] = "Noticia.categoria_id = $palavra_chave";
				}
			}
		}
		

		if ($emptySearches)
		{
			$this->params['paging'] = array
                (
                    'Noticia' => array
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

            $this->paginate('Noticia');
	    	$this->set('noticias', array());
		}
		else
		{
			$data = $this->paginate('Noticia', $conditions);
			$this->set('noticias', $data);	
		}
		
		

		$this->set('agendadoOpts', array('Todos', 'Agendado', 'Não agendado'));
		//$lista_categorias = $this->requestAction('/admin/categorias/ra_getCategorias');
		$lista_categorias = $this->requestAction(array('plugin' => 'categorias', 
													   'controller' => 'categorias',
													   'action' => 'ra_getCategorias', 
													   'admin' => true));
		$lista_categorias = array('Todas') + $lista_categorias;
		$this->set(compact('lista_categorias'));
		
	}
	
	function admin_view($id = null) {
		if ($this->request->is('get') && $id > 0) {
			$noticia = $this->Noticia->findById($id);
			
			if ($noticia) {
				$this->isAllowed($id, 'Você não pode visualizar esta notícia', array('admin' => true, 'plugin' => 'noticias', 'controller' => 'noticias', 'action' => 'index'));
				$this->set('noticia', $noticia);
			} else {
				$this->Session->SetFlash('Notícia não encontrada');
				//return $this->redirect('/admin/noticias/index');
				return $this->redirect(array('plugin' => 'noticias', 
											   'controller' => 'noticias',
											   'action' => 'index', 
											   'admin' => true));
			}
			
		}
	}
	
	function admin_edit($id = null, $publicacao = null) {
		$this->Session->write('tipo_request', 'edit');
		$nt = $this->Noticia->findById($id);
		if ($nt['Noticia']['status_id'] == Noticia::STATUS_PUBLICO)
			$this->Noticia->validateLikePublicacao();
		else 
			$this->Noticia->validateLikeRascunho();	

		if ($nt['Noticia']['bloqueado'] 
			&& ($this->Auth->user('id') != $nt['Noticia']['usuario_id']) &&  $this->Auth->user('root') != 1
		   ) {
		   		$this->Session->setFlash('Você não possui permissão para editar essa notícia');
				return $this->redirect(array('plugin' => 'noticias', 
											   'controller' => 'noticias',
											   'action' => 'index', 
											   'admin' => true));
		   } 
		
		$this->admin_add($id, $publicacao);
	}
	
	function admin_add($id = null, $publicacao = null) {
		( $this->params['action'] == 'admin_edit' ) ? $this->Session->write('tipo_request', 'edit') : $this->Session->write('tipo_request', 'cadastro');

		if ($id && !$this->Noticia->findById($id)) {
			$this->redirect(array('plugin' => 'noticias',  'controller' => 'noticias', 'action' => 'index',  'admin' => true));
		}
		
		//$lista_categorias = $this->requestAction('/admin/categorias/ra_getCategorias');
		$lista_categorias = $this->requestAction(array('plugin' => 'categorias', 
													   'controller' => 'categorias',
													   'action' => 'ra_getCategorias', 
													   'admin' => true));
		$this->set(compact('lista_categorias'));
		
		if ($publicacao) $this->set('noticia_exists', true);		

		if (isset($this->request->data['deletar'])) {

			//TODO Verificar alterações que afetaram o $id
			if (!$id && !(isset($this->data['Noticia']['id']))){
				$this->Session->setFlash("Ocorreu um erro ao tentar descartar a notícia");
				return $this->redirect(array('plugin' => 'noticias', 
										   'controller' => 'noticias',
										   'action' => 'index', 
										   'admin' => true));

			} else if (isset($this->data['Noticia']['id'])) {
				$id = $this->data['Noticia']['id'];
			}

			if ($id) {
				//return $this->redirect('/admin/noticias/delete/' .  $id);
				return $this->redirect(array('plugin' => 'noticias', 
											   'controller' => 'noticias',
											   'action' => 'delete', 
											   'admin' => true, $id));
				
			} else {
				//return $this->redirect('/admin/noticias');
				return $this->redirect(array('plugin' => 'noticias', 
											   'controller' => 'noticias',
											   'action' => 'index', 
											   'admin' => true));
			}
		} 

		
		if ($this->request->is('post') || $this->request->is('put')) {
			
			$this->request->data['Noticia']['usuario_id'] = $this->Auth->user('id');
		
			
			if (isset($this->request->data['voltar'])) {
				return $this->redirect(array('plugin' => 'noticias', 
											 'controller' => 'noticias', 
											 'action' => 'view', $id));
			}
			
			// Verifica se o usuário esta tentando publicar a notícia
			$is_publishing = false;
			if (isset($this->request->data['confirmar'])) {
				$is_publishing = true;	
			}
					
				
			if ($id) {
				$this->request->data['Noticia']['id'] = $id;
				$noticiaData = $this->Noticia->find('first', array('recursive' => -1, 'conditions' => array('Noticia.id' => $id)));
				$noticiaData['Noticia'] = array_merge($noticiaData['Noticia'], $this->request->data['Noticia']);
			} else {
				$noticiaData = $this->request->data;
			}

			$noticiaData['Noticia']['site_id'] = $this->site_id;
						
			$oldNoticiaData = $this->Noticia->findById($this->request->data['Noticia']['id']);

			$result = null;			
			if ($is_publishing || (isset($noticiaData['Noticia']['status_id']) 
								   && $noticiaData['Noticia']['status_id'] == Noticia::STATUS_PUBLICO)) {
				$result = $this->Noticia->saveAsPublicacao($noticiaData);	
			} else {
				$result = $this->Noticia->saveAsRascunho($noticiaData);
			}			
				
			
			$this->Session->write('Noticia.TempSave.Id', $result['Noticia']['id']);
			

			if ($result) {
				if ($is_publishing) {
					if ($oldNoticiaData
						&& @array_diff_assoc($noticiaData['Noticia'], $oldNoticiaData['Noticia'])) {

						$this->Session->setFlash('Notícia publicada com sucesso', 'success');
					}
				} else {

					if (!$this->request->data['Noticia']['id'] || ($oldNoticiaData && @array_diff_assoc($noticiaData['Noticia'], $oldNoticiaData['Noticia']))) {
						$this->Session->setFlash('Notícia salva com sucesso', 'success');
					}
				}
				
				if (isset($this->request->data['avancar'])) {
					//return $this->redirect(DS . 'admin' . DS . 'noticia' . DS . $result['Noticia']['id'] . DS . 'midias');
					return $this->redirect(array('plugin' => 'midias', 
											   'controller' => 'midias',
											   'action' => 'midias',
											   'tipo_conteudo' => 'noticia',
											   'id_conteudo' => $result['Noticia']['id']));
											   
					
				} else if (!isset($this->request->data['salvar'])) {
					//return $this->redirect(DS . 'admin' . DS . 'noticias');
					return $this->redirect(array('plugin' => 'noticias', 
											   'controller' => 'noticias',
											   'action' => 'index', 
											   'admin' => true));
						
				}
				$this->request->data = $result;
				
	
			} else {
				if ($is_publishing) {
					$options = array(
										'fields' => array('Noticia.resumo', 'Noticia.texto', 
											              'Noticia.cartola', 'Noticia.autor', 
											              'Noticia.categoria_id'),
										'conditions' => array('Noticia.id' => $this->request->data['Noticia']['id'])
								    );
					$row = $this->Noticia->find('first', $options);
					$emptyFields = array();

					foreach ($row['Noticia'] as $field => $value) {
						if (is_null($value) || empty($value)) {
							$emptyFields[] = '"' . strtolower(Inflector::humanize($field)) . '"';
						}
					}

					$msg = '';
					if (count($emptyFields) > 1) {
						$fields = implode(', ', $emptyFields);
						//preg_replace('/.*, ([a-z]+)$/', 'e $1', $fields);
						$msg = "Certifique-se que os campos {$fields} estejam preenchidos 
								para que a notícia possa ser publicada.";
					} else {
						$msg = "Certifique-se que o campo {$emptyFields[0]} esteja preenchido
								para que a notícia possa ser publicada.";
					}

					$this->Session->setFlash("A notícia \"{$noticiaData['Noticia']['titulo']}\" não pode ser publicada 
											  pois está incompleta. {$msg}"
											  );

					return $this->redirect(array('plugin' => 'noticias', 
											   'controller' => 'noticias',
											   'action' => 'index', 
											   'admin' => true));
				} else {

					$array = array($this->Noticia->validationErrors, $this->modelClass);  //ModelClass = name model
					$this->Session->setFlash( $array, 'flash_form_error' );
				}
				return;
			}
			
			
		} else {
			$this->Session->setFlash('Notícias incompletas serão salvas como "Rascunho". 
								      Para publicar a notícia certifique-se de que todos os campos do formulário
								      estejam preenchidos.', 'info');

			$this->request->data['Noticia']['autor'] = $this->Session->read('Auth.User.nome');
			
			if ($id > 0) { 
				$this->request->data = $this->Noticia->findById($id);
				$this->isAllowed($id, 'Você não pode editar esta notícia', array('admin' => true, 'plugin' => 'noticias', 'controller' => 'noticias', 'action' => 'index'));
				$dh_prog_pub = $this->request->data['Noticia']['datahora_prog_pub'];
				//$dh_prog_exp = $this->request->data['Noticia']['datahora_prog_exp']; 
				$dh_prog_pub = DateTime::createFromFormat('Y-m-d H:i:s', $dh_prog_pub);
				$today = new DateTime();
				//echo $dh_prog_pub; die();
				$this->request->data['Noticia']['agendar'] = ($dh_prog_pub >= $today);  
			}	
		}
			
	}


	function admin_delete($id = null) {
		$nt = $this->Noticia->findById($id);
		if ($nt['Noticia']['bloqueado'] 
			&& ($this->Auth->user('id') != $nt['Noticia']['usuario_id']) && $this->Auth->user('root') != 1
		   ) {
		   		$this->Session->setFlash('Você não possui permissão para remover esta notícia');
				return $this->redirect(array('plugin' => 'noticias', 
											   'controller' => 'noticias',
											   'action' => 'index', 
											   'admin' => true));
		   }
		
		if ($this->request->is('get')) {
			if ($id > 0) {
				$this->Session->setFlash('Notíca descartarda', 'success');
				$this->Noticia->delete($id);
			}
			
			return $this->redirect(array('admin' => true, 'plugin' => 'noticias', 'controller' => 'noticias', 'action' => 'index'));
		}		
	}
	
	function admin_publicacao($id = null) {
		 $noticia = null;
		 if ($id > 0) {
		 	$noticia = $this->Noticia->findById($id);
		 } else {
		 	return $this->redirect(array('admin' => true, 'plugin' => 'noticias', 'controller' => 'noticias', 'action' => 'index'));	
		 }
		
		 if ($this->request->isPost()) {
 				
		 }
	}
	
	function admin_ra_currentNoticiaId() {
		if (!empty($this->request->params['requested'])) {
            return $this->Session->read('Noticia.Edit.Id');
        } else {
        	return $this->redirect(array('admin' => true, 'plugin' => 'noticias', 'controller' => 'noticias', 'action' => 'index'));
        }
		 	
	}

	public function isAuthorized($user) {
		parent::isAuthorized($user);
	}

	protected function isAllowed($noticia_id, $message = false, $redirect = false, $modelClass = false) {
        $noticia = $this->Noticia->read(array('Noticia.site_id', 'Noticia.id', 'Noticia.categoria_id', 'Noticia.usuario_id', 'Noticia.bloqueado'), $noticia_id);
        if(!parent::isAllowed($noticia_id)
            || !$this->Noticia->isAllowed($this->Auth->user('Perfil'), $noticia['Noticia']['categoria_id'])
            || ($noticia['Noticia']['bloqueado'] == 1 && $noticia['Noticia']['usuario_id'] !=$this->Auth->user('id')))
                return false;

        return true;
    } 
}