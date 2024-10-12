<?php

namespace app\controller;

use app\models\Veiculo;
use app\static\Request;
use app\database\Filters;
use app\models\Cliente;

class VeiculoController extends Controller
{
    private $_veiculo;
    private $_filters;
    private $_cliente;
    private $_controllerCliente;


    public function __construct()
    {
        $this->_veiculo = new Veiculo();
        $this->_filters = new Filters();
        $this->_cliente = new Cliente();
        $this->_controllerCliente = new ClienteController();
    }

    public function paginaDeCadastro() : void 
    {
        $clientes = $this->_controllerCliente->buscarTodos();
        $this->views('cadastro', [
            'title' => "Estética Automotiva",
            'pag' => "veiculo",
            'pronto' => false,
            'clientes' => $clientes,
        ]);    
    }

    public function cadastrar($codigo) : void 
    {
        $clientes = $this->_controllerCliente->buscarTodos();
        $cliente = $this->_controllerCliente->buscarCliente('CD_CLIENTE', $codigo[0]);
        $this->views('cadastro', [
            'title' => "Estética Automotiva",
            'pag' => "veiculo",
            'pronto' => true,
            'clientes' => $clientes,
            'client' => $cliente,
        ]);
    }

    public function paginaDeControle() : void
    {
        $veiculos = $this->buscarTodos();
        $this->views('controle', [
            'title' => "Estética Automotiva",
            'pag' => "veiculo",
            'veiculos' => $veiculos,
        ]);
    }

    public function paginaDeEdicao($codigo) : void {
        
    }

    public function paginaDeDetalhe($codigo) : void {

    }

    public function salvar ($codigo) : void
    {
        $request = Request::all();
        $request += ['CD_CLIENTE' => $codigo[0]];
        $filtro = $this->buscarVeiculo("DS_PLACA", $request['DS_PLACA']);
        if(!$filtro) {
            $result = $this->_veiculo->create($request);
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

    public function buscarTodos() : array
    {
        $this->_filters->join('tb_cliente', 'tb_cliente.CD_CLIENTE', '=', 'tb_veiculo.CD_CLIENTE', 'LEFT JOIN');

        $this->_veiculo->setfilters($this->_filters);
        $veiculos = $this->_veiculo->fetchAll();

        return $veiculos;
    }
    
    public function buscarVeiculo(string $key, mixed $data) : Veiculo | bool
    {
        $this->_filters->where($key, '=', $data);

        $this->_veiculo->setfilters($this->_filters);
        $veiculo = $this->_veiculo->fetchAll();

        return $veiculo[0] ?? false;
    }

    public function buscarClienteVeiculo(string $key, int $data) : Cliente | bool
    {
        $this->_filters->where($key, '=', $data);

        $this->_cliente->setfilters($this->_filters);
        $cliente = $this->_cliente->fetchAll($this->_filters);

        return $cliente[0] ?? false;
    }

}
