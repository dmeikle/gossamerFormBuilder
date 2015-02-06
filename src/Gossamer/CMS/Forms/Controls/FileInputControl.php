<?php


namespace Gossamer\CMS\Forms\Controls;

use Gossamer\CMS\Forms\Controls\AbstractControl;

/**
 * Description of TextBox
 *
 * @author Dave Meikle
 */
class FileInputControl extends AbstractControl {
    
    protected $textBox = '<input type="file" name="|NAME|"|PARAMS| />';
    
    public function build($name, array $params = null, &$results = null, $wrapperName = null, $isQuestionBuilder = false) {

        $isControlArray = (array_key_exists('isArray', $params) && $params['isArray'] == 'true');
        $isQuestionBuilder = true;
        
        if(!is_null($wrapperName)) {
            if($isQuestionBuilder && array_key_exists('id', $params)) {
                $textBox = str_replace('|NAME|', $wrapperName . '[' . $name . '][' . $params['id'] . ']' . (($isControlArray) ? '[]' : ''), $this->textBox);
            }else{
                $textBox = str_replace('|NAME|', $wrapperName . '[' . $name . ']' . (($isControlArray) ? '[]' : ''), $this->textBox);
            }
        } else {
            if($isQuestionBuilder && array_key_exists('id', $params)){
                $textBox = str_replace('|NAME|', $name . '[' . $params['id'] . ']' . (($isControlArray) ? '[]' : ''), $this->textBox);
            }else{
                $textBox = str_replace('|NAME|', $name . (($isControlArray) ? '[]' : ''), $this->textBox);
            }
        }
        $this->buildParams($name, $textBox, $params, $results, $wrapperName);
       
        return $textBox;
    }
    
        
}
