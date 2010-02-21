<?php

class Moq
{
    private $methods = array();
    
    public function __call($name, $args)
    {
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
}