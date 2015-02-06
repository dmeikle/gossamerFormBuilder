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

/**
 * LinkControl
 *
 * @author Dave Meikle
 */
class LinkControl extends AbstractControl {
    
    protected $box = '<a name="|NAME|"|PARAMS|>|VALUE|</a>';
     
    public function build($name, array $params = null, &$validationResults = null, $wrapperName = null, $isQuestionBuilder = false) {
        
        $box = $this->box;
        $this->getControlName($name, $box, $params, $wrapperName, $isQuestionBuilder);
        
        $this->buildParams($name, $box, $params, $results, $wrapperName);
        
        return $box;
    }

}
