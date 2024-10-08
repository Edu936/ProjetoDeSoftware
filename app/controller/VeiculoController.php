<?php

namespace app\controller;

use app\models\Veiculo;
use app\static\Request;

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

    public function cadastrar($value) : void 
    {
        $controller = new ClienteController();
        $clientes = $controller->buscarTodos();
        $cliente = $controller->buscar('CD_CLIENTE', $value);
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
}
