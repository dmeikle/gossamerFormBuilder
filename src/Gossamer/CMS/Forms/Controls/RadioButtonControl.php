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
    
    public function build($name, array $params = null) {
        $textBox = str_replace('|NAME|', $name, $this->textBox);
        
        $this->buildParams($textBox, $params);
        
        return $textBox;
    }

    protected function buildParams(&$control, array $params = null) {
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
