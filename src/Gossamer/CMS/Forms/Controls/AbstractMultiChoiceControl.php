<?php

namespace Gossamer\CMS\Forms\Controls;

use Gossamer\CMS\Forms\Exceptions\ParameterNotFoundException;

/**
 * Description of AbstractControl
 *
 * @author Dave Meikle
 */
abstract class AbstractMultiChoiceControl  extends AbstractControl{
    
    
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
            if($key == 'values') {
               //we'll do this last
               continue;                
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
        if(!$idSet) {
            $idName = str_replace(']', '', $fieldName);
            $idName = str_replace('[', '_', $idName);
            $paramList .= ' id="' . (!is_null($wrapperName)? $wrapperName . '_' : '')   . $idName . '"';
        }
        
        $control = str_replace('|PARAMS|', $paramList, $control);
        print_r($params);
        $retval = '';
        if(array_key_exists('values', $params)) {
            foreach($params['values'] as $param) {
                $retval .= str_replace('|VALUE|', $this->formatValue($fieldName, $param, $validationResults), $control). "\r\n";
            }
        } else {
           if(array_key_exists('value', $params) ) {
                $retval .= str_replace('|VALUE|', $this->formatValue($fieldName, $params['value'], $validationResults), $control). "\r\n";
            }
        }
        
        $control = $retval;
    }
    
}
