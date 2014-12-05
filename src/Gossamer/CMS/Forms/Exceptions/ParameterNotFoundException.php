<?php

namespace Gossamer\CMS\Forms\Exceptions;


/**
 * Description of ParameterNotFoundException
 *
 * @author davem
 */
class ParameterNotFoundException extends \Exception{
    
    public function __construct ($message = '', $code = 590, $previous = null) {
        if(strlen($message)) {
            $message = "'values' key missing from array. Did you use 'value' instead?";
        }
        parent::__construct($message, $code, $previous);
    }
}
