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
App::uses('TipoEditalAppModel', 'TipoEditais.Model');

class TipoEdital extends TipoEditalAppModel{

	public $name = 'TipoEdital';

	public $actsAs = array('Tree');

    public $useTable = 'tipo_editais';
	
	public $displayField = 'titulo';

	public $virtualFields = array('virtualField' => 'TipoEdital.id');

    public $hasMany = array(
        'Edital' => array(
            'className' => 'TipoEditais.Edital',
            'dependent' => false
        )
    );

	public $validate = array(
		'titulo' => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Campo título não foi preenchido'
			),

            'maxLength' => array(
            	'rule'    => array('maxLength', '45'),
        		'message' => 'Títulos de categoria não podem ter mais que 45 caracteres.'
        	),

        	'isUnique' => array (
            	'rule'    => array('checkUniqueNomePerSite'),
            	'message' => 'Este título já existe.'
        	)

		),

		'descricao' => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Campo descrição não foi preenchido'
			),

			'maxLength' => array(
            	'rule'    => array('maxLength', '250'),
        		'message' => 'Descrição da categoria não podem ter mais que 250 caracteres.'
        	)
		)

	);

	function checkUniqueNomePerSite() {
        $nameModel = get_class($this);

        $titulo = $this->data[$nameModel]['titulo'];
        $site_id = $this->data[$nameModel]['site_id'];

        if( !empty($this->data[$nameModel]['id']) ){
            $id = $this->data[$nameModel]['id'];

            $count = $this->find('count', array(
                'conditions' => array(
                    $nameModel . '.id !='   => $id,
                    $nameModel . '.titulo'    => $titulo,
                    $nameModel . '.site_id' => $site_id
                    )
                ) 
            );
        }else{
            $count = $this->find('count', array(
                'conditions' => array(
                    $nameModel . '.titulo' => $titulo,
                    $nameModel . '.site_id' => $site_id
                    )
                ) 
            );
        }

        if($count > 0){
            return false;
        }else{
            return true;
        }
    }

    public function beforeDelete($cascade = false){
        $this->tipoEdital = $this->read();

        $id = $this->tipoEdital['TipoEdital']['id'];

        $this->requestAction(array('plugin' => 'editais', 
                                    'controller' => 'editais', 
                                    'action' => 'ra_removeIdEdital',
                                    'admin' => true, $id));

        return true;
    }

	public function beforeSave($options = array()){
		$identificador = $this->data['TipoEdital']['titulo'];
		$this->data['TipoEdital']['identificador'] = strtolower ( Inflector::slug($identificador) );
	}
 	
}



