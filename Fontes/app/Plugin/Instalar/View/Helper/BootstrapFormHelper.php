<?php
App::uses('FormHelper', 'View/Helper');

class BootstrapFormHelper extends FormHelper
{
    public function create($model = null, $options = array())
    {
        $defaultOptions = array(
            'inputDefaults' => array(
                'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                'div' => array(
                    'class' => 'input-group',
                ),
                'label' => false,
                //'between' => '<div class="col-md-10">',
                //'seperator' => '</div>',
                //'after' => '</div>',
                'class' => 'form-control input-sm',
                'error' => array(
                    'attributes' => array(
                        'wrap' => 'span',
                        'class' => 'help-block',
                    ),
                ),
            ),
            //'class' => 'form-horizontal',
            'role' => 'form',
        );
        
        if (!empty($options['inputDefaults'])) {
            $options = array_merge($defaultOptions['inputDefaults'], $options['inputDefaults']);
        } else {
            $options = array_merge($defaultOptions, $options);
        }

        return parent::create($model, $options);
    }
    
    // Remove this function to show the fieldset & language again
    public function inputs($fields = null, $blacklist = null, $options = array())
    {
        $options = array_merge(array('fieldset' => false), $options);
        
        return parent::inputs($fields, $blacklist, $options);
    }
    
    public function submit($caption = null, $options = array())
    {
        $defaultOptions = array(
            'class' => 'btn btn-primary',
            'div' =>  'form-group',
        );
        $options = array_merge($defaultOptions, $options);     
        
        return parent::submit($caption, $options);
    }

    protected function _parseOptions($options)
    {
        if (!empty($options['label'])) {
            //manage case 'label' => 'your label' as well as 'label' => array('text' => 'your label') before array_merge()
            if (!is_array($options['label'])) {
                $options['label'] = array('text' => $options['label']);
            }
            if (!empty($this->_inputDefaults)) {
                $inputLabel = $this->_inputDefaults['label'];
                if (!is_array($this->_inputDefaults['label'])) $inputLabel = array($inputLabel);
                
                $options['label'] = array_merge_recursive($options['label'], $inputLabel);
            }
        }
        $options = array_merge(
            array('before' => null),
            $this->_inputDefaults,
            $options
        );
        return parent::_parseOptions($options);
    }
}