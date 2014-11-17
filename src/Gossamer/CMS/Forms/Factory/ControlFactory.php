<?php

namespace Gossamer\CMS\Forms\Factory;

/**
 * Description of ControlFactory
 *
 * @author Dave Meikle
 */
class ControlFactory {
    
    private $controls = array();
    
    public function getControl($controlName) {
        if(!array_key_exists($controlName, $this->controls)) {
            $control = 'Gossamer\\CMS\\Forms\\Controls\\' . $controlName;
            $this->controls[$controlName] = new $control();
        }
        
        return $this->controls[$controlName];
    }
}
