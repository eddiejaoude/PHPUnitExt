<?php
/**
 * Test all files
 *
 * @author Eddie Jaoude
 * @package Test
 */

class Test_Core_FileTest extends BaseTestCase
{
    public function testLineEnding()
    {
        $adapter = new Test_File_Adapter_LineEnding();
        $adapter->setFile(CODE_PATH . '/ClassWithFullDocBlocs.php');

        $fileTest = new Test_File_Core($adapter);
        $this->assertEquals(true, $fileTest->getResult());
    }

    public function testLineLength()
    {
        $adapter = new Test_File_Adapter_LineLength();
        $adapter->setFile(CODE_PATH . '/ClassWithFullDocBlocs.php');

        $fileTest = new Test_File_Core($adapter);
        $this->assertEquals(true, $fileTest->getResult());
    }

    public function testLineLength2()
    {
        $test = new PHPUnitExt_LineLengthTest(CODE_PATH . '/ClassWithFullDocBlocs.php');

        $result = PHPUnit_TextUI_TestRunner::run($test);

        return $result;
    }


}