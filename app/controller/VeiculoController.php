<?php

namespace app\controller;

use app\models\Veiculo;
use app\static\Request;
use app\database\Filters;
use app\models\Cliente;

class VeiculoController extends Controller
{
    public function paginaDeCadastro() : void 
    {
        $controller = new ClienteController();
        $clientes = $controller->buscarTodos();
        $this->views('cadastro', [
            'title' => "Estética Automotiva",
            'pag' => "veiculo",
            'pronto' => false,
            'clientes' => $clientes,
        ]);    
    }

    public function paginaDeControle() : void
    {
        $this->views('controle', [
            'title' => "Estética Automotiva",
            'pag' => "veiculo",
        ]);
    }

    public function paginaDeEdicao($codigo) : void {
        
    }

    public function cadastrar($value) : void 
    {
        $controller = new ClienteController();
        $clientes = $controller->buscarTodos();
        $cliente = $controller->buscarCliente('CD_CLIENTE', $value);
        $this->views('cadastro', [
            'title' => "Estética Automotiva",
            'pag' => "veiculo",
            'pronto' => true,
            'clientes' => $clientes,
            'client' => $cliente,
        ]);
    }

    public function salvar ($value) : void
    {
        $request = Request::all();
        $request += ['CD_CLIENTE' => $value[0]];
        $filtro = $this->filtro("DS_PLACA", $request['DS_PLACA']);
        $veiculo = new Veiculo;
        if($filtro == false) {
            $result = $veiculo->create($request);
            if(!$result){
                $this->views('cadastro', [
                    'title' => "Cadastro Veiculo",
                    'pag' => "finalizar",
                    'imagem' => "/images/Forgot password-bro.png",
                    'mensagem' => "Não foi possivel cadastrar o veiculo.",
                    'link' => '/cadastro/veiculo',
                ]);
            }
            else {
                $this->views('cadastro', [
                    'title' => "Cadastro Veiculo",
                    'pag' => "finalizar",
                    'imagem' => "/images/Create-amico.png",
                    'mensagem' => "O Veiculo {$request['DS_PLACA']} foi cadastrado com Sucesso!",
                    'link' => '/cadastro/veiculo',
                ]); 
            }
        }
        else {
            $this->views('cadastro', [
                'title' => "Cadastro Veiculo",
                'pag' => "finalizar",
                'imagem' => "/images/Forgot password-bro.png",
                'mensagem' => "O Veiculo {$request['DS_PLACA']} já foi cadastrado!",
                'link' => '/cadastro/veiculo',
            ]);
        }
    }

    public function filtro ($key, $value) : bool | Veiculo
    {
        $veiculo = new Veiculo;
        $veiculo = $veiculo->findby($key, $value);
        return $veiculo ? $veiculo : false;
    }

    public function buscarVeiculo(string $key, mixed $data) : Veiculo | bool
    {
        $filters = new Filters();
        $veiculo = new Veiculo();

        $filters->where($key, '=', $data);

        $veiculo->setfilters($filters);
        $veiculo = $veiculo->fetchAll();

        return $veiculo[0] ?? false;
    }

    public function buscarClienteVeiculo(string $key, int $data) : Cliente | bool
    {
        $filters = new Filters();
        $cliente = new Cliente();

        $filters->where($key, '=', $data);

        $cliente->setfilters($filters);
        $cliente = $cliente->fetchAll($filters);

        return $cliente[0] ?? false;
    }

}
