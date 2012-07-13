<?php
/**
 * Test library test exception
 *
 * @author Eddie Jaoude
 * @package Test
 */

class Test_Library_Test_ExceptionTest extends BaseTestCase
{

    public function testException()
    {
        $exception = new Test_Exception;
        $this->assertEquals(true, $exception instanceof Exception);
    }

}