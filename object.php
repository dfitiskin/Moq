<?php

class MoqObject
{
    private $manager = null;
    
    public function __construct($manager)
    {
        $this->manager = $manager;
    }
    
    public function __call($name, $args)
    {
        return $this->manager->handleCall($name, $args);
    }
}