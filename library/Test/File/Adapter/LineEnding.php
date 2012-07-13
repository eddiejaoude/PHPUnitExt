<?php
/**
 * Line ending adapter
 */
class Test_File_Adapter_LineEnding extends Test_File_Adapter_Core
{

    /**
     * Run
     *
     * Result will be true (successful) if match not found otherwise will be a false (i.e. test failed)
     *
     * @return Test_File_Adapter_Interface
     */
    public function run()
    {
        parent::run();

        $content = $this->getContent();
        $result = !stristr($content, "\r\n");
        $this->setResult($result);
        return $this;
    }

}