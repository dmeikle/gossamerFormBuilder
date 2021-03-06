<?php

namespace Gossamer\CMS\Forms\Controls;

/**
 * Description of ButtonControl
 *
 * @author davem
 */
class ButtonControl extends AbstractControl{
    
   
    protected $box = '<input type="button" name="|NAME|"|PARAMS| />';
    
    public function build($name, array $params = null, &$validationResults = null, $wrapperName = null, $isQuestionBuilder = false) {
        
        $box = str_replace('|NAME|', $name, $this->box);
        
        $this->buildParams($name, $box, $params, $validationResults, $wrapperName);
        
        return $box;
    }


}
