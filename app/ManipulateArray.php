<?php

namespace App;

class ManipulateArray {

    private $header;
    private $array;
    private $registries = [];

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
        $this->setRegistries($array);
    }

    public function setRegistries($array)
    {
        $this->registries =[];
        $this->array = $array;
        foreach ($this->array as $registry) {
            $this->registries[] = $registry;    
        }
    }

    public function getArray()
    {
        return $this->array;
    }

    public function getRegistryByFieldContent($field, $content) 
    {
        foreach ($this->registries as $registry) {
            if ($registry["$field"] == $content) {
                return $registry;
            }
        }
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