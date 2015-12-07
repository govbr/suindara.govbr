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

App::uses('ConfigurAppModel', 'Configuracoes.Model');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
App::import('Component', 'SessionComponent');

class Configuracao extends ConfiguracoesAppModel{

	public $name = 'Configuracao';

	public $useTable = 'configuracoes';

	public $validate = array(
		'tempo_sessao' => array(
            'maxLength' => array(
            	'rule' => array('maxLength', '6'),
        		'message' => 'Campo tempo máximo de sessão não pode ter mais que 6 caracteres.'
        	),

            'numeros' => array(
                'rule' => 'numeric',
                'message' => 'Apenas numeros'
            )
		),

		'upload_tamanho' => array(
            'maxLength' => array(
            	'rule' => array('maxLength', '4'),
        		'message' => 'Campo tamanho máximo do upload não pode ter mais que 4 caracteres.'
        	),

            'numeros' => array(
            	'rule' => 'numeric',
        		'message' => 'Apenas numeros'
        	)
		),

		'memoria_tamanho' => array(
            'maxLength' => array(
            	'rule' => array('maxLength', '4'),
        		'message' => 'Campo memória não pode ter mais que 4 caracteres.'
        	),

            'numeros' => array(
            	'rule' => 'numeric',
        		'message' => 'Apenas numeros'
        	)
		),

        'post_tamanho' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '4'),
                'message' => 'Campo envio não pode ter mais que 4 caracteres.'
            ),

            'numeros' => array(
                'rule' => 'numeric',
                'message' => 'Apenas numeros'
            )
        )
	);

    public function beforeValidate($options = array()){
        if(!$this->data['Configuracao']['tempo_sessao']){
            unset($this->data['Configuracao']['tempo_sessao']);
        }

        if(!$this->data['Configuracao']['upload_tamanho']){
            unset($this->data['Configuracao']['upload_tamanho']);
        }

        if(!$this->data['Configuracao']['memoria_tamanho']){
            unset($this->data['Configuracao']['memoria_tamanho']);
        }

        if(!$this->data['Configuracao']['post_tamanho']){
            unset($this->data['Configuracao']['post_tamanho']);
        }

        return true;
    }

    public function beforeSave($options = array()){

        ( isset($this->data['Configuracao']['tempo_sessao']) ) ? $tempoSessao = trim($this->data['Configuracao']['tempo_sessao']) : $tempoSessao = null;
        ( isset($this->data['Configuracao']['upload_tamanho']) ) ? $uploadTamanho = trim($this->data['Configuracao']['upload_tamanho']) : $uploadTamanho = null;
        ( isset($this->data['Configuracao']['memoria_tamanho']) ) ? $memoriaTamanho = trim($this->data['Configuracao']['memoria_tamanho']) : $memoriaTamanho = null;
        ( isset($this->data['Configuracao']['post_tamanho']) ) ? $postTamanho = trim($this->data['Configuracao']['post_tamanho']) : $postTamanho = null;

        $path = ROOT . DS . '.htaccess';
        $file = new File($path);
        $contents = $file->read();

        if($uploadTamanho){
            $start = strpos($contents, "php_value upload_max_filesize");
            $end = strpos($contents, "php_value memory_limit");

            ini_set('upload_max_filesize', $uploadTamanho . 'M');

            $contents = substr_replace($contents, "php_value upload_max_filesize {$uploadTamanho}M \n", $start, ($end - $start - 1));
        }

        if($memoriaTamanho){
            $start = strpos($contents, "php_value memory_limit");
            $end = strpos($contents, "php_value post_max_size");

            ini_set('memory_limit', $memoriaTamanho . 'M');

            $contents = substr_replace($contents, "php_value memory_limit {$memoriaTamanho}M \n", $start, ($end - $start - 1));
        }

        if($postTamanho){
            $start = strpos($contents, "php_value post_max_size");
            $end = strpos($contents, "</IfModule>");

            ini_set('post_max_size', $postTamanho . 'M');

            $contents = substr_replace($contents, "php_value post_max_size {$postTamanho}M", $start, ($end - $start - 1));
        }

        file_put_contents($path, $contents);
        //$file->write($contents);
        $file->close();

        return true;
    }

}