<?php
/**
 * Test file core
 *
 * @author Eddie Jaoude
 * @package Test
 */

class Test_File_Core
{

    /**
     * @var Test_File_Adapter_Interface
     */
    protected $_adapter;

    /**
     * @param Test_File_Adapter_Interface $adapter
     */
    public function __construct(Test_File_Adapter_Interface $adapter)
    {
        $this->_adapter = $adapter;
    }


}