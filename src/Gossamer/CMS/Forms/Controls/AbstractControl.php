<?php

namespace Gossamer\CMS\Forms\Controls;

/**
 * Description of AbstractControl
 *
 * @author Dave Meikle
 */
abstract class AbstractControl {
    
    protected $childControls = null;
    
    public function addChild(AbstractControl $control) {
        if(is_null($this->childControls)) {
            $this->childControls = array();
        }
        
        $this->childControls = $control;
    }
    
    public function hasChildren() {
        return is_array($this->childControls) && count($this->childControls) > 0;
    }
    
    public function getChildControls() {
        if(is_null($this->childControls)) {
            $this->childControls = array();
        }
        
        return $this->childControls;
    }
    
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
            if(is_array($param)) {
                //could be building a controller that needs further drill down
                continue;
            }
            if($key == 'value') {
                if(strpos($control, '|VALUE|') === false) {
                    $paramList .= " value=\"" . $this->formatValue($fieldName, $param, $validationResults) . "\"";
                } else {
                    $control = str_replace('|VALUE|', $this->formatValue($fieldName, $param, $validationResults), $control);
                }
                $valueSet = true;
            } elseif ($key == 'values') {
                continue;                
            } elseif ($key == 'id') {
                $paramList .= " id=\"$param\"";
                $idSet = true;
            }else {
                $paramList .= " $key=\"$param\"";
            }
        }
        
        if(!$idSet) {
            $idName = str_replace(']', '', $fieldName);
            $idName = str_replace('[', '_', $idName);
            $paramList .= ' id="' . (!is_null($wrapperName)? $wrapperName . '_' : '')   . $idName . '"';
        }
        
        if(!$valueSet && is_array($validationResults) && array_key_exists($fieldName . '_value', $validationResults)) {
            $paramList .= " value=\"" . $this->formatValue($fieldName, $param, $validationResults) . "\"";
        }
        
        $control = str_replace('|PARAMS|', $paramList, $control);
        
        //ok - now let's see if this is a control array based on passed in params
        if(array_key_exists('values', $params)) {
            $retval = '';
            
            foreach($params['values'] as $value) {
                $tmpControl = str_replace('|VALUE|', $this->formatValue($fieldName, $param, $validationResults), $control);
                $retval .= $tmpControl . "\r\n";
            }
            
            $control = $retval;
        }
    }
    
    protected function getControlName($name, &$box, $params = null, $wrapperName = null) {
        $isControlArray = false;
       
        if(!is_null($params)) {
            if(array_key_exists('values', $params)) {
                $isControlArray = true;
            }
        }
      
        if(!is_null($wrapperName)) {
            $box = str_replace('|NAME|', $wrapperName . '[' . $name . ']' . (($isControlArray) ? '[]' : ''), $box);
        } else {
            $box = str_replace('|NAME|', $name . (($isControlArray) ? '[]' : ''), $box);
        }
        
    }
    
    protected function formatValue($fieldName, $value, &$validationResults) {
        if(is_array($validationResults) && array_key_exists($fieldName . '_value', $validationResults)) {
            return $validationResults[$fieldName . '_value'];
        }
        
        return $value;
    }
}
