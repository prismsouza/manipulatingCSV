<?php

namespace App;

class ManipulateArray {

    public $header;
    public $array;
    public $registries = [];

    public function __construct($array) {
        $this->array = $array;
        $this->setArrayHeader($this->array);
        $this->array = $this->arrayKeyColumn($array);
        $this->setArray($this->array);
    }

    public function setArrayHeader($array) 
    { 
        $this->header = array_shift($array);
    }

    public function getArrayHeader() 
    {
        return $this->header;
    }

    public function setArray($array)
    {
        $this->array = $array;
        foreach ($this->array as $registry) {
            $this->setRegistry($registry);
        }
    }

    public function updateArray($id)
    {
        $this->array[] = $this->getRegistry($id);
    }

    public function getArray()
    {
        return $this->array;
    }

    public function setRegistry($registry)
    {
        $this->registries[] = $registry;
    }

    public function getRegistry($id) 
    {
        return $this->registries[$id];
    }

    public function getElementInRegistry($id, $key) 
    {
        return $this->registries[$id][$key];
    }  

    public function eraseArray()
    {
        $this->array = [];
        $this->registries = [];
    } 

    public function arrayKeyColumn($array) 
    {
        array_shift($array);
        $header = $this->header;
        $f = array_map(function($line) use ($header) {
            return array_combine($this->header, $line);
        }, $array);

        return $f;
    }
}