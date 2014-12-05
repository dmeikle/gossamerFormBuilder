<?php


namespace Gossamer\CMS\Forms\Controls;

use Gossamer\CMS\Forms\Controls\AbstractMultiChoiceControl;

/**
 * Description of TextBox
 *
 * @author Dave Meikle
 */
class RadioButtonControl extends AbstractMultiChoiceControl {
    
    private $textBox = '<input type="radio" name="|NAME|" value="|VALUE|"|PARAMS| />';
    
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
