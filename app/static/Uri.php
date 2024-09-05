<?php

namespace app\static;

abstract class Uri {
    public static function get()
    {
        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));    
    }
}