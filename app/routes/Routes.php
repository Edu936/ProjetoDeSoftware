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
                '/' => 'LoginController@index',
                '/teste' => 'TesteController@index',
                '/controle' => 'ControleController@index',
                '/cadastro' => 'CadastroController@index',
                '/estatistica' => 'EstatisticaController@index',
                '/atendimento' => 'AtendimentoController@index',
                '/configuracao' => 'ConfiguracaoController@index',
            ],
            'post' => [
                '/home' => 'HomeController@index',
                '/cadastro/cliente' => 'CadastroController@create',
            ],
        ];
    }
}
