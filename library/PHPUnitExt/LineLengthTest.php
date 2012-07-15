<?php
/**
 * Line length
 */
class PHPUnitExt_LineLengthTest implements PHPUnit_Framework_Test
{

    /**
     * @var array
     */
    protected $_lines = array();

    public function __construct($file)
    {
        $this->_lines = file($file);
    }

    /**
     * @return int
     */
    public function count()
    {
        return 1; // ???
    }

    /**
     * @return int
     */
    public function getLineCount()
    {
        return count($this->getLines());
    }

    /**
     * @param null|PHPUnit_Framework_TestResult $result
     *
     * @return PHPUnit_Framework_TestResult
     */
    public function run(PHPUnit_Framework_TestResult $result = null)
    {
        if (null === $result) {
            $result = new PHPUnit_Framework_TestResult;
        }

        foreach ($this->getLines() as $line) {
            $result->startTest($this);
            PHP_Timer::start();
            $stopTime = null;

            try {
                PHPUnit_Framework_Assert::assertLessThanOrEqual(30, strlen($line));
            } catch (PHPUnit_Framework_AssertionFailedError $e) {
                $stopTime = PHP_Timer::stop();
                $result->addFailure($this, $e, $stopTime);
            } catch (Exception $e) {
                $stopTime = PHP_Timer::stop();
                $result->addError($this, $e, $stopTime);
            }

            if (null === $stopTime) {
                $stopTime = PHP_Timer::stop();
            }
            $result->endTest($this, $stopTime);
        }

        return $result;
    }

    /**
     * @return array
     */
    public function getLines()
    {
        return $this->_lines;
    }

    /**
     * @param array $lines
     * @return PHPUnitExt_LineLength
     */
    public function setLines($lines)
    {
        $this->_lines = (array) $lines;
        return $this;
    }


}