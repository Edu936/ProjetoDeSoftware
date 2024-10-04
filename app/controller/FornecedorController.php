<?php

namespace app\controller;

use app\models\Cidade;
use app\models\Fornecedor;

class FornecedorController extends Controller
{
    public function paginaDeCadastro() : void 
    {
        $card = "Cadastro De Fornecedor";
        $route = '/fornecedor/salvar';
        $fornecedor = new Fornecedor();
        $cidade = new CidadeController();
        $cidades = $cidade->buscarTodos();
        $this->views('cadastro', [
            'title' => "Estetica De Automotiva",
            'pag' => "fornecedor",
            'card' => $card,
            'route' => $route,
            'fornecedor' => $fornecedor,
            'cidades' => $cidades,
        ]);
    }
}
