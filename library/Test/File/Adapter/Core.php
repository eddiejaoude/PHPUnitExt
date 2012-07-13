<?php
/**
 * Core adapter
 */
class Test_File_Adapter_Core implements Test_File_Adapter_Interface
{

    /**
     * @var string
     */
    protected $_file;

    /**
     * @var bool
     */
    protected $_result;

    /**
     * @var string
     */
    protected $_content;

    /**
     * Get file
     *
     * @return string
     */
    public function getFile()
    {
        return $this->_file;
    }

    /**
     * Set file
     *
     * @param string $file
     * @return Test_File_Adapter_Interface
     */
    public function setFile($file)
    {
        $this->_file = (string) $file;
        return $this;
    }

    /**
     * Get result
     *
     * @return boolean
     */
    public function getResult()
    {
        return $this->_result;
    }

    /**
     * Set result
     *
     * @param boolean $result
     * @return Test_File_Adapter_Interface
     */
    public function setResult($result)
    {
        $this->_result = (bool) $result;
        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        if (empty($this->_content)) {
            $file = $this->getFile();
            if (file_exists($file)) {
                $this->setContent(file_get_contents($file));
            }
        }
        return $this->_content;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Test_File_Adapter_Interface
     */
    public function setContent($content)
    {
        $this->_content = (string) $content;
        return $this;
    }

    /**
     * Run
     *
     * @throws Test_File_Adapter_Exception
     * @return Test_File_Adapter_Interface
     */
    public function run()
    {
        $content = $this->getContent();

        if (empty($content)) {
            throw new Test_File_Adapter_Exception('No contents. Use setContent() or setFile()');
        }

        return $this;
    }


}