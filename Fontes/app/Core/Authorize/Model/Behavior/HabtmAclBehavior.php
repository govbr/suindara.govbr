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

App::uses('AclBehavior', 'Model');
App::uses('AclNode', 'Model');

class HabtmAclBehavior extends AclBehavior {

	public function afterSave(Model $model, $created) {
		$types = $this->_typeMaps[$this->settings[$model->name]['type']];
		if (!is_array($types)) {
			$types = array($types);
		}

		foreach ($types as $type) {
			$parents = $model->parentNode();

			if (!empty($parents)) {
				$parents = $this->node($model, $parents, $type);
			}

			// Editar root sem os perfis gera um array($parents) inválido
			if (!$parents) return;


			foreach($parents as $parent) {
				if(!$created)
					$this->afterDelete($model);
				if(isset($parent[$type]))
					$parent = $parent[$type];
				
				if(is_array($parent['id'])) {
					foreach($parent['id'] as $id) {
						$data = array(
							'parent_id' => $id,
							'model' => $model->name,
							'foreign_key' => $model->id
						);
						$model->{$type}->create();
						$model->{$type}->save($data);
					}
				} else {
					$data = array(
						'parent_id' => $parent['id'],
						'model' => $model->name,
						'foreign_key' => $model->id
					);

					$model->{$type}->create();
					$model->{$type}->save($data);
				}
			}
		}
	}

	public function afterDelete(Model $model) {
		$types = $this->_typeMaps[$this->settings[$model->name]['type']];
		if (!is_array($types)) {
			$types = array($types);
		}
		foreach ($types as $type) {
			$nodes = $this->node($model, null, $type);
			foreach($nodes as $node) {
				$extracted = Hash::extract($node, "{$type}.id");
				if (!empty($node) && $node[$type]['model'] == $model->name) {
					if(isset($node[$type]['id']))
						$node = $node[$type]['id'];
					$model->{$type}->delete($node);
				}
			}
		}
	}

}