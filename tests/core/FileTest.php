<?php
/**
 * Test all files
 *
 * @author Eddie Jaoude
 * @package PHPUnitExt
 */

class Test_Core_FileTest extends BaseTestCase
{

    /**
     * Test the line length of a file
     */
    public function testLineLengthOfFile()
    {
        $assertion = 'PHPUnitExt_Assertion_File';
        $constraint = 'assertFileLineLength';
        $data = array(
            'file' => CODE_PATH . '/ClassWithFullDocBlocs.php',
            'length' => 100,
        );

        PHPUnitExt_Suite::factory($assertion, $constraint, $data);
    }

    /**
     * Test line length of all files in directory
     */
    public function testLineLengthOfDirectory()
    {
        $assertion = 'PHPUnitExt_Assertion_File';
        $constraint = 'assertFileLineLengthInPath';
        $data = array(
            'path' => CODE_PATH,
            'length' => 100,
        );

        PHPUnitExt_Suite::factory($assertion, $constraint, $data);
    }


}