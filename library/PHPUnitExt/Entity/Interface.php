<?php
interface PHPUnitExt_Entity_Interface
{

    /**
     * @abstract
     *
     * @param $assertion
     *
     * @return PHPUnitExt_Exception
     */
    public function setAssertion($assertion);

    /**
     * @abstract
     * @return string
     */
    public function getAssertion();

    /**
     * @abstract
     *
     * @param $constraint
     *
     * @return PHPUnitExt_Exception
     */
    public function setConstraint($constraint);

    /**
     * @abstract
     * @return string
     */
    public function getConstraint();

    /**
     * @abstract
     *
     * @param $data
     *
     * @return PHPUnitExt_Exception
     */
    public function setData($data);

    /**
     * @abstract
     *
     * @param $data
     *
     * @return PHPUnitExt_Exception
     */
    public function getData($data);

}