<?php

namespace Gossamer\CMS\Forms\Factory;

/**
 * Description of ControlFactory
 *
 * @author Dave Meikle
 */
class ControlFactory {

    private $controls = array();

    const TEXTBOX = 'text';
    const RADIO = 'radio';
    const CHECKBOX = 'check';
    const HIDDEN = 'hidden';
    const TEXTAREA = 'textarea';
    const SUBMIT = 'submit';
    const BUTTON = 'button';
    const CANCEL = 'cancel';
    const EMAIL = 'email';
    const PASSWORD = 'passsword';
    const SELECT = 'select';
    const FILE = 'file';
    const SPAN = 'span';
    const PLACEHOLDER = 'placeholder';
    const LINK = 'link';
    
    private $namingConvention = array(
        'text' => 'TextBox',
        'radio' => 'RadioButton',
        'check' => 'CheckBox',
        'textarea' => 'TextArea',
        'submit' => 'SubmitButton',
        'button' => 'Button',
        'cancel' => 'CancelButton',
        'email' => 'EmailTextBox',
        'password' => 'Password',
        'select' => 'SelectionBox',
        'file' => 'FileInput',
        'span' => 'Span',
        'placeholder' => 'PlaceHolder',
        'hidden' => 'Hidden',
        'link' => 'Link'
    );

    public function getControl($controlName) {
        if (!array_key_exists($controlName, $this->controls)) {
            $control = 'Gossamer\\CMS\\Forms\\Controls\\' . $this->namingConvention[$controlName] . 'Control';
            $this->controls[$controlName] = new $control();
        }

        return $this->controls[$controlName];
    }

}
