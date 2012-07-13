<?php
/**
 * Test library test file adapter exception
 *
 * @author Eddie Jaoude
 * @package Test
 */

class Test_Library_Test_File_Adapter_ExceptionTest extends BaseTestCase
{

    public function testException()
    {
        $exception = new Test_File_Adapter_Exception;
        $this->assertEquals(true, $exception instanceof Exception);
    }

}