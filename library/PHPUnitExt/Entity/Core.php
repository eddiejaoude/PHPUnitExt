<?php
/**
 * Entity core
 */
class PHPUnitExt_Entity_Core implements PHPUnitExt_Entity_Interface
{
    /**
     * @var string
     */
    protected $_assertion;

    /**
     * @var string
     */
    protected $_constraint;

    /**
     * @var array
     */
    protected $_data = array();

    /**
     * @param string $assertion
     * @return PHPUnitExt_Entity_Core
     */
    public function setAssertion($assertion)
    {
        $this->_assertion = (string) $assertion;
        return $this;
    }

    /**
     * @return string
     */
    public function getAssertion()
    {
        return $this->_assertion;
    }

    /**
     * @param string $constraint
     * @return PHPUnitExt_Entity_Core
     */
    public function setConstraint($constraint)
    {
        $this->_constraint = (string) $constraint;
        return $this;
    }

    /**
     * @return string
     */
    public function getConstraint()
    {
        $this->_constraint;
    }

    /**
     * @param array $data
     * @return PHPUnitExt_Entity_Core
     */
    public function setData($data)
    {
        return $this;
    }

    /**
     * @param array $data
     */
    public function getData($data)
    {
        $this->_data = (array) $data;
    }

}