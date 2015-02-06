<?php


namespace Gossamer\CMS\Forms\Controls;

use Gossamer\CMS\Forms\Controls\AbstractMultiChoiceControl;

/**
 * Description of TextBox
 *
 * @author Dave Meikle
 */
class CheckBoxControl extends AbstractMultiChoiceControl {
    
    
    public function build($name, array $params = null, &$validationResults = null, $wrapperName = null) {
        $this->textBox = '<input type="checkbox" name="|NAME|" value="|VALUE|"|PARAMS| /> |TEXT|';
        
        return parent::build($name, $params, $validationResults, $wrapperName);
    }

    
}
