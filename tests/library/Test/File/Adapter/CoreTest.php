<?php
/**
 * Test core
 *
 * @author Eddie Jaoude
 * @package Test
 */

class Test_Library_Test_File_Adapter_CoreTest extends BaseTestCase
{

    /**
     * @var Test_File_Adapter_Interface
     */
    protected $_instance;

    /**
     * Setup
     */
    public function setUp()
    {
        parent::setUp();
        $this->_instance = new Test_File_Adapter_Core;
    }

    /**
     * test object instance
     */
    public function testObjectInstance()
    {
        $this->assertEquals(true, $this->_instance instanceof Test_File_Adapter_Core);
    }

    /**
     * test set/get file
     */
    public function testSetGetFile()
    {
        $file = 'abcdef.php';
        $this->_instance->setFile($file);
        $getFile = $this->_instance->getFile();

        $this->assertEquals($file, $getFile);
    }

    /**
     * test set/get content
     */
    public function testSetGetContent()
    {
        $content ='abcdef';
        $this->_instance->setContent($content);
        $getContent = $this->_instance->getContent();

        $this->assertEquals($content, $getContent);
    }

    /**
     * test set/get content empty with no file
     */
    public function testSetGetContentEmptyWithNoFile()
    {
        $getContent = $this->_instance->getContent();
        $this->assertEquals(null, $getContent);
    }

    /**
     * test set/get content with file
     */
    public function testSetGetContentEmptyWithFile()
    {
        $content = 'abcedf';
        $file = '/tmp/tmp.php';
        file_put_contents($file, $content);

        $this->_instance->setFile($file);
        $getContent = $this->_instance->getContent();

        $this->assertEquals ($content, $getContent);
    }

    /**
     * test set get result
     */
    public function testSetGetResult()
    {
        $result = true;
        $this->_instance->setResult($result);
        $getResult = $this->_instance->getResult();

        $this->assertEquals ($result, $getResult);
    }

    /**
     * test run
     */
    public function testRun()
    {
        $content = 'abcdef';
        $this->_instance->setContent($content);
        $run = $this->_instance->run();
        $this->assertEquals(true, $run instanceof Test_File_Adapter_Interface);
    }

    /**
     * test run throws an exception with no content
     */
    public function testRunThrowExceptionWithNoContent()
    {
        try {
            $this->_instance->run();
        } catch (Exception $e) {
            return;
        }
        $this->fail('Exception \'Test_File_Adapter_Exception\' not thrown');
    }

}