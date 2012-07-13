<?php
/**
 * Test line ending
 *
 * @author Eddie Jaoude
 * @package Test
 */

class Test_Library_Test_File_Adapter_LineEndingTest extends BaseTestCase
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
        $this->_instance = new Test_File_Adapter_LineEnding;
    }

    /**
     * test object instance
     */
    public function testObjectInstance()
    {
        $this->assertEquals(true, $this->_instance instanceof Test_File_Adapter_LineEnding);
    }

    /**
     * test run exception is thrown
     */
    public function testRunException()
    {
        try {
            $this->_instance->run();
        } catch (Exception $e) {
            return;
        }
        $this->fail('Exception not thrown for run() dependency on getContent()');
    }

    /**
     * test run with pass which returns a true
     */
    public function testRunPass()
    {
        $this->_instance->setContent('abcdefg');
        $result = $this->_instance->run()->getResult();
        $this->assertEquals(true, $result);
    }

    /**
     * test run with fails which returns a false
     */
    public function testRunFail()
    {
        $this->_instance->setContent('abcdefg' . "\r\n");
        $result = $this->_instance->run()->getResult();
        $this->assertEquals(false, $result);
    }

}
