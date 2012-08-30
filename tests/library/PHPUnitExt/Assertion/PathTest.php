<?php
/**
 * Path assertion test
 *
 * @author Eddie Jaoude
 * @package PHPUnitExt
 */
class PHPUnitExt_Constraint_PathTest extends BaseTestCase
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
        $this->_assertion = new PHPUnitExt_Assertion_Path;
    }

    public function testPath()
    {
        $path = 'abcdef';
        $assertionRequest = $this->_assertion->setPath($path);
        $assertionResponse = $this->_assertion->getPath();

        $this->assertEquals(true, $assertionRequest instanceof PHPUnitExt_Assertion_Interface);
        $this->assertEquals($assertionResponse, $path);
    }

    public function testFiles()
    {
        $file0 = 'abcdef';
        $file1 = '123456';
        $assertionRequest = $this->_assertion->setFiles(array($file0, $file1));
        $assertionResponse = $this->_assertion->getFiles();

        $this->assertEquals(true, $assertionRequest instanceof PHPUnitExt_Assertion_Interface);
        $this->assertEquals($assertionResponse, array($file0, $file1));
    }

    public function testAddFile()
    {
        $file0 = 'abcdef';
        $file1 = '123456';
        $assertionRequest0 = $this->_assertion->addFile($file0);
        $assertionRequest1 = $this->_assertion->addFile($file1);
        $this->assertEquals(true, $assertionRequest0 instanceof PHPUnitExt_Assertion_Interface);
        $this->assertEquals(true, $assertionRequest1 instanceof PHPUnitExt_Assertion_Interface);

        $assertionResponse = $this->_assertion->getFiles();
        $this->assertEquals($assertionResponse, array($file0, $file1));
    }

}