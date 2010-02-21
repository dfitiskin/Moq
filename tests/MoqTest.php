<?php

include_once('PHPUnit/Framework/TestCase.php');
include_once('moq.php');

class MoqTest extends PHPUnit_Framework_TestCase
{
    private $moq = null;
    
    public function setUp()
    {
        $this->moq = new Moq();
    }
    
    public function testAddMethodSimple()
    {
        $this->moq->addMethod(
            'execute',
            3
        );
        
        $this->assertEquals(
            3,
            $this->moq->object->execute()
        );
    }
    
    public function testGetArguments()
    {
        $this->moq->object->execute('this is test argument');
        
        $this->assertEquals(
            array('this is test argument'),
            $this->moq->getArguments('execute', 0)
        );
    }
    
    public function testGetArgument()
    {
        $this->moq->object->execute('this is test argument');
        
        $this->assertEquals(
            'this is test argument',
            $this->moq->getArgument('execute', 0, 0)
        );
    }
    
    public function testGetCallCount()
    {
        $count = 5;
        for ($i = 0; $i < $count; $i++)
        {
            $this->moq->object->execute();
        }
        
        $this->assertEquals(
            $count,
            $this->moq->getCallCount('execute')
        );
    }
}