<?php

namespace tests\Gossamer\CMS\Forms;

use Gossamer\CMS\Forms\FormBuilder;

/**
 * Description of FormBuilderTest
 *
 * @author Dave Meikle
 */
class FormBuilderTest extends \tests\BaseTest{
    
    public function testAddTextBox() {
        $builder = new FormBuilder($this->getLogger());
        $control = $builder->add('test', 'text', array('value' => 'dave meikle', 'id' => 'test'));
        
        $form = $control->getForm();
        print_r($form);
    }
    
    public function testAddRadioButton() {
        $builder = new FormBuilder($this->getLogger());
         $results = array('firstname' => 'VALIDATION_INVALID_EMAIL',
             'firstname_value' => 'davemmyemail.com',
            'test' =>'SOME_FAIL_ON_TEST',
            'test_value' => 'some fail value');
        $builder->addValidationResults($results);
        
        $control = $builder->add('test2', 'radio', array('value' => 'dave meikle'))
                ->add('test1','text', array('value' => 'dave meikle', 'id' => 'test1'))
                ->add('firstname', 'text')
                ->add('lastname', 'text');
        
        $form = $control->getForm();
        print_r($form);
    }
    
    public function testAddTextBoxFailedValidation() {
        $builder = new FormBuilder($this->getLogger());
        $results = array('firstname' => 'SOME_STRING',
            'test' =>'SOME_FAIL_ON_TEST');
        $builder->addValidationResults($results);
        $control = $builder->add('test', 'text', array('value' => 'dave meikle', 'id' => 'test'));
        
        $form = $control->getForm();
        print_r($form);
    }
    
/*
 * $this->createFormBuilder($server)
                ->add('serverName', 'text')
                ->add('ipAddress', 'text')
                ->add('apiKey', 'hidden')
                ->add('isActive', 'checkbox', array(
                    'label' => 'is Active',
                    'required' => false
                ))
                ->add('save', 'submit')
                ->getForm();
 */
}
