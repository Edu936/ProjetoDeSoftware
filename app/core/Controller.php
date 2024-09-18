<?php

namespace app\core;

use Exception;

class Controller
{
    public function execute(string $root)
    {
        if (!str_contains($root, '@')) {
            throw new Exception("A rota esta registrada de forma errada!");
        }
        list($controller, $method) = explode('@', $root);
        $controllerClass = "app\controller\\" . $controller;
        if (!class_exists($controllerClass)) {
            throw new Exception("A Classe encontrada não existe!");
        }
        if (!method_exists($controllerClass, $method)) {
            throw new Exception("O método encontrado não existe!");
        }
        $objeto = new $controllerClass;
        $params = new ControllerParams;
        $parametros = $params->encontrarParametros($root);
        return $objeto->$method($parametros);
    }
}
