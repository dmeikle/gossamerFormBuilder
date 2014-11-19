<?php


namespace Gossamer\CMS\Forms;

/**
 *
 * @author davem
 */
abstract class AbstractBuilder {
    
    abstract public function buildForm(FormBuilder $builder, array $values = null, array $options = null, array $validationResults);
    
    
    public function getValue($key, array $result = null) {
        if(is_null($result) || !array_key_exists($key, $result)) {
            return '';
        }
        
        return $result[$key];
    }
    
}
