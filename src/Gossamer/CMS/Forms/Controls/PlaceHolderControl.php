<?php


namespace Gossamer\CMS\Forms\Controls;

use Gossamer\CMS\Forms\Controls\AbstractControl;

/**
 * since we don't want to put logic in the html (checking to see if the control
 * was created we will move logic to the formbuilder - we can add the control
 * or if logic dictates we can't have it, we use a placeholder to make the code
 * seemless in the html page
 *
 * @author Dave Meikle
 */
class PlaceHolderControl extends AbstractControl {
    
    
    public function build($name, array $params = null, &$results = null, $wrapperName = null) {
        
        $textBox = '';
        
        return $textBox;
    }
    
}
