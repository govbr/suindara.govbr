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
App::uses('BannersAppModel', 'Banners.Model');
App::uses('BannerConfig', 'Banners.Lib');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');


class Banner extends BannersAppModel{

	public $cmsEvents = array('Cms.Service.Upload');

	public $name = 'Banner';

	public $displayField = 'titulo';

    public $actsAs = array('Tree');

    public $order = array('Banner.lft' => 'ASC');
	
	public $useTable = 'banners';

    public $arq;

    public $virtualFields = array(
        'testField' => 'Banner.id'
    );

    public $belongsTo = array('Banners.BmTipo', 'Banners.Grupo');
	
	public $validate = array(
		'titulo' => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Campo título não foi preenchido'
			),

            'maxLength' => array(
            	'rule'    => array('maxLength', '45'),
        		'message' => 'Campo título não pode ter mais que 45 caracteres.'
        	)
		),

		'descricao' => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Campo descrição não foi preenchido'
			),

            'maxLength' => array(
            	'rule'    => array('maxLength', '100'),
        		'message' => 'Campo descrição não pode ter mais que 100 caracteres.'
        	)
		),

		'link' => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Campo link destino não foi preenchido'
			),
		),

		'pagina_id' => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Campo página não foi preenchido'
			),
		),

		'categoria_id' => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'Campo categoria não foi preenchido'
			),
		),

		'arquivo' => array(
            // 'isUniqueFile' => array(
            //     'rule' => 'isUniqueFile',
            //     'message' => array('"%s": Outro arquivo com o mesmo conteudo ja foi enviado para o sistema', "file")
            // ),
            // 'mime' => array(
            //     'rule'    => array('mime', array(1,2,3,4)),
            //     'message' => array('"%s": Esta extensão de arquivo não está habilitada para envio', "file")
            // ),

            'image' => array(
                'rule'       => array('extension',array('jpeg','jpg','png','gif')),
                'required'   => 'create',
                'allowEmpty' => true,
                'message'    => 'Uma imagem não foi escolhida ou a extensão não é válida',
                'on'         => 'create',
                'last'       => true
            ),

            'tamanho' => array(
                'rule' => array('tamanho', '2MB'),
                'message' => array('"%s": O arquivo excedeu o tamanho máximo permitido pelo servidor que é de "%s".', "file", "2MB")
            )
        ),
	);

    public function beforeValidate($options = array()) {
        $this->data['Banner']['arquivo'] = (array)$this->data['Banner']['arquivo'];
        if(isset($this->data['Banner']['arquivo']['error']) && $this->data['Banner']['arquivo']['error'] == UPLOAD_ERR_OK) {
            $this->arq = $this->data['Banner']['arquivo'];
            $this->data['Banner']['arquivo'] = $this->rename($this->data['Banner']['arquivo']);
        } else {
            unset($this->data['Banner']['arquivo']);
            $this->arq = false;
        }
        
        return true;
    }

    public function beforeSave($options = array()){
        $bannerAux2 = $this->data;

        if( !empty($this->data['Banner']['id']) && !empty($this->data['Banner']['arquivo']) ){
            $bannerAux = $this->read();

            $config = new BannerConfig();
            $folder = $config->bannerDir();
            $this->deleteImage($folder, $bannerAux['Banner']['arquivo']);
        }

        $this->data = $bannerAux2;
        return true;
    }

    public function afterSave($options = array() ) {
        if($this->arq){
            $dest = WWW_ROOT . 'files/img/banner/';
            $this->getEventManager()->dispatch(new CakeEvent('Cms.Service.Upload', $this, array(
                'source' => $this->arq['tmp_name'],
                'dest' => $dest . $this->data['Banner']['arquivo'])
            ));
        }
        return true;
    }

    public function deleteImage($folder, $file) {
        $dir = new Folder($folder);
        //$list = $dir->read();
        $config = new BannerConfig();

        $new = new File($dir->pwd() . $file);
        $new->delete();
    }

    public function beforeDelete($cascade = true) {
        $this->banner = $this->read();
        return true;
    }

    public function afterDelete() {
        if(!$this->findByArquivo($this->banner['Banner']['arquivo'])) {
            $config = new BannerConfig();
            $folder = $config->bannerDir();
            $this->deleteImage($folder, $this->banner['Banner']['arquivo']);
        }
        return true;
    }

    public function tamanho($data, $max) {
        $tamanho = false;
        if(isset($this->arq['size']))
            $tamanho = $this->arq['size'] / 1024 / 1024;

        $max = str_replace('MB', '', $max);
        if($tamanho <= $max)
            return true;
        
        return false;
    }

    public function mime($data, $tipo_id) {

        return true;

        $type = null;
        $extension = null;
        if(is_array($data['arquivo']) && array_key_exists('type', $data['arquivo'])) {
            $mime = $data['arquivo']['type'];
            $extension = $this->retornaExt($data['arquivo']['name']);
        } else {
            $mime = $this->arq['type'];
            $extension = $this->retornaExt($this->arq['name']);
        }  
        //$find = $this->Mime->find('first', array('conditions' => array('tipo_id' => $tipo_id, 'mime' => $mime, 'ativo' => true, 'extensao' => $extension)));

        // if(!empty($find)) {
        //     $this->data['Midia']['mime_id'] = $find['Mime']['id'];
        //     $this->data['Midia']['tipo_id'] = $find['Mime']['tipo_id'];
        //     if($find['Mime']['tipo_id'] == IMAGEM && $this->arq) {
        //         $imgLib = new Image($this->arq['tmp_name']);
        //         list($this->data['Midia']['crop_x'],
        //         $this->data['Midia']['crop_y'],
        //         $this->data['Midia']['crop_w'],
        //         $this->data['Midia']['crop_h']) = $imgLib->cropSizes();
        //     }
        //     return true;
        // }
        // return '"'.$this->arq['name'] . '": A extensão de arquivo "' . $extension . '" não está habilitada para envio.';
    }

    /**
     * retornaExt()
     * @param arquivo
     * @return extensao
     */
    function retornaExt($arquivo) {
        return str_replace('jpeg', 'jpg', pathinfo($arquivo, PATHINFO_EXTENSION));
    }

    public function rename($data) {
        $md5 = md5_file($data['tmp_name']);
        $ext = $this->retornaExt($data['name']);
        return $md5 . '.' . $ext;
    }

}