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
        if (!isset($data['line']) || !isset($data['length'])) {
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
        if (!isset($data['key']) || !isset($data['length'])) {
            throw new PHPUnitExt_Constraint_Exception(
                'Must contain $data[\'key\'], $data[\'file\'] and $data[\'length\'] elements in $data array'
            );
        }

        $data['key']++; // index starts from 0, but lines should be from 1
        $failure = 'Failed asserting line %d is less than %d';
        if (!empty($data['file'])) {
            $failure .= ' in file ' . $data['file'];
        }
        $failure = sprintf($failure, $data['key'], $data['length']);
        throw new PHPUnitExt_Constraint_Exception($failure);
    }


}