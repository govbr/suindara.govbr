<?php
/**
 * Testes das funções de internacionalização
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @author        Juan Basso <jrbasso@gmail.com>
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */

include CakePlugin::path('CakePtbr') . 'Config' . DS . 'traducao_core.php';

/**
 * I18n Test Case
 *
 */
class CakePtbrI18nCase extends CakeTestCase {

/**
 * testCore
 *
 * @retun void
 * @access public
 */
	public function testCore() {
		$this->assertEqual(__('Missing Component File'), 'Arquivo de Component não encontrado');
		$this->assertEqual(__d('default', 'Missing Database'), 'Database não encontrado');
	}

/**
 * testTimeDefinition
 *
 * @retun void
 * @access public
 */
	public function testTimeDefinition() {
		$result = __c('abday', 5);
		$expected = array('Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab');
		$this->assertEqual($result, $expected);

		$result = __c('day', 5);
		$expected = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado');
		$this->assertEqual($result, $expected);

		$result = __c('abmon', 5);
		$expected = array('Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez');
		$this->assertEqual($result, $expected);

		$result = __c('mon', 5);
		$expected = array('Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
		$this->assertEqual($result, $expected);

		$result = __c('d_fmt', 5);
		$expected = '%d/%m/%Y';
		$this->assertEqual($result, $expected);

		$result = __c('am_pm', 5);
		$expected = array('AM', 'PM');
		$this->assertEqual($result, $expected);
	}
}
