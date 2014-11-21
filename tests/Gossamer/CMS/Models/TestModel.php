<?php

namespace tests\Gossamer\DBFramework\CMS\Models;

use Gossamer\DBFramework\CMS\Forms\FormBuilderInterface;

/**
 * Description of TestModel
 *
 * @author davem
 */
class TestModel implements FormBuilderInterface{
    
    public function getFormWrapper() {
        return 'test';
    }

}
