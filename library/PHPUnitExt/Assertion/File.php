<?php
/**
 * PHP Unit extension assertion for file
 *
 * @author  Eddie Jaoude
 * @package PHPUnitExt
 */
class PHPUnitExt_Assertion_File extends PHPUnitExt_Assertion_Core
{

    /**
     * @var string
     */
    protected $_file = '';

    /**
     * @var array
     */
    protected $_contents = array();

    /**
     * Set file
     *
     * @param $file
     *
     * @return PHPUnitExt_Assertion_File
     */
    public function setFile($file)
    {
        $this->_file = (string) $file;
        return $this;
    }

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
     * Set contents
     *
     * @param array $contents
     *
     * @return PHPUnitExt_Assertion_File
     */
    public function setContents(array $contents)
    {
        $this->_contents = $contents;
        return $this;
    }

    /**
     * Get contents
     *
     * @return array
     * @throws PHPUnitExt_Assertion_Exception
     */
    public function getContents()
    {
        if (empty($this->_contents) && empty($this->_file)) {
            throw new PHPUnitExt_Assertion_Exception('No file or content to test');
        }
        if (empty($this->_contents) && !empty($this->_file)) {
            $this->_contents = file($this->_file);
        }
        return $this->_contents;
    }

    /**
     * Add content
     *
     * @param $content
     *
     * @return PHPUnitExt_Assertion_File
     */
    public function addContent($content)
    {
        $this->_contents[] = $content;
        return $this;
    }

    /**
     * Reset content
     *
     * @return PHPUnitExt_Assertion_File
     */
    public function resetContents()
    {
        $this->_contents = array();
        return $this;
    }

    /**
     * Assert file line length
     *
     * @param int $length
     */
    public function assertLineLength($length = 80)
    {
        $lines = $this->getContents();

        foreach ($lines as $key => $line) {
            $this->_incrementAssertionCount();
            $constraint = new PHPUnitExt_Constraint_LineLength;
            if (
                !$constraint->test(
                    array(
                        'length' => $length,
                        'line'   => $line
                    )
                )
            ) {
                $constraint->fail(
                    array(
                        'length' => $length,
                        'file'   => $file,
                        'key'    => $key
                    )
                );
            }
        }
    }

    /**
     * Assert no conflicts in file
     *
     * @param string $file
     * @param string $contains
     */
    public function assertNoConflicts($file, $contains = '====')
    {
        $lines = $this->getContents();

        foreach ($lines as $key => $line) {
            $this->_incrementAssertionCount();
            $constraint = new PHPUnitExt_Constraint_LineContains;
            if (
                !$constraint->test(
                    array(
                        'contains' => $contains,
                        'line'     => $line
                    )
                )
            ) {
                $constraint->fail(
                    array(
                        'contains' => $contains,
                        'file'     => $file,
                        'key'      => $key
                    )
                );
            }
        }
    }


}