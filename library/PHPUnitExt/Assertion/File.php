<?php
/**
 * PHP Unit extension assertion for file
 */
class PHPUnitExt_Assertion_File extends PHPUnitExt_Assertion_Core
{

    /**
     * @param array $data
     */
    public function assertFileLineLength($data)
    {
        $lines = file($data['file']);

        foreach ($lines as $key => $line) {
            $this->_incrementAssertionCount();
            $constraint = new PHPUnitExt_Constraint_LineLength;
            $data['line']= $line;
            if (!$constraint->test($data)) {
                $data['key'] = $key;
                $constraint->fail($data);
            }
        }
    }

    public function assertFileLineLengthInPath($data)
    {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($data['path']));
        foreach ($files as $file) {
            $dataFile = array(
                'file' => $file->getPathName(),
                'length' => $data['length'],
            );
            $this->assertFileLineLength($dataFile);
        }
    }





}