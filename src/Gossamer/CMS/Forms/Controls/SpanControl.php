<?php


namespace Gossamer\CMS\Forms\Controls;

use Gossamer\CMS\Forms\Controls\AbstractControl;

/**
 * Description of SpanControl
 *
 * @author Dave Meikle
 */
class SpanControl extends AbstractControl {
    
    
    protected $textBox = '<span name="|NAME|" |PARAMS|>|VALUE|</span>';
    
    public function build($name, array $params = null, &$results = null, $wrapperName = null, $isQuestionBuilder = false) {

        $textBox = $this->textBox;
        $this->getControlName($name, $textBox, $params, $wrapperName, $isQuestionBuilder);
        
        $this->buildParams($name, $textBox, $params, $results, $wrapperName);
        
        return $textBox;
    }
    
}
