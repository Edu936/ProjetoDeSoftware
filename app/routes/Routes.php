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
                '/cidade/buscar/[0-9]+' => 'CidadeController@buscar',
                '/cidade/excluir/[0-9]+' => 'CidadeController@excluir',
                '/controle/cidade' => 'CidadeController@paginaDeControle',
                '/cadastro/cidade' => 'CidadeController@paginaDeCadastro',
                '/cidade/editar/[0-9]+' => 'CidadeController@paginaDeEdicao',
                //Cliente
                '/cliente/buscar' => 'ClienteController@buscar',
                '/cliente/excluir' => 'ClienteController@excluir',
                '/cliente/atulizar' => 'ClienteController@eatualizar',
                '/controle/cliente' => 'ClienteController@paginaDeControle',
                '/cadastro/cliente' => 'ClienteController@paginaDeCadastro',
                //Veiculo
                '/veiculo/excluir' => 'VeiculoController@buscar',
                '/veiculo/atualizar' => 'VeiculoController@buscar',
                '/controle/veiculo' => 'VeiculoController@paginaDeControle',
                '/cadastro/veiculo' => 'VeiculoController@paginaDeCadastro',
                '/cliente/buscar/[aA-zZ 0-9]+' => 'VeiculoController@cadastrar',
                //Servico
                '/cadastro/servico' => 'ServicoController@paginaDeCadastro',
                '/controle/servico' => 'ServicoController@paginaDeControle',
                //Produto
                '/controle/produto' => 'ProdutoController@paginaDeControle',
                '/cadastro/produto' => 'ProdutoController@paginaDeCadastro',
                //Usuario
                'controle/usuario' => 'UsuarioController@paginaDeControle',
                'cadastro/usuario' => 'UsuarioController@paginaDeCadastro',
                //Orçamento
                '/cadastro/orcamento' => 'OrcamentoController@paginaDeCadastro',
                '/controle/orcamento' => 'OrcamentoController@paginaDeControle',
                '/atendimento/orcamento' => 'OrcamentoController@paginaDeCadastro',
                //Pedido
                '/controle/pedido' => 'PedidoController@paginaDeControle',
                '/atendimento/pedido' => 'PedidoController@paginaDeCadastro',
                //Fornecedor
                '/controle/fornecedor' => 'FornecedorController@paginaDeControle',
                '/cadastro/fornecedor' => 'FornecedorController@paginaDeCadastro',
                //Relatorio
                '/relatorio/produto' => 'ProdutoController@relatorio',
                '/relatorio/servico' => 'ServicoController@relatorio',
                '/relatorio/usuario' => 'UsuarioController@relatorio',
            ],
            'post' => [
                //Home
                '/home' => 'HomeController@home',
                //Cidade
                '/cidade/salvar' => 'CidadeController@salvar',
                '/cidade/atualizar/[0-9]+' => 'CidadeController@atualizar',
                //Cliente
                '/cliente/salvar' => 'ClienteController@salvar',
                //Veiculo
                '/veiculo/salvar/[0-9]+' => 'VeiculoController@salvar',
                //Servico
                '/servico/salvar' => 'ServicoController@salvar',
                //Produto
                '/produto/salvar' => 'ProdutoController@salvar',
                //Usuario
                'usuario/salvar' => 'UsuarioController@salvar',
                //Fornecedor
                'fornecedor/salvar' => 'FornecedorController@salvar'
            ],

        ];
    }
}
