<?php
/**
 * Doc bloc test
 *
 * @author Eddie Jaoude
 * @package Test
 */

class Test_DocBlocTest extends BaseTestCase
{

    public $_class;
    public $_reflection;

    public function setUp()
    {
        parent::setUp();
        $this->_class = new Sample_ClassWithFullDocBlocs;
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
    public function testClassDocBlocShortDescriptionExists()
    {
        $description = $this->_reflection->getDocblock()->getShortDescription();
        $this->assertEquals(true, !empty($description));
    }

    /**
     * Test method docblock for description & parameter declaration & type
     */
    public function testMethodsDocBloc()
    {
        foreach ($this->_reflection->getMethods() as $method) {
            $shortDescription = $method->getDocblock()->getShortDescription();
            $this->assertEquals(true, !empty($shortDescription));

            $tags = $method->getDocblock()->getTags();
            foreach ($method->getParameters() as $key => $parameters) {
                // test parameter name matches docblock
                $this->assertEquals('$' . $parameters->getName(), $tags[$key]->getVariableName());

                // test docbloc for parameter has a type
                $type = $tags[$key]->getType();
                $this->assertEquals(true, !empty($type));
            }
        }


    }

}