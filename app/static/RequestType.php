<?php

namespace app\static;

abstract class RequestType
{
    public static function get() 
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}
