<?php
/**
 * Test all files
 *
 * @author  Eddie Jaoude
 * @package PHPUnitExt
 */
class Test_Core_FileTest extends BaseTestCase
{

    /**
     * Test the line length of a file
     */
    public function testLineLengthOfFile()
    {
        $file = CODE_PATH . '/ClassWithFullDocBlocs.php';
        $length = 110;

        PHPUnitExt_Suite::factory('PHPUnitExt_Assertion_File')->assertFileLineLength($file, $length);
    }

    /**
     * Test line length of all files in directory
     */
    public function testLineLengthOfDirectory()
    {
        $path = CODE_PATH;
        $length = 110;

        PHPUnitExt_Suite::factory('PHPUnitExt_Assertion_File')->assertFileLineLengthInPath($path, $length);
    }


}