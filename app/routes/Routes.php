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
                '/controle' => 'ControleController@index',
                '/cadastro' => 'CadastroController@index',
                '/estatistica' => 'EstatisticaController@index',
                '/atendimento' => 'AtendimentoController@index',
                '/cadastro/cidade' => 'CadastroController@cidade',
                '/cadastro/servico' => 'CadastroController@servico',
                '/atendimento/pedido' => 'AtendimentoController@pedido',
                '/atendimento/cliente' => 'AtendimentoController@cliente',
                '/atendimento/veiculo' => 'AtendimentoController@veiculo',
                '/atendimento/orcamento' => 'AtendimentoController@orcamento',
 
                '/configuracao' => 'ConfiguracaoController@index',

                '/cidade/buscar' => 'CidadeController@buscar',
                '/cidade/excluir' => 'CidadeController@excluir',
                '/cidade/atualizar' => 'CidadeController@atualizar',

            ],
            'post' => [
                '/home' => 'HomeController@index',
                '/cidade/salvar' => 'CidadeController@salvar',
                '/servico/salvar' => 'ServicoController@salvar',
            ],

        ];
    }
}
