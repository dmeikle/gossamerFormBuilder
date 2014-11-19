<?php

namespace Gossamer\DBFramework\CMS\Forms\Controls;

/**
 * Description of SubmitButtonControl
 *
 * @author davem
 */
class SubmitButtonControl extends ButtonControl{
    
    public function __construct() {
        $this->box = '<input type="submit" name="|NAME|"|PARAMS| />';
    }
}
