<?php

namespace app\static;

class RequestType
{
    public static function get() 
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}
