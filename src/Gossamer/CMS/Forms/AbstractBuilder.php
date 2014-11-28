<?php


namespace Gossamer\CMS\Forms;

use Gossamer\Caching\CacheManager;
use core\AbstractModel;

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
    
    public function getLocalesFields(AbstractModel $model) {
        $fields = $model->getEmptyModelStructure();
        
        foreach($fields as $row) {
            if(array_key_exists('locales', $rows)) {
                
                return $this->drawLocalesColumns($locales, $row['locales']);                
            }
        }
        
        return null;
    }
    
    private function drawLocalesColumns(array $locales, array $row) {
        $retval = array();
        
        foreach($this->locales as $locale) {
            $key = $locale['locale'];
            foreach($row as $column) {
                $retval[$key][$column['Field']] = '';
            }            
        }
        
        return $retval;
    }
}
