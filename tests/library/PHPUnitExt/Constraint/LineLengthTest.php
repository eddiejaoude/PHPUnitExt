<?php
/**
 * Line length constraint test
 *
 * @author Eddie Jaoude
 * @package PHPUnitExt
 */
class PHPUnitExt_Constraint_LineLengthTest extends BaseTestCase
{
    /**
     * Constraint object
     *
     * @var PHPUnitExt_Constraint_Interface
     */
    protected $_constraint;

    public function setUp()
    {
        parent::setUp();
        $this->_constraint = new PHPUnitExt_Constraint_LineLength;
    }

    /**
     * Tests constraint with invalid data
     *
     * @return bool
     */
    public function testTestInvalidData()
    {
        $data = array();
        try {
            $result = $this->_constraint->test($data);
        } catch (PHPUnitExt_Constraint_Exception $e) {
            $this->assertEquals(
                'Must contain $data[\'line\'] and $data[\'length\'] elements in $data array',
                $e->getMessage()
            );
            return true;
        } catch (Exception $e) {
            $this->fail('PHPUnitExt_Constraint_Exception Exception not thrown');
        }
        $this->fail('Exception not thrown');
    }

    /**
     * Test constraint returns true
     */
    public function testTestReturnTrue()
    {
        $data = array(
            'line' => 'abcdef',
            'length' => 10
        );
        $result = $this->_constraint->test($data);
        $this->assertEquals(true, $result);
    }

    /**
     * Test constraint returns false
     */
    public function testTestReturnFalse()
    {
        $data = array(
            'line' => 'abcdef',
            'length' => 4
        );
        $result = $this->_constraint->test($data);
        $this->assertEquals(false, $result);
    }

    /**
     * Test fail method with invalid data
     *
     * @return bool
     */
    public function testFailInvalidData()
    {
        $data = array();
        try {
            $this->_constraint->fail($data);
        } catch (PHPUnitExt_Constraint_Exception $e) {
            $message = 'Must contain $data[\'key\'], $data[\'file\'] and $data[\'length\'] elements in $data array';
            $this->assertEquals($e->getMessage(), $message);
            return true;
        } catch (Exception $e) {
            $this->fail('PHPUnitExt_Constraint_Exception Exception not thrown');
        }
        $this->fail('Exception not thrown');
    }

    /**
     * Test fail method
     *
     * @return bool
     */
    public function testFail()
    {
        $data = array(
            'key' => 0,
            'file' => CODE_PATH . '/ClassWithFullDocBlocs.php',
            'length' => 10,
        );
        try {
            $this->_constraint->fail($data);
        } catch (PHPUnitExt_Constraint_Exception $e) {
            $exception = 'Failed asserting file %s on line %d is less than %s';
            $message = sprintf($exception, $data['file'], $data['key'] + 1, $data['length']);
            $this->assertEquals($message, $e->getMessage());
            return true;
        } catch (Exception $e) {
            $this->fail('PHPUnitExt_Constraint_Exception Exception not thrown');
        }
        $this->fail('Exception not thrown');
    }

}