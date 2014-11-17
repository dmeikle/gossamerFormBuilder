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
    
    public function build($name, array $params = null, &$validationResults = null, $wrapperName = null) {
         if(!is_null($wrapperName)) {
            $textBox = str_replace('|NAME|', $wrapperName . '[' . $name . ']', $this->textBox);
        } else {
            $textBox = str_replace('|NAME|', $name, $this->textBox);
        }
        
        $this->buildParams($name, $textBox, $params, $validationResults, $wrapperName);
        
        return $textBox;
    }

    
}
