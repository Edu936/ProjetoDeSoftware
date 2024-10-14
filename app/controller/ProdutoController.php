<?php

namespace app\controller;

use app\database\Filters;
use app\models\Fornecedor;
use app\models\Produto;
use app\models\ProdutoFornecedor;
use app\models\ProdutoServico;
use app\static\Request;

class ProdutoController extends Controller
{
    private $_produto;
    private $_filters;
    private $_produtoServico;
    private $_produtoFornecedor;
    private $_controllerServico;
    private $_controllerFornecedor;

    public function __construct()
    {
        $this->_produto = new Produto();
        $this->_filters = new Filters();
        $this->_produtoServico = new ProdutoServico();
        $this->_produtoFornecedor = new ProdutoFornecedor();
        $this->_controllerServico = new ServicoController();
        $this->_controllerFornecedor = new FornecedorController();
    }

    public function paginaDeCadastro() : void
    {
        $fornecedores = $this->_controllerFornecedor->buscarTodos();
        $this->views('cadastro', [
            'title' => "Estética Automotiva",
            'pag' => "produto",
            'fornecedores' => $fornecedores,
        ]);
    }

    public function paginaDeControle() : void
    {
        $produtos = $this->buscarTodos();
        $this->views('controle', [
            'title' => "Estética Automotiva",
            'pag' => "produto",
            'produtos' => $produtos
        ]);
    }

    public function paginaDeEdicao($codigo) : void 
    {
        $produto = $this->buscarProduto("CD_PRODUTO", $codigo[0]);
        $this->views('atualizar', [
            'title' => "Edição de produto",
            'pag' => "produto",
            'produto' => $produto,
            'link' => '/controle/produto',
        ]);
    }

    public function atualizar($codigo) : void 
    {
        $request = Request::all();
        $result = $this->_produto->update($request, 'CD_PRODUTO', $codigo[0]);
        if($result){
            $this->views('controle', [
                'title' => "Atualização de Produto",
                'pag' => "finalizar",
                'imagem' => "/images/Create-amico.png",
                'mensagem' => "O produto {$request['NM_PRODUTO']} foi atualizado com sucesso!",
                'link' => '/controle/produto',
            ]);
        } else {
            $this->views('controle', [
                'title' => "Atualização de Produto",
                'pag' => "finalizar",
                'imagem' => "/images/Forgot password-bro.png",
                'mensagem' => "Não foi possivel atualizar o produto!",
                'link' => '/controle/produto',
            ]);
        }
    }

    public function paginaDeDetalhe($codigo): void
    {
        $produto = $this->buscarProduto("CD_PRODUTO", $codigo[0]);
        $this->views('controle', [
            'title' => "Edição de produto",
            'pag' => "detalhe produto",
            'produto' => $produto,
            'link' => '/controle/produto',
        ]);
    }

    public function associarServico($codigo): void 
    {
        $request = Request::all();
        $servico = $this->ServicosProduto('CD_SERVICO', $codigo[0]);
        dd($servico);
        $result = $this->_produtoServico->create($request);
        if($result){
            $this->views('controle', [
                'title' => "Associar produtos a serviços",
                'pag' => "finalizar",
                'imagem' => "/images/Create-amico.png",
                'mensagem' => "O Serviço foi associado com sucesso!",
                'link' => '/controle/produto',
            ]);
        } else {
            $this->views('controle', [
                'title' => "Associar produtos a serviços",
                'pag' => "finalizar",
                'imagem' => "/images/Create-amico.png",
                'mensagem' => "Não foi possivel associado o produto ao serviço!",
                'link' => '/controle/produto',
            ]);
        }
    }

    public function associarFornecedor($codigo): void
    {
        $request = Request::all();
        $result = $this->_produtoFornecedor->create($request);
        if($result){
            $this->views('controle', [
                'title' => "Associar produtos a fornecedor",
                'pag' => "finalizar",
                'imagem' => "/images/Create-amico.png",
                'mensagem' => "O Serviço foi associado com sucesso!",
                'link' => '/controle/produto',
            ]);
        } else {
            $this->views('controle', [
                'title' => "Associar produtos a fornecedor",
                'pag' => "finalizar",
                'imagem' => "/images/Create-amico.png",
                'mensagem' => "Não foi possivel associado o produto ao fornecedor!",
                'link' => '/controle/produto',
            ]);
        }
    }

    public function relatorio() : void 
    {
    }

    public function excluir($codigo) : void
    {
        $result = $this->_produto->delete('CD_PRODUTO',$codigo[0]);
        if(!$result){
            $this->views('controle', [
                'title' => "Exclusão de Produto",
                'pag' => "finalizar",
                'imagem' => "/images/Inbox cleanup-rafiki.png",
                'mensagem' => "O produto foi apagado!",
                'link' => '/controle/produto',
            ]);
        } else {
            $this->views('controle', [
                'title' => "Exclusão de Produto",
                'pag' => "finalizar",
                'imagem' => "/images/Forgot password-bro.png",
                'mensagem' => "O produto não pode ser apagado!",
                'link' => '/controle/produto',
            ]);
        }
    }

    public function salvarFornecedorProduto($codigo) : bool
    {
        $request = Request::input('CD_FORNECEDOR');
        return $this->_produtoFornecedor->create([
            'CD_PRODUTO' => $codigo,
            'CD_FORNECEDOR' => $request
        ]);
    }

    public function salvar()
    {
        $request = Request::exception(['CD_FORNECEDOR']);
        $filtro = $this->buscarProduto('NM_PRODUTO', $request['NM_PRODUTO']);
        if (!$filtro) {
            $result = $this->_produto->create($request);
            if (!$result) {
                $this->views('cadastro', [
                    'title' => "Cadastros Produtos",
                    'pag' => "finalizar",
                    'imagem' => "/images/Forgot password-bro.png",
                    'mensagem' => "Não foi possivel cadastrar o produto {$request['NM_FORNECEDOR']}!",
                    'link' => '/cadastro/produto',
                ]);
            } else {
                $produtoCadastrado = $this->buscarProduto('NM_PRODUTO',$request['NM_PRODUTO']);
                $fornecedor = $this->salvarFornecedorProduto($produtoCadastrado->getCodigo());
                if (!$fornecedor) {
                    $this->views('cadastro', [
                        'title' => "Cadastros Produtos",
                        'pag' => "finalizar",
                        'imagem' => "/images/Forgot password-bro.png",
                        'mensagem' => "O cadastro do produto foi realizado, mas não foi possivel associar o fornecedor ao produto!",
                        'link' => '/cadastro/produto',
                    ]);
                } else {
                    $this->views('cadastro', [
                        'title' => "Cadastros Produtos",
                        'pag' => "finalizar",
                        'imagem' => "/images/Create-amico.png",
                        'mensagem' => "O produto {$produtoCadastrado->getNome()} foi cadastrado com sucesso!",
                        'link' => '/cadastro/produto',
                    ]);
                }
            }
        } else {
            $this->views('cadastro', [
                'title' => "Cadastro Produtos",
                'pag' => "finalizar",
                'imagem' => "/images/Forgot password-bro.png",
                'mensagem' => "Esse produto já foi cadastrado!",
                'link' => '/cadastro/produto',
            ]);
        }
    }

    public function buscarTodos() : array
    {
        return $this->_produto->fetchAll();
    }

    public function buscarProduto(string $key, mixed $data) : Produto|bool 
    {
        $this->_filters->where($key, '=', $data);
        $this->_produto->setfilters($this->_filters);
        $produto = $this->_produto->fetchAll();
        $this->_filters->clear();
        return $produto[0] ?? false;
    }

    public function fornecedoresProduto(string $key, int $data) : array
    {
        $fornecedores = [];
        $this->_filters->where($key, '=', $data);
        $this->_produtoFornecedor->setfilters($this->_filters);
        $produtoFornecedor = $this->_produtoFornecedor->fetchAll();
        foreach($produtoFornecedor as $value) {
            $fornecedores [] = $this->_controllerFornecedor->buscarFornecedor('CD_FORNECEDOR', $value->getFornecedor());
        }
        return $fornecedores ?? false;
    }

    public function ServicosProduto(string $key, int $data) : array
    {
        $produtos = [];
        $this->_filters->where($key, '=', $data);
        $this->_produtoServico->setfilters($this->_filters);
        $produtoServico = $this->_produtoServico->fetchAll();
        foreach($produtoServico as $value) {
            $produtos [] = $this->_controllerServico->buscarServico('CD_FORNECEDOR', $value->getFornecedor());
        }
        return $produtos ?? false;
    }
}
