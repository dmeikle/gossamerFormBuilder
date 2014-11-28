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

    public function getEmptyModelStructure() {
        return array (
            'mappings' => array (
                '0' => array (
                    'Field' => 'id',
                    'Type' => 'int(11)'
                ),
                '1' => array (
                    'Field' => 'Departments_id',
                    'Type' => 'int(11)'
                ),
                '2' => array (
                    'Field' => 'ClaimPhases_id',
                    'Type' => 'int(11)'
                ),
                '3' => array (
                    'Field' => 'code',
                    'Type' => 'varchar(6)'
                ),
                '4' => array (
                    'Field' => 'layer',
                    'Type' => 'int(11)'
                ),
                '5' => array (
                    'locales' => array (
                        '0' => array (
                            'Field' => 'ActionsPerformed_id',
                            'Type' => 'int(11)'),
                        '1' => array (
                            'Field' => 'locale',
                            'Type' => 'char(5)'
                        ),
                        '2' => array (
                            'Field' => 'action',
                            'Type' => 'varchar(200)'
                        )
                    )
                )
            )
        );
    }
}
