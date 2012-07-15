<?php
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(dirname(__FILE__) . '/../library'),
    get_include_path(),
)));

defined('CODE_PATH') || define('CODE_PATH', realpath(dirname(__FILE__) . '/../library/Sample'));

require_once 'Zend/Loader/Autoloader.php';
$autoloader = Zend_Loader_Autoloader::getInstance();
$autoloader->registerNamespace('Sample_');
$autoloader->registerNamespace('Test_');
$autoloader->registerNamespace('PHPUnitExt_');

abstract class BaseTestCase extends PHPUnit_Framework_TestCase {

    public function setUp() {
        parent::setUp();
    }

    public function tearDown() {

    }

}