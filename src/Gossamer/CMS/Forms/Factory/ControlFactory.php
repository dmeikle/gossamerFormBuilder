<?php

namespace Gossamer\DBFramework\CMS\Forms\Factory;

/**
 * Description of ControlFactory
 *
 * @author Dave Meikle
 */
class ControlFactory {
    
    private $controls = array();
    
    private $namingConvention = array(
        'text' => 'TextBox',
        'radio' => 'RadioButton',
        'check' => 'CheckBox',
        'hidden' => 'HiddenInput',
        'textarea' => 'TextArea',
        'submit' => 'SubmitButton',
        'button' => 'Button',
        'cancel' => 'CancelButton',
        'email' => 'EmailTextBox',
        'password' => 'Password',
        'select' => 'SelectionBox'
    );
    
    public function getControl($controlName) {
        if(!array_key_exists($controlName, $this->controls)) {
            $control = 'Gossamer\DBFramework\\CMS\\Forms\\Controls\\' . $this->namingConvention[$controlName] . 'Control';
            $this->controls[$controlName] = new $control();
        }
      
        return $this->controls[$controlName];
    }
}
