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

define("TAMANHO_FONTE", 12);
define("MODO_SISTEMA_PADRAO", 0);
define("MODO_SISTEMA_HTML_PURO", 1);
define("FONTE_ID", 2);
define("CONTRASTE_ID", 1);

CmsAclFreeActions::add('Usuarios', 'Usuarios', 'admin_meus_sites');
CmsAclFreeActions::add('Usuarios', 'Usuarios', 'admin_selecionar_site');
CmsAclFreeActions::add('Usuarios', 'Usuarios', 'admin_resetar_configuracoes_pessoais');
CmsAclFreeActions::add('Usuarios', 'Usuarios', 'admin_configuracoes_pessoais');
CmsAclFreeActions::add('Usuarios', 'Usuarios', 'admin_fontes');
CmsAclFreeActions::add('Usuarios', 'Usuarios', 'admin_contrastes');
CmsAclFreeActions::add('Usuarios', 'Usuarios', 'admin_sites');
CmsAclFreeActions::add('Usuarios', 'Usuarios', 'admin_dados_cadastrais');
CmsAclFreeActions::add('Usuarios', 'Usuarios', 'admin_ra_modo_sistema');


CmsAclFreeActions::add('Usuarios', 'Usuarios', 'stringAction');
CmsPublicActions::add('Usuarios', 'Usuarios', 'admin_login');
CmsPublicActions::add('Usuarios', 'Usuarios', 'admin_logout');
CmsPublicActions::add('Usuarios', 'RecuperarDados', '*');
CmsPublicActions::add('Usuarios', 'Usuarios', 'admin_ra_modo_sistema');

CmsAclFreeControllers::add('Usuarios', 'RecuperarDados');

CmsMenu::add('usuarios', 
	array(
		'title' => 'Usuários',
		'children' => array(
			'usuarios' => array(
				'title' => 'Usuários',
				'url' => array(
					'admin' => true,
					'plugin' => 'usuarios',
					'controller' => 'usuarios',
					'action' => 'admin_index',
				)
			)
		)
	)
);