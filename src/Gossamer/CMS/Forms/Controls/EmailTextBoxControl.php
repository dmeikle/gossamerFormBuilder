<?php

namespace Gossamer\CMS\Forms\Controls;

use Gossamer\CMS\Forms\Controls\TextBoxControl;

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
