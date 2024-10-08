<?php

namespace app\controller;

use app\models\Servico;
use app\static\Request;

class ServicoController extends Controller
{

    public function paginaDeCadastro() : void
    {
        $this->views('cadastro', [
            'title' => "Estética Automotiva",
            'pag' => "servico",
        ]);
    }

    public function paginaDeControle() : void
    {
        $this->views('controle', [
            'title' => "Estética Automotiva",
            'pag' => "servico",
        ]);
    }

    private function buscarPorNome(string $name): Servico
    {
        $service = new Servico();
        $service->setNome("");
        $service->setCodigo(0);
        $service->setValor(0);

        $servico = new Servico();
        $servico = $servico->findby('NM_SERVICO', $name);

        return $servico ? $servico : $service;
    }

    public function salvar()
    {
        $request = Request::all();
        $filtro = $this->buscarPorNome($request['name']);
        $servico = new Servico();
        if ($filtro->getNome() != $request['name']) {
            $result = $servico->create([
                "NM_SERVICO" => $request['name'],
                "VL_SERVICO" => $request['valor'],
            ]);
            if (!$result) {
                $this->views('cadastro', [
                    'title' => "Estética Automotiva",
                    'pag' => "cadastro realizado",
                    'resposta' => "Ocorreu um erro no cadastro!",
                ]);
            } else {
                $this->views('cadastro', [
                    'title' => "Estética Automotiva",
                    'pag' => "cadastro realizado",
                    'resposta' => "O servico {$request['name']} foi cadastrado com sucesso!",
                ]);
            }
        } else {
            $this->views('cadastro', [
                'title' => "Estética Automotiva",
                'pag' => "cadastro realizado",
                'resposta' => "Este Servico ja foi cadastrado!",
            ]);
        }
    }
}
