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
                //Home
                '/' => 'HomeController@login',
                '/controle' => 'HomeController@controle',
                '/cadastro' => 'HomeController@cadastro',
                '/atendimento' => 'HomeController@atendimento',
                '/estatistica' => 'HomeController@estatistica',
                '/configuracao' => 'HomeController@configuracao', 
                //Cidade
                '/cidade/buscar' => 'CidadeController@buscar',
                '/cidade/excluir' => 'CidadeController@excluir',
                '/cidade/atualizar' => 'CidadeController@atualizar',
                '/cadastro/cidade' => 'CidadeController@paginaDeCadastro',
                '/controle/cidade' => 'CidadeController@paginaDeControle',
                //Cliente
                '/atendimento/cliente' => 'ClienteController@atendimento',
                //Servico
                '/cadastro/servico' => 'ServicoController@paginaDeServico',
                //Produto
                '/cadastro/produto' => 'ProdutoController@paginaDeProduto',
            ],
            'post' => [
                //Home
                '/home' => 'HomeController@home',
                //Cidade
                '/cidade/salvar' => 'CidadeController@salvar',
                //Servico
                '/servico/salvar' => 'ServicoController@salvar',
                //Produto
                '/produto/salvar' => 'ProdutoController@salvar',
            ],

        ];
    }
}
