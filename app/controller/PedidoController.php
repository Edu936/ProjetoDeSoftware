<?php

namespace app\controller;

use app\database\Filters;
use app\models\Pedido;
use app\static\Request;

class PedidoController extends Controller
{
    private $_pedido;
    private $_filters;
    private $controllerCliente;
    private $controllerServico;
    private $controllerProduto;
    private $controllerVeiculo;

    public function __construct()
    {
        $this->_pedido = new Pedido();
        $this->_filters = new Filters();
        $this->controllerCliente = new ClienteController;
        $this->controllerServico = new ServicoController;
        $this->controllerProduto = new ProdutoController;
        $this->controllerVeiculo = new VeiculoController;
    }

    public function primeiraEtapa() : void 
    {
        $clientes = $this->controllerCliente->buscarTodos();
        $this->views('atendimento', [
            'title' => "Cadastro de Pedido",
            'pag' => "pedido",
            'etapa' => "primeira",
            'clientes' => $clientes,
            'link' => '/atendimento',
        ]);   
    }

    public function segundaEtapa($codigo) : void 
    {
        $cliente = $this->controllerCliente->buscarCliente('CD_CLIENTE', $codigo[0]);   
        $this->views('atendimento', [
            'title' => "Cadastro de Pedido",
            'pag' => "pedido",
            'etapa' => "segunda",
            'cliente' => $cliente,
            'link' => '/cadastro/pedido',
        ]);
    }

    public function terceiraEtapa($codigo) : void 
    {

    }

    public function quartaEtapa($codigo) : void
    {
        
    }

    public function salvar() : void 
    {
       
    }
}
