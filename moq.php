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
    
    public function getArguments($method, $call = 0)
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
    
    public function getArgument($method, $arg = 0, $call = 0)
    {
        if ($args = $this->getArguments($method, $call))
        {
            if (isset($args[$arg]))
            {            
                return $args[$arg];
            }
            else
            {
                return null;
            }
        }
        else
        {
            return null;
        }
    }
    
    public function getCallCount($method)
    {
        if (isset($this->args[$method]))
        {
            return count($this->args[$method]);
        }
        else
        {
            return 0;
        }
    }
}