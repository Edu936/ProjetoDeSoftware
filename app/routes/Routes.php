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
                '/cliente/buscar' => 'ClienteController@buscar',
                '/cliente/excluir' => 'ClienteController@excluir',
                '/cliente/atulizar' => 'ClienteController@eatualizar',
                '/controle/cliente' => 'ClienteController@paginaDeControle',
                '/atendimento/cliente' => 'ClienteController@paginaDeCadastro',
                //Veiculo
                '/veiculo/buscar' => 'VeiculoController@buscar',
                '/veiculo/excluir' => 'VeiculoController@buscar',
                '/veiculo/atualizar' => 'VeiculoController@buscar',
                '/controle/veiculo' => 'VeiculoController@paginaDeControle',
                '/atendimento/veiculo' => 'VeiculoController@paginaDeCadastro',
                //Servico
                '/cadastro/servico' => 'ServicoController@paginaDeCadastro',
                //Produto
                '/cadastro/produto' => 'ProdutoController@paginaDeCadastro',
                //Usuario
                '/usuario' => 'UsuarioController@paginaDeCadastro',
                //Orçamento
                '/atendimento/orcamento' => 'OrcamentoController@paginaDeCadastro',
                //Pedido
                '/atendimento/pedido' => 'PedidoController@paginaDeCadastro',
                //Pagamento0
                '/controle/pagamento' => 'PagamentoController@paginaDeControle',
            ],
            'post' => [
                //Home
                '/home' => 'HomeController@home',
                //Cidade
                '/cidade/salvar' => 'CidadeController@salvar',
                //Cliente
                '/cliente/salvar' => 'ClienteController@salvar',
                //Veiculo
                '/veiculo/salvar' => 'VeiculoController@salvar',
                //Servico
                '/servico/salvar' => 'ServicoController@salvar',
                //Produto
                '/produto/salvar' => 'ProdutoController@salvar',
            ],

        ];
    }
}
