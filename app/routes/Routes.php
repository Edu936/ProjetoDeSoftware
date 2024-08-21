<?php

namespace app\routes;

class Routes 
{
    public static function get(): array
    {
        return [
            'get' => [
                '/'=>'HomeController@index',
                '/cadastros' => 'CadastroContrller@store',
            ],
            'post' => [],
        ];
    }
}
