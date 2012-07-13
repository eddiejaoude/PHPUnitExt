<?php
/**
 * Test file adapter interface
 */
interface Test_File_Adapter_Interface
{

    /**
     * Set file
     *
     * @abstract
     * @param string $file
     * @return Test_File_Adapter_Interface
     */
    public function setFile($file);

    /**
     * Get file
     *
     * @abstract
     * @return string
     */
    public function getFile();

    /**
     * Set result
     *
     * @abstract
     * @param bool $result
     * @return Test_File_Adapter_Interface
     */
    public function setResult($result);

    /**
     * Get test result
     *
     * @abstract
     * @return bool
     */
    public function getResult();

    /**
     * Set content
     *
     * @abstract
     * @param string $content
     * @return string
     */
    public function setContent($content);

    /**
     * Get content
     *
     * @abstract
     * @return string
     */
    public function getContent();

    /**
     * Run tests
     *
     * @abstract
     * @return Test_File_Adapter_Interface
     */
    public function run();

}