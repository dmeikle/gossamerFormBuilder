<?php


namespace Gossamer\CMS\Forms\Controls;

use Gossamer\CMS\Forms\AbstractControl;

/**
 * Description of TextBox
 *
 * @author Dave Meikle
 */
class TextBoxControl extends AbstractControl {
    
    private $textBox = '<input type="text" name="|NAME|" value="|VALUE|"|PARAMS| />';
    
    public function build($name, $value, array $params = null) {
        $textBox = str_replace('|NAME|', $name, $this->textBox);
        $textBox = str_replace('|VALUE|', $value, $textBox);   
        $this->buildParams($textBox, $params);
        
        return $textBox;
    }

    
}
