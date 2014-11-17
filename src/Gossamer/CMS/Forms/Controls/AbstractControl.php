<?php

namespace Gossamer\CMS\Forms\Controls;

/**
 * Description of AbstractControl
 *
 * @author Dave Meikle
 */
abstract class AbstractControl {
    
    public abstract function build($name, array $params = null);
    
    protected function buildParams(&$control, array $params = null) {
        if(is_null($params)) {
            $control = str_replace('|PARAMS|', '', $control);
            
            return;
        }
        
        $paramList = '';
        foreach($params as $key => $param) {
            $paramList .= " $key=\"$param\"";
        }
        
        $control = str_replace('|PARAMS|', $paramList, $control);
    }
}
