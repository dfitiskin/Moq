<?php

include_once('bootstrap.php');
include_once('PHPUnit/TextUI/TestRunner.php');
include_once('MoqTest.php');

$suite = new PHPUnit_Framework_TestSuite();
$suite->addTest(new PHPUnit_Framework_TestSuite('MoqTest'));
PHPUnit_TextUI_TestRunner::run($suite);
