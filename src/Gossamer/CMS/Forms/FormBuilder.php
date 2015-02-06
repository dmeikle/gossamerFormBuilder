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
    
    protected $logger = null;
    
    protected $form = array();
    
    protected $factory = null;
    
    protected $results = null;
    
    protected $formWrapperName = null;
    
    protected $model = null;
    
    public function __construct(Logger $logger = null, FormBuilderInterface $model = null) {
        $this->logger = $logger;
        if(!is_null($model)) {
            $this->formWrapperName = $model->getFormWrapper();
        }
        $this->model = $model; 
        $this->form = array();
    }
    
    public function addValidationResults(array $results = null) {
        $this->results = $results;
    }
    
    public function getForm() {
       return $this->form;
    }
    
    public function getModel() {
        return $this->model;
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
    
    protected function getControl($controlType) {
        return $this->getFactory()->getControl($controlType);
    }
    
    protected function getFactory() {
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
