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

App::uses('MenusAppModel', 'Menus.Model');

class MenuItem extends MenusAppModel{

	public $name = 'MenuItem';

	public $actsAs = array('Tree');
	
	public $displayField = 'nome';

    public $order = array('MenuItem.lft' => 'ASC');

    public $virtualFields = array('virtualField' => 'MenuItem.id');

    public $belongsTo = array('Menus.Menu', 'Menus.BmTipo', 'Menus.Categoria', 'Menus.Pagina');

	public $validate = array(
		'nome' => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Campo título não foi preenchido'
			),

            'maxLength' => array(
            	'rule' => array('maxLength', '45'),
        		'message' => 'Campo título não podem ter mais que 45 caracteres.',
        	)
		),

		'menu_id' => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Menu inválido'
			)			
		),

		'link' => array(
            'notEmpty' => array(
                'rule'    => 'notEmpty',
                'message' => 'Campo link destino não foi preenchido'
            )
        ),

        'pagina_id' => array(
            'notEmpty' => array(
                'rule'    => 'notEmpty',
                'message' => 'Campo não pode ser deixado em branco'
            )
        ),

        'categoria_id' => array(
            'notEmpty' => array(
                'rule'    => 'notEmpty',
                'message' => 'Campo não pode ser deixado em branco'
            )
        ),

        'identificador' => array(
            'notEmpty' => array(
                'rule'    => 'notEmpty',
                'message' => 'Campo identificador não pode ser deixado em branco'
            ),

             'maxLength' => array(
                'rule' => array('maxLength', '45'),
                'message' => 'Campo identificador não pode ter mais que 45 caracteres.'
            ),

            'unique' => array(
                "rule"=>array("checkUnique", array("menu_id", "identificador")), 
                'required' => 'create',
                'message' => 'O identificador já foi utilizado, favor informar outro identificador'
            ), 
        )
	);
    

    /*
     * Verificar se um item de menu já existe neste site
     */
    function checkUnique($data, $fields) { 

        $site = $_SESSION['Auth']['User']['SiteAtual']['Site']['id'];

        $identificador = null;
        $idPais = array();

        if (!is_array($fields)) { 
                $fields = array($fields); //menu_id e identificador
        }

        foreach($fields as $key) { 
            if($key == 'identificador'){
                $identificador = Inflector::slug($this->data[$this->name][$key]); 
            }
        }

        $itens = $this->find('all', array('conditions' => array('MenuItem.identificador' => $identificador)));

        foreach ($itens as $key => $value) {
            $idPais[] = $value['MenuItem']['menu_id'];
        }

        $idPais = array_unique($idPais);        

        $menuId = $this->Menu->find('list', array(
            'fields' => array('id'),
            'conditions' => array(
                'AND' => array(
                    'Menu.id' => $idPais,
                    'Menu.site_id' => $site
                )
            )
        ));

        if($menuId){
            return false;
        }else{
            return true;
        }
    } 

    public function beforeSave($options = array()) {
        if(isset($this->data['MenuItem']['identificador'])){
            $identificador = $this->data['MenuItem']['identificador'];
            $this->data['MenuItem']['identificador'] = strtolower ( Inflector::slug($identificador) );
        }
        
        return true;
    }

}

