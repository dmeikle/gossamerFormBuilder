<?php

namespace tests\Gossamer\CMS\Models;

use Gossamer\CMS\Forms\FormBuilderInterface;

/**
 * Description of TestModel
 *
 * @author davem
 */
class TestModel implements FormBuilderInterface{
    
    public function getFormWrapper() {
        return 'TestControl';
    }

}
