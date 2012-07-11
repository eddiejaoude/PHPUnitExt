<?php
/**
 * Doc bloc test
 *
 * @author Eddie Jaoude
 * @package Test
 */

class Test_DocBlocFailTest extends BaseTestCase
{

    public $_class;
    public $_reflection;

    public function setUp()
    {
        parent::setUp();
        $this->_class = new Sample_ClassWithNoDocBlocs;
        $this->_reflection = new Zend_Reflection_Class($this->_class);
    }

    /**
     * Test object creation
     */
    public function testObjectInstance()
    {
        $this->assertTrue($this->_reflection instanceof ReflectionClass);
    }

    /**
     * Test docbloc exists
     */
    public function testDocBlocDoesNotExists()
    {
        try {
            $description = $this->_reflection->getDocblock();
        } catch (Zend_Reflection_Exception $e) {
            return;
        }
        $this->fail('Zend_Reflection_Exception not caught');
    }

}