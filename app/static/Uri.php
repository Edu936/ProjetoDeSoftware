<?php

namespace app\static;

class Uri {
    public static function get()
    {
        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));    
    }
}