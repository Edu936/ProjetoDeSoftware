<?php

namespace app\routes;

/**
 * Essa classe so possui o metodo get esse metodo retorna todas as rotas que nosso website possui.
 */

 abstract class Routes
{
    public static function get(): array
    {
        return [
            'get' => [
                '/' => 'LoginController@teste',
                // '/cadastro' => 'CadastroController@usuario',
                // '/atendimento' => 'AtendimentoController@index',
                // '/user' => 'UserController@index',
                // '/cidade' => 'CidadeController@index',
                // '/cliente' => 'ClienteController@index',
            ],
            'post' => [
                // '/home' => 'HomeController@index',
                // '/user/cadastrar' => 'UserController@cadastrar',
                // '/user/atualizar/[aA-zZ]+' => 'UserController@atualizar',
                // '/cidade/cadastrar' => 'CidadeController@cadastrar',
            ],
        ];
    }
}
