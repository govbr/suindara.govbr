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

App::uses('EditaisAppModel', 'Editais.Model');

class Edital extends EditaisAppModel{

	public $name = 'Edital';
    
    public $displayField = 'titulo';

    public $belongsTo = array('Editais.TipoEdital');

    public $hasAndBelongsToMany = array(
            'Arquivos' => array(
            'className' => 'Midias.Midia',
            'joinTable' => 'midias_pn',
            'foreignKey' => 'edital_id',
            'associationForeignKey' => 'midia_id',
            'unique' => true,
            'conditions' => array('Arquivos.tipo_id' => ARQUIVO, 'Arquivos.ativa' => 1),
            'order' => 'MidiasPn.posicao ASC'
        )
    );

    // public $hasMany = array(
    //     'MidiasConteudo' => array(
    //         'className' => 'Midias.MidiasConteudo',
    //         'dependent' => true
    //     )
    // );

	public $validate = array(
	 	'titulo' => array(
	 		'notEmpty' => array(
	 			'rule'    => 'notEmpty',
	 			'message' => 'Campo titulo não foi preenchido'
	 		),

            'maxLength' => array(
            	'rule' => array('maxLength', '99'),
        		'message' => 'Campo titulo não pode ter mais que 100 caracteres.'
        	),

            'isUnique' => array (
                'rule'    => array('checkUniqueTituloPerSite'),
                'message' => 'Este titulo já existe.'
            )
		)

            // 'arquivo' => array(
            //     'rule'       => array('extension',array('pdf','doc')),
            //     'required'   => 'create',
            //     'allowEmpty' => true,
            //     'message'    => 'Uma arquivo não foi escolhido ou a extensão não é válida',
            //     'on'         => 'create',
            //     'last'       => true
            // )
	 );

    
    public function checkUniqueTituloPerSite() {
        $nameModel = get_class($this);

        $titulo = $this->data[$nameModel]['titulo'];
        $site_id = $this->data[$nameModel]['site_id'];

        if( !empty($this->data[$nameModel]['id']) ){
            $id = $this->data[$nameModel]['id'];

            $count = $this->find('count', array(
                'conditions' => array(
                    $nameModel . '.id !='   => $id,
                    $nameModel . '.titulo'  => $titulo,
                    $nameModel . '.site_id' => $site_id
                    )
                ) 
            );
        }else{
            $count = $this->find('count', array(
                'conditions' => array(
                    $nameModel . '.titulo'  => $titulo,
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

    public function beforeDelete($cascade = true) {
        $this->edital = $this->read();
        return true;
    }

    public function afterDelete() {

        $id = $this->edital['Edital']['id'];
        return true;
    }

}