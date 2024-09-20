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
                '/' => 'HomeController@login',
                '/controle' => 'HomeController@controle',
                '/cadastro' => 'HomeController@cadastro',
                '/atendimento' => 'HomeController@atendimento',
                '/estatistica' => 'HomeController@estatistica',
                '/configuracao' => 'HomeController@configuracao',

                '/cadastro/cidade' => 'CadastroController@cidade',
                '/cadastro/servico' => 'CadastroController@servico',
                '/cadastro/produto' => 'CadastroController@produto',
                '/atendimento/pedido' => 'AtendimentoController@pedido',
                '/atendimento/cliente' => 'AtendimentoController@cliente',
                '/atendimento/veiculo' => 'AtendimentoController@veiculo',
                '/atendimento/orcamento' => 'AtendimentoController@orcamento',


                '/cidade/buscar' => 'CidadeController@buscar',
                '/cidade/excluir' => 'CidadeController@excluir',
                '/cidade/atualizar' => 'CidadeController@atualizar',

            ],
            'post' => [
                '/home' => 'HomeController@index',
                '/cidade/salvar' => 'CidadeController@salvar',
                '/servico/salvar' => 'ServicoController@salvar',
                '/produto/salvar' => 'ProdutoController@salvar',
            ],

        ];
    }
}
