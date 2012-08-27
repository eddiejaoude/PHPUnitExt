<?php
/**
 * File assertion test
 *
 * @author Eddie Jaoude
 * @package PHPUnitExt
 */
class PHPUnitExt_Constraint_FileTest extends BaseTestCase
{
    /**
     * Assertion object
     *
     * @var PHPUnitExt_Assertion_Interface
     */
    protected $_assertion;

    public function setUp()
    {
        parent::setUp();
        $this->_assertion = new PHPUnitExt_Assertion_File;
    }

    public function testFile()
    {
        $fileRequest = 'test_file.php';
        $assertion = $this->_assertion->setFile($fileRequest);
        $fileResponse = $this->_assertion->getFile();

        $this->assertEquals($assertion instanceof PHPUnitExt_Assertion_Core, true);
        $this->assertEquals($fileRequest, $fileResponse);
    }

    public function testContents()
    {
        $contentsRequest0 = '12345';
        $contentsRequest1 = '67890';

        $assertion = $this->_assertion->setContents(array($contentsRequest0, $contentsRequest1));
        $contentsResponse = $this->_assertion->getContents();

        $this->assertEquals($assertion instanceof PHPUnitExt_Assertion_Core, true);
        $this->assertEquals(is_array($contentsResponse), true);
        $this->assertEquals($contentsResponse[0], $contentsRequest0);
        $this->assertEquals($contentsResponse[1], $contentsRequest1);
    }

    public function testContentsAddContent()
    {
        $contentsRequests = array('a','b');
        $this->_assertion->setContents($contentsRequests);

        $contentsRequest2 = 'abcedf';
        $assertion = $this->_assertion->addContent($contentsRequest2);

        $this->assertEquals($assertion instanceof PHPUnitExt_Assertion_Core, true);
        $contentsResponse = $this->_assertion->getContents();
        $this->assertEquals($contentsResponse[2], $contentsRequest2);
    }

    public function testContentsReset()
    {
        $contentsRequests = array('a','b');
        $this->_assertion->setContents($contentsRequests);

        $assertion = $this->_assertion->resetContents();
        $this->assertEquals($assertion instanceof PHPUnitExt_Assertion_Core, true);

        try {
            $this->_assertion->getContents();
        } catch (PHPUnitExt_Assertion_Exception $e) {
            $this->assertEquals(
                'No file or content to test',
                $e->getMessage()
            );
            return true;
        } catch (Exception $e) {
            $this->fail('PHPUnitExt_Assertion_Exception Exception not thrown');
        }
        $this->fail('Exception not thrown');
    }

    public function testAssertLineLength()
    {
        $this->_assertion->addContent('abcdef');
        $this->_assertion->addContent('123456');
        $this->_assertion->assertLineLength($length = 80);
    }

}
