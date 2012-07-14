<?php
/**
 * Line length adapter
 */
class Test_File_Adapter_LineLength extends Test_File_Adapter_Core
{
    /**
     * @var int
     */
    protected $_lineLength = 70;

    /**
     * Run
     *
     * Result will be true (successful) if match not found otherwise will be a false (i.e. test failed)
     *
     * @return Test_File_Adapter_Interface
     */
    public function run()
    {
        parent::run();

        $file = $this->getFile();
        $lines = file($file);
        $report = array(array());
        $result = array();
        foreach ($lines as $row => $content) {
            $report[$row]['file'] = $file;
            $report[$row]['length'] = strlen($content);
            $report[$row]['status'] = strlen($content) <= $this->getLineLength() ? true : false ;
            $result[] = $report[$row]['status'];
        }
        $this->setResult(!in_array(false, $result));
        return $this;
    }

    /**
     * Get line length
     *
     * @return int
     */
    public function getLineLength()
    {
        return $this->_lineLength;
    }

    /**
     * Set line length
     *
     * @param $lineLength
     *
     * @return Test_File_Adapter_LineLength
     */
    public function setLineLength($lineLength)
    {
        $this->_lineLength = (int) $lineLength;
        return $this;
    }

}