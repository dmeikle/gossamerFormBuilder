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
 * TextBoxTest
 *
 * @author Dave Meikle
 */
class TextBoxTest extends \tests\BaseTest {
    
    public function testTextBox() {
        $builder = new FormBuilder($this->getLogger());
        $results = array('firstname' => 'VALIDATION_INVALID_EMAIL',
             'firstname_value' => 'davemmyemail.com',
            'test' =>'SOME_FAIL_ON_TEST',
            'test_value' => 'some fail value');
        $builder->addValidationResults($results);
        
        $control = $builder->add('test3', 'text', array('value' => 'dave meikle'))
                ->add('test2', 'text', array('value' => 'dave meikle here'))
                ->add('test1','text', array('value' => 'dave meikle', 'id' => 'test1'))
                ->add('firstname', 'text', array( 'id' => 'test1'))
                ->add('lastname', 'text');
        
        $form = $control->getForm();
     
        $this->assertTrue(is_array($form));
        $this->assertTrue(array_key_exists('test2', $form));
        $this->assertContains('dave meikle', $form['test2']);
    }
    
    public function testQuestionBuilderTextBox() {
        
    }
}
