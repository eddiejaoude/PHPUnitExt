<?php
/**
 * Zend test extension
 */
class PHPUnitExt_TestCase extends PHPUnit_Framework_TestCase
{

    public function assertFileLineLength($file, $length = 70, $message = '')
    {
        $lines = file($file);

        foreach ($lines as $key => $line) {
            $this->_incrementAssertionCount();
            $constraint = new PHPUnitExt_Constraint_LineLength($length);
            if (!$constraint->evaluate($line)) {
                $constraint->fail($file, $key, $length);
            }
        }
    }

    public function assertPathFilesLineLength($directoryPath, $length = 70, $message = '')
    {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directoryPath));
        foreach ($files as $file) {
            $this->assertFileLineLength($file, $length, $message);
        }
    }



    /**
     * Increment assertion count
     *
     * @TODO: if adding to zend_test, set this method as  decorator
     * @return void
     */
    protected function _incrementAssertionCount()
    {
        $stack = debug_backtrace();
        foreach (debug_backtrace() as $step) {
            if (isset($step['object'])
                && $step['object'] instanceof PHPUnit_Framework_TestCase
            ) {
                if (version_compare(PHPUnit_Runner_Version::id(), '3.3.0', 'lt')) {
                    break;
                } elseif (version_compare(PHPUnit_Runner_Version::id(), '3.3.3', 'lt')) {
                    $step['object']->incrementAssertionCounter();
                } else {
                    $step['object']->addToAssertionCount(1);
                }
                break;
            }
        }
    }

}