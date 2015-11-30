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

class TreeListComponent extends Component {

	private $modelName = null;

    public function numerar($list, $convert = false) {	
    	$stack = array();
        $lastArray = array();
        $arrayCount = array();
        $contagem = 1;

        try{
        	if(!empty($list)){
		        foreach ($list as $i => $item) {
		        	if($i == 0){
						$this->modelName = key($list[0]);	        		
		        	}

		            $count = count($stack);
		            while ($stack && ($stack[$count - 1] < $item[$this->modelName]['rght'])) {
		                array_pop($stack);
		                $count--;
		            }

		            array_push($arrayCount, $count);
		            if( isset($arrayCount[count($arrayCount) - 1]) && isset($arrayCount[count($arrayCount) - 2])  ){
		            	$ultimo = $arrayCount[count($arrayCount) - 1];
		            	$penultimo = $arrayCount[count($arrayCount) - 2];

						if($ultimo > $penultimo){
			            	if(empty($lastArray)){
			            		$lastArray[0] = $contagem;
			            	}else{
			            		array_push($lastArray, $contagem); 
			            	}
			            	$contagem = 1;
			            }else{
			            	if($ultimo < $penultimo){
			            		$contagem = $lastArray[count($lastArray) - 1]; 
			            		unset($lastArray[count($lastArray) - 1]);
			            		sort($lastArray);
			            	}
			            }	            	
		            }

		            $contagemPai = "";
		            for($j = 0; $j < $count; $j++){
		            	if(empty($contagemPai)){
		            		$contagemPai = 	($lastArray[$j] - 1);
		            	}else{
		            		$contagemPai = ($contagemPai . '.' . ($lastArray[$j] - 1) ); 	
		            	}
		            }
		            
		            if($count == 0){
		            	$list[$i][$this->modelName]['numero'] = $contagem ;
		            }else{
		            	$list[$i][$this->modelName]['numero'] = ( $contagemPai ) . '.' . $contagem ;
		            }
		            $stack[] = $item[$this->modelName]['rght'];
		            $contagem++;
		        }
	        }else{
	        	return null;
	        }	
    	}
    	catch(Exception $ex){
    		// error
    	} 

    	if($convert){
    		return $this->converterToList($list);
    	}
        
        return $list;
    }

    public function converterToList($arrayParam){
		$array_list = null;

		if(!empty($arrayParam)){
			foreach ($arrayParam as $key => $item) {
				$array_list[$item[$this->modelName]['id']] = ($item[$this->modelName]['numero'] . ' - ' .  $item[$this->modelName]['titulo']);
			}
		}

		return $array_list;
	}
}