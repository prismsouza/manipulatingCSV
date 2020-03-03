<?php

namespace App;

class UserFactory
{
    public static function create($name)
    {
        return new User($name);
    }

}