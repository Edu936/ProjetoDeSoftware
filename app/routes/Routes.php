<?php

namespace app\routes;

/**
 * Essa classe so possui o metodo get esse metodo retorna todas as rotas que nosso website possui.
 */

class Routes
{
    public static function get(): array
    {
        return [
            'get' => [
                '/' => 'HomeController@index',
                '/user' => 'UserController@index',
                '/user/[0-9]+' => 'UserController@user',
                '/register' => 'RegisterController@register',
                '/user/[0-9]+/orcamento/[0-9]+' => 'UserController@cad',
            ],
            'post' => [],
        ];
    }
}
