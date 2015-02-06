<?php

namespace Gossamer\CMS\Forms\Controls;

use Gossamer\CMS\Forms\Exceptions\ParameterNotFoundException;

/**
 * Description of AbstractControl
 *
 * @author Dave Meikle
 */
abstract class AbstractMultiChoiceControl  extends AbstractControl{
    
    protected $textBox;
    
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
                continue;
            }
            
            if($key == 'values') {
               //we'll do this last
               continue;                
            } elseif ($key == 'id') {
                $paramList .= " id=\"$param\"";
                $idSet = true;
            } elseif($key == 'value') {
                continue;
            }
            else {
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
       
        $retval = '';
        
        if(array_key_exists('values', $params)) {
            foreach($params['values'] as $param) {
                $retval .= str_replace('|VALUE|', $this->formatValue($fieldName, $param, $validationResults), $control). "\r\n";
            }
            $control = $retval;
        } else {
           if(array_key_exists('value', $params) ) {
                $retval .= str_replace('|VALUE|', $this->formatValue($fieldName, $params['value'], $validationResults), $control). "\r\n";
                $control = $retval;
            }
        }       
        
    }
    
    public function build($name, array $params = null, &$validationResults = null, $wrapperName = null) {
        
        $textBox = '';
        if(!is_null($wrapperName)) {
            $textBox = str_replace('|NAME|', $wrapperName . '[' . $name . ']' . $this->getControlArrayId($params), $this->textBox);
        } else {
            $textBox = str_replace('|NAME|', $name . $this->getControlArrayId($params), $this->textBox);
        }
   
        if(array_key_exists('text', $params)) {
            $textBox = str_replace('|TEXT|', $params['text'], $textBox);
            unset($params['text']);
        }elseif(array_key_exists('answer', $params)) {
            $textBox = str_replace('|TEXT|', $params['answer'], $textBox);
            unset($params['answer']);
        }
        $id = $wrapperName . '_question';
        if(array_key_exists('id', $params)) {
            $id .= '_' . $params['id'];
            if(!array_key_exists('value', $params)) {
                $params['value'] = $params['id'];
            }
            unset($params['id']);
            unset($params['Questions_id']);
        }elseif(array_key_exists('Questions_id', $params)) {
            $id .= '_' . $params['Questions_id'];
            unset($params['Questions_id']);
        }
        if(array_key_exists('Answers_id', $params)) {
            $id .= '_' . $params['Answers_id'];
            if(!array_key_exists('value', $params)) {
                $params['value'] = $params['Answers_id'];
            }
            unset($params['Answers_id']);
        }
        $params['id'] = $id;
        
        $this->buildParams($name, $textBox, $params, $validationResults, $wrapperName);
        //just in case there was no text
        $textBox = str_replace('|TEXT|', '', $textBox);
        
        return $textBox;
    }

    private function getControlArrayId(array $params = null) {
        
        if(is_null($params) || !array_key_exists('id', $params)) {
            return;
        }
        
        return '[' . $params['Questions_id'] . '][]';
        
    }
    
}
