<?php
/**
 * Teste do ajuste de inflexão
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @author        Juan Basso <jrbasso@gmail.com>
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */

require CakePlugin::path('CakePtbr') . DS . 'Console' . DS . 'Templates' . DS . 'default' . DS . 'Inflexao.php';

/**
 * Inflexao
 *
 */
class InflexaoTest extends CakeTestCase {

/**
 * testAcentos
 *
 * @retun void
 * @access public
 */
	public function testAcentos() {
		$this->assertEqual('caminhão', Inflexao::acentos('caminhao'));
		$this->assertEqual('Pão', Inflexao::acentos('Pao'));
		$this->assertEqual('canção', Inflexao::acentos('cancao'));
		$this->assertEqual('canções', Inflexao::acentos('cancoes'));
		$this->assertEqual('limões', Inflexao::acentos('limoes'));
		$this->assertEqual('mães', Inflexao::acentos('maes'));

		$this->assertEqual('joão do caminhão', Inflexao::acentos('joao do caminhao'));
		$this->assertEqual('joão_do_caminhão', Inflexao::acentos('joao_do_caminhao'));
	}

}
