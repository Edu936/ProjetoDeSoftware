<?php

namespace app\controller;

use app\models\Produto;
use app\models\ProdutoFornecedor;
use app\static\Request;

class ProdutoController extends Controller
{

    public function paginaDeCadastro()
    {
        $controller = new FornecedorController();
        $fornecedores = $controller->buscarTodos();
        $this->views('cadastro', [
            'title' => "Estética Automotiva",
            'pag' => "produto",
            'fornecedores' => $fornecedores,
        ]);
    }

    public function paginaDeControle(): void
    {
        $this->views('controle', [
            'title' => "Estética Automotiva",
            'pag' => "produto",
        ]);
    }

    private function buscarPorNome(string $name): Produto
    {
        $product = new Produto();
        $product->setNome("");
        $product->setCodigo(0);
        $product->setValor(0);
        $product->setQuantidade(0);

        $produto = new Produto();
        $produto = $produto->findby('NM_PRODUTO', $name);

        return $produto ? $produto : $product;
    }

    public function salvar()
    {
        $request = Request::exception(['CD_FORNECEDOR']);
        $filtro = $this->buscarPorNome($request['NM_PRODUTO']);
        $produto = new Produto();
        if ($filtro->getNome() != $request['NM_PRODUTO']) {
            $result = $produto->create($request);
            if (!$result) {
                $this->views('cadastro', [
                    'title' => "Cadastros Produtos",
                    'pag' => "finalizar",
                    'imagem' => "/images/Forgot password-bro.png",
                    'mensagem' => "Não foi possivel cadastrar o produto {$request['NM_FORNECEDOR']}!",
                    'link' => '/cadastro/produto',
                ]);
            } else {
                $produtoCadastrado = $this->buscarPorNome($request['NM_PRODUTO']);
                $request = Request::input('CD_FORNECEDOR');
                $campos = ['CD_FORNECEDOR' => (int)$request, 'CD_PRODUTO' => $produtoCadastrado->getCodigo()];
                $Pro_For = new ProdutoFornecedor();
                $result = $Pro_For->create($campos);
                if (!$result) {
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
}
