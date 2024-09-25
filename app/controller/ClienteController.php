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
        echo $this-> views('atendimento', [
            'title' => "Estética Automotiva",
            'pag' => "cliente",
            'cidades' => $cidades,
        ]);
    }

    public function paginaDeControle()
    {
        echo $this-> views('controle', [
            'title' => "Estética Automotiva",
            'pag' => "cliente",
        ]);
    }

    public function buscarPorCPF(string $CPF) : Cliente
    {
        $client = new Cliente();
        $client->setCPF("");

        $cliente = new Cliente();

        $cliente = $cliente->findby('DS_CPF_CLIENTE', $CPF);

        return $cliente ? $cliente : $client;
    }

    public function salvar ()
    {
        $request = Request::all();
        $filtro = $this->buscarPorCPF($request['DS_CPF_CLIENTE']);
        $cliente = new Cliente();
        if($filtro->getCPF() != $request['DS_CPF_CLIENTE']){
            $result = $cliente->create($request);
            if (!$result) {
                $this->views('atendiemto', [
                    'title' => "Estética Automotiva",
                    'pag' => "cadastro realizado",
                    'resposta' => "Ocorreu um erro no cadastro!",
                ]);
            } else {
                $this->views('atendimento', [
                    'title' => "Estética Automotiva",
                    'pag' => "cadastro realizado",
                    'resposta' => "O cliente {$request['NM_CLIENTE']} foi cadastrado com sucesso!",
                ]);
            }
        } else {
            $this->views('atendimento', [
                'title' => "Estética Automotiva",
                'pag' => "cadastro realizado",
                'resposta' => "O Cliente Já foi Cadastrado!",
            ]);
        }
    }
}