<?php

namespace tests\Gossamer\CMS\Forms;

use Gossamer\CMS\Forms\QuestionBuilder;
use tests\Gossamer\CMS\Models\TestModel;



/**
 * Description of FormBuilderTest
 *
 * @author Dave Meikle
 */
class QuestionBuilderTest extends \tests\BaseTest{
    
    public function testTextBox() {
        
        $model = new TestModel();
        $builder = new QuestionBuilder($this->getLogger(), $model);
        $control = $builder->add('question', 'text', array('class' => 'btn-xs',  'params' => $this->getTextboxQuestion()));
        $form = $control->getForm();

        $this->assertTrue(is_array($form));
       
    }
    
    private function getTextboxQuestion() {
        return array(
            'id' => '5',
            'Questions_id' => '5',
            'QuestionTypes_id' => '4',
            'type' => 'Single Textbox',
            'question' => 'What is your name?',
            'code' => 'text',
            'answers' => array(
                array(
                    'openResponse' => 'another response'
                )                
            )
        );
    }
}
