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
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('BaseAuthorize', 'Controller/Component/Auth');
App::uses('Router', 'Routing');
/**
 * An authorization adapter for AuthComponent.  Provides the ability to
 * authorize using row based CRUD mappings. CRUD mappings allow you to translate
 * controller actions into *C*reate *R*ead *U*pdate *D*elete actions.
 * This is then checked in the AclComponent as specific permissions.
 *
 * For example, taking `/posts/view/1` as the current request.  The default
 * mapping for `view`, is a `read` permission check. The Acl check would then be
 * for the Post record with id=1 with the `read` permission.  This allows you to
 * create permission systems that focus more on what is being done to which
 * record, rather than the specific actions being visited, or only what is being
 * done to resources.
 *
 * @package       Cake.Controller.Component.Auth
 * @since 2.0
 * @see AuthComponent::$authenticate
 * @see AclComponent::check()
 */
class AclAuthorize extends BaseAuthorize {

/**
 * Sets up additional actionMap values that match the configured
 * `Routing.prefixes`.
 *
 * @param ComponentCollection $collection The component collection from the
 * controller.
 * @param string $settings An array of settings.  This class does not use any
 * settings.
 */
	public function __construct(ComponentCollection $collection, $settings = array()) {
		parent::__construct($collection, $settings);
	}

/**
 * Authorize a user using the mapped actions and the AclComponent.
 *
 * @param array $user The user to authorize
 * @param CakeRequest $request The request needing authorization.
 * @return boolean
 * @throws CakeException
 */
	public function authorize($user, CakeRequest $request) {
		if (empty($request->params['action'])) {
			return false;
		}

		$plugin = $request->params['plugin'];
		$controller = $request->params['controller'];
		$action = $request->params['action'];

		$user = array($this->settings['userModel'] => $user);
		
		$aco = 'controllers'. DS . $plugin . DS . $controller . DS . $action;

		$Acl = $this->_Collection->load('Acl');
		
		return $Acl->check($user, $aco, '*');
	}

}
