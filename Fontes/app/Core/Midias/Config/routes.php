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

// Revisar estas "soluções" alternativas



Router::connect(
	'/admin/:tipo_conteudo/:id_conteudo/midias/delete/:id_midia', 
	array(
		'plugin' => 'midias',
		'controller' => 'midias',
		'action' => 'delete',
		'admin' => true
	),
	array(
		'id_conteudo' => '[0-9]+',
		'tipo_conteudo' => '[a-z]+',
		'id_midia' => '[0-9]+',
		'pass' => array('tipo_conteudo','id_conteudo','id_midia')
	) 
);

Router::connect(
	'/admin/:tipo_conteudo/:id_conteudo/:action', 
	array(
		'plugin' => 'midias',
		'controller' => 'midias',
		'admin' => true
	),
	array(
		'id_conteudo' => '[0-9]+',
		'tipo_conteudo' => '[a-z]+',
		'pass' => array('tipo_conteudo', 'id_conteudo')
	)
);

Router::connect(
	'/admin/:tipo_conteudo/:id_conteudo/:action/:id_midia', 
	array(
		'plugin' => 'midias',
		'controller' => 'midias',
		'admin' => true
	),
	array(
		'id_conteudo' => '[0-9]+',
		'tipo_conteudo' => '[a-z]+',
		'id_midia' => '[0-9]+',
		'pass' => array('tipo_conteudo', 'id_conteudo', 'id_midia')
	)
);



Router::connect(
	'/admin/:tipo_conteudo/:id_conteudo/:data/:action', 
	array(
		'plugin' => 'midias',
		'controller' => 'midias',
		'admin' => true
	),
	array(
		'id_conteudo' => '[0-9]+',
		'tipo_conteudo' => '[a-z]+',
		'pass' => array('tipo_conteudo', 'id_conteudo', 'data')
	)
);





Router::connect('/admin/mimes', array('plugin' => 'midias', 'controller' => 'mimes', 'action' => 'index', 'admin' => true));
Router::connect('/admin/mimes/index/*', array('plugin' => 'midias', 'controller' => 'mimes', 'action' => 'index', 'admin' => true));
Router::connect('/admin/mimes/add/*', array('plugin' => 'midias', 'controller' => 'mimes', 'action' => 'add', 'admin' => true));
Router::connect('/admin/mimes/edit/*', array('plugin' => 'midias', 'controller' => 'mimes', 'action' => 'edit', 'admin' => true));
Router::connect('/admin/mimes/delete/*', array('plugin' => 'midias', 'controller' => 'mimes', 'action' => 'delete', 'admin' => true));
Router::connect('/admin/mimes/status/*', array('plugin' => 'midias', 'controller' => 'mimes', 'action' => 'status', 'admin' => true));

Router::connect('/admin/banco_imagens', array('plugin' => 'midias', 'controller' => 'banco_imagens', 'action' => 'index', 'admin' => true));
Router::connect('/admin/banco_imagens/index/*', array('plugin' => 'midias', 'controller' => 'banco_imagens', 'action' => 'index', 'admin' => true));
Router::connect('/admin/banco_imagens/add/*', array('plugin' => 'midias', 'controller' => 'banco_imagens', 'action' => 'add', 'admin' => true));
Router::connect('/admin/banco_imagens/edit/*', array('plugin' => 'midias', 'controller' => 'banco_imagens', 'action' => 'edit', 'admin' => true));
Router::connect('/admin/banco_imagens/delete/*', array('plugin' => 'midias', 'controller' => 'banco_imagens', 'action' => 'delete', 'admin' => true));

Router::connect('/admin/banco_imagens/resetar_dados_form/*', array('plugin' => 'midias', 'controller' => 'banco_imagens', 'action' => 'resetar_dados_form', 'admin' => true));

Router::connect('/admin/midias_ajax/:action',
	array(
		'plugin' => 'midias', 
		'controller' => 'ajax',
		'admin' => true
	)
);


Router::connect(
	'/admin/:tipo_conteudo/:id_conteudo/midias_conteudo/:action/:id_midia', 
	array(
		'plugin' => 'midias',
		'controller' => 'midias_conteudos',
		'admin' => true
	),
	array(
		'id_conteudo' => '[0-9]+',
		'tipo_conteudo' => '[a-z]+',
		'id_midia' => '[0-9]+',
		'pass' => array('tipo_conteudo','id_conteudo','id_midia')
	) 
);