<?php


namespace Gossamer\CMS\Forms\Controls;

use Gossamer\CMS\Forms\Controls\AbstractControl;

/**
 * Description of Hidden Control
 *
 * @author Dave Meikle
 */
class HiddenControl extends AbstractControl {
    
    protected $textBox = '<input type="hidden" name="|NAME|"|PARAMS| />';
    
    public function build($name, array $params = null, &$results = null, $wrapperName = null, $isQuestionBuilder = false) {
        
        $textBox = $this->textBox;
        $this->getControlName($name, $textBox, $params, $wrapperName, $isQuestionBuilder);
        
        $this->buildParams($name, $textBox, $params, $results, $wrapperName);
        
        return $textBox;
    }
    
}
