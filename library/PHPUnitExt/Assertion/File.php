<?php
/**
 * PHP Unit extension assertion for file
 *
 * @author Eddie Jaoude
 * @package PHPUnitExt
 */
class PHPUnitExt_Assertion_File extends PHPUnitExt_Assertion_Core
{

    /**
     * Assert file line length
     *
     * @param string $file
     * @param int $length
     */
    public function assertFileLineLength($file, $length = 80)
    {
        $lines = file($file);

        foreach ($lines as $key => $line) {
            $this->_incrementAssertionCount();
            $constraint = new PHPUnitExt_Constraint_LineLength;
            if (
                !$constraint->test(
                    array(
                        'length' => $length,
                        'line' => $line
                    )
                )
            )
            {
                $constraint->fail(
                    array(
                        'length' => $length,
                        'file' => $file,
                        'key' => $key
                    )
                );
            }
        }
    }

    /**
     * @param string $path
     * @param int $length
     */
    public function assertFileLineLengthInPath($path, $length = 80)
    {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
        foreach ($files as $file) {
            $this->assertFileLineLength($file->getPathName(), $length);
        }
    }





}