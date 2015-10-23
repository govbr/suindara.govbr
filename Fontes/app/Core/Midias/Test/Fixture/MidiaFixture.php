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

  class MidiaFixture extends CakeTestFixture {
    
    public $useDbConfig = 'test'; 
      
    public $fields = array(
        'id' => array(
          'type' => 'integer',
          'key' => 'primary'
        ),
        'titulo' => array(
          'type' => 'string',
          'null' => false,
          'length' => '50'
        ),
        'descricao' => array(
          'type' => 'text',
          'null' => false
        ),
        'arquivo' => array(
          'type' => 'string',
          'null' => false,
          'length' => '37'
        ),
        'fonte' => array(
          'type' => 'string',
          'null' => false,
          'length' => '250'
        ),
        'tipo_id' => array(
          'type' => 'integer',
          'null' => false
        ),
        'versao_textual' => array(
          'type' => 'text',
          'null' => false
        ),
        'tamanho' => array(
          'type' => 'integer',
          'null' => false,
          'length' => '11'
        ),
        'mime_id' => array(
          'type' => 'integer',
          'null' => false
        ),
        'banco_imagens' => array(
          'type' => 'binary',
          'null' => false
        )
    );
    
    public $records = array(
      array(
        'id' => 1,
        'titulo' => 'Primeira mídia',
        'descricao' => 'Primeira mídia de teste',
        'arquivo' => 'bf19122987928493131d5bf846637fbc.jpg',
        'fonte' => 'Google',
        'tipo_id' => 1,
        'versao_textual' => 'Texto explicativo do conteúdo da mídia, deveria ser mais extenso :)',
        'tamanho' => '100000',
        'mime_id' => 1,
        'banco_imagens' => 0
      ),
      array(
        'id' => 2,
        'titulo' => 'Segunda mídia',
        'descricao' => 'Segunda mídia de teste',
        'arquivo' => '34240997a16763c011134c570fcc149e.pdf',
        'fonte' => 'Microsoft',
        'tipo_id' => 2,
        'versao_textual' => 'Texto explicativo do conteúdo da mídia, deveria ser mais extenso ainda :)',
        'tamanho' => '1000',
        'mime_id' => 2,
        'banco_imagens' => 0
      ),
      array(
        'id' => 3,
        'titulo' => 'Terceira mídia',
        'descricao' => 'Terceira mídia de teste',
        'arquivo' => '421b47ffd946ca083b65cd668c6b17e6.avi',
        'fonte' => 'Youtube',
        'tipo_id' => 3,
        'versao_textual' => 'Texto explicativo do conteúdo da mídia, deveria ser mais extenso ainda e muito mais explicativo :)',
        'tamanho' => '756439',
        'mime_id' => 3,
        'banco_imagens' => 0
      ),
      array(
        'id' => 4,
        'titulo' => 'Quarta mídia',
        'descricao' => 'Quarta mídia de teste',
        'arquivo' => 'a5ca0b5894324f8bb54bb9fffad29d1e.mp3',
        'fonte' => 'Rádio Viva',
        'tipo_id' => 4,
        'versao_textual' => 'Texto explicativo do áudio',
        'tamanho' => '756',
        'mime_id' => 4,
        'banco_imagens' => 0
      ),
    );
  }