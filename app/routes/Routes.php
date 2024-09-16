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
                '/atendimento/pedido' => 'AtendimentoController@pedido',
                '/atendimento/cliente' => 'AtendimentoController@cliente',
                '/atendimento/veiculo' => 'AtendimentoController@veiculo',
                '/atendimento/orcamento' => 'AtendimentoController@orcamento',
 
                '/configuracao' => 'ConfiguracaoController@index',
            ],
            'post' => [
                '/home' => 'HomeController@index',

                '/cidade/salvar' => 'CityController@salvar',

                '/cliente/listar' => 'ClientController@read',
                '/cliente/salvar' => 'ClientController@salvar',
                '/cliente/buscar' => 'ClientController@search',
                '/cliente/apagar' => 'ClientController@delete',
                '/cliente/alterar' => 'ClientController@update',
            ],
        ];
    }
}
