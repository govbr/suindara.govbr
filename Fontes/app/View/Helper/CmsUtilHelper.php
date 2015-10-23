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

	class CmsUtilHelper extends AppHelper{
		
		/*
		 * Limita o tamanho do texto $string para $tamanho
		 * 
		 */
		function limitarTexto($string, $tamanho, $sufixo = '') {
			if (strlen($string) > $tamanho) {
				$r = mb_substr($string, 0, $tamanho - strlen($sufixo));
				$r .= $sufixo;
				return $r;
			}
			
			return $string;
		}
		
		/**
		 * Retorna uma lista de links (tag <a>) representando o breadcrumb
		 */
		function getCrumbs($home, $url) {
			// TODO Melhorar filtro de crumbs
			$crumbLinkList = explode('---', $this->_View->Html->getCrumbs('---', array(
					'text' => $home,
					'url' => $url,
					'escape' => false
				))
			);
			
			return $crumbLinkList;
		}


		function getNomeMes($mes){
			switch ($mes) {
		        case "01": $mes = 'Janeiro';   break;
		        case "02": $mes = 'Fevereiro'; break;
		        case "03": $mes = 'Março';     break;
		        case "04": $mes = 'Abril';     break;
		        case "05": $mes = 'Maio';      break;
		        case "06": $mes = 'Junho';     break;
		        case "07": $mes = 'Julho';     break;
		        case "08": $mes = 'Agosto';    break;
		        case "09": $mes = 'Setembro';  break;
		        case "10": $mes = 'Outubro';   break;
		        case "11": $mes = 'Novembro';  break;
		        case "12": $mes = 'Dezembro';  break; 
		        default: $mes = ''; break;
 			}

 			return $mes;
		}
	}
