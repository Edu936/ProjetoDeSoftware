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
                '/cadastro/cidade' => 'CadastroController@createCity',
                
                '/estatistica' => 'EstatisticaController@index',
                '/atendimento' => 'AtendimentoController@index',
                '/atendimento/cliente' => 'AtendimentoController@createClient',

                '/configuracao' => 'ConfiguracaoController@index',
            ],
            'post' => [
                '/home' => 'HomeController@index',

                '/cliente/listar' => 'ClientController@read',
                '/cliente/salvar' => 'ClientController@create',
                '/cliente/buscar' => 'ClientController@search',
                '/cliente/apagar' => 'ClientController@delete',
                '/cliente/alterar' => 'ClientController@update',
            ],
        ];
    }
}
