<?php

include_once('PHPUnit/Framework/TestCase.php');
include_once('manager.php');

class MoqTest extends PHPUnit_Framework_TestCase
{
    private $manager = null;
    
    public function setUp()
    {
        $this->manager = new MoqManager();
        $this->object = $this->manager->object;
    }
    
    public function testAddMethodSimple()
    {
        $this->manager->addMethod(
            'execute',
            3
        );
        
        $this->assertEquals(
            3,
            $this->object->execute()
        );
    }
    
    public function testGetArguments()
    {
        $this->object->execute('this is test argument');
        
        $this->assertEquals(
            array('this is test argument'),
            $this->manager->getArguments('execute', 0)
        );
    }
    
    public function testGetArgument()
    {
        $this->object->execute('this is test argument');
        
        $this->assertEquals(
            'this is test argument',
            $this->manager->getArgument('execute', 0, 0)
        );
    }
    
    public function testGetCallCount()
    {
        $count = 5;
        for ($i = 0; $i < $count; $i++)
        {
            $this->object->execute();
        }
        
        $this->assertEquals(
            $count,
            $this->manager->getCallCount('execute')
        );
    }
}