<?php

namespace app\core;

use Throwable;

/**
 * Essa classe e aprimeira a ser istaciada, ela possui um metodo statico run que sera responsavel por chamar a 
 * classe RouterFilter e receber o tratamento de rota.
 */

abstract class Router
{
    public static function run()
    {
        try {
            $controller = new Controller;
            $filtroDeRotas = new RouterFilter;
            return $controller->execute($filtroDeRotas->get());
        } catch (Throwable $e) {
            echo $e->getMessage();
        }
    }
}
