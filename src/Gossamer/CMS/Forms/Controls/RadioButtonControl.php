<?php


namespace Gossamer\CMS\Forms\Controls;

use Gossamer\CMS\Forms\Controls\AbstractControl;

/**
 * Description of TextBox
 *
 * @author Dave Meikle
 */
class RadioButtonControl extends AbstractControl {
    
    private $textBox = '<input type="radio" name="|NAME|"|PARAMS| />';
    
    public function build($name, array $params = null, &$validationResults = null) {
        $textBox = str_replace('|NAME|', $name, $this->textBox);
        
        $this->buildParams($name, $textBox, $params, $validationResults);
        
        return $textBox;
    }

    protected function buildParams($fieldName, &$control, array $params = null, &$validationResults) {
        if(is_null($params)) {
            $control = str_replace('|PARAMS|', '', $control);
            
            return;
        }
        
        $paramList = '';
        $value = '';
        foreach($params as $key => $param) {
            if($key == 'value') {
                $value = $param;
            } else {
                $paramList .= " $key=\"$param\"";
            }            
        }
        
        $control = str_replace('|PARAMS|', $paramList, $control) . $value;
    }
}
