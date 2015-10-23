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

App::uses('MidiasAppModel', 'Midias.Model');
App::uses('CakeEvent', 'Event');
App::uses('Imagem', 'Midias.Lib');
App::uses('Gd', 'Midias.Lib');
App::uses('Video', 'Midias.Lib');
App::uses('MidiaConfig', 'Midias.Lib');
App::uses('Audio', 'Midias.Lib');
App::uses('Image', 'Midias.Lib');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class Midia extends MidiasAppModel {

    public $cmsEvents = array('Cms.Service.Upload');

	public $name = 'Midia';

    public $actsAs = array('Containable');

	public $belongsTo = array('Midias.Tipo', 'Midias.Mime');

    public $hasMany = array(
        'MidiasConteudo' => array(
            'className' => 'Midias.MidiasConteudo',
            'dependent' => true
        )
    );

	public $midia;

    public $arq;
    public $arqf;

	public $validate = array(
        'arquivo' => array(
            'mime' => array(
                'rule' => array('mime', array(1,2,3,4)),
                'allowEmpty' => true,
                //'message' => array('"%s": O tipo de arquivo "%s" não está habilitado para envio.' , "file", "extension")
                'message' => array('"%s": Formato de arquivo inválido' , "file", "extension")
            ),
            'isUniqueFile' => array(
                'rule' => 'isUniqueFile',
                'message' => array('"%s": Outro arquivo com o mesmo conteúdo já foi enviado para o sistema.', "file")
            ),
            'tamanho' => array(
                'rule' => array('tamanho', '2MB'),
                'message' => array('"%s": O arquivo no upload é maior do que o limite definido no servidor que é de "%s".', "file", "2MB")
            )
        ),
        'titulo' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Campo título não foi preenchido'
            )
        ),
        'descricao' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Campo descrição não foi preenchido'
            )
        ),
        'versao_textual' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Campo obrigatório'
            )
        )
    );

    public function beforeValidate($options = array()) {
        if(isset($this->data['Midia']['arquivo'])) {
            $this->data['Midia']['arquivo'] = (array) $this->data['Midia']['arquivo'];
            $this->arq = $this->data['Midia']['arquivo'];
            $this->arqf = $this->data['Midia']['arquivo'];
            if(isset($this->data['Midia']['arquivo']['error']) && $this->data['Midia']['arquivo']['error'] == UPLOAD_ERR_OK) {
                $this->arq = $this->data['Midia']['arquivo'];
                $this->data['Midia']['arquivo'] = $this->rename($this->data['Midia']['arquivo']);
                $this->data['Midia']['tamanho'] = $this->arq['size'];
            } else if(isset($this->data['Midia']['arquivo']['error']) && $this->data['Midia']['arquivo']['error'] != UPLOAD_ERR_OK){
                //$message = $this->data['Midia']['arquivo']['name'] . ': ';
                $message = '';
                switch ($this->data['Midia']['arquivo']['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                        $message .= "O arquivo no upload é maior do que o limite definido no servidor que é de ". ini_get('upload_max_filesize').".";
                        break;
                    
                    case UPLOAD_ERR_FORM_SIZE:
                        $message .= 'O tamanho da requisição é maior do que o limite definido no servidor que é de ' . ini_get('post_max_size') . '.';
                        break;

                    case UPLOAD_ERR_PARTIAL:
                        $message .= "O upload do arquivo foi feito parcialmente.";
                        break;

                    case UPLOAD_ERR_NO_FILE:
                        // Não foi feito o upload do arquivo.
                        $message .= "Favor selecionar um ou mais arquivos de imagem";
                        break;

                    case UPLOAD_ERR_NO_TMP_DIR:
                        $message .= "Pasta temporária não encontrada no servidor.";
                        break;

                    case UPLOAD_ERR_CANT_WRITE:
                        $message .= "Sem permissão de escrita no servidor.";
                        break;

                    case UPLOAD_ERR_EXTENSION:
                        $message .= "Upload do arquivo parado por alguma extensão";
                        break;

                    default: 
                        $message = "Erro desconhecido durante o upload"; 
                        break; 
                }
                $this->invalidate('arquivo', $message); 
                $this->arq = false;
                unset($this->data['Midia']['arquivo']);
            } else {
                unset($this->data['Midia']['arquivo']);
                $this->arq = false;
            }
        } else {
            $this->arq = false;
        }
        return true;
    }

    public function beforeSave($options = array()) {
        // if($this->data['Midia']['tipo_id'] == ARQUIVO && $this->arq) {


        $this->arq = $this->arqf;
        if($this->arq) {
            $config = new MidiaConfig();
            if (isset($this->arq['name'])) {
                $name = $this->arq['name'];
            } else {
                $name = $this->arq[0];
            }

            $this->data['Midia']['nome_original'] = $config->removeExt($name);
        }
    }

    public function afterSave($created) {
        $this->arq = $this->arqf;
        if($this->arq && $created) {
            $config = new MidiaConfig();
            $dest = $config->midiaDir($this->data['Midia']['tipo_id']);
            if(in_array($this->data['Midia']['tipo_id'], array(IMAGEM, VIDEO, AUDIO)))
                $dest .= 'or' . DS;
            $this->getEventManager()->dispatch(new CakeEvent('Cms.Service.Upload', $this, array(
                'source' => $this->arq['tmp_name'],
                'dest' => $dest . $this->data['Midia']['arquivo'])
            ));
            if($this->data['Midia']['tipo_id'] == IMAGEM) {
                $this->generateImages($this->data['Midia']['arquivo'], $this->data['Midia']['crop_x'], $this->data['Midia']['crop_y'], $this->data['Midia']['crop_x2'], $this->data['Midia']['crop_y2'], $this->data['Midia']['crop_w'], $this->data['Midia']['crop_h']);
            } elseif($this->data['Midia']['tipo_id'] == VIDEO) {
                $video = new Video();
                $video->thumb($this->data['Midia']['arquivo']);
                $video->convertToFlv($this->data['Midia']['arquivo']);
            } elseif($this->data['Midia']['tipo_id'] == AUDIO) {
                $audio = new Audio();
                //$audio->thumb($this->data['Midia']['arquivo']);
                $audio->convertToMp3($this->data['Midia']['arquivo']);
            }
        }
        return true;
    }

	public function mime($data, $tipo_id) {
//        pr($this->arq); die;

        $mime = null;
        $extension = null;
        $img = new Gd();
        if(is_array($data['arquivo']) && array_key_exists('type', $data['arquivo'])) {
            $mime = $data['arquivo']['type'];
            $extension = $img->retornaExt($data['arquivo']['name']);
        } else {
            $mime = $this->arq['type'];
            $extension = $img->retornaExt($this->arq['name']);
        }


        //die($mime . ' - ' . $extension);
		$find = $this->Mime->find('first', array('conditions' => array('tipo_id' => $tipo_id, 
            'or' => array('mime LIKE' => "%$extension%", 'mime LIKE' => "%$mime%"), 'ativo' => true, 'extensao LIKE' => "%$extension%")));
        //$find = $this->Mime->find('first', array('conditions' => array('ativo' => true, 'extensao' => $extension)));
        //print_r($tipo_id); die();
		if(!empty($find)) {
			$this->data['Midia']['mime_id'] = $find['Mime']['id'];
			$this->data['Midia']['tipo_id'] = $find['Mime']['tipo_id'];
            if($find['Mime']['tipo_id'] == IMAGEM && $this->arq) {
                $imgLib = new Image($this->arq['tmp_name']);
                list($this->data['Midia']['crop_x'],
                $this->data['Midia']['crop_y'],
                $this->data['Midia']['crop_x2'],
                $this->data['Midia']['crop_y2'],
                $this->data['Midia']['crop_w'],
                $this->data['Midia']['crop_h']) = $imgLib->cropSizes();
            }
			return true;
		}
        $this->validator()->getField('arquivo')->getRule('mime')->message[2] = $mime;
		return false;
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

	public function rename($data) {
		$md5 = md5_file($data['tmp_name']);
        $ext = str_replace('jpeg', 'jpg',strtolower(pathinfo($data['name'], PATHINFO_EXTENSION)));
		return $md5 . '.' . $ext;
	}

    public function isUniqueFile($data) {
        if(!$this->isUnique($data)) {
            if($this->data['Midia']['tipo_id'] == IMAGEM) {
                $config = new MidiaConfig();
                $md5 = $config->removeExt($data['arquivo']);
                $ext = $config->getExt($data['arquivo']);
                $this->data['Midia']['arquivo'] = md5($md5 . uniqid(rand(), true)) . '.' . $ext;
            } else {
                $this->arq = null;
            }
        }
        return true;
    }

	public function deleteFile($folder,$file) {
        $dir = new Folder($folder);
        $list = $dir->read();
        
        $list = array_values(array_filter($list));

        $config = new MidiaConfig();
        foreach($list[0] as $dir_name) {
            if($dir_name == 'thumb')
                $file = $config->changeExt($file, 'jpg');

            $new = new File(str_replace('.DS_Store/', '' , $dir->pwd() . $dir_name . DS . $file) );

            $new->delete();
        }
	}

	public function beforeDelete($cascade = true) {
		$this->midia = $this->read();
		return true;
	}

	public function afterDelete() {
        if(!$this->findByArquivo($this->midia['Midia']['arquivo'])) {
           // pr('eba2'); die;
            $config = new MidiaConfig();
            $folder = $config->midiaDir($this->data['Midia']['tipo_id']);
    		$this->deleteFile($folder, $this->midia['Midia']['arquivo']);
        }

		return true;
	}

    public function generateImages($arquivo, $crop_x, $crop_y, $crop_x2, $crop_y2, $crop_w, $crop_h) {
        $img = new Gd();
        $extensao = strtolower($img->retornaExt($arquivo));
        $folder = WWW_ROOT . 'files/img/';
        $or = $folder . 'or/';
        if($img->abrirImagem($or . $arquivo, $extensao)){
            $img->crop($crop_x, $crop_y, $crop_x2, $crop_y2, $crop_w, $crop_h);
            $img->escalar(800, 'auto');
            $img->gerarPublic($img->retornaNome($arquivo), $folder . 'gd');
        }
        
        if($img->abrirImagem($or . $arquivo, $extensao)){
            $img->crop($crop_x, $crop_y, $crop_x2, $crop_y2, $crop_w, $crop_h);
            $img->escalar(380, 'auto');
            $img->gerarPublic($img->retornaNome($arquivo), $folder . 'md');
        }

        if($img->abrirImagem($or . $arquivo, $extensao)){
            $img->crop($crop_x, $crop_y, $crop_x2, $crop_y2, $crop_w, $crop_h);
            $img->escalar(220, 'auto');
            $img->gerarPublic($img->retornaNome($arquivo), $folder . 'pq');
        }

        if($img->abrirImagem($or . $arquivo, $extensao)){
            $img->crop($crop_x, $crop_y, $crop_x2, $crop_y2, $crop_w, $crop_h);
            $img->escalar(160, 'auto');
            $img->gerarPublic($img->retornaNome($arquivo), $folder . 'th');
        }
    }
}