<?php

include_once('PHPUnit/Framework/TestCase.php');
include_once('moq.php');

class MoqTest extends PHPUnit_Framework_TestCase
{
    public function testAddMethodSimple()
    {
        $moq = new Moq();
        $moq->addMethod(
            'execute',
            3
        );
        
        $this->assertEquals(
            3,
            $moq->object->execute()
        );
    }
    
    public function testGetArguments()
    {
        $moq = new Moq();
        
        $moq->execute('this is test argument');
        
        $this->assertEquals(
            array('this is test argument'),
            $moq->getArguments('execute', 0)
        );
    }
    
    public function testGetArgument()
    {
        $moq = new Moq();
        
        $moq->execute('this is test argument');
        
        $this->assertEquals(
            'this is test argument',
            $moq->getArgument('execute', 0, 0)
        );
    }
    
    public function testGetCallCount()
    {
        $moq = new Moq();
        
        $count = 5;
        for ($i = 0; $i < $count; $i++)
        {
            $moq->execute();
        }
        
        $this->assertEquals(
            $count,
            $moq->getCallCount('execute')
        );
    }
}