<?php

namespace Gossamer\CMS\Forms;

use Monolog\Logger;
use Gossamer\CMS\Forms\Factory\ControlFactory;

/**
 * Description of FormBuilder
 *
 * @author Dave Meikle
 */
class FormBuilder {
    
    private $logger = null;
    
    private $form = null;
    
    private $factory = null;
    
    public function __construct(Logger $logger) {
        $this->logger = $logger;
        $this->form = array();
    }
    
    public function getForm() {
       return $this->form;
    }
    
    public function add($fieldName, $controlType, array $params = null) {
        $control = $this->getControl($controlType);
        $this->form[$fieldName] = $control->build($fieldName, $params);
        
        return $this;
    }
    
    private function getControl($controlType) {
        $control = ucfirst($controlType);
        
        $this->getFactory()->getControl($control);
    }
    
    private function getFactory() {
        if(is_null($this->factory)) {
            $this->factory = new ControlFactory();
        }
        
        return $this->factory;
    }
    
}
