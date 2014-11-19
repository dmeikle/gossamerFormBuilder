<?php


namespace Gossamer\CMS\Forms;

/**
 *
 * @author davem
 */
interface BuilderInterface {
    
    public function buildForm(FormBuilder $builder, array $values = null, array $options = null);
    
}
