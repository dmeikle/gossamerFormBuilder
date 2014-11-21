<?php


namespace Gossamer\CMS\Forms\Controls;

/**
 * Description of PasswordControl
 *
 * @author davem
 */
class PasswordControl extends AbstractControl{
    
    protected $textBox = '<input type="password" name="|NAME|"|PARAMS| />';
    
    public function build($name, array $params = null, &$results = null, $wrapperName = null) {
        if(!is_null($wrapperName)) {
            $textBox = str_replace('|NAME|', $wrapperName . '[' . $name . ']', $this->textBox);
        } else {
            $textBox = str_replace('|NAME|', $name, $this->textBox);
        }
        
        $formattedResults = $results;
        unset($formattedResults['password']);
        unset($params['value']);
        
        $this->buildParams($name, $textBox, $params, $formattedResults, $wrapperName);
        
        return $textBox;
    }
    
}
