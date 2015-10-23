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
 * @property AclReflectorComponent $AclReflector
 */
class AclManagerComponent extends Component {
    public $components = array('Auth', 'Acl', 'Permissoes.AclReflector', 'Session');
    
    /**
     * @var AclAppController
     */
	private $controller = null;
	private $controllers_hash_file;

	/****************************************************************************************/
    
    public function initialize(Controller $controller) {
	    $this->controller = $controller;
	    $this->controllers_hash_file = CACHE . 'persistent' . DS . 'controllers_hashes.txt';
	}
	
	/****************************************************************************************/
	
	/**
	 * Check if the file containing the stored controllers hashes can be created,
	 * and create it if it does not exist
	 *
	 * @return boolean true if the file exists or could be created
	 */
	private function check_controller_hash_tmp_file() {
	    if(is_writable(dirname($this->controllers_hash_file))) {
	        App::uses('File', 'Utility');
	        $file = new File($this->controllers_hash_file, true);
	        return $file->exists();
	    } else {
	        $this->Session->setFlash(sprintf('O diretório %s não tem permissão de escrita', dirname($this->controllers_hash_file)), 'flash_error', null, 'plugin_acl');
	        return false;
	    }
	}
	 
	/**
	 * return the stored array of controllers hashes
	 *
	 * @return array
	 */
	public function get_stored_controllers_hashes() {
	    if($this->check_controller_hash_tmp_file()) {
    	    $file = new File($this->controllers_hash_file);
    		$file_content = $file->read();
    		
    		if(!empty($file_content)) {
    			$stored_controller_hashes = unserialize($file_content);
    		} else {
    			$stored_controller_hashes = array();
    		}
    		
    		return $stored_controller_hashes;
	    }
	}
	
	/**
	 * return an array of all controllers hashes
	 *
	 * @return array
	 */
	public function get_current_controllers_hashes() {
	    $controllers = $this->AclReflector->get_all_controllers();
	    
	    $current_controller_hashes = array();
	    
	    foreach($controllers as $controller) {
	        $ctler_file = new File($controller['file']);
	        $current_controller_hashes[$controller['name']] = $ctler_file->md5();
	    }
	    
	    return $current_controller_hashes;
	}
	
	/**
	 * Return ACOs paths that should exist in the ACO datatable but do not exist
	 */
	function get_missing_acos() {
	    $actions     = $this->AclReflector->get_all_actions();
        $controllers = $this->AclReflector->get_all_controllers();
        $CmsPublicActions = CmsPublicActions::getInstance();
        $CmsAclFreePlugins = CmsAclFreePlugins::getInstance();
        $CmsAclFreeActions = CmsAclFreeActions::getInstance();
        $CmsAclFreeControllers = CmsAclFreeControllers::getInstance();
        
        $actions_aco_paths = array();
        $actions_aco_paths[] = 'controllers';
        foreach($actions as $action) {
            $action_infos = split('/', $action);
            $count = count($action_infos);
            $plugin = ($count == 3) ? $action_infos[$count - 3] : '';
            $controller = $action_infos[$count - 2];
            $action_name = $action_infos[$count - 1];

            $ignore = ($action_name == 'isAuthorized' || $controller == 'App' || $CmsAclFreePlugins->isAllowed($plugin) ||
                $CmsAclFreeActions->isAllowed($plugin, $controller, $action_name) ||
                $CmsAclFreeControllers->isAllowed($plugin, $controller) ||
                $CmsPublicActions->isAllowed($plugin, $controller, $action_name));
            if($ignore == false) {
                $actions_aco_paths[] = 'controllers/' . $action;
            }
        }

        foreach($controllers as $controller) {
            $controller_infos = split('/', $controller['name']);
            $count = count($controller_infos);
            $plugin = '';
            $controller_name = $controller_infos[$count - 1];
            if ($count == 2) {
                $plugin = $controller_infos[$count - 2];
                $controller_name = $controller_infos[$count - 1];
            }

            $ignore = ($controller_name == 'App' || $CmsAclFreePlugins->isAllowed($plugin) ||
                    $CmsAclFreeControllers->isAllowed($plugin, $controller_name) ||
                    $CmsPublicActions->isAllowed($plugin, $controller_name, ''));

            if(!$ignore) {
                $actions_aco_paths[] = 'controllers/' . $controller['name'];
            }
        }
        
        $aco =& $this->Acl->Aco;
        
        $acos = $aco->find('all', array('recursive' => -1));
        
        $existing_aco_paths = array();
        foreach($acos as $aco_node) {
            $path_nodes = $aco->getPath($aco_node['Aco']['id']);
            $path = '';
            foreach($path_nodes as $path_node) {
                $path .= '/' . $path_node['Aco']['alias'];
            }
            
            $path = substr($path, 1);
            $existing_aco_paths[] = $path;
        }
        $missing_acos = array_diff($actions_aco_paths, $existing_aco_paths);
        return $missing_acos;
	}
	
	/**
	 * Store missing ACOs for all actions in the datasource
	 * If necessary, it creates actions parent nodes (plugin and controller) as well
	 */
	public function create_acos() {

        $CmsPublicActions = CmsPublicActions::getInstance();
        $CmsAclFreePlugins = CmsAclFreePlugins::getInstance();
        $CmsAclFreeActions = CmsAclFreeActions::getInstance();
        $CmsAclFreeControllers = CmsAclFreeControllers::getInstance();

	    $aco =& $this->Acl->Aco;
	    
	    $log = array();
	    
	    $controllers = $this->AclReflector->get_all_controllers();
	    
	    /******************************************
	     * Create 'controllers' node if it does not exist
	     */
	    $root = $aco->node('controllers');
		if (empty($root)) {
		    /*
		     * root node does not exist -> create it
		     */
		    
			$aco->create(array('parent_id' => null, 'model' => null, 'alias' => 'controllers'));
			$root = $aco->save();
			$root['Aco']['id'] = $aco->id;
			
			$log[] = 'ACO para "controllers" criado';
		} else {
			$root = $root[0];
		}
	    
	    foreach($controllers as $controller) {
	        $controller_name = $controller['name'];
	        if($controller_name !== 'App') {
    	        $plugin_name = $this->AclReflector->getPluginName($controller_name);
    	        $pluginNode = null;
                if(!$CmsAclFreePlugins->isAllowed($plugin_name)) {
        	        if(!empty($plugin_name)) {
        	            /*
        	             * Case of plugin controller
        	             */
        	            
        	            $controller_name = $this->AclReflector->getPluginControllerName($controller_name);
        	            
        	            /******************************************
        	             * Check plugin node
        	             */
        	            $pluginNode = $aco->node('controllers/' . $plugin_name);
        	            if(empty($pluginNode)) {
        	                /*
        	                 * plugin node does not exist -> create it
        	                 */
        	                $aco->create(array('parent_id' => $root['Aco']['id'], 'model' => null, 'alias' => $plugin_name));
        					$pluginNode = $aco->save();
        					$pluginNode['Aco']['id'] = $aco->id;
        					
        					$log[] = sprintf('ACO para o plugin %s criado', $plugin_name);
        	            }
        	        }
        	        
        	        
        	        /******************************************
        	         * Check controller node
        	         */
        	        $controllerNode = $aco->node('controllers/' . (!empty($plugin_name) ? $plugin_name . '/' : '') . $controller_name);
                    
                    $ignoreController = ($CmsAclFreeControllers::isAllowed((!empty($plugin_name) ? $plugin_name  : ''), $controller_name) ||
                        $CmsPublicActions::isAllowed((!empty($plugin_name) ? $plugin_name  : ''), $controller_name, 'any'));
                    
                    if(empty($controllerNode) && $ignoreController == false) {
                        /*
                         * controller node does not exist -> create it
                         */
                        
                        if(isset($pluginNode) && $pluginNode != null) {
                            /*
                             * The controller belongs to a plugin
                             */
        
                            $plugin_node_aco_id = isset($pluginNode[0]) ? $pluginNode[0]['Aco']['id'] : $pluginNode['Aco']['id'];
                            
                            $aco->create(array('parent_id' => $plugin_node_aco_id, 'model' => null, 'alias' => $controller_name));
        					$controllerNode = $aco->save();
        					$controllerNode['Aco']['id'] = $aco->id;
        					
        					$log[] = sprintf('ACO para %s/%s criado', $plugin_name, $controller_name);
                        } else {
                            /*
                             * The controller is an app controller
                             */
                            
                            $aco->create(array('parent_id' => $root['Aco']['id'], 'model' => null, 'alias' => $controller_name));
        					$controllerNode              = $aco->save();
        					$controllerNode['Aco']['id'] = $aco->id;
        					
        					$log[] = sprintf('ACO para %s criado', $controller_name);
                        }
                    } else {
        				$controllerNode = $controllerNode[0];
        			}
        	        
        	        
        	        /******************************************
        	         * Check controller actions node
        	         */
                    if($ignoreController == false) {
            	        $actions = $this->AclReflector->get_controller_actions($controller_name);
                	    foreach($actions as $action) {
                	        $actionNode = $aco->node('controllers/' . (!empty($plugin_name) ? $plugin_name . '/' : '') . $controller_name . '/' . $action);
                	        
                            $ignoreAction = (
                                $action == 'isAuthorized' ||
                                $CmsAclFreeActions::isAllowed((!empty($plugin_name) ? $plugin_name  : ''), $controller_name, $action) ||
                                $CmsPublicActions::isAllowed((!empty($plugin_name) ? $plugin_name  : ''), $controller_name, $action)
                                );
                	        
                            if(empty($actionNode) && $ignoreAction == false) {
                	            /*
                	             * action node does not exist -> create it
                	             */
                	            
                	            $aco->create(array('parent_id' => $controllerNode['Aco']['id'], 'model' => null, 'alias' => $action));
            					$methodNode = $aco->save();
            					
            					$log[] = sprintf('Aco para %s criado', (!empty($plugin_name) ? $plugin_name . '/' : '') . $controller_name . '/' . $action);
                	        }
                	    }
                    }
                }
	        }
	    }
	    
	    return $log;
	}
	
	public function update_controllers_hash_file() {
	    $current_controller_hashes = $this->get_current_controllers_hashes();
	    
	    $file = new File($this->controllers_hash_file);
        $file->write(serialize($current_controller_hashes));
	}
	
	public function controller_hash_file_is_out_of_sync() {
	    if($this->check_controller_hash_tmp_file()) {
    	    $stored_controller_hashes  = $this->get_stored_controllers_hashes();
        	$current_controller_hashes = $this->get_current_controllers_hashes();
        	
        	/*
    		 * Check what controllers have changed
    		 */
    		$updated_controllers = array_keys(Set::diff($current_controller_hashes, $stored_controller_hashes));
    		
    		return !empty($updated_controllers);
	    }
	}
	
	public function get_acos_to_prune() {
	    $actions     = $this->AclReflector->get_all_actions();
        $controllers = $this->AclReflector->get_all_controllers();
        $plugins     = $this->AclReflector->get_all_plugins_names();
        
        $actions_aco_paths = array();
        foreach($actions as $action) {
            $actions_aco_paths[] = 'controllers/' . $action;
        }
        foreach($controllers as $controller) {
            $actions_aco_paths[] = 'controllers/' . $controller['name'];
        }
        foreach($plugins as $plugin) {
            $actions_aco_paths[] = 'controllers/' . $plugin;
        }
        $actions_aco_paths[] = 'controllers';
        
        $aco =& $this->Acl->Aco;
        
        $acos = $aco->find('all', array('recursive' => -1));
        
        $existing_aco_paths = array();
        foreach($acos as $aco_node) {
            $path_nodes = $aco->getPath($aco_node['Aco']['id']);
            $path = '';
            foreach($path_nodes as $path_node) {
                $path .= '/' . $path_node['Aco']['alias'];
            }
            
            $path = substr($path, 1);
            $existing_aco_paths[] = $path;
        }
        
        $paths_to_prune = array_diff($existing_aco_paths, $actions_aco_paths);
        
        return $paths_to_prune;
	}
	
    /**
    * Remove all ACOs that don't have any corresponding controllers or actions.
    *
    * @return array log of removed ACO nodes
    */
    public function prune_acos() {
        $aco =& $this->Acl->Aco;
        
        $log = array();
        
        $paths_to_prune = $this->get_acos_to_prune();
        
        foreach($paths_to_prune as $path_to_prune) {
            $node = $aco->node($path_to_prune);
            if(!empty($node)) {
                /*
                 * First element is the last part in path
                 * -> we delete it
                 */
                if($aco->delete($node[0]['Aco']['id'])) {
                    $log[] = sprintf("Aco '%s' foi deletado", $path_to_prune);
                } else {
                    $log[] = '<span class="error">' . sprintf("Aco '%s' não pode ser deletado", $path_to_prune) . '</span>';
                }
            }
        }
        
        return $log;
    }

}