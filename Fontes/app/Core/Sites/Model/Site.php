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
App::uses('SiteAppModel', 'Sites.Model');

class Site extends SiteAppModel{

	public $name = 'Site';

    public $displayField = 'titulo';

    public $belongsTo = array('Templates.Template');

	public $validate = array(
		'titulo' => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Campo título não foi preenchido'
			),

            'maxLength' => array(
            	'rule' => array('maxLength', '45'),
        		'message' => 'Campo titulo não pode ter mais que 45 caracteres.'
        	)

		),

		'descricao' => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Campo descrição não foi preenchido'
			),

			'maxLength' => array(
            	'rule' => array('maxLength', '100'),
        		'message' => 'Campo descrição não pode ter mais que 100 caracteres.'
        	)
		),

		'dominio' => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Campo domínio não foi preenchido'
			),

			'maxLength' => array(
            	'rule' => array('maxLength', '100'),
        		'message' => 'Campo domínio não pode ter mais que 100 caracteres.'
        	),

      //   	'website' => array(
      //   		'rule' => 'url',
      //   		'message' => 'Dominio preenchido é inválido'
    		// )
		),

		'instituicao' => array(
			'maxLength' => array(
            	'rule' => array('maxLength', '100'),
            	'allowEmpty' => true,
        		'message' => 'Campo instituição não pode ter mais que 100 caracteres.'
        	)
		),

		'palavras_chave' => array(
			'maxLength' => array(
            	'rule' => array('maxLength', '100'),
            	'allowEmpty' => true,
        		'message' => 'Campo palavras-chave chave não pode ter mais que 100 caracteres.'
        	),

        	'pattern' => array(
        		'rule' => '/^([A-ZÀ-Úa-zà-ú0-9\s])*(,[A-ZÀ-Úa-zà-ú0-9\s]+)*$/',
        		'message' => 'Utilizar somente vírgulas para separar as palavras'
        	)

		),

		'endereco' => array(
			'maxLength' => array(
            	'rule' => array('maxLength', '100'),
            	'allowEmpty' => true,
        		'message' => 'Campo endereco não pode ter mais que 100 caracteres.'
        	)
		),

		'email_contato' => array(
			'maxLength' => array(
            	'rule' => array('maxLength', '100'),
            	'allowEmpty' => true,
        		'message' => 'Campo email de contato não pode ter mais que 100 caracteres.'
        	),

        	'email' => array(
        		'rule'    => array('email', false),
        		'message' => 'Email preenchido é inválido',
        		'allowEmpty' => true
    		)
		),

	);

	function beforeSave( $options = array() ){
		// Validations
		$this->data['Site']['titulo'] = trim($this->data['Site']['titulo']);

		$dominio = $this->data['Site']['dominio'];
		$dominio = trim($dominio);
		$this->data['Site']['dominio'] = $dominio;
		
		$email_contato = $this->data['Site']['email_contato'];
		$email_contato = strtolower($email_contato);
		$email_contato = trim($email_contato);
		$this->data['Site']['email_contato'] = $email_contato;
	}

}



