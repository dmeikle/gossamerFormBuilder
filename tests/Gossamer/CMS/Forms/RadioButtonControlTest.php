<?php

/*
 *  This file is part of the Quantum Unit Solutions development package.
 * 
 *  (c) Quantum Unit Solutions <http://github.com/dmeikle/>
 * 
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace tests\Gossamer\CMS\Forms;

use Gossamer\CMS\Forms\FormBuilder;
use tests\Gossamer\CMS\Models\TestModel;

/**
 * TestRadioButtonControl
 *
 * @author Dave Meikle
 */
class RadioButtonControlTest  extends \tests\BaseTest{
    
    

    
    public function testMultiSelectBox() {
        $locales = $this->getLocales();
        $model = new TestModel();
        $builder = new FormBuilder($this->getLogger());
        $results = array('test2' => 'VALIDATION_INVALID_EMAIL',
             'firstname_value' => 'invaliddavemmyemail.com',
            'test' =>'SOME_FAIL_ON_TEST',
            'test_value' => 'some fail value');
        $builder->addValidationResults($results);
        
        $control = $builder->add('test2', 'select', array('multiple' => 'true', 'value' => 
                array('en_US' => 'english value',
                    'zh_CN' => 'chinese value')), $locales)
                ->add('isActive', 'check', array(
                    'label' => 'is Active',
                    'checked' => true
                ))
                ->add('test1','text', array('value' => 'dave meikle', 'id' => 'test1'))
                ->add('firstname', 'text', array('id' => 'firstname_id'))
                ->add('lastname', 'text');
        
        $form = $control->getForm();
        
     // print_r($form);
        $this->assertTrue(is_array($form));
        $this->assertTrue(array_key_exists('test2', $form));
        $this->assertTrue(array_key_exists('en_US', $form['test2']['locales']));
    }
    
   
    public function testAddRadioButton() {
        $builder = new FormBuilder($this->getLogger());
        $results = array('firstname' => 'VALIDATION_INVALID_EMAIL',
             'firstname_value' => 'davemmyemail.com',
            'test' =>'SOME_FAIL_ON_TEST',
            'test_value' => 'some fail value');
        $builder->addValidationResults($results);
        
        $control = $builder->add('test2', 'radio', array('values' => array('dave smith', 'dave meikle')))
                ->add('test2', 'radio', array('value' => 'dave meikle'))
                ->add('test1','text', array('value' => 'dave meikle', 'id' => 'test1'))
                ->add('firstname', 'text', array( 'id' => 'test1'))
                ->add('lastname', 'text');
        
        $form = $control->getForm();
     
        $this->assertTrue(is_array($form));
        $this->assertTrue(array_key_exists('test2', $form));
        $this->assertContains('dave meikle', $form['test2']);
    }


    private function getLocales() {
        return array(
            'en_US' => array(
                'locale' => 'en_US'
            ),
            
            'zh_CN' => array(
                'locale' => 'zh_CN'
            )
        );
    }
}
