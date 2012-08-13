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
     * Assert file line length in path
     *
     * @param string $path
     * @param int $length
     */
    public function assertFileLineLength($path, $length = 80)
    {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
        foreach ($files as $file) {
            PHPUnitExt_Suite::factory('PHPUnitExt_Assertion_File')
                ->assertFileLineLength($file->getPathName(), $length);
        }
    }

    /**
     * Assert no conflicts in path
     *
     * @param string $path
     * @param string $fileContent
     * @param string $fileExtensions
     */
    public function assertNoConflicts($path, $fileContent = '====', $fileExtensions = 'local')
    {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
        foreach ($files as $file) {
            PHPUnitExt_Suite::factory('PHPUnitExt_Assertion_File')
                ->assertNoConflicts($file->getPathName(), $fileContent, $fileExtensions);
        }
    }





}