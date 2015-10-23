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
App::uses('MidiasConteudo', 'Midias.Model');

class MidiasConteudosController extends MidiasAppController {

	public $name = 'MidiasConteudos';

    public $uses = array('Midias.MidiasConteudo', 'Midias.Mime');

    public function admin_add($tipo_conteudo=null, $id_conteudo=null, $id_midia=null) {
    	$this->MidiasConteudo->Midia->id = $id_midia;
    	if($this->MidiasConteudo->Midia->exists()) {
    		$midiaConteudo = $this->MidiasConteudo->findByMidiaId($id_midia);
    		if(!empty($midiaConteudo) && $midiaConteudo['MidiasConteudo'][$tipo_conteudo.'_id'] == $id_conteudo) {
    			$this->Session->setFlash('Esta mídia já foi adicionada ao conteúdo');
    			$this->redirect($this->referer());
    		}

	    	$new = $this->MidiasConteudo->create();
	    	$new['MidiasConteudo']['midia_id'] = $id_midia;
            if($tipo_conteudo == 'noticia') {  
                $new['MidiasConteudo']['noticia_id'] = $id_conteudo;
            } else {
                $new['MidiasConteudo']['pagina_id'] = $id_conteudo;
            }
			if($this->MidiasConteudo->save($new)) {
                $midia = $this->MidiasConteudo->findByMidiaId($id_midia);
                $this->Session->setFlash('Mídia ' . $midia['Midia']['titulo'] . ' adicionada ao conteúdo com sucesso', 'success');
			}
		} else {
            $this->Session->setFlash('Mídia não encontrada');
        }
		$this->redirect($this->referer());
	}

	public function admin_delete($tipo_conteudo=null, $id_conteudo=null, $id_midia=null) {
		$midiaTemp = $this->MidiasConteudo->read(array('midia_id'), $id_midia);

        $midiasList = $this->MidiasConteudo->Midia->find('all');
        foreach ($midiasList as $key => $value) {
            if($value['Midia']['id'] == $midiaTemp['MidiasConteudo']['midia_id'])
            {
                $name = $value['Midia']['titulo'];
                break;
            }
        }

        if($this->MidiasConteudo->delete($id_midia)) {
			$this->Session->setFlash('Mídia ' . $name . ' removida com sucesso', 'success');
		} else {
			$this->Session->setFlash('Erro ao deletar a mídia');
		}
		$this->redirect($this->referer());
    }

    public function admin_move_up($tipo_conteudo=null, $id_conteudo=null, $id_midia=null) {
    	if($this->MidiasConteudo->moveUp($id_midia)) {
    		$this->Session->setFlash('Ordem alterada com sucesso', 'success');
		} else {
            $this->Session->setFlash('Não foi possível reordenar esta mídia, verifique se a mesma não é a primeira da lista.');
        }
		$this->redirect($this->referer());
    }

    public function admin_move_down($tipo_conteudo=null, $id_conteudo=null, $id_midia=null) {
    	if($this->MidiasConteudo->moveDown($id_midia)) {
    		$this->Session->setFlash('Ordem alterada com sucesso', 'success');
		} else {
            $this->Session->setFlash('Não foi possível reordenar esta mídia, verifique se a mesma não é a última da lista.');
        }
		$this->redirect($this->referer());
    }

    public function admin_destaque($tipo_conteudo=null, $id_conteudo=null, $id_midia=null) {
    	$this->MidiasConteudo->id = $id_midia;
    	if($this->MidiasConteudo->exists()) {
    		$midiaConteudo = $this->MidiasConteudo->read();
    		if(empty($midiaConteudo)) {
    			$this->Session->setFlash('Mídia não encontrada');
    			$this->redirect($this->referer());
    		}
            if($midiaConteudo['Midia']['tipo_id'] == ARQUIVO) {
                $this->Session->setFlash('Este tipo de mídia não pode ser utilizado como destaque');
                $this->redirect($this->referer());
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
                $this->Session->setFlash('Mídia destaque adicionada com sucesso', 'success');
            } else {
                $this->Session->setFlash('Erro ao tentar adicionar mídia destaque');
            }
		} else {
            $this->Session->setFlash('Mídia não encontrada');
        }
		$this->redirect($this->referer());
    }

	public function ra_getImagemDestaque($tipo_conteudo=null, $id_conteudo=null) {
		$destaque = null;

		if (!empty($this->request->params['requested'])) {
			if($tipo_conteudo == 'noticia') {  
        	      $destaque = $this->MidiasConteudo->find('first', array(
           	         'conditions' => array(
           	 			'MidiasConteudo.destaque' => 1,
            			'MidiasConteudo.noticia_id' => $id_conteudo,
            			'Midia.tipo_id' => IMAGEM,
            			'not' => array('Midia.descricao' => '') ))
            		);
					
				if (!$destaque) {
					$destaque = $this->MidiasConteudo->find('first', array(
           	         'conditions' => array(
            			'MidiasConteudo.noticia_id' => $id_conteudo,
            			'not' => array('Midia.descricao' => ''),
            			'Midia.tipo_id' => IMAGEM ))
            		);
				}	
					
        	} else {
	           	 $destaque = $this->MidiasConteudo->find('first', array(
	            	        'conditions' => array(
	            				'MidiasConteudo.destaque' => 1,
	            				'not' => array('Midia.descricao' => ''),
	            				'MidiasConteudo.pagina_id' => $id_conteudo,
	            				'Midia.tipo_id' => IMAGEM
	        				)
	               	 )
	            	); 
				
				if (!$destaque) {
						$destaque = $this->MidiasConteudo->find('first', array(
	           	         'conditions' => array(
	            			'MidiasConteudo.noticia_id' => $id_conteudo,
	            			'not' => array('Midia.descricao' => ''),
	            			'Midia.tipo_id' => IMAGEM ))
	            		);
					}
			
			}   
        }
		
		
		return $destaque;
		
	}

	
	public function ra_getAudios($tipo_conteudo=null, $id_conteudo=null) {
		$audios = null;
		
		
		if (!empty($this->request->params['requested'])) {
			$conditions = array(
            			
            			'not' => array('Midia.descricao' => ''),
            			'Midia.tipo_id' => AUDIO );
						
			
			if($tipo_conteudo == 'noticia') {
				$conditions['MidiasConteudo.noticia_id'] = $id_conteudo;  
        	      $audios = $this->MidiasConteudo->find('all', array(
        	  		 //'limit' => $maximoDeImagens,	
        	  		 'not' => array('Midia.descricao' => ''),
           	         'conditions' => $conditions));
        	} else {
        		$conditions['MidiasConteudo.pagina_id'] = $id_conteudo;
           	 $audios = $this->MidiasConteudo->find('all', array(
           	 			//'limit' => $maximoDeImagens,
           	 			'not' => array('Midia.descricao' => ''),
            	        'conditions' => $conditions
               	 )); 
			
			}   
        }	
		
		
		return $audios;	
		
	}
	
	public function ra_getArquivos($tipo_conteudo=null, $id_conteudo=null) {
		$arquivos = null;
		
		
		if (!empty($this->request->params['requested'])) {
			$conditions = array(
            			'not' => array('Midia.descricao' => ''),
            			'Midia.tipo_id' => ARQUIVO );
						
			
			if($tipo_conteudo == 'noticia') {
				  $conditions['MidiasConteudo.noticia_id'] = $id_conteudo;  
        	      $arquivos = $this->MidiasConteudo->find('all', array(
        	  		 //'limit' => $maximoDeImagens,	
        	  		 'not' => array('Midia.descricao' => ''),
           	         'conditions' => $conditions));
        	} else {
        		$conditions['MidiasConteudo.pagina_id'] = $id_conteudo;
           	    $arquivos = $this->MidiasConteudo->find('all', array(
           	 			//'limit' => $maximoDeImagens,
           	 			'not' => array('Midia.descricao' => ''),
            	        'conditions' => $conditions
               	 )); 
			
			}   

            if ($arquivos) {
                for ($i = 0; $i < count($arquivos); $i++) {
                    $temp = $this->Mime->findById($arquivos[$i]['Midia']['mime_id']);
                    $arquivos[$i]['Midia']['extensao'] = $temp['Mime']['extensao'];
                }
            }
        }	
		

		return $arquivos;	
		
	}


	public function ra_getVideos($tipo_conteudo=null, $id_conteudo=null) {
		$videos = null;
		
		
		if (!empty($this->request->params['requested'])) {
			$conditions = array(
            			
            			'not' => array('Midia.descricao' => ''),
            			'Midia.tipo_id' => VIDEO );
						
			
			if($tipo_conteudo == 'noticia') {
				$conditions['MidiasConteudo.noticia_id'] = $id_conteudo;  
        	      $videos = $this->MidiasConteudo->find('all', array(
        	  		 //'limit' => $maximoDeImagens,	
        	  		 'not' => array('Midia.descricao' => ''),
           	         'conditions' => $conditions));
        	} else {
        		$conditions['MidiasConteudo.pagina_id'] = $id_conteudo;
           	 $videos = $this->MidiasConteudo->find('all', array(
           	 			//'limit' => $maximoDeImagens,
           	 			'not' => array('Midia.descricao' => ''),
            	        'conditions' => $conditions
               	 )); 
			
			}   
        }	
		
		
		return $videos;	
		
	}

	public function ra_getImagens($tipo_conteudo=null, $id_conteudo=null, $comImgDestaque=false, $maximoDeImagens=null) {
		$imagens = null;
		
		
		if (!empty($this->request->params['requested'])) {
			$conditions = array(
            			//'MidiasConteudo.noticia_id' => $id_conteudo,
            			'not' => array('Midia.descricao' => ''),
            			'Midia.tipo_id' => IMAGEM );
						
			if (!$comImgDestaque) {			
				$conditions['MidiasConteudo.destaque'] = 0;
			}
			
			if($tipo_conteudo == 'noticia') {
				$conditions['MidiasConteudo.noticia_id'] = $id_conteudo;  
        	      $imagens = $this->MidiasConteudo->find('all', array(
        	  		 'limit' => $maximoDeImagens,	
        	  		 'not' => array('Midia.descricao' => ''),
           	         'conditions' => $conditions));
        	} else {
        		$conditions['MidiasConteudo.pagina_id'] = $id_conteudo;
           	 $imagens = $this->MidiasConteudo->find('all', array(
           	 			'limit' => $maximoDeImagens,
           	 			'not' => array('Midia.descricao' => ''),
            	        'conditions' => $conditions
               	 )); 
			
			}   
        }	
		
		
		return $imagens;	
		
		
	}

    public function beforeFilter() {
        parent::beforeFilter();
		if (empty($this->request->params['requested'])) {
        	if(!isset($this->request->params['tipo_conteudo'])||!isset($this->request->params['id_conteudo'])||!isset($this->request->params['id_midia'])) {
            	$this->Session->setFlash('Endereço inválido');
           	    $this->redirect($this->referer());
        	}
	    }

        if(isset($this->request->params['admin'])) {
            $tipo_conteudo = $this->request->params['tipo_conteudo'];
            $id_conteudo = $this->request->params['id_conteudo'];
            $id_midia = $this->request->params['id_midia'];
            
            if($this->action == 'admin_add') {
                $id_midia = null;
            } else {
                $midiaConteudo = $this->MidiasConteudo->read(array('midia_id'), $id_midia);
                $id_midia = $midiaConteudo['MidiasConteudo']['midia_id'];
            }

            if(!$this->isAllowedMidia($tipo_conteudo, $id_conteudo, $id_midia)) {
                $this->Session->setFlash('Você não tem permissão para executar esta ação');
                $this->redirect(array('plugin' =>'usuarios', 'controller' => 'usuarios', 'action' => 'meus_sites'));
            }
        }
    }

    public function isAuthorized($user) {
        parent::isAuthorized($user);
    }

}