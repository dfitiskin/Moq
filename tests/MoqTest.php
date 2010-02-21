<?php

include_once('PHPUnit/Framework/TestCase.php');
include_once('moq.php');

class MoqTest extends PHPUnit_Framework_TestCase
{
    public function testTextNode()
    {
        $moq = new Moq();
        $moq->addMethod(
            'execute',
            3
        );
        
        $this->assertEquals(
            3,
            $moq->execute()
        );
    }
    
}