<?php

class Moq
{
    private $args = array();
    private $methods = array();
    
    public function __call($name, $args)
    {
        $this->args[$name][] = $args;
        
        if (isset($this->methods[$name]['return']))
        {
            return $this->methods[$name]['return'];
        }
    }
    
    public function addMethod($name, $return)
    {
        $this->methods[$name] = array(
            'return'    => $return,
        );
    }
    
    public function getArguments($method, $call)
    {
        if (isset($this->args[$method][$call]))
        {
            return $this->args[$method][$call];
        }
        else
        {
            return null;
        }
    }
}