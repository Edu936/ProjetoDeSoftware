<?php

namespace app\controller;

use app\models\Cidade;
use app\models\Cliente;
use app\static\Request;

class ClienteController extends Controller
{
    public function paginaDeCadastro()
    {
        $cidade = new Cidade();
        $cidades = $cidade->fetchAll();
        echo $this->views('cadastro', [
            'title' => "Estética Automotiva",
            'pag' => "cliente",
            'cidades' => $cidades,
        ]);
    }

    public function paginaDeControle()
    {
        echo $this->views('controle', [
            'title' => "Estética Automotiva",
            'pag' => "cliente",
        ]);
    }

    public function buscarPorCPF(string $CPF): Cliente
    {
        $client = new Cliente();
        $client->setCPF("");

        $cliente = new Cliente();

        $cliente = $cliente->findby('DS_CPF_CLIENTE', $CPF);

        return $cliente ? $cliente : $client;
    }

    public function buscar($key, $value) 
    {
        $client = new Cliente();
        $client->setCPF("");

        $cliente = new Cliente();

        $cliente = $cliente->findby($key, $value[0]);

        return $cliente ? $cliente : $client;
    }

    public function salvar()
    {
        $request = Request::all();
        $filtro = $this->buscarPorCPF($request['DS_CPF_CLIENTE']);
        $cliente = new Cliente();
        if ($filtro->getCPF() != $request['DS_CPF_CLIENTE']) {
            $result = $cliente->create($request);
            if (!$result) {
                $this->views('cadastro', [
                    'title' => "Estética Automotiva",
                    'pag' => "finalizar",
                    'imagem' => "/images/Forgot password-bro.png",
                    'mensagem' => "Não foi possivel cadastrar o cliente {$request['NM_CLIENTE']}!",
                    'link' => '/cadastro/cliente',
                ]);
            } else {
                $this->views('cadastro', [
                    'title' => "Estética Automotiva",
                    'pag' => "finalizar",
                    'imagem' => "/images/Create-amico.png",
                    'resposta' => "O cliente {$request['NM_CLIENTE']} foi cadastrado!",
                    'link' => '/cadastro/cliente',
                ]);
            }
        } else {
            $this->views('cadastro', [
                'title' => "Estética Automotiva",
                'pag' => "finalizar",
                'imagem' => "/images/Forgot password-bro.png",
                'mensagem' => "Esse cliente já foi cadastrado!",
                'link' => '/cadastro/cliente',
            ]);
        }
    }

    public function buscarTodos() : array
    {
        $cliente = new Cliente();
        $clientes = $cliente->fetchAll();
        return $clientes;
    }
}
