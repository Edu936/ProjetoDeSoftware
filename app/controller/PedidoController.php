<?php

namespace app\controller;

use app\models\Cliente;
use app\static\Request;

class PedidoController extends Controller
{
    private $controllerCliente;
    private $controllerServico;
    private $controllerProduto;
    private $controllerVeiculo;

    public function __construct()
    {
        $this->controllerCliente = new ClienteController;
        $this->controllerServico = new ServicoController;
        $this->controllerProduto = new ProdutoController;
        $this->controllerVeiculo = new VeiculoController;
    }

    public function paginaDeCadastro() : void 
    {
        $servicos = $this->controllerServico->buscarTodos();
        $produtos = $this->controllerProduto->buscarTodos();
        $clientes = $this->controllerCliente->buscarTodos();
        $this->views('atendimento', [
            'title' => "Estética Automotiva",
            'pag' => "pedido",
            'etapa' => "primeira",
            'clientes' => $clientes,
            'servicos' => $servicos,
            'produtos' => $produtos,
        ]);   
    }

    public function salvarCliente() : void 
    {
        $request = Request::all();
        $cliente = $this->controllerCliente->buscarCliente('CD_CLIENTE', (int)$request['CD_CLIENTE']);
        $veiculos = $this->controllerCliente->buscarVeiculosCliente('CD_CLIENTE', (int)$request['CD_CLIENTE']);
        $this->views('atendimento', [
            'title' => "Estética Automotiva",
            'pag' => "pedido",
            'etapa' => "segunda",
            'cliente' => $cliente,
            'veiculos' => $veiculos,
        ]);
    }

    public function salvarVeiculo() : void
    {
        $request = Request::all();
        $veiculo = $this->controllerVeiculo->buscarVeiculo('CD_VEICULO', (int)$request['CD_VEICULO']);
        $cliente = $this->controllerVeiculo->buscarClienteVeiculo('CD_CLIENTE', $veiculo->getCliente());
        $this->views('atendimento', [
            'title' => "Estética Automotiva",
            'pag' => "pedido",
            'etapa' => "terceira",
            'cliente' => $cliente,
            'veiculo' => $veiculo,
        ]);
    }

    public function paginaDeControle() : void
    {
        $this->views('controle', [
            'title' => "Estética Automotiva",
            'pag' => "pedido",
        ]);
    }

    public function paginaDeEdicao($codigo) : void 
    {

    }

    public function salvar() {
        dd(Request::all());
    }
}
