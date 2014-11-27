<?php

namespace Gossamer\CMS\Forms;

use Monolog\Logger;
use Gossamer\CMS\Forms\Factory\ControlFactory;
use Gossamer\CMS\Forms\FormBuilderInterface;


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
    
    private $formWrapperName = null;
    
    public function __construct(Logger $logger, FormBuilderInterface $model = null) {
        $this->logger = $logger;
        if(!is_null($model)) {
            $this->formWrapperName = $model->getFormWrapper();
        }
                
        $this->form = array();
    }
    
    public function addValidationResults(array $results = null) {
        $this->results = $results;
    }
    
    public function getForm() {
       return $this->form;
    }
    
    public function add($fieldName, $controlType, array $params = null, array $locales = null) {
        $control = $this->getControl($controlType);
        
        if(!is_null($locales)) {
            foreach($locales as $locale) {
                $localeParams = $params;
                unset($localeParams['value']);
                $localeParams['value'] =  $params['value'][$locale['locale']];                
                $localeFieldName = 'locale][' . $locale['locale'] .'][' . $fieldName;
                if(is_null($this->formWrapperName)) {
                    $localeFieldName = $fieldName . '[locale][' . $locale['locale'] .']';
                }
                $this->form[$fieldName]['locales'][$locale['locale']] = $this->addValidationResult($fieldName, $control->build($localeFieldName, $localeParams, $this->results, $this->formWrapperName));
            }
        } else {
            $this->form[$fieldName] = $this->addValidationResult($fieldName, $control->build($fieldName, $params, $this->results, $this->formWrapperName));
        }
        
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
