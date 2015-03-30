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

App::uses('CmsController', 'Cms');

class MidiasAppController extends CmsController {
	
	public function isAuthorized($user) {
        parent::isAuthorized($user);
    }

    protected function isAllowedMidia($tipo_conteudo, $conteudo_id, $midia_id = null) {
        if($this->Auth->user('root') == 1)
            return true;
    	if(!isset($this->MidiasConteudo))
	    	$this->loadModel('Midias.MidiasConteudo');
    	
        $midiaConteudo = 0;
        $conteudo = null;
        if($tipo_conteudo == 'noticia') {
            $this->MidiasConteudo->Noticia->id = $conteudo_id;
            $conteudo = $this->MidiasConteudo->Noticia->read(array('Noticia.site_id', 'Noticia.id', 'Noticia.categoria_id', 'Noticia.usuario_id', 'Noticia.bloqueado'));
            if(!$this->isAllowed($conteudo['Noticia']['id'], false, false, 'Noticia')
                || !$this->MidiasConteudo->Noticia->isAllowed($this->Auth->user('Perfil'), $conteudo['Noticia']['categoria_id'])
                || ($conteudo['Noticia']['bloqueado'] == 1 && $conteudo['Noticia']['usuario_id'] !=$this->Auth->user('id')))
                return false;

            $midiaConteudo = $this->MidiasConteudo->find('count', array('conditions' => array('midia_id' => $midia_id, 'noticia_id' => $conteudo_id)));
        } else {
            $this->MidiasConteudo->Pagina->id = $conteudo_id;
            $conteudo = $this->MidiasConteudo->Pagina->read(array('site_id'));
            if(!$this->isAllowed($conteudo['Pagina']['id'], false, false, 'Pagina'))
                return false;
            $midiaConteudo = $this->MidiasConteudo->find('count', array('conditions' => array('midia_id' => $midia_id, 'pagina_id' => $conteudo_id)));
        }

        if($midia_id && $midiaConteudo == 0)
            return false;

        return true;
    }
}