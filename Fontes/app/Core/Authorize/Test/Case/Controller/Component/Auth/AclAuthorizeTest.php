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
 * AclAuthorizeTest file
 *
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
 * @package       Cake.Test.Case.Controller.Component.Auth
 * @since         CakePHP(tm) v 2.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');
App::uses('AclAuthorize', 'Authorize.Controller/Component/Auth');
App::uses('ComponentCollection', 'Controller');
App::uses('AclComponent', 'Controller/Component');
App::uses('CakeRequest', 'Network');
App::uses('CakeResponse', 'Network');

class TestAclAuthorize extends AclAuthorize {

	protected function _getAco($id) {
		return array('model' => 'Post', 'foreign_key' => $id);
	}

}

class AclAuthorizeTest extends CakeTestCase {

/**
 * setup
 *
 * @return void
 */
	public function setUp() {
		Configure::write('Routing.prefixes', array());

		parent::setUp();

		$this->Acl = $this->getMock('AclComponent', array(), array(), '', false);
		$this->Components = $this->getMock('ComponentCollection');

		$this->auth = new TestAclAuthorize($this->Components);
	}

/**
 * setup the mock acl.
 *
 * @return void
 */
	protected function _mockAcl() {
		$this->Components->expects($this->any())
			->method('load')
			->with('Acl')
			->will($this->returnValue($this->Acl));
	}

/**
 * test authorize() without a mapped action, ensure an exception is thrown.
 *
 * @expectedException CakeException
 * @return void
 */
	public function testAuthorizeNoMappedAction() {
		$request = new CakeRequest('/posts/foobar/1', false);
		$request->addParams(array(
			'controller' => 'posts',
			'action' => 'foobar',
			'pass' => array(1)
		));
		$user = array('User' => array('user' => 'mark'));

		$this->auth->authorize($user, $request);
	}

/**
 * test check() passing
 *
 * @return void
 */
	public function testAuthorizeCheckSuccess() {
		$request = new CakeRequest('posts/view/1', false);
		$request->addParams(array(
			'controller' => 'posts',
			'action' => 'view',
			'pass' => array(1)
		));
		$user = array('User' => array('user' => 'mark'));

		$this->_mockAcl();
		$this->Acl->expects($this->once())
			->method('check')
			->with($user, array('model' => 'Post', 'foreign_key' => 1), 'read')
			->will($this->returnValue(true));

		$this->assertTrue($this->auth->authorize($user['User'], $request));
	}

/**
 * test check() failing
 *
 * @return void
 */
	public function testAuthorizeCheckFailure() {
		$request = new CakeRequest('posts/edit/1', false);
		$request->addParams(array(
			'controller' => 'posts',
			'action' => 'edit',
			'pass' => array(1)
		));
		$user = array('User' => array('user' => 'mark'));

		$this->_mockAcl();
		$this->Acl->expects($this->once())
			->method('check')
			->with($user, array('model' => 'Post', 'foreign_key' => 1), 'update')
			->will($this->returnValue(false));

		$this->assertFalse($this->auth->authorize($user['User'], $request));
	}

/**
 * test getting actionMap
 *
 * @return void
 */
	public function testMapActionsGet() {
		$result = $this->auth->mapActions();
		$expected = array(
			'create' => 'create',
			'read' => 'read',
			'update' => 'update',
			'delete' => 'delete',
			'index' => 'read',
			'add' => 'create',
			'edit' => 'update',
			'view' => 'read',
			'remove' => 'delete'
		);
		$this->assertEquals($expected, $result);
	}

/**
 * test adding into mapActions
 *
 * @return void
 */
	public function testMapActionsSet() {
		$map = array(
			'create' => array('generate'),
			'read' => array('listing', 'show'),
			'update' => array('update'),
			'random' => 'custom'
		);
		$result = $this->auth->mapActions($map);
		$this->assertNull($result);

		$result = $this->auth->mapActions();
		$expected = array(
			'add' => 'create',
			'create' => 'create',
			'read' => 'read',
			'index' => 'read',
			'add' => 'create',
			'edit' => 'update',
			'view' => 'read',
			'delete' => 'delete',
			'remove' => 'delete',
			'generate' => 'create',
			'listing' => 'read',
			'show' => 'read',
			'update' => 'update',
			'random' => 'custom',
		);
		$this->assertEquals($expected, $result);
	}

/**
 * test prefix routes getting auto mapped.
 *
 * @return void
 */
	public function testAutoPrefixMapActions() {
		Configure::write('Routing.prefixes', array('admin', 'manager'));
		Router::reload();

		$auth = new AclAuthorize($this->Components);
		$this->assertTrue(isset($auth->settings['actionMap']['admin_index']));
	}

}
