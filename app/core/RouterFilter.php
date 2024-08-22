<?php

namespace app\core;

use app\routes\Routes;
use app\static\RequestType;
use app\static\Uri;

/**
 * Essa classe e responsavel por identificar se a url digitada é dinamica ou simples e tratar da melhor 
 * forma possivel.
 */

class RouterFilter
{
    private string $uri;
    private string $method;
    private array $routes;

    public function __construct()
    {
        $this->uri = Uri::get();
        $this->method = RequestType::get();
        $this->routes = Routes::get();
    }

    public function get()
    {
        $root = $this->rotasSimples();
        
        if ($root != 'NotFoundController@index') {
            return $root;
        } else {
            $root = $this->rotasDinamicas();

            if ($root != 'NotFoundController@index') {
                return $root;
            } else {
                return 'NotFoundController@index';
            }
        }
    }

    private function rotasSimples()
    {
        if (array_key_exists($this->uri, $this->routes[$this->method])) {
            return $this->routes[$this->method][$this->uri];
        }
        return 'NotFoundController@index';
    }

    private function rotasDinamicas()
    {
        foreach ($this->routes[$this->method] as $index => $route) {
            $regex = str_replace('/', '\/', ltrim($index, '/'));
            if ($index != '/' && preg_match("/^$regex$/", ltrim($this->uri, '/'))) {
                $registeFound = $route;
                break;
            } else {
                $registeFound = 'NotFoundController@index';
            }
        }
        return $registeFound;
    }
}
