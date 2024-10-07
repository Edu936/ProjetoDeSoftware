<?php

namespace app\controller;

use app\models\Cidade;
use app\models\Fornecedor;
use app\static\Request;

class FornecedorController extends Controller
{
    public function paginaDeCadastro() : void 
    {
        $card = "Cadastro De Fornecedor";
        $route = '/fornecedor/salvar';
        $fornecedor = new Fornecedor();
        $fornecedor->setNome("");
        $fornecedor->setCNPJ("");
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

    public function buscar($key, $value) 
    {
        $fornecedor = new Fornecedor();
        $fornecedor = $fornecedor->findby($key, $value);
        return $fornecedor ? true : false;
    }

    public function salvar() {
        $request = Request::all();
        $filtro1 = $this->buscar("NM_FORNECEDOR", $request['NM_FORNECEDOR']);
        $filtro2 = $this->buscar("DS_CNPJ_FORNECEDOR", $request['DS_CNPJ_FORNECEDOR']);
        $fornecedor = new Fornecedor();
        if(!($filtro1 && $filtro2)) {
            $result = $fornecedor->create($request);
            if(!$result){
                $this->views('cadastro', [
                    'title' => "Estética Automotiva",
                    'pag' => "finalizar",
                    'imagem' => "/images/Forgot password-bro.png",
                    'mensagem' => "Não foi possivel cadastrar o fornecedor {$request['NM_FORNECEDOR']}!",
                    'link' => '/cadastro/fornecedor',
                ]);
            } 
            else {
                $this->views('cadastro', [
                    'title' => "Estética Automotiva",
                    'pag' => "finalizar",
                    'imagem' => "/images/Create-amico.png",
                    'mensagem' => "O fornecedor {$request['NM_FORNECEDOR']} foi cadastrado!",
                    'link' => '/cadastro/fornecedor',
                ]);
            }

        } else {
            $this->views('cadastro', [
                'title' => "Cadastro Fornecedor",
                'pag' => "finalizar",
                'imagem' => "/images/Forgot password-bro.png",
                'mensagem' => "Esse fornededor já foi cadastrado!",
                'link' => '/cadastro/fornecedor',
            ]);
        }
    }

    public function buscarTodos() : array
    {
        $fornecedor = new Fornecedor();
        return $fornecedor->fetchAll();
    }
}
