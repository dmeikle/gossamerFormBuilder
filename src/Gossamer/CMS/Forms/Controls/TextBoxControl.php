<?php


namespace Gossamer\CMS\Forms\Controls;

use Gossamer\CMS\Forms\Controls\AbstractControl;

/**
 * Description of TextBox
 *
 * @author Dave Meikle
 */
class TextBoxControl extends AbstractControl {
    
    private $textBox = '<input type="text" name="|NAME|"|PARAMS| />';
    
    public function build($name, array $params = null) {
        $textBox = str_replace('|NAME|', $name, $this->textBox);
        
        $this->buildParams($textBox, $params);
        
        return $textBox;
    }

    
}
