<?php

/*
 *  This file is part of the Quantum Unit Solutions development package.
 * 
 *  (c) Quantum Unit Solutions <http://github.com/dmeikle/>
 * 
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace Gossamer\CMS\Forms;

use Gossamer\CMS\Forms\FormBuilder;

/**
 * this is a wrapper for different controls, adding text to the control so we
 * don't need to know the question while we are drawing the HTML form.
 *
 * @author Dave Meikle
 */
class QuestionBuilder extends FormBuilder {
    
    private $answers = array();
    

    
    private function addAnswers($name, $controlType, array $params) {
        if(!array_key_exists('params', $params)) {
            //could be the add (answer) trying to recursively loop
            return;
        }
       
        $questionParams = $params['params'];
        if(!array_key_exists('answers', $questionParams) && ($controlType == 'radio' || $controlType == 'check')) {
           
            return;
        } elseif($controlType == 'radio' || $controlType == 'check') {
            $answers = array();
            foreach($questionParams['answers'] as $key => $answer) {            
                $answers[] = $this->addAnswer($name, $controlType, $answer, $questionParams);
            }

            return $answers;
        }
        //now do any other control
        $answers[] = '<div class="answer">' . $this->addAnswer($name, $controlType, $params, $questionParams) . '</div>';
       
        return $answers;
    }

    public function addAnswer($fieldName, $controlType, $answer, array $params, &$validationResults = null, $wrapperName = null) {
        $control = $this->getControl($controlType);
       
        
        $answer['Questions_id'] = $params['id'];
       
        return $this->addValidationResult($fieldName, $control->build($fieldName, $answer, $this->results, $this->formWrapperName, true));
       
    }
    
    
    public function add($fieldName, $controlType, array $params = null, array $locales = null) {
        $control = $this->getControl($controlType);
       
        $question = '';
        if(array_key_exists('question', $params)) {
            $question = "<div class=\"question-text\">" . $params['question']. "</div>\r\n";
            unset($params['question']);
        }elseif(array_key_exists('params', $params) && array_key_exists('question', $params['params'])) {
            $question = "<div class=\"question-text\">" . $params['params']['question']. "</div>\r\n";
        }
         
        $answers = $this->addAnswers($fieldName, $controlType, $params);        
        unset($params['answers']);
       
        if(is_null($answers)) {
            $this->form[] = "<div class=\"question\">\r\n$question" ."</div>\r\n";
        } else {
            $this->form[] = "<div class=\"question\">\r\n$question" .
            implode("\r\n", $answers) . "</div>\r\n";
        }
        return $this;
    }

    public function buildForm(FormBuilder $builder, array $values = null, array $options = null, array $validationResults = null) {
        
    }

}
