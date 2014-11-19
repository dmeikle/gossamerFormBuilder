<?php


namespace Gossamer\DBFramework\CMS\Forms\Controls;

/**
 * Description of CancelButtonControl
 *
 * @author davem
 */
class CancelButtonControl extends ButtonControl{
   
    public function __construct() {
        $this->box = '<input type="cancel" name="|NAME|"|PARAMS| />';
    }
}
