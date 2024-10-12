<?php

namespace app\controller;

use app\static\Request;
use app\models\Servico;
use app\database\Filters;

class ServicoController extends Controller
{
    private $_filters;
    private $_servico;

    function __construct()
    {
        $this->_filters = new Filters();
        $this->_servico = new Servico();
    }

    public function paginaDeCadastro() : void
    {
        $this->views('cadastro', [
            'title' => "Estética Automotiva",
            'pag' => "servico",
        ]);
    }

    public function paginaDeControle() : void
    {
        $servicos = $this->buscarTodos();
        $this->views('controle', [
            'title' => "Estética Automotiva",
            'pag' => "servico",
            'servicos' => $servicos,
        ]);
    }

    public function paginaDeEdicao($codigo) : void
    {
        
    }

    public function relatorio() : void {
        dd('Atendente');
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

    public function buscarTodos(){
        $servico = new Servico();
        return $servico->fetchAll();
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
                    'title' => "Cadastros Serviços",
                    'pag' => "finalizar",
                    'imagem' => "/images/Forgot password-bro.png",
                    'mensagem' => "Não foi possivel cadastrar o servico {$request['name']}!",
                    'link' => '/cadastro/servico',
                ]);
            } else {
                $this->views('cadastro', [
                    'title' => "Estética Automotiva",
                    'pag' => "finalizar",
                    'imagem' => "/images/Create-amico.png",
                    'mensagem' => "O servico {$request['name']} foi cadastrado com sucesso!",
                    'link' => '/cadastro/servico',
                ]);
            }
        } else {
            $this->views('cadastro', [
                'title' => "Estética Automotiva",
                'pag' => "finalizar",
                'imagem' => "/images/Forgot password-bro.png",
                'mensagem' => "Este serviço ja foi cadastrado!",
                'link' => '/cadastro/servico',
            ]);
        }
    }

    public function buscarFornecedor(string $key, mixed $data) : Servico|bool
    {
        $this->_filters->where($key, '=', $data);
        $this->_servico->setfilters($this->_filters);
        $servico = $this->_servico->fetchAll();
        return $servico[0] ?? false;
    }
}
