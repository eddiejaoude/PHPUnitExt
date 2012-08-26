<?php
/**
 * PHP Unit extension assertion for path
 *
 * @author Eddie Jaoude
 * @package PHPUnitExt
 */
class PHPUnitExt_Assertion_Path extends PHPUnitExt_Assertion_Core
{

    /**
     * @var string
     */
    protected $_path = '';

    /**
     * @var array
     */
    protected $_files = array();

    /**
     * Set path
     *
     * @param $path
     *
     * @return PHPUnitExt_Assertion_Path
     */
    public function setPath($path)
    {
        $this->_path = (string) $path;
        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->_path;
    }

    /**
     * Set files
     *
     * @param array $files
     *
     * @return PHPUnitExt_Assertion_File
     */
    public function setFiles(array $files)
    {
        $this->_files = $files;
        return $this;
    }

    /**
     * Get files
     *
     * @return array
     * @throws PHPUnitExt_Assertion_Exception
     */
    public function getFiles()
    {
        if (empty($this->_files) && empty($this->_path)) {
            throw new PHPUnitExt_Assertion_Exception('No path or files to test');
        }
        if (empty($this->_files) && !empty($this->_path)) {
            $this->_files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($this->_path));
        }
        return $this->_files;
    }

    /**
     * Add file
     *
     * @param $file
     *
     * @return PHPUnitExt_Assertion_Path
     */
    public function addFile($file)
    {
        $this->_files[] = $file;
        return $this;
    }

    /**
     * Assert file line length in path
     *
     * @param int $length
     */
    public function assertFileLineLength($length = 80)
    {
        $files = $this->getFiles();
        foreach ($files as $file) {
            PHPUnitExt_Suite::factory('PHPUnitExt_Assertion_File')
                ->setFile($file->getPathName())
                ->assertLineLength($length);
        }
    }

    /**
     * Assert no conflicts in path
     *
     * @param string $contains
     */
    public function assertNoConflicts($contains = '====')
    {
        $files = $this->getFiles();
        foreach ($files as $file) {
            PHPUnitExt_Suite::factory('PHPUnitExt_Assertion_File')
                ->setFile($file->getPathName())
                ->assertNoConflicts($contains);
        }
    }





}