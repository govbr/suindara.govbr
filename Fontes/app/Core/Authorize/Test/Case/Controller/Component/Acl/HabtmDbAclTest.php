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
 * HabtmDbAclTest file.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('ComponentCollection', 'Controller');
App::uses('HabtmDbAcl', 'Authorize.Controller/Component/Acl');

class Employee extends CakeTestModel {

	public $hasAndBelongsToMany = array('Department' => array('with' => 'Membership'));

}
/**
 * Test case for AclComponent using the HabtmDbAcl implementation.
 *
 */
class HabtmDbAclTest extends CakeTestCase {

/**
 * fixtures property
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.authorize.aro', 'plugin.authorize.aco', 'plugin.authorize.aros_aco',
		'plugin.authorize.employee', 'plugin.authorize.department', 'plugin.authorize.membership');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		Configure::write('Acl.classname', 'HabtmDbAcl');
		Configure::write('Acl.database', 'test');
		$Collection = new ComponentCollection();
		$this->Acl = $Collection->load('Acl', array('habtm' => array(
			'userModel' => 'Employee',
			'groupAlias' => 'Department',
		)));
		$this->_setPermissions();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		parent::tearDown();
		unset($this->Acl);
	}

/**
 * _setPermissions method
 *
 * @return void
 */
	protected function _setPermissions() {
		$this->Acl->allow(array('Employee' => array('id' => 1)), 'Controller1', 'read');
		$this->Acl->allow(array('Department' => array('id' => 2)), 'Controller2', 'update');
		$this->Acl->allow(array('Department' => array('id' => 1)), 'Models/User', 'read');
		$this->Acl->allow(array('Department' => array('id' => 3)), 'Controllers/Users/Users', '*');
	}

/**
 * testCheck method
 *
 * @return void
 */
	public function testCheck() {
		$this->assertTrue($this->Acl->check(array('Employee' => array('id' => 1)), 'Controllers/Controller1', 'read'));
		$this->assertFalse($this->Acl->check(array('Employee' => array('id' => 1)), 'Controllers/Controller1', 'create'));

		$this->assertTrue($this->Acl->check(array('Employee' => array('id' => 1)), 'Controllers/Controller2', 'update'));
		$this->assertFalse($this->Acl->check(array('Employee' => array('id' => 1)), 'Controllers/Controller2', 'read'));

		$this->assertTrue($this->Acl->check(array('Employee' => array('id' => 1)), array('model' => 'Employee', 'foreign_key' => 3), 'read'));
		$this->assertFalse($this->Acl->check(array('Employee' => array('id' => 1)), array('model' => 'Employee', 'foreign_key' => 3), 'update'));

		$this->assertTrue($this->Acl->check(array('Employee' => array('id' => 4)), 'Controllers/Users/Users', '*'));
		$this->assertTrue($this->Acl->check(array('Employee' => array('id' => 4)), 'Controllers/Users/Users', 'read'));
		$this->assertTrue($this->Acl->check(array('Employee' => array('id' => 4)), 'Controllers/Users/Users', 'delete'));

		$this->assertTrue($this->Acl->check(array('Department' => array('id' => 3)), 'Controllers/Users/Users', '*'));
		$this->assertTrue($this->Acl->check(array('Department' => array('id' => 3)), 'Controllers/Users/Users', 'read'));
		$this->assertTrue($this->Acl->check(array('Department' => array('id' => 3)), 'Controllers/Users/Users', 'delete'));

		$this->assertFalse($this->Acl->check(array('Employee' => array('id' => 2)), array('model' => 'Employee', 'foreign_key' => 3), 'read'));
	}

}
