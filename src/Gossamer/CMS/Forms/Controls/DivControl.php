<?php

/*
 *  This file is part of the Quantum Unit Solutions development package.
 * 
 *  (c) Quantum Unit Solutions <http://github.com/dmeikle/>
 * 
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace Gossamer\CMS\Forms\Controls;

use Gossamer\CMS\Forms\Controls\AbstractControl;

/**
 * DivControl
 *
 * @author Dave Meikle
 */
class DivControl extends AbstractControl{
    
    
    protected $textBox = '<div name="|NAME|" |PARAMS|>|VALUE|</div>';
    
    public function build($name, array $params = null, &$results = null, $wrapperName = null, $isQuestionBuilder = false) {

        $textBox = $this->textBox;
        $this->getControlName($name, $textBox, $params, $wrapperName, $isQuestionBuilder);
        
        $this->buildParams($name, $textBox, $params, $results, $wrapperName);
        
        return $textBox;
    }
    
}
