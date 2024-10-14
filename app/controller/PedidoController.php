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
    private $controllerOrcamento;

    public function __construct()
    {
        $this->_pedido = new Pedido();
        $this->_filters = new Filters();
        $this->controllerCliente = new ClienteController();
        $this->controllerServico = new ServicoController();
        $this->controllerProduto = new ProdutoController();
        $this->controllerVeiculo = new VeiculoController();
        $this->controllerOrcamento = new OrcamentoController();
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
        $cliente = $this->controllerCliente->buscarCliente('CD_CLIENTE', $codigo[0]);   
        $orcamentos = $this->controllerOrcamento->buscarOrcamentos('CD_CLIENTE', (int)$codigo[0]);
        $this->views('atendimento', [
            'title' => "Cadastro de Pedido",
            'pag' => "pedido",
            'etapa' => "terçeira",
            'cliente' => $cliente,
            'orcamentos' => $orcamentos,
            'link' => "/pedido/buscar/cliente/{$codigo[0]}",
        ]);
    }

    public function quartaEtapa($codigo) : void
    {
        $orcamento = $this->controllerOrcamento->buscarOrcamento('CD_ORCAMENTO',$codigo[0]);
        $cliente = $this->controllerCliente->buscarCliente('CD_CLIENTE', $orcamento->getCliente());
        $servicos = $this->controllerOrcamento->buscarServicosAcossiados('CD_ORCAMENTO', $codigo[0]);
        $produtos = $this->controllerOrcamento->buscarProdutosAcossiados('CD_ORCAMENTO', $codigo[0]);
        $data = date('d/m/Y');
        dd($data);
        $pedido = new Pedido();


    }

    public function salvar() : void 
    {
       
    }
}
