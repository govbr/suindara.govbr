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
App::uses('CategoriaAppModel', 'Categorias.Model');

class Categoria extends CategoriaAppModel{

	public $name = 'Categoria';

	public $actsAs = array('Tree');
	
	public $displayField = 'titulo';

	public $virtualFields = array('virtualField' => 'Categoria.id');

	public $hasAndBelongsToMany = array(
        'Perfil' =>
            array(
                'className'              => 'Perfis.Perfil',
                'joinTable'              => 'categoria_perfis',
                'foreignKey'             => 'categoria_id',
                'associationForeignKey'  => 'perfil_id',
                'unique'                 => 'keepExisting'
            )
		
    );
	
    public $hasMany = array('Categorias.CategoriaPerfil');

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
            	'rule'    => array('checkUniqueTitulo'),
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
		),

		'perfil_id' => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Perfil não pode ficar em branco'
			)
		)

	);

	function checkUniqueTitulo() {
		$parent = (!$this->data['Categoria']['parent_id']) ? 0 : $this->data['Categoria']['parent_id'];
		
		$count = $this->find('count', array(
			'conditions' => array(
					'Categoria.titulo' => $this->data['Categoria']['titulo'], 
					'Categoria.parent_id' => $parent,
					'Categoria.site_id' => $this->data['Categoria']['site_id'] 
				)
			)
		);
		
		if(!$this->data['Categoria']['id'])
			return ($count == 0);

		if($count > 0) {
			$categorias = $this->find('list', array(
				'conditions' => array(
						'Categoria.titulo' => $this->data['Categoria']['titulo'], 
						'Categoria.parent_id' => $parent,
						'Categoria.site_id' => $this->data['Categoria']['site_id'] 
					)
				)
			);
			if (!array_key_exists($this->data['Categoria']['id'], $categorias))
				return false;
		}
		
		return true;
	}

	function beforeSave($options = array()){
		if(!isset($this->data['Perfil']) ){
			$this->data['Perfil'] = array(array(''));
		}
		$identificador = $this->data['Categoria']['titulo'];
		$this->data['Categoria']['identificador'] = strtolower ( Inflector::slug($identificador) );
	}
 	
}



