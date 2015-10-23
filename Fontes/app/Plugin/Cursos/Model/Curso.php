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

App::uses('CursosAppModel', 'Cursos.Model');

class Curso extends CursosAppModel{

	public $name = 'Curso';
    
    public $displayField = 'nome';

    //public $belongsTo = array('Modalidades.Modalidade');
    public $belongsTo = array('Cursos.Modalidade');

    public $hasAndBelongsToMany = array(
            'Arquivos' => array(
            'className' => 'Midias.Midia',
            'joinTable' => 'midias_pn',
            'foreignKey' => 'curso_id',
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
	 	'nome' => array(
	 		'notEmpty' => array(
	 			'rule'    => 'notEmpty',
	 			'message' => 'Campo nome não foi preenchido'
	 		),

            'maxLength' => array(
            	'rule' => array('maxLength', '99'),
        		'message' => 'Campo nome não pode ter mais que 100 caracteres.'
        	),

            'isUnique' => array (
                'rule'    => array('checkUniqueNomePerSite'),
                'message' => 'Este nome já existe.'
            )
		),

		'duracao' => array(
	 		'notEmpty' => array(
	 			'rule'    => 'notEmpty',
	 			'message' => 'Campo duração não foi preenchido'
	 		),

            'maxLength' => array(
            	'rule' => array('decimal'),
        		'message' => 'Campo duração apenas números'
        	)
		),


        'tipo_duracao' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Precisa preencher pelo menos um radio button.'
            )
        ),

        'nome_coordenador' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '99'),
                'message' => 'Campo nome do coordenador não pode ter mais que 100 caracteres.',
                'allowEmpty' => true
            )
        ),        

        'email_coordenador' => array(
            'email' => array(
                'rule' => array('email'),
                'message' => 'Informe um endereço de e-mail válido',
                'allowEmpty' => true
            )
        ),

        'pre_requisito' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '99'),
                'message' => 'Campo pré-requisito não pode ter mais que 100 caracteres.',
                'allowEmpty' => true
            )
        ),

        'formas_ingresso' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '99'),
                'message' => 'Campo formas de ingresso não pode ter mais que 100 caracteres.',
                'allowEmpty' => true
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

    
    public function checkUniqueNomePerSite() {
        $nameModel = get_class($this);

        $nome = $this->data[$nameModel]['nome'];
        $site_id = $this->data[$nameModel]['site_id'];

        if( !empty($this->data[$nameModel]['id']) ){
            $id = $this->data[$nameModel]['id'];

            $count = $this->find('count', array(
                'conditions' => array(
                    $nameModel . '.id !='   => $id,
                    $nameModel . '.nome'    => $nome,
                    $nameModel . '.site_id' => $site_id
                    )
                ) 
            );
        }else{
            $count = $this->find('count', array(
                'conditions' => array(
                    $nameModel . '.nome' => $nome,
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

    // public function emailPersonalizado(){
    //     $nameModel = get_class($this);

    //     $email = $this->data[$nameModel]['email_coordenador'];

    //     if( !empty($email) ){
    //         // verificar se está correto o email
    //         // caso não estiver retornar false
    //         // Ver como usar o metodo email do cakephp - lib/Cake/Utility/Validation
    //     }

    //     return true;
    // }


    public function beforeDelete($cascade = true) {
        $this->curso = $this->read();
        return true;
    }

    public function afterDelete() {
        $id = $this->curso['Cursos']['id'];

        //request action para midias deletar a imagem

        return true;
    }

}