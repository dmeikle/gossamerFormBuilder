<?php

namespace tests\Gossamer\CMS\Forms;

use Gossamer\CMS\Forms\FormBuilder;
use tests\Gossamer\CMS\Models\TestModel;



/**
 * Description of FormBuilderTest
 *
 * @author Dave Meikle
 */
class FormBuilderTest extends \tests\BaseTest{
    
    
    public function testSelectionBox() {
        $model = new TestModel();
        $builder = new FormBuilder($this->getLogger(), $model);
        
        $results = array('firstname' => 'VALIDATION_INVALID_EMAIL',
             'firstname_value' => 'invaliddavemmyemail.com',
            'test' =>'SOME_FAIL_ON_TEST',
            'password' => 'hide this password',
            'test_value' => 'some fail value');
        $builder->addValidationResults($results);
        
        $control = $builder->add('test2', 'select', array('value' => 'dave meikle'));
        
        $form = $control->getForm();
      
    
        $this->assertTrue(is_array($form));
        $this->assertTrue(array_key_exists('test2', $form));
        $this->assertContains('test2', $form['test2']);
       
    }
    
    public function testPasswordTextBox() {
        $model = new TestModel();
        $builder = new FormBuilder($this->getLogger(), $model);
        
        $results = array('firstname' => 'VALIDATION_INVALID_EMAIL',
             'firstname_value' => 'invaliddavemmyemail.com',
            'test' =>'SOME_FAIL_ON_TEST',
            'password' => 'hide this password',
            'test_value' => 'some fail value');
        $builder->addValidationResults($results);
        
        $control = $builder->add('test2', 'radio', array('value' => 'dave meikle'))
                ->add('test1','text', array('value' => 'dave meikle', 'id' => 'test1'))
                ->add('email', 'email', array('id' => 'firstname_id'))
                ->add('password', 'password', array('value' => 'this is a password'))
                ->add('lastname', 'text');
        
        $form = $control->getForm();
       
        $this->assertTrue(is_array($form));
        $this->assertTrue(array_key_exists('password', $form));
        $this->assertContains('password', $form['password']);
       
    }
    
    public function testEmailTextBox() {
        $builder = new FormBuilder($this->getLogger());
        $results = array('firstname' => 'VALIDATION_INVALID_EMAIL',
             'firstname_value' => 'invaliddavemmyemail.com',
            'test' =>'SOME_FAIL_ON_TEST',
            'test_value' => 'some fail value');
        $builder->addValidationResults($results);
        
        $control = $builder->add('test2', 'radio', array('value' => 'dave meikle'))
                ->add('test1','text', array('value' => 'dave meikle', 'id' => 'test1'))
                ->add('email', 'email', array('id' => 'firstname_id'))
                ->add('lastname', 'text');
        
        $form = $control->getForm();
        
        $this->assertTrue(is_array($form));
        $this->assertTrue(array_key_exists('email', $form));
        $this->assertContains('email', $form['email']);
       
    }
    
    public function testAddTextBox() {
        $builder = new FormBuilder($this->getLogger());
        $results = array('firstname' => 'VALIDATION_INVALID_EMAIL',
             'firstname_value' => 'invaliddavemmyemail.com',
            'test' =>'SOME_FAIL_ON_TEST',
            'test_value' => 'some fail value');
        $builder->addValidationResults($results);
        
        $control = $builder->add('test2', 'radio', array('value' => 'dave meikle'))
                ->add('test1','text', array('value' => 'dave meikle', 'id' => 'test1'))
                ->add('firstname', 'text', array('id' => 'firstname_id'))
                ->add('lastname', 'text');
        
        $form = $control->getForm();
        
        $this->assertTrue(is_array($form));
        $this->assertTrue(array_key_exists('firstname', $form));
        $this->assertContains('invaliddavemmyemail.com', $form['firstname']);
       
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
                ->add('firstname', 'text', array( 'id' => 'test1'))
                ->add('lastname', 'text');
        
        $form = $control->getForm();
        
        $this->assertTrue(is_array($form));
        $this->assertTrue(array_key_exists('test2', $form));
        $this->assertContains('dave meikle', $form['test2']);
    }

    public function testAddSubmitButton() {
        $builder = new FormBuilder($this->getLogger());
        $results = array('firstname' => 'VALIDATION_INVALID_EMAIL',
             'firstname_value' => 'davemmyemail.com',
            'test' =>'SOME_FAIL_ON_TEST',
            'test_value' => 'some fail value');
        $builder->addValidationResults($results);
        
        $control = $builder->add('test2', 'radio', array('value' => 'dave meikle'))
                ->add('test1','text', array('value' => 'dave meikle', 'id' => 'test1'))
                ->add('firstname', 'text', array( 'id' => 'test1'))
                ->add('lastname', 'text')
                ->add('save', 'submit', array('value' => 'NAVIGATION_SAVE'));
        
        $form = $control->getForm();
       
        $this->assertTrue(is_array($form));
        $this->assertTrue(array_key_exists('save', $form));
        $this->assertContains('submit', $form['save']);
    }
    
    public function testFormWrapperTextBox() {
        $model = new TestModel();
        $builder = new FormBuilder($this->getLogger(), $model);
        $results = array('firstname' => 'VALIDATION_INVALID_EMAIL',
             'firstname_value' => 'invaliddavemmyemail.com',
            'test' =>'SOME_FAIL_ON_TEST',
            'test_value' => 'some fail value');
        $builder->addValidationResults($results);
        
        $control = $builder->add('test2', 'radio', array('value' => 'dave meikle'))
                ->add('test1','text', array('value' => 'dave meikle', 'id' => 'test1'))
                ->add('firstname', 'text')
                ->add('lastname', 'text');
        
        $form = $control->getForm();
       
        $this->assertTrue(is_array($form));
        $this->assertTrue(array_key_exists('firstname', $form));
        $this->assertContains('invaliddavemmyemail.com', $form['firstname']);
    }
    
    
//    public function testAddTextBoxFailedValidation() {
//        $builder = new FormBuilder($this->getLogger());
//        $results = array('firstname' => 'SOME_STRING',
//            'test' =>'SOME_FAIL_ON_TEST');
//        $builder->addValidationResults($results);
//        $control = $builder->add('test', 'text', array('value' => 'dave meikle', 'id' => 'test'));
//        
//        $form = $control->getForm();
//        print_r($form);
//    }
    
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
