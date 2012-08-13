<?php
/**
 * PHP unit extension suite (factory)
 *
 * EXAMPLE
 * $file = CODE_PATH . '/ClassWithFullDocBlocs.php';
 * $length = 8  0;
 *
 * PHPUnitExt_Suite::factory('PHPUnitExt_Assertion_File')->assertFileLineLength($file, $length);
 *
 * -- OR --
 *
 * $file = CODE_PATH . '/ClassWithFullDocBlocs.php';
 * $length = 80;
 *
 * $assertion = new PHPUnitExt_Assertion_File;
 * $assertion->assertFileLineLength($file, $length);
 *
 */
class PHPUnitExt_Suite
{
    /**
     * @var PHPUnitExt_Assertion_Interface
     */
    protected static $factory;

    /**
     * Factory to build test objects
     *
     * @static
     *
     * @param string
     *
     * @return PHPUnitExt_Assertion_Interface
     * @throws PHPUnitExt_Exception
     */
    public static function factory($class)
    {
        if (!class_exists($class)) {
            throw new PHPUnitExt_Exception('Class ' . $class . ' does not exist');
        }

        self::$factory = new $class;
        return self::$factory;
    }

    /**
     * Passes called method onto factory object
     *
     * @param $method
     * @param $arg
     */
    public function __call($method, $arg)
    {
        self::$factory->{$method}($arg);
    }


}