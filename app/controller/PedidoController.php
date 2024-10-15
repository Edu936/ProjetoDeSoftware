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

    public function paginaDeControle(): void 
    {
        
    }

    public function paginaDeDetalhe($codigo) : void
    {
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
        $veiculos = $this->controllerVeiculo->buscarVeiculoDoCliente('CD_CLIENTE', $cliente->getCodigo());
        $servicosSelecionados = $this->controllerOrcamento->buscarServicosAcossiados('CD_ORCAMENTO', $codigo[0]);
        $produtosSelecionados = $this->controllerOrcamento->buscarProdutosAcossiados('CD_ORCAMENTO', $codigo[0]);
        $produtos = $this->controllerProduto->buscarTodos();
        $servicos = $this->controllerServico->buscarTodos();
        $this->views('atendimento', [
            'title' => "Cadastro de Pedido",
            'pag' => "pedido",
            'etapa' => "quarta",
            'cliente' => $cliente,
            'veiculos' => $veiculos,
            'servicosSelect' => $servicosSelecionados,
            'produtosSelect' => $produtosSelecionados,
            'produtos' => $produtos,
            'servicos' => $servicos,
            'link' => "/pedido/buscar/cliente/{$cliente->getCodigo()}",
        ]);
        
    }

    private function precificarPedido(array $produtos, array $servicos) : float 
    {
        $valor = 0;
        foreach($produtos as $produto) {
            if($produto != "") {
                $p = $this->controllerProduto->buscarProduto('CD_PRODUTO', (int)$produto);
                $valor += $p->getValor();
            }
        }
        foreach($servicos as $servico) {
            if($servico != "") {
                $s = $this->controllerServico->buscarServico('CD_SERVICO', (int)$servico);
                $valor += $s->getValor();
            }
        }
        return $valor;
    }

    public function salvar($codigo) : void 
    {
        $request = Request::input('CD_PRODUTO');
        
    }
}
