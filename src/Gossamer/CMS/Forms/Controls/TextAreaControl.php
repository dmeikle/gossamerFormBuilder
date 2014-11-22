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
    
    public function build($name, array $params = null, &$results = null, $wrapperName = null) {
        if(!is_null($wrapperName)) {
            $textBox = str_replace('|NAME|', $wrapperName . '[' . $name . ']', $this->textBox);
        } else {
            $textBox = str_replace('|NAME|', $name, $this->textBox);
        }
        
        $this->buildParams($name, $textBox, $params, $results, $wrapperName);
        
        return $textBox;
    }
    
}
