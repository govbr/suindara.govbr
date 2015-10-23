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
/**
 *
 * @author   Nicolas Rod <nico@alaxos.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.alaxos.ch
 *
 * @property AclManagerComponent $AclManager
 */
App::uses('PermissoesAppController', 'Permissoes.Controller');
class AcosController extends PermissoesAppController {

    public $components = array('Permissoes.AclManager', 'Permissoes.AclReflector');

	public $name = 'Acos';

	public function admin_index() {
	    
	}
	
	public function admin_empty_acos($run = null) {
	    if(isset($run)) {
    		if($this->Aco->deleteAll(array('id > 0'))) {
    	        $this->Session->setFlash('A tabela de ACOs foi limpa', 'success');
    	    } else {
    	        $this->Session->setFlash('A tabela de ACOs não pode ser limpa');
    	    }
    	    
    	    $this->set('run', true);
	    } else {
	        $this->set('run', false);
	    }
	}
	
	public function admin_build_acl($run = null) {
	    if(isset($run)) {
    		$logs = $this->AclManager->create_acos();
    		
            if( count($logs) > 0 ){
                $this->Session->setFlash('As seguintes ACOs foram criadas no banco', 'success');
            }else{
                $this->Session->setFlash('Não há nenhum ACO a ser criado');    
            }

    		$this->set('logs', $logs);
    		$this->set('run', true);

	    } else {
	        $missing_aco_nodes = $this->AclManager->get_missing_acos();
	        
            if( count($missing_aco_nodes) > 0 ){
                $this->Session->setFlash('As seguintes ações estão faltando');    
            }else{
               $this->Session->setFlash('Não há nenhum ACO a ser criado');  
            }

	        $this->set('missing_aco_nodes',  $missing_aco_nodes);
	        $this->set('run', false);
	    }
	}

    public function admin_prune_acos($run = null) {
        if(isset($run)) {
            $logs = $this->AclManager->prune_acos();

            if(count($logs) <= 0) {
                $this->Session->setFlash('Não há nenhum ACO obsoleto á ser deletado');
            }

            $this->set('logs', $logs);
            $this->set('run', true);
        } else {
            $nodes_to_prune = $this->AclManager->get_acos_to_prune();
            
            if(count($nodes_to_prune) <= 0) {
                $this->Session->setFlash('Não há nenhum ACO a ser deletado');
            }


            $this->set('nodes_to_prune', $nodes_to_prune);
            $this->set('run', false);
        }
    }
    
    public function admin_synchronize($run = null) {
        if(isset($run)) {
            $prune_logs  = $this->AclManager->prune_acos();
            $create_logs = $this->AclManager->create_acos();
    	

            if(count($create_logs) <= 0) {
                $this->Session->setFlash('Não há nenhum ACO a ser criado.');
            }

            if(count($prune_logs) <= 0) {
                $this->Session->setFlash('A tabela de ACOs foi sincronizada.', 'success');
                //$this->Session->setFlash('Não há nenhum ACO a ser deletado.');
            }

            $this->set('create_logs', $create_logs);
            $this->set('prune_logs',  $prune_logs);

            $this->set('run', true);
        } else {
            $nodes_to_prune    = $this->AclManager->get_acos_to_prune();
            $missing_aco_nodes = $this->AclManager->get_missing_acos();
            

            $has_aco_to_sync = false;
            
            if(count($missing_aco_nodes) > 0) {
                $has_aco_to_sync = true;
            }
            
            if(count($nodes_to_prune) > 0) {
                $has_aco_to_sync = true;
            }
            
            if(!$has_aco_to_sync) {
                $this->Session->setFlash('A tabela de ACOs já esta sincronizada', 'success');
            }

            $this->set('nodes_to_prune', $nodes_to_prune);
            $this->set('missing_aco_nodes', $missing_aco_nodes);
            
            $this->set('run', false);
        }
    }

    private function _check_files_updates() {
        if($this->AclManager->controller_hash_file_is_out_of_sync()) {
            $missing_aco_nodes = $this->AclManager->get_missing_acos();
            $nodes_to_prune    = $this->AclManager->get_acos_to_prune();

            $has_updates = false;

            if(count($missing_aco_nodes) > 0) {
                $has_updates = true;
            }

            if(count($nodes_to_prune) > 0) {
                $has_updates = true;
            }

            $this->set('nodes_to_prune', $nodes_to_prune);
            $this->set('missing_aco_nodes', $missing_aco_nodes);

            if($has_updates) {
                $this->render('/Acos/admin_has_updates');
            }

            $this->AclManager->update_controllers_hash_file();
        }
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->_check_files_updates();
        $this->set('title_for_layout', '- Gerenciamento de Lista de Controle de Acesso');
    }

    public function isAuthorized($user) {
        if(!$this->administracao)
            return false;
        parent::isAuthorized($user);
    }
}