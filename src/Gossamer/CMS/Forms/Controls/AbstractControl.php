<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Gossamer\CMS\Forms;

/**
 * Description of AbstractControl
 *
 * @author Dave Meikle
 */
abstract class AbstractControl {
    
    public abstract function build($name, $value);
    
    protected function buildParams(&$control, array $params = null) {
        if(is_null($params)) {
            str_replace('|PARAMS|', '', $control);
            
            return;
        }
        
        $paramList = '';
        foreach($params as $key => $param) {
            $paramList .= " $key=\"$param\"";
        }
        
        $control = str_replace('|PARAMS|', $paramList, $control);
    }
}
