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
App::uses('FormHelper', 'View/Helper');

class CmsAdminFormHelper extends FormHelper {
 
  public function create($model = null, $options = array()) {

    if(!isset($options['inputDefaults']['div'])) {
      $options['inputDefaults']['div'] = false;
    }

    if(!isset($options['novalidate'])) {
      $options['novalidate'] = true;
    }

    if (is_array($model) && empty($options)) {
      $options = $model;
      $model = null;
    }

    return parent::create($model, $options);
  }

  public function error($field, $text = null, $options = array()) {
    if($options['wrap'] == false) {
      return parent::error($field, $text, $options);
    }
      
    $options['wrap'] = 'span';
    return parent::error($field, $text, $options);
  }

  public function day($fieldName = null, $attributes = array()) {
    $label = $this->label($fieldName . ".day", ucfirst(__('day')), array('class' => 'oculto'));
    $input = parent::day($fieldName, $attributes);
    return $label . $input;
  }

  public function month($fieldName, $attributes = array()) {
    $label = $this->label($fieldName . '.month', ucfirst(__('month')), array('class' => 'oculto'));
    $input = parent::month($fieldName, $attributes);
    return $label . $input;
  }

  public function hour($fieldName, $format24Hours = false, $attributes = array()) {
    $label = $this->label($fieldName . '.hour', ucfirst(__('hour')), array('class' => 'oculto'));
    $input = parent::hour($fieldName, $format24Hours, $attributes);
    return $label . $input;
  }

  public function minute($fieldName, $attributes = array()) {
    $label = $this->label($fieldName . '.min', ucfirst(__('minute')), array('class' => 'oculto'));
    $input = parent::minute($fieldName, $attributes);
    return $label . $input;
  }

  public function year($fieldName, $minYear = null, $maxYear = null, $attributes = array()) {
    $label = $this->label($fieldName . '.year', ucfirst(__('year')), array('class' => 'oculto'));
    $input = parent::year($fieldName, $minYear, $maxYear ,$attributes);
    return $label . $input;
  }

  public function meridian($fieldName, $attributes = array()) {
    $label = $this->label($fieldName . '.meridian', ucfirst(__('meridian')), array('class' => 'oculto'));
    $input = parent::year($fieldName, $attributes);
    return $label . $input;
  }

  public function input($fieldName, $options = array()) {
    $options['error'] = false;
    if(isset($options['type']) && ($options['type'] === 'datetime' || $options['type'] === 'date' || $options['type'] === 'time')) {
      
      if(!isset($options['label']) || $options['label'] == '')
        $options['label'] = $this->_getLabelText($fieldName);

      $legend = $this->Html->tag('legend', $options['label']); 

      $options['label'] = false;
      $input = parent::input($fieldName, $options);
      
      $opt = array();
      if(isset($options['class']))
        $opt['class'] = $options['class'];

      if(isset($options['id']))
        $opt['id'] = $options['id'];

      return $this->Html->tag('fieldset', $legend . $input, $opt);
    } elseif(isset($options['type']) && ($options['type'] === 'submit')) {
      return $this->submit($fieldName, $options);
    }

    $modelKey = $this->model();
    $fieldKey = $this->field();

    if($this->isFieldError($fieldName)) {
      $options['title'] = $this->error($fieldName, null, array('wrap' => false));
    }

    return parent::input($fieldName, $options);
  }

  public function label($fieldName = null, $text = null, $options  = array()) {
    if ($text === null)
      $text = $this->_getLabelText($fieldName);     

    $modelKey = $this->model();
    $fieldKey = $this->field();

    if ($this->_introspectModel($modelKey, 'validates', $fieldKey)) {
      if(!($modelKey . '.' . $fieldKey === 'Mime.ativo')){
        $text .= '<span class="oculto obrigatorio">Obrigatório</span>';
      }
    } 

    if($this->isFieldError($fieldName)) {
      $text .= $this->error($fieldName, null, array('class' => 'oculto error', 'wrap' => 'span'));
      $options['class'] = 'error';
    }

    return parent::label($fieldName, $text, $options);
  }

  public function submit($caption = null, $options = array()) {
    if(!isset($options['div']))
      $options['div'] = false;

    if(!isset($options['label']))
      $options['label'] = false;

    if(!isset($options['name']))
      $options['name'] = strtolower($caption);

    return parent::submit(ucfirst($caption), $options);
  }

  private function _getLabelText($fieldName) {
    if (strpos($fieldName, '.') !== false) {
        $fieldElements = explode('.', $fieldName);
        $text = array_pop($fieldElements);
      } else {
        $text = $fieldName;
      }
      if (substr($text, -3) === '_id') {
        $text = substr($text, 0, -3);
      }
      return __(Inflector::humanize(Inflector::underscore($text)));
  }
  
}