<?php
class PHPUnitExt_Constraint_LineLength extends PHPUnit_Framework_Constraint
{
    public function __construct($length)
    {
        $this->_length = $length;
    }

    /**
     * Evaluates the constraint for parameter $other. Returns TRUE if the
     * constraint is met, FALSE otherwise.
     *
     * @param string $line
     * @return bool
     */
    public function evaluate($line)
    {
        if (strlen($line) <= $this->_length) {
            return true;
        }
        return false;
    }

    public function fail($file, $key, $length)
    {
        $key++; // index starts from 0, but lines should be from 1
        $failure = 'Failed asserting file %s on line %d is less than %s';
        $failure = sprintf($failure, $file, $key, $length);
        throw new PHPUnitExt_Constraint_Exception($failure);
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
     */
    public function toString()
    {
        return 'is true';
    }
}