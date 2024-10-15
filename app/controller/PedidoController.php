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

    /**
     * Metodos para o cadastro de um novo pedido
     */
    public function primeiraEtapa() : void 
    {
        /**
         * Esse metodo busca todo os clientes que estão cadastrados no sistema e envia para a pagina de pedido na primeira etapa
         */
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
        /**
         * Esse metodo recebe o codigo do cliente selecionado pelo atendente e busca todos os dados desse cliente
         */
        $clientes = $this->controllerCliente->buscarTodos();
        $cliente = $this->controllerCliente->buscarCliente('CD_CLIENTE', $codigo[0]);   
        $this->views('atendimento', [
            'title' => "Cadastro de Pedido",
            'pag' => "pedido",
            'etapa' => "segunda",
            'clientes' => $clientes,
            'clienteSelecionado' => $cliente,
            'link' => '/cadastro/pedido',
        ]);
    }

    public function terceiraEtapa($codigo) : void 
    {
        /**
         * Esse metodo recebe o codigo do cliente selecionado pelo atendente e busca todo os orçamentos realizados pelo o mesmo.
         */
        $clientes = $this->controllerCliente->buscarTodos();
        $cliente = $this->controllerCliente->buscarCliente('CD_CLIENTE', $codigo[0]);   
        $orcamentos = $this->controllerOrcamento->buscarOrcamentos('CD_CLIENTE', (int)$codigo[0]);
        $this->views('atendimento', [
            'title' => "Cadastro de Pedido",
            'pag' => "pedido",
            'etapa' => "terçeira",
            'clientes' => $clientes,
            'clienteSelecionado' => $cliente,
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
        $this->views('controle', [
            'title' => "Estética Automotiva",
            'pag' => "detalhe orcamento",
            'cliente'=> $cliente,
            'orcamento' => $orcamento,
            'servicos' => $servicos,
            'produtos' => $produtos,
            'link' => "/pedido/orcamentos/cliente/{$cliente->getCodigo()}",
        ]);
    }

    public function quintaEtapa($codigo) : void
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

    public function salvar() : void 
    {
        
    }

    public function excluir($codigo) : void
    {

    }

    public function atualizar($codigo) : void {

    }


}
