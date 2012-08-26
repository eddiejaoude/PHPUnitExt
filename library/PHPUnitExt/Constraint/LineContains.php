<?php
/**
 * Line contains constraint
 *
 * @author Eddie Jaoude
 * @package PHPUnitExt
 */
class PHPUnitExt_Constraint_LineContains implements PHPUnitExt_Constraint_Interface
{

    /**
     * Evaluates the constraint for parameter $other. Returns TRUE if the
     * constraint is met, FALSE otherwise.
     *
     * @param array $data
     * @return bool
     * @throws PHPUnitExt_Constraint_Exception
     */
    public function test($data)
    {
        if (!isset($data['line']) || !isset($data['contains'])) {
            throw new PHPUnitExt_Constraint_Exception(
                'Must contain $data[\'line\'] and $data[\'contains\'] elements in $data array'
            );
        }

        if (!strstr($data['line'], $data['contains'])) {
            return true;
        }
        return false;
    }

    /**
     * Fail test report (exception)
     *
     * @param $data
     *
     * @return bool|void
     * @throws PHPUnitExt_Constraint_Exception
     */
    public function fail($data)
    {
        if (!isset($data['key']) || !isset($data['file']) || !isset($data['contains'])) {
            throw new PHPUnitExt_Constraint_Exception(
                'Must contain $data[\'key\'], $data[\'file\'] and $data[\'contains\'] elements in $data array'
            );
        }

        $data['key']++; // index starts from 0, but lines should be from 1
        $failure = 'Failed asserting file %s on line %d is does not contain %s';
        $failure = sprintf($failure, $data['file'], $data['key'], $data['contains']);
        throw new PHPUnitExt_Constraint_Exception($failure);
    }


}