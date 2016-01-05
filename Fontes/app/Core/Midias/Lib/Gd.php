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

/**
 * @author Rafael Jaques (http://www.phpit.com.br)
 * Adaptada por Márcio Bortolini dos Santos marciobds@live.it
 */

class Gd {

    /**
     *  Tipo da imagem em questão
     *  @var tipo
     */
    public $tipo = '';

    /**
     *  Dimensões da imagem original
     *  @var dimensoes
     */
    public $dimensoes = '';

    /**
     * Width, Height 
     *  @var w, h
     */
    public $w = '', $h = '';

    /**
     *  Propriedades da Imagem
     *  @var propriedades
     */
    public $propriedades = '';

    /**
     *  Imagem em si
     *  @var imgSrc
     */
    public $imgSrc = '';

    /**
     * Imagem tradada 
     *  @var imgOut
     */
    public $imgOut = '';

    /**
     * Fonte carregada para escrita 
     *  @var fonte
     */
    public $fonte = '';

    public function shutdown() {
        @imagedestroy($this->imgSrc);
        @imagedestroy($this->imgOut);

        return;
    }

    /**
     * abrirImagem()
     *
     * Abre uma imagem na memória
     * @param arquivo
     * @param tipo
     */
    function abrirImagem($arquivo, $tipo = 'auto') {
        // Verifica se o arquivo realmente existe
        if (!file_exists($arquivo)) {
            return false;
        }

        // Identifica automaticamente o formato da imagem
        if ($tipo == 'auto') {
            $tipo = $this->retornaExt($arquivo);
        }

        // Estabelece as propriedades e dimensões da imagem
        list($this->dimensoes['largura'], $this->dimensoes['altura'], $this->propriedades['tipo'], $this->propriedades['atributos']) = $xis = getimagesize($arquivo);

        $this->w = & $this->dimensoes['largura'];
        $this->h = & $this->dimensoes['altura'];

        $tipo = strtolower($tipo);

        $size = getimagesize($arquivo);

        // Aloca a imagem na memória
        switch ($size["mime"]) {
            case 'image/jpeg':
                $this->tipo = 'jpg';
                $this->imgSrc = imagecreatefromjpeg($arquivo);
                break;

            case 'image/gif':
                $this->tipo = 'gif';
                $this->imgSrc = imagecreatefromgif($arquivo);
                break;

            case 'image/png':
                $this->tipo = 'png';
                $this->imgSrc = imagecreatefrompng($arquivo);
                die;
                pr($this->imgSrc);
                break;

            default:
                $this->imgSrc = false;
                return false;
                break;
        }

        return true;
    }

    /**
     * carregarImagem()
     *
     * Alias de abrirImagem()
     * @param arquivo
     * @param tipo
     */
    function carregarImagem($arquivo, $tipo = 'auto') {
        $this->abrirImagem($arquivo, $tipo);
    }

    /**
     * redimensionar()
     * @param largura
     * @param altura
     */
    function redimensionar($largura, $altura) {
        $return = imagecreatetruecolor($largura, $altura);

        imagecopyresampled($return, $this->imgSrc, 0, 0, 0, 0, $largura, $altura, $this->w, $this->h);

        $this->w = $largura;
        $this->h = $altura;
        $this->imgSrc = $return;

        return true;
    }

    /**
     * escalar()
     *
     * @param	dimensao	Dimensão que será tomada como base.
     *
     * @param	sentido		A qual dimensão será aplicado o
     * 						o redimensionamento.
     *
     * 						Auto	-> Pega a maior dimensão
     * 						x		-> Aplica na largura
     * 						y		-> Aplica na altura
     */
    function escalar($dimensao, $sentido = 'auto') {
        if ($sentido == 'auto') {
            $sentido = (imagesx($this->imgSrc) > imagesy($this->imgSrc) ? 'x' : 'y');
        }

        switch ($sentido) {
            case 'x':
                $largura = $dimensao;
                $fator = imagesx($this->imgSrc) / $dimensao;
                $altura = imagesy($this->imgSrc) / $fator;
                break;

            case 'y':
                $altura = $dimensao;
                $fator = imagesy($this->imgSrc) / $dimensao;
                $largura = imagesx($this->imgSrc) / $fator;
                break;
        }

        if ($this->w > $largura || $this->h > $altura) {
            $this->redimensionar($largura, $altura);
        }

        if($this->w < $largura || $this->h < $altura){
            $this->estenderLarguraFixa($dimensao);
        }

        return true;
    }


    /**
    * Metodo que estende a imagem colocando-a num fundo branco maior.
    * A largura é definida dentro os tamanhos das imagens. 800 350 220 160
    */
    function estenderLarguraFixa($largura, $r = 255, $g = 255, $b = 255) {

        $x = $this->w;
        $y = $this->h;

        $maiorX = $largura;
        $maiorY = ( ($y / $x) * $largura);

        $imgMaior = imagecreatetruecolor($maiorX, $maiorY);
        $branco = imagecolorallocate($imgMaior, $r, $g, $b);

        imagefill($imgMaior, 0, 0, $branco);

        $meioX = ($maiorX - $x) / 2;
        $meioY = ($maiorY - $y) / 2;

        imagecopymerge($imgMaior, $this->imgSrc, $meioX, $meioY, 0, 0, $x, $y, 100);

        $this->imgSrc = $imgMaior;
        $this->w = $maiorX;
        $this->h = $maiorY;

        return true;
    }

    /**
     * estender()
     *
     * param	prop		Define a proporção com que a foto será estendida.
     *
     * 							0 = Metade da largura e da altura da imagem
     * 							1 = O mesmo tamanho da largura e da altura
     * 							2 = Duas vezes o tamanho da largura e da altura
     * 							3 = ...
     *
     * @param	r			R = Cor vermelha
     *
     * @param	g			G = Cor verde
     *
     * @param	b			B = Cor azul
     */
    function estender($prop = 0, $r = 255, $g = 255, $b = 255) {

        $x = $this->w;
        $y = $this->h;

        $maiorX = !$prop ? $x + ($x / 2) : $x + ($x * $prop);
        $maiorY = !$prop ? $y + ($y / 2) : $y + ($y * $prop);

        $imgMaior = imagecreatetruecolor($maiorX, $maiorY);
        $branco = imagecolorallocate($imgMaior, $r, $g, $b);

        imagefill($imgMaior, 0, 0, $branco);

        $meioX = ($maiorX - $x) / 2;
        $meioY = ($maiorY - $y) / 2;

        imagecopymerge($imgMaior, $this->imgSrc, $meioX, $meioY, 0, 0, $x, $y, 100);

        $this->imgSrc = $imgMaior;
        $this->w = $maiorX;
        $this->h = $maiorY;

        return true;
    }

    /**
     * crop()
     * recorta a imagem
     * 
     * @param $options Array
     * 
     */
    public function crop($x, $y, $x2, $y2, $w, $h) {
        if($this->imgSrc == null)
            return false;
        $dest = imagecreatetruecolor($w, $h);
        imagecopy($dest, $this->imgSrc, 0, 0, $x, $y, $w, $h);
        $this->imgSrc = $dest;
        $this->w = $w;
        $this->h = $h;

        return true;
    }

    /**
     * desaturar()
     */
    function desaturar() {
        imagefilter($this->imgSrc, IMG_FILTER_GRAYSCALE);

        return true;
    }

    /**
     * negativo()
     */

    function negativo() {
        imagefilter($this->imgSrc, IMG_FILTER_NEGATE);

        return true;
    }

    /**
     * brilho()
     *
     * @param valor -> inteiro (-100 a 100)
     */

    function brilho($valor) {
        imagefilter($this->imgSrc, IMG_FILTER_BRIGHTNESS, $valor);

        return true;
    }

    /**
     * contraste()
     *
     * @param valor -> inteiro (-100 a 100)
     */

    function contraste($valor) {
        imagefilter($this->imgSrc, IMG_FILTER_CONTRAST, $valor);

        return true;
    }

    /**
     * blur()
     */

    function blur() {
        imagefilter($this->imgSrc, IMG_FILTER_GAUSSIAN_BLUR);

        return true;
    }

    /**
     * marcaDagua()
     * @param imagem
     * @param alpha
     * @param esquerda
     * @param topo
     */
    function marcaDagua($imagem, $alpha = 75, $esquerda = 'infDir', $topo = NULL) {

        switch ($this->retornaExt($imagem)) {

            case 'jpg':
                $marca = imagecreatefromjpeg($imagem);
                break;

            case 'gif':
                $marca = imagecreatefromgif($imagem);
                break;

            case 'png':
                $marca = imagecreatefrompng($imagem);
                break;
        }

        if (!is_numeric($esquerda)) {

            switch ($esquerda) {

                case 'infDir':
                    $esquerda = imagesx($this->imgSrc) - imagesx($marca) - 10;
                    $topo = imagesy($this->imgSrc) - imagesy($marca) - 10;
                    break;

                case 'infDirX':
                    $esquerda = imagesx($this->imgSrc) - imagesx($marca);
                    $topo = imagesy($this->imgSrc) - imagesy($marca);
                    break;
            }
        }

        imagecopymerge($this->imgSrc, $marca, $esquerda, $topo, 0, 0, imagesx($marca), imagesy($marca), $alpha);

        return true;
    }
    /**
     * sepia()
     */
    function sepia() {
        $this->desaturar();
        imagefilter($this->imgSrc, IMG_FILTER_COLORIZE, 90, 60, 40);

        return true;
    }

    /**
     * rgb()
     *
     * @param   r           R = Cor vermelha
     *
     * @param   g           G = Cor verde
     *
     * @param   b           B = Cor azul
     */
    function rbg($r, $g, $b) {
        $this->desaturar();
        imagefilter($this->imgSrc, IMG_FILTER_COLORIZE, $r, $g, $b);

        return true;
    }

    /**
     * carregarFonte()
     *
     * Carrega uma fonte na memória
     * para ser utilizada na escrita.
     * @param fonte
     */
    function carregarFonte($fonte) {

        if (!file_exists($fonte)) {
            return false;
        }

        $this->fonte = $fonte;

        return true;
    }

    /**
     * imprimir()
     *
     * Imprime a imagem na tela
     * @param header
     */
    function imprimir($header = 0) {

        switch ($this->tipo) {

            case 'jpg':
                if ($header)
                    header('Content-type: image/jpg');
                imagejpeg($this->imgSrc);
                return true;
                break;

            case 'gif':
                if ($header)
                    header('Content-type: image/gif');
                imagegif($this->imgSrc);
                return true;
                break;

            case 'png':
                if ($header)
                    header('Content-type: image/png');
                imagepng($this->imgSrc);
                return true;
                break;

            default:
                return false;
                break;
        }
    }

    /**
     * @ gerarPublic()
     *
     * Grava a imagem em um determinado diretório.
     *
     * @param		nome			Define o nome com o qual
     * 								será salva a imagem.
     * 								(Sem extensão)
     *
     * @param		dir				Diretório onde a imagem
     * 								será salva. Pode vir tanto
     * 								com / no final, como sem.
     *
     * @param		qualidade		Nível de qualidade: 0 à 100.
     *
     * @param		chmod			Se for diferente de 0, aplicará
     * 								um CHMOD (conforme definido)
     * 								na imagem, após salva.
     */
    function gerarPublic($nome, $dir, $qualidade = 90, $chmod = NULL) {

        // Insere uma bara no final do path se não houver
        if (substr($dir, -1) != '/')
            $dir .= '/';

        // Monta o full path
        $fullpath = $dir . $nome . '.' . $this->tipo;

        // Se o arquivo já existe, retorna falso
        if (file_exists($fullpath)) 
            unlink($fullpath);

        // Identifica o tipo da imagem e grava o arquivo adequadamente
        switch ($this->tipo) {

            case 'jpg':
                imagejpeg($this->imgSrc, $fullpath, $qualidade);
                break;

            case 'gif':
                imagegif($this->imgSrc, $fullpath);
                break;

            case 'png':
                imagepng($this->imgSrc, $fullpath, ($qualidade/100)*9);
                break;
        }

        // Se houver CHMOD a ser aplicado, aplica agora
        if (!is_null($chmod))
            chmod($fullpath, $chmod);

        // Retorna o full path
        return $fullpath;
    }

    /**
     * gerarPublicJpeg()
     *
     * Função idêntica a 'gerarPublic()', porém sempre salva
     * as imagens como jpeg.
     * @param nome
     * @param dir
     * @param qualidade
     * @param chmod
     *
     * @return fullpath
     */
    function gerarPublicJpeg($nome, $dir, $qualidade = 90, $chmod = NULL) {

        // Insere uma bara no final do path se não houver
        if (substr($dir, -1) != '/')
            $dir .= '/';

        // Monta o full path
        $fullpath = $dir . $nome . '.jpg';

        if (!strstr($fullpath, '.jpg'))
            $fullpath .= '.jpg';

        // Se o arquivo já existe, retorna falso
        if (file_exists($fullpath))
            unlink($fullpath);

        imagejpeg($this->imgSrc, $fullpath, $qualidade);

        // Se houver CHMOD a ser aplicado, aplica agora
        if (!is_null($chmod))
            chmod($fullpath, $chmod);

        // Retorna o full path
        return $fullpath;
    }

    /**
     * gerarPublicGif()
     *
     * Função idêntica a 'gerarPublic()', porém sempre salva
     * as imagens como jpeg.
     * @param nome
     * @param dir
     * @param chmod
     *
     * @return fullpath
     */
    function gerarPublicGif($nome, $dir, $chmod = NULL) {

        // Insere uma bara no final do path se não houver
        if (substr($dir, -1) != '/')
            $dir .= '/';

        // Monta o full path
        $fullpath = $dir . $nome;

        if (!strstr($fullpath, '.gif'))
            $fullpath .= '.gifx';

        // Se o arquivo já existe, retorna falso
        if (file_exists($fullpath))
            unlink($fullpath);

        imagegif($this->imgSrc, $fullpath);

        // Se houver CHMOD a ser aplicado, aplica agora
        if (!is_null($chmod))
            chmod($fullpath, $chmod);

        // Retorna o full path
        return $fullpath;
    }

    /**
     * gerarPublicPng()
     *
     * Função idêntica a 'gerarPublic()', porém sempre salva
     * as imagens como jpeg.
     * @param nome
     * @param dir
     * @param qualidade
     * @param chmod
     *
     * @return fullpath
     */
    function gerarPublicPng($nome, $dir, $qualidade = 90, $chmod = NULL) {

        // Insere uma bara no final do path se não houver
        if (substr($dir, -1) != '/')
            $dir .= '/';

        // Monta o full path
        $fullpath = $dir . $nome;

        if (!strstr($fullpath, '.png'))
            $fullpath .= '.png';

        // Se o arquivo já existe, retorna falso
        if (file_exists($fullpath))
            unlink($fullpath);

        imagepng($this->imgSrc, $fullpath, ($qualidade/100)*9);

        // Se houver CHMOD a ser aplicado, aplica agora
        if (!is_null($chmod))
            chmod($fullpath, $chmod);

        // Retorna o full path
        return $fullpath;
    }

    /**
     * criarImagem()
     */
    function criarImagem($largura, $altura) {
        $this->imgOut = imagecreatetruecolor($largura, $altura);

        return;
    }

    /**
     * retornaExt()
     * @param arquivo
     * @return extensao
     */
    function retornaExt($arquivo) {
        return str_replace('jpeg', 'jpg', pathinfo($arquivo, PATHINFO_EXTENSION));
    }

     /**
     * retornaNome()
     * @param arquivo
     * @return nome
     */
    function retornaNome($arquivo) {
        return str_replace('.' . pathinfo($arquivo, PATHINFO_EXTENSION), '', $arquivo);
    }

}