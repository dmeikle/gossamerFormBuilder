<?php

namespace tests\Gossamer\CMS\Forms;

use Gossamer\CMS\Forms\QuestionBuilder;
use tests\Gossamer\CMS\Models\TestModel;



/**
 * Description of FormBuilderTest
 *
 * @author Dave Meikle
 */
class AddChildControlsTest extends \tests\BaseTest{
    
    public function testRadioControl() {
        
        $model = new TestModel();
        $builder = new QuestionBuilder($this->getLogger(), $model);
        $control = $builder->add('question', 'radio', array('class' => 'btn-xs',  'question' => 'this is the question', 'params' => $this->getRadioQuestion()));
        $form = $control->getForm();

        $this->assertTrue(is_array($form));
        $this->assertTrue(strpos($form[0], 'answer #1 here <input type="radio" name="TestControl[question][1][]" value="3" checked id="TestControl_question_3_3" />') > 0);
    }
    
    public function testCheckboxControl() {
        
        $model = new TestModel();
        $builder = new QuestionBuilder($this->getLogger(), $model);
        $control = $builder->add('question', 'check', array('class' => 'btn-xs',  'question' => 'this is the question', 'params' => $this->getCheckboxQuestion()));
        $form = $control->getForm();
       
        $this->assertTrue(is_array($form));
        $this->assertTrue(strpos($form[0], '<input type="checkbox" name="TestControl[question][1][]" value="1" id="TestControl_question_1_1" /> this is my second selection') > 0);
    
    }
    
    private function getRadioQuestion() {
        return array(
            'id' => '1',
            'Questions_id' => '1',
            'QuestionTypes_id' => '1',
            'question' => 'what is your name?',
            'type' => 'Radio Button',
            'answers' => array(
                array(
                    'id' => '3',
                    'Answers_id' => '3',
                    'answer' => 'answer #1 here',
                    'responseId' => '3'
                    ),
                array(
                    'id' => '1',
                    'Answers_id' => '1',
                    'answer' => 'answer #2 here',
                    'responseID' => null
                    )                
            )
        );
    }
    private function getCheckboxQuestion() {
        return array(
            'id' => '1',
            'Questions_id' => '1',
            'QuestionTypes_id' => '2',
            'type' => 'Check Box',
            'answers' => array(
                array(
                    'id' => '3',
                    'Answers_id' => '3',
                    'answer' => 'this is my first selection',
                    'responseId' => '3'
                    ),
                array(
                    'id' => '1',
                    'Answers_id' => '1',
                    'answer' => 'this is my second selection'
                    )                
            )
        );
    }
}
