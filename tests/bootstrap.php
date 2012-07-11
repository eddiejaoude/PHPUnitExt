<?php
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(dirname(__FILE__) . '/../library'),
    get_include_path(),
)));

require_once 'Zend/Loader/Autoloader.php';
$autoloader = Zend_Loader_Autoloader::getInstance();
$autoloader->registerNamespace('Sample_');

abstract class BaseTestCase extends PHPUnit_Framework_TestCase {

    public function setUp() {
        parent::setUp();
    }

    public function tearDown() {

    }

}