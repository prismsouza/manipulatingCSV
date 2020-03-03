<?php

namespace App;

class User {
    public $userName;

    public function __construct($name)
    {
        $this->userName = $name;
    }

    public function getName()
    {
        return $this->userName;
    }
}