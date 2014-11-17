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
        $control = $builder->add('test', 'text');
        
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
