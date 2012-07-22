<?php
/**
 * Test all files
 *
 * @author Eddie Jaoude
 * @package PHPUnitExt
 */
class Test_Core_FileTest extends BaseTestCase
{

    /**
     * Test the line length of a file
     */
    public function testLineLengthOfFile()
    {
        $entity = new PHPUnitExt_Entity_Standard();
        $entity
            ->setAssertion('PHPUnitExt_Assertion_File')
            ->setConstraint('assertFileLineLength')
            ->setData(
            array(
                'file' => CODE_PATH . '/ClassWithFullDocBlocs.php',
                'length' => 110,
            )
        );

        PHPUnitExt_Suite::factory($entity);
    }

    /**
     * Test line length of all files in directory
     */
    public function testLineLengthOfDirectory()
    {
        $entity = new PHPUnitExt_Entity_Standard();
        $entity
            ->setAssertion('PHPUnitExt_Assertion_File')
            ->setConstraint('assertFileLineLengthInPath')
            ->setData(
            array(
                'path' => CODE_PATH,
                'length' => 110,
            )
        );

        PHPUnitExt_Suite::factory($entity);
    }


}