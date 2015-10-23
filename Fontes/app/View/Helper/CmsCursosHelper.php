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

App::uses('CmsCurso', 'View/Helper/Din');

class CmsCursosHelper extends AppHelper {
			
	/**
	 * Retorna os cursos de acordo com os requisitos de query informados em '$options'.
	 * @param $options requisitos da query no padrão CakePHP () 
	 * @return array Cursos  
	 */
	public function getCursos(array $options = array()) {
		if(!isset($options['order'])){
			$options['order'] = array("Curso.nome ASC");
		}
		pr($options);
		$opt = urlencode(json_encode($options));
	
		$cursos = $this->requestAction(array('ra' => true, 
											'plugin' => 'cursos', 
				      				        'controller' => 'cursos', 
				      				        'action' => 'ra_query', 'all', $opt));
														
		$cmsCursos = array();
		foreach ($cursos as $curso) {
			$cmsCursos[] = new CmsCurso($curso['Curso'], $this->_View);
		}
											
		return $cmsCursos;	
	}

	/**
	 * Retorna o curso com $id, ou null caso não exista
	 * @param $id ID do curso 
	 * @return array Curso 
	 */
	public function getCurso($id) {
		if ($id) {
			$curso = $this->requestAction(array('ra' => true, 
											  'plugin' => 'cursos', 
				      				          'controller' => 'cursos', 
				      				          'action' => 'ra_view'), array($id));
			
			return new CmsCurso($curso['Curso'], $this->_View);
		} else {
			return null;
		}
	}

	/**
	 * Retorna os cursos ordenados por modalidades
	 *
	 * @param String $order
	 * @return array Cursos  
	 */
	public function getCursosByModalidade($order = 'ASC') {

		return $this->getCursos( array('order' => array("Modalidade.titulo $order")) );
	}

	/**
	 * Retorna os cursos ordenados por campus
	 *
	 * @param String $order
	 * @return array Cursos  
	 */
	public function getCursosByCampus($order = 'ASC') {
		return $this->getCursos( array('order' => array("Curso.site_id $order")) );
	}

	/**
	 * Retorna os cursos ordenados por turnos
	 *
	 * @param String $order
	 * @return array Cursos  
	 */
	public function getCursosByTurnos($order = 'DESC') {
		return $this->getCursos( array('order' => array("Curso.turno_manha      $order",
														"Curso.turno_tarde      $order",
														"Curso.turno_vespertino $order",
														"Curso.turno_noite      $order") ) );
	}

	/**
	 * Retorna os cursos pelo filtro de turnos (turnos ordenados)
	 *
	 * @param String $order
	 * @return array Cursos  
	 */
	public function getCursosByFilterTurno($turno_manha = true, $turno_tarde = true, $turno_vespertino = true, $turno_noite = true, $order = 'DESC') {

		if($turno_manha){
			$ordenacao[] = array("Curso.turno_manha $order");
			$condition[] = array('Curso.turno_manha' => 1);
		}

		if($turno_tarde){
			$ordenacao[] = array("Curso.turno_tarde $order");
			$condition[] = array('Curso.turno_tarde' => 1);
		}

		if($turno_vespertino){
			$ordenacao[] = array("Curso.turno_vespertino $order");
			$condition[] = array('Curso.turno_vespertino' => 1);
		}

		if($turno_noite){
			$ordenacao[] = array("Curso.turno_noite $order");
			$condition[] = array('Curso.turno_noite' => 1);
		}

		if(isset($condition)){
			return $this->getCursos( array('conditions' => array('OR' => $condition), 'order' => array($ordenacao, "Curso.nome $order") ) );
		}else{
			return array();
		}
	}
}


