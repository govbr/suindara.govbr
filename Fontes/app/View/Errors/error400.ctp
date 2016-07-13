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
    <p>Não pudemos encontrar a página solicitada. Isso pode ter acontecido porque:</p>

    <ul>
        <li>» Há um erro no link que você clicou.</li>
        <li>» Ou você digitou o endereço incorretamente.</li>
        <li>» Ou ela sumiu por causa do aquecimento global.</li>
    </ul>
</div>

<!--
<p class="error">
	<strong><?php //echo __d('cake', 'Error'); ?>: </strong>
	// <?php //printf(
	// 	__d('cake', 'The requested address %s was not found on this server.'),
	// 	"<strong>'{$url}'</strong>"
	// ); ?>
</p>
-->
<?php
if (Configure::read('debug') > 0):
	echo $this->element('exception_stack_trace');
endif;
?>
