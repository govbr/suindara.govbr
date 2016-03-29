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

App::uses('NoticiasAppModel', 'Noticias.Model');
App::uses('Status', 'Noticias.model');
//App::uses('Usuario', 'Usuario.Usuario');
class Noticia extends NoticiasAppModel {

	const STATUS_PUBLICO  = 1;
	const STATUS_RASCUNHO = 2;

	public $belongsTo = array(
		'Status' => array(
			'className' => "Noticias.Status",
			'foreignKey' => 'status_id'
			),
		'Categoria' => array(
			'className' => "Categorias.Categoria",
			'foreignKey' => 'categoria_id'
			),
		);

	// public $hasMany = array(
 //        'MidiasConteudo' => array(
 //            'className' => 'Midias.MidiasConteudo',
 //            'dependent' => true
 //        )
 //    );

    public $hasAndBelongsToMany = array(
    	'ImagemPrincipal' => array(
			'className' => 'Midias.Midia',
	        'joinTable' => 'midias_pn',
	        'foreignKey' => 'noticia_id',
	        'associationForeignKey' => 'midia_id',
	        'unique' => true,
	        'conditions' => array('ImagemPrincipal.tipo_id' => IMAGEM, 'ImagemPrincipal.ativa' => 1, 'MidiasPn.destaque' => 1)
        ),
        'Midias' => array(
			'className' => 'Midias.Midia',
	        'joinTable' => 'midias_pn',
	        'foreignKey' => 'noticia_id',
	        'associationForeignKey' => 'midia_id',
	        'unique' => true,
	        'conditions' => array('Midias.tipo_id <>' => ARQUIVO, 'Midias.ativa' => 1, 'MidiasPn.destaque' => 0),
	        'order' => 'MidiasPn.posicao ASC'
        ),
    	'Imagens' => array(
			'className' => 'Midias.Midia',
	        'joinTable' => 'midias_pn',
	        'foreignKey' => 'noticia_id',
	        'associationForeignKey' => 'midia_id',
	        'unique' => true,
	        'conditions' => array('Imagens.tipo_id' => IMAGEM, 'Imagens.ativa' => 1, 'MidiasPn.destaque' => 0),
	        'order' => 'MidiasPn.posicao ASC'
        ),
        'Arquivos' => array(
			'className' => 'Midias.Midia',
	        'joinTable' => 'midias_pn',
	        'foreignKey' => 'noticia_id',
	        'associationForeignKey' => 'midia_id',
	        'unique' => true,
	        'conditions' => array('Arquivos.tipo_id' => ARQUIVO, 'Arquivos.ativa' => 1),
	        'order' => 'MidiasPn.posicao ASC'
        ),
        'Audios' => array(
			'className' => 'Midias.Midia',
	        'joinTable' => 'midias_pn',
	        'foreignKey' => 'noticia_id',
	        'associationForeignKey' => 'midia_id',
	        'unique' => true,
	        'conditions' => array('Audios.tipo_id' => AUDIO, 'Audios.ativa' => 1),
	        'order' => 'MidiasPn.posicao ASC'
        ),
        'Videos' => array(
			'className' => 'Midias.Midia',
	        'joinTable' => 'midias_pn',
	        'foreignKey' => 'noticia_id',
	        'associationForeignKey' => 'midia_id',
	        'unique' => true,
	        'conditions' => array('Videos.tipo_id' => VIDEO, 'Videos.ativa' => 1),
	        'order' => 'MidiasPn.posicao ASC'
        )
    );

	public $name = 'Noticia';

	public $validate_rascunho = array(
		'titulo'			=> array('rule' => 'notEmpty', 'message' => NOTICIA_FORM_TITULO),
		'resumo' => array('rule' => array('between', 0, 1000), 'allowEmpty' => true, 'message' => 'O resumo não pode conter mais de 1000 caracteres'),
    	'texto'  => array('rule' => array('between', 0, 20000), 'allowEmpty' => true, 'message' => 'O texto não pode conter mais de 20000 caracteres'),
		//'resumo'   			=> array('rule' => '/.*/','allowEmpty' => true),
		//'texto' 			=> array('rule' => '/.*/','allowEmpty' => true),
		'datahora_prog_pub' => array('rule' => array('datetime'), 'allowEmpty' => true), 
		'datahora_prog_exp'	=> array('DateTimeTest' => array('rule' => array('datetime'), 'allowEmpty' => true),
									 'ComparisonTest' => array('rule' => array('field_comparison', '>=', 'datahora_prog_pub'),
									 	'allowEmpty' => true, 'message' => 'Data e hora da expiração não pode ser igual ou inferior a de publicação')),
		'categoria_id'		=> array('rule' => 'numeric', 'allowEmpty' => true),
		'autor'				=> array('rule' => '/.*/','allowEmpty' => true),
		'status_id'			=> array('rule' => 'numeric', 'allowEmpty' => true),
		'cartola' 			=> array('rule' => '/.*/','allowEmpty' => true)
	);
	
	public $validate_publicar = array(
		'titulo'			=> array('rule' => 'notEmpty', 'message' => NOTICIA_FORM_TITULO),
		
        'resumo' => array('rule' => array('between', 0, 1000), 'allowEmpty' => false, 'message' => 'O resumo não pode estar vazio e deve conter no máximo 1000 caracteres'),
    	'texto'  => array('rule' => array('between', 0, 10000), 'allowEmpty' => false,  'message' => 'O texto não pode estar vazio e deve conter no máximo 10000 caracteres'),
		//'resumo'   			=> array('rule' => 'notEmpty', 'message' => NOTICIA_FORM_RESUMO),
		//'texto' 			=> array('rule' => 'notEmpty', 'message' => NOTICIA_FORM_TEXTO),
		'datahora_prog_pub' => array('rule' => array('datetime'), 'allowEmpty' => true), 
		'datahora_prog_exp'	=> array('DateTimeTest' => array('rule' => array('datetime'), 'allowEmpty' => true),
									 'ComparisonTest' => array('rule' => array('field_comparison', '>', 'datahora_prog_pub'),
									 	'allowEmpty' => true, 'message' => NOTICIA_FORM_DATAPROGEXP)),
		'categoria_id'		=> array('rule' => 'numeric', 'required' => true),
		'autor'				=> array('rule' => 'notEmpty', 'message' => NOTICIA_FORM_AUTOR),
		'status_id'			=> array('rule' => 'numeric', 'required' => true),
		'cartola' 			=> array('rule' => 'notEmpty', 'message' => NOTICIA_FORM_CARTOLA)
	
	);
	 
	
	public function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);	
		$this->validateLikeRascunho();
	}
	
	public function field_comparison($check1, $operator, $field2) {
        foreach($check1 as $key=>$value1) {
            $value2 = $this->data[$this->alias][$field2];
            if (!Validation::comparison($value1, $operator, $value2))
                return false;
        }
        return true;
    }
	
	public function saveAsPublicacao(array $data) {
		$this->validateLikePublicacao();
		$data['Noticia']['status_id'] = Noticia::STATUS_PUBLICO;
		return $this->save($data);
	}
	
	public function saveAsRascunho(array $data) {
		$this->validateLikeRascunho();
		$data['Noticia']['status_id'] = Noticia::STATUS_RASCUNHO;
		return $this->save($data);
	}
	
	public function validateLikeRascunho() {
		$this->validate = $this->validate_rascunho;
	}
	
	public function validateLikePublicacao() {
		$this->validate = $this->validate_publicar;
	}
	

	public function beforeValidate($options = array()) {
		 if (!isset($this->data['Noticia']['agendar']) || !$this->data['Noticia']['agendar']) {
			 unset($this->data['Noticia']['datahora_prog_pub']);
			 unset($this->data['Noticia']['datahora_prog_exp']);
		 }
	}
	
	/**
	 * - Grava a data de publicação da notícia
	 */
	public function beforeSave($options = array()) {
		
		$noticiaAntiga = $this->findById($this->id);
		
		
		if (!$noticiaAntiga) {	
			$this->data['Noticia']['datahora_publicacao'] = $this->hoje();
		} else {
		
			if (isset($this->data['Noticia']['agendar']) 
			    && !$this->data['Noticia']['agendar'] 
			    && $this->data['Noticia']['status_id'] == Noticia::STATUS_PUBLICO) {
			    	
				$this->data['Noticia']['datahora_prog_pub'] = $this->hoje();	
			}
		}
		
		// if (isset($this->data['Noticia']['agendar']) && $this->data['Noticia']['agendar']) {
			// if ($datahora_publicacao == null)
				// $this->data['Noticia']['datahora_publicacao'] = $this->hoje();//$this->data['Noticia']['datahora_prog_pub'];
// 			
		// } else if ($this->data['Noticia']['status_id'] == Noticia::STATUS_PUBLICO) {
			// if ($datahora_publicacao == null)
				// $this->data['Noticia']['datahora_publicacao'] = $this->hoje();
			// $this->data['Noticia']['datahora_prog_pub'] = $this->data['Noticia']['datahora_publicacao']; 
		// } else {
			// if ($datahora_publicacao == null)
				// $this->data['Noticia']['datahora_publicacao'] = $this->hoje();
		// }
		
		
		return true;
	}
	
	/**
	 * Retorna a data no momento da publicação
	 */
	protected function hoje() {
		return date('Y-m-d h:i:s', time());
	}

	

	public function isAllowed($perfis, $categoria) {
		$permissao = $this->Categoria->CategoriaPerfil->find('count', array(
			'conditions' => array(
				'categoria_id' => $categoria,
				'perfil_id' => $perfis,
				'OR' => array(
					'adicionar' => 1,
					'editar' => 1
					)
				)
			)
		);

		if($permissao)
			return true;

		return false;
	}
}