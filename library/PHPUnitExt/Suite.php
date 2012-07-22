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
     * @param $assertion
     * @param $constraint
     * @param $data
     *
     * @return PHPUnitExt_Assertion_Interface
     */
    public static function factory($assertion, $constraint, $data)
    {
        $factory = new $assertion;
        $factory->$constraint($data);

        return $factory;
    }


}