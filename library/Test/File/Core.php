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
     * Set adapter
     *
     * @param Test_File_Adapter_Interface $adapter
     * @return Test_File_Core
     */
    public function setAdapter(Test_File_Adapter_Interface $adapter)
    {
        $this->_adapter = $adapter;
        return $this;
    }

    /**
     * Get adapter
     *
     * @return Test_File_Adapter_Interface
     */
    public function getAdapter()
    {
        return $this->_adapter;
    }

    /**
     * @param Test_File_Adapter_Interface $adapter
     */
    public function __construct(Test_File_Adapter_Interface $adapter)
    {
        $this->setAdapter($adapter);
    }

    /**
     * Get result
     *
     * @return bool
     */
    public function getResult()
    {
        return $this->getAdapter()->run()->getResult();
    }


}