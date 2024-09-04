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
                '/cliente' => 'ClienteController@index',
                '/atendimento' => 'AtendimentoController@index',
            ],
            'post' => [
                '/user/cadastrar' => 'UserController@cadastrar',
                '/user/atualizar/[aA-zZ]+' => 'UserController@atualizar',
            ],
        ];
    }
}
