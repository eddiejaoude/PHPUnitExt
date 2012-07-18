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
        //$this->assertFileLineLength(CODE_PATH . '/ClassWithFullDocBlocs.php');
        $this->assertPathFilesLineLength(CODE_PATH);
    }


}