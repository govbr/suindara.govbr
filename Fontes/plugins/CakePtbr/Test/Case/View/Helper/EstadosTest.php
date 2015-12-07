<?php
/**
 * Testes do helper de estados
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @author        Juan Basso <jrbasso@gmail.com>
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */

App::uses('AppHelper', 'View/Helper');
App::uses('FormHelper', 'View/Helper');
App::uses('HtmlHelper', 'View/Helper');
App::uses('Controller', 'Controller');
App::uses('EstadosHelper', 'CakePtbr.View/Helper');
App::uses('Estados', 'CakePtbr.Vendor');

/**
 * Controller Test
 *
 */
class ControllerTestController extends Controller {

/**
 * Nome do controller
 *
 * @var string
 * @access public
 */
	public $name = 'ControllerTest';

/**
 * Uses
 *
 * @var array
 * @access public
 */
	public $uses = null;
}

/**
 * Estado Test Case
 *
 */
class CakePtbrEstadosCase extends CakeTestCase {

/**
 * Estados
 *
 * @var object
 * @access public
 */
	public $Estados = null;

/**
 * Lista dos estados
 *
 * @var string
 * @access public
 */
	public $listaEstados;

/**
 * setUp
 *
 * @retun void
 * @access public
 */
	public function setUp() {
		parent::setUp();
		$Controller = new ControllerTestController(new CakeRequest(), new CakeResponse());
		$View = new View($Controller);
		$this->Estados = new EstadosHelper($View);
		$this->Estados->Form = new FormHelper($View);
		$this->Estados->Form->Html = new HtmlHelper($View);

		$this->listaEstados = Estados::lista();
	}

/**
 * testSelect
 *
 * @retun void
 * @access public
 */
	public function testSelect() {
		$expected = array('select' => array('name' => 'data[Model][uf]', 'id' => 'ModelUf'));
		foreach ($this->listaEstados as $sigla => $nome) {
			$expected[] = array('option' => array('value' => $sigla));
			$expected[] = $nome;
			$expected[] = '/option';
		}
		$expected[] = '/select';
		$result = $this->Estados->select('Model.uf');
		$this->assertTags($result, $expected);

		$expected = array('select' => array('name' => 'data[Model][uf]', 'id' => 'ModelUf'));
		foreach ($this->listaEstados as $sigla => $nome) {
			$expected[] = array('option' => array('value' => $sigla));
			$expected[] = $sigla;
			$expected[] = '/option';
		}
		$expected[] = '/select';
		$result = $this->Estados->select('Model.uf', null, array('uf' => true));
		$this->assertTags($result, $expected);
	}

}
