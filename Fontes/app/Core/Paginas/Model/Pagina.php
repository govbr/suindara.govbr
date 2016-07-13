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

App::uses('PaginasAppModel', 'Paginas.Model');
App::uses('Status', 'Paginas.Model');

class Pagina extends PaginasAppModel {

	const STATUS_ATIVA  = 3;
	const STATUS_INATIVA = 4;
	
	public $displayField = 'titulo';

	public $belongsTo = array('Status' => array('className' => "Paginas.Status", 'foreignKey' => 'status_id'),
							  'Site' => array('className' => "Sites.Site", 'foreignKey' => 'site_id'),
							  'Usuario' => array('className' => "Usuarios.Usuario", 'foreignKey' => 'usuario_id'));
	
	public $hasMany = array(
        'MidiasConteudo' => array(
            'className' => 'Midias.MidiasConteudo',
            'dependent' => true
        ),
        
    );
	
	public $hasAndBelongsToMany = array(
		'GruposBanners' => array(
			'className' => 'Banners.Grupo',
			'joinTable' => 'pagina_grpbanners',
			'foreignKey' => 'pagina_id',
			'associationForeignKey'  => 'grupo_id',
		),
		'ImagemPrincipal' => array(
			'className' => 'Midias.Midia',
	        'joinTable' => 'midias_pn',
	        'foreignKey' => 'pagina_id',
	        'associationForeignKey' => 'midia_id',
	        'unique' => true,
	        'conditions' => array('ImagemPrincipal.tipo_id' => IMAGEM, 'ImagemPrincipal.ativa' => 1, 'MidiasPn.destaque' => 1)
        ),
        'Midias' => array(
			'className' => 'Midias.Midia',
	        'joinTable' => 'midias_pn',
	        'foreignKey' => 'pagina_id',
	        'associationForeignKey' => 'midia_id',
	        'unique' => true,
	        'conditions' => array('Midias.tipo_id <>' => ARQUIVO, 'Midias.ativa' => 1, 'MidiasPn.destaque' => 0),
	        'order' => 'MidiasPn.posicao ASC'
        ),
    	'Imagens' => array(
			'className' => 'Midias.Midia',
	        'joinTable' => 'midias_pn',
	        'foreignKey' => 'pagina_id',
	        'associationForeignKey' => 'midia_id',
	        'unique' => true,
	        'conditions' => array('Imagens.tipo_id' => IMAGEM, 'Imagens.ativa' => 1, 'MidiasPn.destaque' => 0),
	        'order' => 'MidiasPn.posicao ASC'
        ),
        'Arquivos' => array(
			'className' => 'Midias.Midia',
	        'joinTable' => 'midias_pn',
	        'foreignKey' => 'pagina_id',
	        'associationForeignKey' => 'midia_id',
	        'unique' => true,
	        'conditions' => array('Arquivos.tipo_id' => ARQUIVO, 'Arquivos.ativa' => 1),
	        'order' => 'MidiasPn.posicao ASC'
        ),
        'Audios' => array(
			'className' => 'Midias.Midia',
	        'joinTable' => 'midias_pn',
	        'foreignKey' => 'pagina_id',
	        'associationForeignKey' => 'midia_id',
	        'unique' => true,
	        'conditions' => array('Audios.tipo_id' => AUDIO, 'Audios.ativa' => 1),
	        'order' => 'MidiasPn.posicao ASC'
        ),
        'Videos' => array(
			'className' => 'Midias.Midia',
	        'joinTable' => 'midias_pn',
	        'foreignKey' => 'pagina_id',
	        'associationForeignKey' => 'midia_id',
	        'unique' => true,
	        'conditions' => array('Videos.tipo_id' => VIDEO, 'Videos.ativa' => 1),
	        'order' => 'MidiasPn.posicao ASC'
        )
	);
	

	public $name = 'Pagina';

	
	public $validate = array(
		'titulo'			=> array('rule' => 'notEmpty', 'message' => PAGINA_FORM_TITULO),
		'texto'  => array('rule' => array('between', 0, 50000), 'allowEmpty' => false,  'message' => 'O texto não pode estar vazio e deve conter no máximo 50000 caracteres'),
		//'texto' 			=> array('rule' => '/.*/','allowEmpty' => false, 'message' => PAGINA_FORM_TEXTO),
		//'datahora_cadastro' => array('rule' => array('datetime'), 'allowEmpty' => true), 
		//'usuario_id'		=> array('rule' => 'numeric', 'required' => true),
		'status_id'			=> array('rule' => 'numeric', 'allowEmpty' => true),
		'site_id'			=> array('rule' => 'numeric', 'allowEmpty' => true),
	
	);
	
	
	public function beforeSave($options = array()) {
		if (!isset($this->data['Pagina']['datahora_cadastro'])
			||$this->data['Pagina']['datahora_cadastro'] == '0000-00-00 00:00:00'
		    || $this->data['Pagina']['datahora_cadastro'] == null) {
			$this->data['Pagina']['datahora_cadastro'] = $this->hoje();
		} 
		
		return true;
	}
	
	/**
	 * Retorna a data no momento da publicação
	 */
	protected function hoje() {
		return date('Y-m-d h:i:s', time());
	}
		
}