<?php
/**
 * PHP unit extension suite (factory)
 *
 * EXAMPLE
 * $assertion = 'PHPUnitExt_Assertion_File';
 * $constraint = 'assertFileLineLength';
 * $data = array(
 *      'file' => CODE_PATH . '/ClassWithFullDocBlocs.php',
 *      'length' => 100,
 * );
 * PHPUnitExt_Suite::factory($assertion, $constraint, $data);
 *
 */
class PHPUnitExt_Suite
{

    /**
     * Factory to build test objects
     *
     * @static
     *
     * @param PHPUnitExt_Entity_Interface $entity
     *
     * @return PHPUnitExt_Assertion_Interface
     */
    public static function factory(PHPUnitExt_Entity_Interface $entity)
    {
        $assertion = $entity->getAssertion();
        $factory = new $assertion;
        $factory->{$entity->getConstraint()}($entity->getData());

        return $factory;
    }


}