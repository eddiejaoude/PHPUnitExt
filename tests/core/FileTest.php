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

        PHPUnitExt_Suite::factory('PHPUnitExt_Assertion_File')
            ->setFile($file)
            ->assertLineLength($length);
    }

    /**
     * Test line length of all files in directory
     */
    public function testLineLengthOfDirectory()
    {
        $path = CODE_PATH;
        $length = 110;

        PHPUnitExt_Suite::factory('PHPUnitExt_Assertion_Path')
            ->setPath($path)
            ->assertFileLineLength($length);
    }

    /**
     * Test the file does not contain '====' (conflict)
     */
    public function testContentsOfFile()
    {
        $file = CODE_PATH . '/ClassWithFullDocBlocs.php';
        $contains = '====';

        PHPUnitExt_Suite::factory('PHPUnitExt_Assertion_File')
            ->setFile($file)
            ->assertNoConflicts($file, $contains);
    }

    /**
     * Test the file does not contain '====' (conflict)
     */
    public function testContentsOfPath()
    {
        $path = CODE_PATH;
        $contains = '====';

        PHPUnitExt_Suite::factory('PHPUnitExt_Assertion_Path')
            ->setPath($path)
            ->assertNoConflicts($contains);
    }




}