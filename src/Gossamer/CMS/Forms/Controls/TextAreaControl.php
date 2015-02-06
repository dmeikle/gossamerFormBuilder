<?php


namespace Gossamer\CMS\Forms\Controls;

use Gossamer\CMS\Forms\Controls\AbstractControl;

/**
 * Description of TextBox
 *
 * @author Dave Meikle
 */
class TextAreaControl extends AbstractControl {
    
    
    protected $textBox = '<textarea  name="|NAME|" |PARAMS|>|VALUE|</textarea>';
    
    public function build($name, array $params = null, &$results = null, $wrapperName = null, $isQuestionBuilder = false) {

        $textBox = $this->textBox;
        $this->getControlName($name, $textBox, $params, $wrapperName, $isQuestionBuilder);
        
        $this->buildParams($name, $textBox, $params, $results, $wrapperName);
        
        return $textBox;
    }
    
}
