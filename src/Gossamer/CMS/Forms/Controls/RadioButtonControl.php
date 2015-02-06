<?php


namespace Gossamer\CMS\Forms\Controls;

use Gossamer\CMS\Forms\Controls\AbstractMultiChoiceControl;

/**
 * Description of TextBox
 *
 * @author Dave Meikle
 */
class RadioButtonControl extends AbstractMultiChoiceControl {
    
    
    public function build($name, array $params = null, &$validationResults = null, $wrapperName = null, $isQuestionBuilder = false) {
        $this->textBox = '|TEXT| <input type="radio" name="|NAME|" value="|VALUE|"|PARAMS| />';
       
        return parent::build($name, $params, $validationResults, $wrapperName, $isQuestionBuilder);
    }
    
    
    
    
}
