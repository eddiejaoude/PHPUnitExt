<?php
/**
 * Constraint interface
 *
 * @author Eddie Jaoude
 * @package PHPUnitExt
 */
interface PHPUnitExt_Constraint_Interface
{

    /**
     * Actually performs the tests
     *
     * @abstract
     *
     * @param $data
     *
     * @return bool
     */
    public function test($data);

    /**
     * Failure
     *
     * Inserted data should contain useful information to the failure
     * I.e. file, line, expecting, actual
     *
     * @abstract
     *
     * @param $data
     *
     * @return bool
     */
    public function fail($data);


}