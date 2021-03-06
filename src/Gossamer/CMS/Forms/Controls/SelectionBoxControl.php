<?php

namespace Gossamer\CMS\Forms\Controls;

/**
 * Description of SelectionBoxControl
 *
 * @author davem
 */
class SelectionBoxControl extends TextBoxControl{
    
    protected $box = '<select name="|NAME|"|PARAMS|>|OPTIONS|</select>'; 
    
    public function build($name, array $params = null, &$validationResults = null, $wrapperName = null, $isQuestionBuilder = false) {
       
        $multi = false;
        if(is_array($params) && array_key_exists('multiple', $params)) {
            $multi = true;
        }
        
        if(!is_null($wrapperName)) {
            $box = str_replace('|NAME|', $wrapperName . '[' . $name . ']' . (($multi) ? '[]' : ''), $this->box);
        } else {
            $box = str_replace('|NAME|', (($multi) ? $name . '[]' : $name), $this->box);
        } 
        
        $options = '';
        if(is_array($params) && array_key_exists('options', $params)) {
            $options = $params['options'];
            unset($params['options']);
        }
        unset($params['value']);        
        
        $this->buildParams($name, $box, $params, $validationResults, $wrapperName);
        
        $box = str_replace('|OPTIONS|', $options, $box);
        
        return $box;
    }

}
