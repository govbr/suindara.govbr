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

App::uses('MidiasAppModel', 'Midias.Model');

class Mime extends MidiasAppModel {

	public $name = 'Mime';

	public $belongsTo = array('Midias.Tipo');

	public $findMethods = array('allowed' =>  true);

	public $validate = array(
		'mime' => array(
			'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Campo mime não foi preenchido'
            )
        ),
        'tipo' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Selecione uma opção'
            ),
            'naturalNumber' => array(
		        'rule' => 'naturalNumber',
		        'message' => 'Valor incorreto para o campo'
		    )
        ),
        'extensao' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Campo extensão não foi preenchido'
            ),

        'format' => array(
                'rule' => '/(^[a-zA-Z0-9]+$)|(^\.[a-zA-Z0-9]+$)/',
                'message' => 'Extensão inválida ou com formato incorreto, utilizar o padrão ".pdf" ou "pdf"'
            )

        ),
        'ativo' => array(
            'boolean' => array(
                'rule'    => array('boolean'),
        		'message' => 'Valor incorreto para o campo'
            )
        )
	);

    public function beforeSave($options = array()) {
        if (isset($this->data['Mime']['extensao'])) {
            $temp = preg_replace('/\./', '', strtolower($this->data['Mime']['extensao']));
            $this->data['Mime']['extensao'] = $temp;
        }
    }

	protected function _findAllowed($state, $query, $results = array()) {
		if ($state === 'before') {
			$query['fields'] = array('Mime.id', 'Mime.mime');
			$list = array("{n}.Mime.id", "{n}.Mime.mime", null);
            $query['conditions']['Mime.ativo'] = 1;
            $query['recursive'] = -1;
            list($query['list']['keyPath'], $query['list']['valuePath'], $query['list']['groupPath']) = $list;
            return $query;
        } elseif ($state === 'after') {
			if (empty($results)) {
				return array();
			}
        	return Hash::combine($results, $query['list']['keyPath'], $query['list']['valuePath'], $query['list']['groupPath']);
        }
	}
}