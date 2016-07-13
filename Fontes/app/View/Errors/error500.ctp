<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<?php $this->layout = 'error'; ?>
<h2><?php echo $name; ?></h2>

<div class="desc-error">
    <p>Erro interno, isso pode ter acontecido porque:</p>

    <ul>
        <li>» O servidor está sobrecarregado</li>
        <li>» Forças sobrenaturais estão atacando o servidor</li>
        <li>» Culpa dos desenvolvedores</li>
    </ul>
</div>

<!--
<p class="error">
	<strong><?php //echo __d('cake', 'Error'); ?>: </strong>
	<?php //echo __d('cake', 'An Internal Error Has Occurred. blip'); ?>
</p>
-->
<?php
if (Configure::read('debug') > 0):
	echo $this->element('exception_stack_trace');
endif;
?>
