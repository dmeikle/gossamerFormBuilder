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
    
    private $results = null;
    
    public function __construct(Logger $logger) {
        $this->logger = $logger;
        $this->form = array();
    }
    
    public function addValidationResults(array $results) {
        $this->results = $results;
    }
    
    public function getForm() {
       return $this->form;
    }
    
    public function add($fieldName, $controlType, array $params = null) {
        $control = $this->getControl($controlType);
        $this->form[$fieldName] = $this->addValidationResult($fieldName, $control->build($fieldName, $params));
        
        return $this;
    }
    
    private function getControl($controlType) {
        return $this->getFactory()->getControl($controlType);
    }
    
    private function getFactory() {
        if(is_null($this->factory)) {
            $this->factory = new ControlFactory();
        }
        
        return $this->factory;
    }
    
    public function addValidationResult($fieldName, $control) {
        if(is_array($this->results) && array_key_exists($fieldName, $this->results)) {
            $control .= "\r\n" . '<div class="validation_error">|' . $this->results[$fieldName] . '|</div>';
        }
        
        return $control;
    }
    
}
