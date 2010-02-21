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
        $result = null;
        if (isset($this->args[$method][$call]))
        {
            $result = $this->args[$method][$call];
        }
        return $result;
    }
    
    public function getArgument($method, $arg = 0, $call = 0)
    {
        $result = null;
        if ($args = $this->getArguments($method, $call))
        {
            if (isset($args[$arg]))
            {            
                $result = $args[$arg];
            }
        }
        return $result;
    }
    
    public function getCallCount($method)
    {
        $result = 0;
        if (isset($this->args[$method]))
        {
            $result = count($this->args[$method]);
        }
        return $result;
    }
}