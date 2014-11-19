<?php

namespace Gossamer\CMS\Forms\Controls;

/**
 * Description of AbstractControl
 *
 * @author Dave Meikle
 */
abstract class AbstractControl {
    
    public abstract function build($name, array $params = null, &$validationResults = null, $wrapperName = null);
    
    protected function buildParams($fieldName, &$control, array $params = null, &$validationResults = null, $wrapperName = null) {
        if(is_null($params)) {   
            if(is_array($validationResults) && array_key_exists($fieldName . '_value', $validationResults)) {               
                $value = ' value="' . $validationResults[$fieldName . '_value'] . '"';
                $control = str_replace('|PARAMS|', $value, $control);
            } else {               
                $control = str_replace('|PARAMS|', '', $control);
            }            
            
            return;
        }
       
        $valueSet = false;
        $idSet = false;
        
        $paramList = '';
        foreach($params as $key => $param) {
            if($key == 'value') {
                $paramList .= " value=\"" . $this->formatValue($fieldName, $param, $validationResults) . "\"";
                $valueSet = true;
            } elseif ($key == 'id') {
                $paramList .= " id=\"$param\"";
                $idSet = true;
            }else {
                $paramList .= " $key=\"$param\"";
            }
        }
        
        if(!$valueSet && is_array($validationResults) && array_key_exists($fieldName . '_value', $validationResults)) {
            $paramList .= " value=\"" . $this->formatValue($fieldName, $param, $validationResults) . "\"";
        }
        if(!$idSet && !is_null($wrapperName)) {
            $paramList .= ' id="' . $wrapperName . '_' . $fieldName . '"';
        }
        
        $control = str_replace('|PARAMS|', $paramList, $control);
    }
    
    private function formatValue($fieldName, $value, &$validationResults) {
        if(is_array($validationResults) && array_key_exists($fieldName . '_value', $validationResults)) {
            return $validationResults[$fieldName . '_value'];
        }
        
        return $value;
    }
}
