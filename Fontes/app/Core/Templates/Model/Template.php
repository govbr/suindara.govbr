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

App::uses('TemplatesAppModel', 'Templates.Model');
App::uses('TemplateConfig', 'Templates.Lib');
App::uses('Decompress', 'Templates.Lib');
App::uses('CakeEvent', 'Event');
App::uses('Folder', 'Utility');
App::uses('ConnectionManager', 'Model');


class Template extends TemplatesAppModel {

	public $cmsEvents = array('Cms.Service.Upload');

	public $name = 'Template';

    public $displayField = 'nome';

	public $arq;

    public $errorMessage;

    public $hasMany = array(
        'Site' => array(
            'className' => 'Templates.Site',
            'dependent' => false
        )
    );

    public $validate = array(
        'arquivo' => array(
            'notEmpty' => array(
                'rule'    => 'notEmpty',
                'message' => 'Nenhum arquivo selecionado'
            ),
            // 'isUniqueFile' => array(
            //     'rule' => 'isUniqueFile',
            //     'message' => array('"%s": Outro arquivo com o mesmo conteúdo já foi enviado para o sistema', "file")
            // ),
            // 'tamanho' => array(
            //     'rule' => array('tamanho', '2MB'),
            //     'message' => array('"%s": O arquivo excedeu o tamanho máximo permitido pelo servidor que é de "%s".', "file", "2MB")
            // )
        ),
    );

    public function beforeValidate($options = array()) {
        if(isset($this->data['Template']['arquivo'])) {
            $this->data['Template']['arquivo'] = (array) $this->data['Template']['arquivo'];
            if(isset($this->data['Template']['arquivo']['error']) && $this->data['Template']['arquivo']['error'] == UPLOAD_ERR_OK) {
                $this->arq = $this->data['Template']['arquivo'];
                $this->data['Template']['caminho'] = $this->rename($this->data['Template']['arquivo'], false);
            } else if(isset($this->data['Template']['arquivo']['error']) && $this->data['Template']['arquivo']['error'] != UPLOAD_ERR_OK){
                $message = "";
                switch ($this->data['Template']['arquivo']['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                        $message .= "O arquivo no upload é maior do que o limite definido no servidor que é de ". ini_get('upload_max_filesize');
                        break;
                    
                    case UPLOAD_ERR_FORM_SIZE:
                        $message .= 'O tamanho da requisição é maior do que o limite definido no servidor que é de ' . ini_get('post_max_size') . '.';
                        break;

                    case UPLOAD_ERR_PARTIAL:
                        $message .= "O upload do arquivo foi feito parcialmente.";
                        break;

                    case UPLOAD_ERR_NO_FILE:
                        $message .= "Não foi feito o upload do arquivo.";
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
            } else {
                $this->arq = false;
            }
            unset($this->data['Template']['arquivo']);
        } else {
            $this->arq = false;
        }
        return true;
    }

    public function beforeSave($options = array()) {
        if($this->arq) {
            $config = new TemplateConfig();
            $name = Inflector::humanize($this->arq['name']);
            $this->data['Template']['nome_original'] = $config->removeExt($name);
            $arqRenamed =  $this->rename($this->arq);
            $dest = $config->templatesUploadDir() . $arqRenamed;

            // Verifica se já existe um folder de mesmo nome e o remove. 
            $destFolder = new Folder($dest, false);
            if (!is_null($destFolder->path)) {

                $folderName = preg_replace('/\.zip$/', '', strtolower($arqRenamed));
                $options = array('conditions' => array('Template.caminho' => $folderName));
                if ($this->find('first', $options))
                {
                    $this->invalidate('arquivo', 'Erro ao processar arquivo, verifique os caracteres utilizados no nome do arquivo');
                    return false;   
                }

            //    $destFolder->delete();
            }


            $this->getEventManager()->dispatch(new CakeEvent('Cms.Service.Upload', $this, array(
                'source' => $this->arq['tmp_name'],
                'dest' => $dest
	        )));


            if( strtolower($config->getExt($name)) != 'zip' )
            {
                    $this->invalidate('arquivo', 'Extensão do arquivo inválida!');
                    return false;
            }

	        $uploaded = $dest;
	        $decompress = new Decompress();
        	if($decompress->unpack($uploaded, $config->templatesUploadDir())) {

                unlink($uploaded);
                $uploadFolder = new Folder($config->templatesUploadDir());
                $teste = $uploadFolder->find('.*');
                $templateFolder = null;
                if(empty($teste)) {
                    $counter = 0;
                    $elements = $uploadFolder->tree();
                    
                    $templateFolder = new Folder($elements[0][1]);
                } else {
                    $templateFolder = $uploadFolder;
                }

                $dir = $templateFolder->pwd();
                $templateFolderContents = $templateFolder->read();
                $directoriesNeeded = array('Elements', 'Layouts', 'css', 'errors', 'images', 'js', 'noticias', 'paginas');
                $array_intersect = array_intersect($directoriesNeeded, $templateFolderContents[0]);

                //pr($templateFolderContents[0]); die();
                
				
                if(!($array_intersect == $directoriesNeeded)) {
                    $this->validationErrors['arquivo'] = array('Template inválido. Verifique se o seu template contém todas as pastas necessárias!');
                    $this->invalidate('arquivo', 'Template inválido. Verifique se o seu template contém todas as pastas necessárias!');
                    $this->recreateUploadFolder();
                    return false;
                } elseif(!(file_exists($dir . DS . 'paginas' . DS . 'visualizar.ctp')
                    && file_exists($dir . DS . 'noticias' . DS . 'visualizar.ctp') && file_exists($dir . DS . 'noticias' . DS . 'index.ctp')
                    && file_exists($dir . DS . 'noticias' . DS . 'listar.ctp') && file_exists($dir . DS . 'Layouts' . DS . 'default.ctp'))) {

                    $this->errorMessage = 'Template inválido. Verifique se o seu template contém todos os arquivos necessários!';
                    $this->invalidate('arquivo', 'Template inválido. Verifique se o seu template contém todos os arquivos necessários!');
                    $this->recreateUploadFolder();
                    return false;
                }

                $templateFolder->copy($config->templatesDir() . $config->removeExt($arqRenamed));
                $templateFolder->delete();

                $file = new File($config->templatesDir() . $config->removeExt($arqRenamed) . DS . 'info.json');
                if(!$file->exists()) {
                    $this->errorMessage = 'Verifique se você criou o arquivo de configurações!';
                    $this->invalidate('arquivo', 'Verifique se você criou o arquivo de configurações!');
                    $this->recreateUploadFolder();
                    return false;
                }
                $contents = $file->read();

                $contents = json_decode($contents);

                if(!(isset($contents->nome) && isset($contents->print) && isset($contents->autor) && isset($contents->descricao))) {
                    $this->errorMessage = 'Verifique se o arquivo de configurações tem todas as informações necessárias!';
                    $this->invalidate('arquivo', 'Verifique se o arquivo de configurações tem todas as informações necessárias!');
                    $this->recreateUploadFolder();
                    return false;
                } elseif (!file_exists($dir . DS . $contents->print)) {
                    $this->errorMessage = 'Template inválido. Verifique se você criou imagem (print) do template!';
                    $this->invalidate('arquivo', 'Template inválido. Verifique se você criou imagem (print) do template!');
                    $this->recreateUploadFolder();
                    return false;
                }

                $file = new File($config->templatesDir() . $config->removeExt($arqRenamed) . DS . '_init/init.sql');
                if ($file->exists() && $file->size() > 0)
                {
                    $db = ConnectionManager::getDataSource('default');
                    try{
                        $db->query($file->read());
                    } catch (Exception $e) {
                        $this->errorMessage = "Não foi possível executar o script SQL(init.sql) deste template.";
                        $this->invalidate("arquivo", "Não foi possível executar o script SQL(init.sql) deste template.");
                        return false;
                    }
                }

                $this->data['Template']['nome'] = $contents->nome;
                $this->data['Template']['print'] = $contents->print;
                $this->data['Template']['autor'] = $contents->autor;
                $this->data['Template']['descricao'] = $contents->descricao;
            } else {
                $this->errorMessage = 'Houve um erro ao tentar descompactar o template!';
                $this->invalidate('arquivo', 'Houve um erro ao tentar descompactar o template!');
                return false;
            }
        }
        return true;
    }

    public function recreateUploadFolder() {
        $config = new TemplateConfig();
        $folder = new Folder($config->templatesUploadDir());
        $folder->delete();
        $folder = new Folder($config->templatesUploadDir(), true);
        unset($folder);
    }

    public function deleteFolder($folder) {
        $folder = new Folder($folder);
        $folder->delete();
    }

    public function rename($data, $ext = true) {
        //die($data['tmp_name']);
		$md5 = md5_file($data['tmp_name']);
        if(!$ext)
			return $md5;

        $ext = strtolower(pathinfo($data['name'], PATHINFO_EXTENSION));
		return $md5 . '.' . $ext;
	}

    public function isUniqueFile($data) {
        if(!$this->isUnique($data)) {
            $this->arq = null;
            return false;
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

	public function beforeDelete($cascade = false) {
		$this->template = $this->read();
        foreach ($this->template['Site'] as $key => $value) {
            if($value['template_id'] == $this->template['Template']['id'] ){
                $this->errorMessage = 'Existe um site vinculado ao template. Desvincule o site antes de deletar';
                return false;
            }
        }
        
        // Executa o script para remoção dos dados do template.
        $config = new TemplateConfig();
        $file = new File($config->templatesDir() . $this->template['Template']['caminho'] . DS . '_end' . DS . 'end.sql');
        if ($file->exists() && $file->size() > 0)
        {
            $db = ConnectionManager::getDataSource('default');
            try{
                $db->query($file->read());
            } catch (Exception $e) {
                $this->errorMessage = "Não foi possível executar o script SQL(end.sql) deste template.";
                $this->invalidate("arquivo", "Não foi possível executar o script SQL(end.sql) deste template.");
                return false;
            }
        }

		return true;
	}

	public function afterDelete() {
        if(!empty($this->template['Template']['caminho'])) {
            $config = new TemplateConfig();
            $templatesDir = $config->templatesDir();
            $dirToDelete = new Folder($templatesDir . $this->template['Template']['caminho']);
        	$dirToDelete->delete();
        }
		return true;
	}


    public function mime($data, $tipo_id) {
        $type = null;
        $extension = null;
        $img = new Gd();
        if(is_array($data['arquivo']) && array_key_exists('type', $data['arquivo'])) {
            $mime = $data['arquivo']['type'];
            $extension = $img->retornaExt($data['arquivo']['name']);
        } else {
            $mime = $this->arq['type'];
            $extension = $img->retornaExt($this->arq['name']);
        }
		$find = $this->Mime->find('first', array('conditions' => array('tipo_id' => $tipo_id, 'mime' => $mime, 'ativo' => true, 'extensao' => $extension)));
		if(!empty($find)) {
			$this->data['Template']['mime_id'] = $find['Mime']['id'];
			$this->data['Template']['tipo_id'] = $find['Mime']['tipo_id'];
            if($find['Mime']['tipo_id'] == IMAGEM && $this->arq) {
                $imgLib = new Image($this->arq['tmp_name']);
                list($this->data['Template']['crop_x'],
                $this->data['Template']['crop_y'],
                $this->data['Template']['crop_w'],
                $this->data['Template']['crop_h']) = $imgLib->cropSizes();
            }
			return true;
		}
		return false;
	}


}