<?php
/**
 * Line length constraint
 *
 * @author Eddie Jaoude
 * @package PHPUnitExt
 */
class PHPUnitExt_Constraint_LineLength implements PHPUnitExt_Constraint_Interface
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
        if (empty($data['line']) || empty($data['length'])) {
            throw new PHPUnitExt_Constraint_Exception(
                'Must contain $data[\'line\'] and $data[\'length\'] elements in $data array'
            );
        }

        if (strlen($data['line']) <= $data['length']) {
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
        if (empty($data['key']) || empty($data['file']) || empty($data['length'])) {
            throw new PHPUnitExt_Constraint_Exception(
                'Must contain $data[\'key\'], $data[\'file\'] and $data[\'length\'] elements in $data array'
            );
        }

        $data['key']++; // index starts from 0, but lines should be from 1
        $failure = 'Failed asserting file %s on line %d is less than %s';
        $failure = sprintf($failure, $data['file'], $data['key'], $data['length']);
        throw new PHPUnitExt_Constraint_Exception($failure);
    }


}