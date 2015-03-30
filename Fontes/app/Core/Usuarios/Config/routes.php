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

Router::connect('/admin/meus_sites/*', array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'meus_sites', 'admin' => true));

Router::connect('/admin/selecionar_site/*', array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'selecionar_site', 'admin' => true));

Router::connect('/admin/configuracoes_pessoais/*', array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'configuracoes_pessoais', 'admin' => true));

Router::connect('/admin/resetar_configuracoes_pessoais/*', array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'resetar_configuracoes_pessoais', 'admin' => true));

Router::connect('/admin/configuracoes_pessoais/*', array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'configuracoes_pessoais', 'admin' => true));

Router::connect('/login/*', array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'login', 'admin' => true));

Router::connect('/logout/*', array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'logout', 'admin' => true));

Router::connect('/admin/dados_cadastrais/*', array('plugin' => 'usuarios', 'controller' => 'usuarios', 'action' => 'dados_cadastrais', 'admin' => true));

Router::connect('/recuperar_senha', array('plugin' => 'usuarios', 'controller' => 'recuperar_dados', 'action' => 'recuperar_senha', 'admin' => false));

Router::connect(
	'/recuperar_senha/:token/*', 
	array(
		'plugin' => 'usuarios',
		'controller' => 'recuperar_dados',
		'action' => 'trocar_senha',
		'admin' => false
	),
	array(
		'pass' => array('token')
	) 
);

Router::connect('/admin/usuarios', array('plugin' => 'usuarios', 'controller' => 'usuarios', 'admin' => true));
Router::connect('/admin/usuarios/:action/*', array('plugin' => 'usuarios', 'controller' => 'usuarios', 'admin' => true));