<?php
/**
 * Test library test file exception
 *
 * @author Eddie Jaoude
 * @package Test
 */

class Test_Library_Test_File_ExceptionTest extends BaseTestCase
{

    public function testException()
    {
        $exception = new Test_File_Exception;
        $this->assertEquals(true, $exception instanceof Exception);
    }

}