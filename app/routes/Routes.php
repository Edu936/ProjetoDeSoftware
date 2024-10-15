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
                    '/sign-in' => 'HomeController@signIn',
                    '/controle' => 'HomeController@controle',
                    '/cadastro' => 'HomeController@cadastro',
                    '/atendimento' => 'HomeController@atendimento',
                    '/estatistica' => 'HomeController@estatistica',
                    '/configuracao' => 'HomeController@configuracao', 
                //Relatorio
                    '/relatorio/produto' => 'ProdutoController@relatorio',
                    '/relatorio/servico' => 'ServicoController@relatorio',
                    '/relatorio/usuario' => 'UsuarioController@relatorio',
                    '/relatorio/estoque' => 'ProdutoController@relatorioEstoque',
                //Telefones
                    '/usuario/telefone/[0-9]+' => 'UsuarioController@cadastroTelefone',
                    '/cliente/telefone/[0-9]+' => 'ClienteController@cadastroTelefone',
                    '/fornecedor/telefone/[0-9]+' => 'FornecedorController@cadastroTelefone',
                //Email
                    '/usuario/email/[0-9]+' => 'UsuarioController@cadastroEmail',
                    '/cliente/email/[0-9]+' => 'ClienteController@cadastroEmail',
                    '/fornecedor/email/[0-9]+' => 'FornecedorController@cadastroEmail',
                //Cidade
                    //Paginas 
                        '/controle/cidade' => 'CidadeController@paginaDeControle',
                        '/cadastro/cidade' => 'CidadeController@paginaDeCadastro',
                        '/cidade/editar/[0-9]+' => 'CidadeController@paginaDeEdicao',
                    //Ações
                        '/cidade/buscar/[0-9]+' => 'CidadeController@buscar',
                        '/cidade/excluir/[0-9]+' => 'CidadeController@excluir',
                //Cliente
                    //Paginas 
                        '/cadastro/cliente' => 'ClienteController@paginaDeCadastro',
                        '/controle/cliente' => 'ClienteController@paginaDeControle',
                        '/cliente/editar/[0-9]+' => 'ClienteController@paginaDeEdicao',
                        '/cliente/buscar/[0-9]+' => 'ClienteController@paginaDeDetalhe',
                    //Ações
                        '/cliente/excluir/[0-9]+' => 'ClienteController@excluir',
                //Veiculo
                    //Paginas
                        '/controle/veiculo' => 'VeiculoController@paginaDeControle',
                        '/cadastro/veiculo' => 'VeiculoController@paginaDeCadastro',
                        '/veiculo/editar/[0-9]+' => 'VeiculoController@paginaDeEdicao',
                        '/veiculo/buscar/[0-9]+' => 'VeiculoController@paginaDeDetalhe',
                        '/veiculo/buscar/cliente/[0-9]+' => 'VeiculoController@cadastrar',
                    //Ações
                        '/veiculo/excluir/[0-9]+' => 'VeiculoController@excluir',
                //Servico
                    //Paginas
                        '/controle/servico' => 'ServicoController@paginaDeControle',
                        '/cadastro/servico' => 'ServicoController@paginaDeCadastro',
                        '/servico/editar/[0-9]+' => 'ServicoController@paginaDeEdicao',
                    //Ações
                        '/servico/buscar/[0-9]+' => 'ServicoController@buscar',
                        '/servico/excluir/[0-9]+' => 'ServicoController@excluir',
                //Produto        
                    '/produto/relatorio' => 'ProdutoController@relatorio', 
                    '/produto/excluir/[0-9]+' => 'ProdutoController@excluir',
                    '/controle/produto' => 'ProdutoController@paginaDeControle',
                    '/cadastro/produto' => 'ProdutoController@paginaDeCadastro',
                    '/produto/editar/[0-9]+' => 'ProdutoController@paginaDeEdicao',
                    '/produto/buscar/[0-9]+' => 'ProdutoController@paginaDeDetalhe',    
                    '/produto/inserir/[0-9]+' => 'ProdutoController@paginaDeInserir',   
                    '/produto/debitar/[0-9]+' => 'ProdutoController@paginaDeDebitar',   
                    '/produto/associar/servico/[0-9]+' => 'ProdutoController@associarServico',   
                    '/produto/associar/fornecedor/[0-9]+' => 'ProdutoController@associarFornecedor',  
                //Usuario
                    //Paginas
                        '/usuario/editar/[0-9]+' => 'UsuarioController@paginaDeEdicao',
                        '/usuario/excluir/[0-9]+' => 'UsuarioController@paginaDeExclusao',
                        '/usuario/controle/[0-9]+' => 'UsuarioController@paginaDeControle',
                    //Ações
                        '/usuario/apagar/[0-9]' => 'UsuarioController@excluir',
                //Orçamento
                    //Paginas
                        '/controle/orcamento' => 'OrcamentoController@paginaDeControle',
                        '/cadastro/orcamento' => 'OrcamentoController@paginaDeCadastro',
                        '/orcamento/editar/[0-9]+' => 'OrcamentoController@paginaDeEdicao',
                        '/orcamento/detalhe/[0-9]+' => 'OrcamentoController@paginaDeDetalhe',
                        '/orcamento/buscar/[0-9]+' => 'OrcamentoController@exibirOrcamentos',
                    //Ações
                        '/orcamento/excluir/[0-9]+' => 'OrcamentoController@excluir',
                //Pedido
                    '/pedido/buscar/[0-9]+' => 'PedidoController@buscar',
                    '/pedido/excluir/[0-9]+' => 'PedidoController@excluir',
                    '/cadastro/pedido' => 'PedidoController@primeiraEtapa',
                    '/controle/pedido' => 'PedidoController@paginaDeControle',
                    '/pedido/editar/[0-9]+' => 'PedidoController@paginaDeEdicao', 
                    '/pedido/orcamentos/[0-9]+' => 'PedidoController@quintaEtapa', 
                    '/pedido/buscar/cliente/[0-9]+' => 'PedidoController@segundaEtapa',                     
                    '/pedido/orcamento/detalhe/[0-9]+' => 'PedidoController@quartaEtapa',
                    '/pedido/orcamentos/cliente/[0-9]+' => 'PedidoController@terceiraEtapa',
                //Fornecedor
                    '/fornecedor/excluir/[0-9]+' => 'FornecedorController@excluir',    
                    '/cadastro/fornecedor' => 'FornecedorController@paginaDeCadastro',    
                    '/controle/fornecedor' => 'FornecedorController@paginaDeControle',
                    '/fornecedor/buscar/[0-9]+' => 'FornecedorController@paginaDeDetalhes',
                    '/fornecedor/editar/[0-9]+' => 'FornecedorController@paginaDeEdicao',
            ],
            'post' => [
                //Home
                    '/home' => 'HomeController@home',
                //Cidade
                    '/cidade/salvar' => 'CidadeController@salvar',
                    '/cidade/atualizar/[0-9]+' => 'CidadeController@atualizar',
                //Cliente
                    '/cliente/salvar' => 'ClienteController@salvar',
                    '/cliente/atualizar/[0-9]+' => 'ClienteController@atualizar',
                //Veiculo
                    '/veiculo/salvar/[0-9]+' => 'VeiculoController@salvar',
                    '/veiculo/atualizar/[0-9]+' => 'VeiculoController@atualizar',
                //Servico
                    '/servico/salvar' => 'ServicoController@salvar',
                    '/servico/atualizar/[0-9]+' => 'ServicoController@atualizar',
                //Produto
                    '/produto/salvar' => 'ProdutoController@salvar',
                    '/produto/atualizar/[0-9]+' => 'ProdutoController@atualizar',
                //Usuario
                    '/usuario/salvar' => 'UsuarioController@salvar',
                    '/usuario/apagar/[0-9]+' => 'UsuarioController@excluir',
                    '/usuario/atualizar/[0-9]+' => 'UsuarioController@atualizar',
                    '/usuario/salvar/email/[0-9]+' => 'UsuarioController@salvarEmail',
                    '/usuario/salvar/telefone/[0-9]+' => 'UsuarioController@salvarTelefone',
                //Fornecedor
                    '/fornecedor/salvar' => 'FornecedorController@salvar',
                    '/fornecedor/atualizar/[0-9]+' => 'FornecedorController@atualizar',
                //Pedido
                    '/pedido/salvar/[0-9]+' => 'PedidoController@salvar',
                    '/pedido/cliente' => 'PedidoController@salvarCliente',
                    '/pedido/veiculo' => 'PedidoController@salvarVeiculo',
                    '/pedido/atualizar/[0-9]+' => 'PedidoController@atualizar',
                //Orcamento
                    '/orcamento/salvar' => 'OrcamentoController@salvar',
                    '/orcamento/atualizar/[0-9]+' => 'OrcamentoController@atualizar',
            ],

        ];
    }
}
