<?php


namespace Gossamer\CMS\Forms;


/**
 *
 * @author davem
 */
abstract class AbstractBuilder {
    
    private $locales = array();
    
    public function setLocales(array $locales) {
        $this->locales = $locales;
    }
    
    abstract public function buildForm(FormBuilder $builder, array $values = null, array $options = null, array $validationResults = null);
    
    
    public function getValue($key, array $result = null) {
        if(is_null($result) || !array_key_exists($key, $result)) {
            return '';
        }
        
        return $result[$key];
    }
    
    public function getLocalesFields(FormBuilderInterface $model) {
        $fields = $model->getEmptyModelStructure();
       
        foreach($fields['mappings'] as $row) {
            
            if(array_key_exists('locales', $row)) {
               
                return $this->drawLocalesColumns($row['locales']);                
            }
        }
        
        return null;
    }
    
    private function drawLocalesColumns(array $row) {
        $retval = array();
        
        foreach($this->locales as $locale) {
            $key = $locale['locale'];
            foreach($row as $column) {
              
                $retval[$key][$column['Field']] = '';
            }            
        }
        
        return $retval;
    }
    
    protected function buildLocaleValuesArray($fieldName, array $values = null, array $locales = null) {
        
        $retval = array();
        
        foreach($locales as $key => $row) {
            if(is_array($values) && array_key_exists('locales', $values)) {
                $retval[$key] = $values['locales'][$key][$fieldName];
            } else {
                $retval[$key] = '';
            }                
            
        }
       
        return $retval;
    }
}
