<?php

namespace Gossamer\DBFramework\CMS\Forms\Controls;

use Gossamer\DBFramework\CMS\Forms\Controls\AbstractControl;

/**
 * Description of TextBox
 *
 * @author Dave Meikle
 */
class EmailTextBoxControl extends TextBoxControl {
    
    public function __construct() {
        $this->textBox = '<input type="text" name="|NAME|"|PARAMS| />';
    }    
    
}
