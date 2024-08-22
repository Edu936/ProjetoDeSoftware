<?php

namespace app\core;

/**
 * Essa classe e aprimeira a ser istaciada, ela possui um metodo statico run que sera responsavel por chamar a 
 * classe RouterFilter e receber o tratamento de rota.
 */

class Router
{
    public static function run()  
    {
        $filtroDeRotas = new RouterFilter;
        return $filtroDeRotas->get();
    }
}
