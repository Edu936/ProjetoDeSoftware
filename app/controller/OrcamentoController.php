<?php

namespace app\controller;

use app\database\Filters;
use app\models\Orcamento;
use app\models\OrcamentoProduto;
use app\models\OrcamentoServico;
use app\models\Servico;
use app\static\Request;
use League\Plates\Template\Func;

class OrcamentoController extends Controller
{
    private $_filters;
    private $_orcamento;
    private $_orcamentoProduto;
    private $_orcamentoServico;
    private $controllerCliente;
    private $controllerServico;
    private $controllerProduto;

    function __construct()
    {
        $this->_filters = new Filters();
        $this->_orcamento = new Orcamento();
        $this->_orcamentoProduto = new OrcamentoProduto();
        $this->_orcamentoServico = new OrcamentoServico();
        $this->controllerCliente = new ClienteController();
        $this->controllerServico = new ServicoController();
        $this->controllerProduto = new ProdutoController();
    }

    public function paginaDeCadastro() : void 
    {
        $servicos = $this->controllerServico->buscarTodos();
        $produtos = $this->controllerProduto->buscarTodos();
        $clientes = $this->controllerCliente->buscarTodos();
        $this->views('atendimento', [
            'title' => "Cadastro de Orçamento",
            'pag' => "orcamento",
            'clientes' => $clientes,
            'servicos' => $servicos,
            'produtos' => $produtos,
        ]);  
    }

    public function paginaDeControle() : void
    {
        $clientes = $this->controllerCliente->buscarTodos();
        $this->views('controle', [
            'title' => "Estética Automotiva",
            'pag' => "orcamento",
            'clientes' => $clientes,
            'orcamentos' => false,
            'link' => '/controle',
        ]);
    }

    public function exibirOrcamentos($codigo) : void
    {
        $orcamentos = $this->buscarOrcamentos('CD_CLIENTE', $codigo[0]);
        $this->views('controle', [
            'title' => "Estética Automotiva",
            'pag' => "orcamento",
            'orcamentos' => $orcamentos,
            'link' => '/controle/orcamento'
        ]);
    }

    public function paginaDeEdicao($codigo) : void 
    {
        $orcamento = $this->buscarOrcamento('CD_ORCAMENTO',$codigo[0]);
        dd($orcamento);       
    }

    public function paginaDeDetalhe($codigo) : void
    {
        $orcamento = $this->buscarOrcamento('CD_ORCAMENTO',$codigo[0]);
        $cliente = $this->controllerCliente->buscarCliente('CD_CLIENTE', $orcamento->getCliente());
        $servicos = $this->buscarServicosAcossiados('CD_ORCAMENTO', $codigo[0]);
        $produtos = $this->buscarProdutosAcossiados('CD_ORCAMENTO', $codigo[0]);
        $this->views('controle', [
            'title' => "Estética Automotiva",
            'pag' => "detalhe orcamento",
            'cliente'=> $cliente,
            'orcamento' => $orcamento,
            'servicos' => $servicos,
            'produtos' => $produtos,
        ]);

    }

    public function salvar() {
        // dd($this->buscarUltimoRegistro());
        $cliente = $this->controllerCliente->buscarCliente('CD_CLIENTE', Request::input('CD_CLIENTE'));
        $valorOrcamento = $this->precificarOrcamento(Request::input('CD_PRODUTO'), Request::input('CD_SERVICO'));
        $data = date('Y-m-d');
        $result = $this->_orcamento->create([
            'VL_ORCAMENTO' => $valorOrcamento,
            'DT_ORCAMENTO' => $data,
            'CD_CLIENTE' => $cliente->getCodigo(),
        ]);
        if($result) {
            $orcamento = $this->buscarUltimoRegistro();
            $produtos = Request::input('CD_PRODUTO');
            $servicos = Request::input('CD_SERVICO');
            foreach($produtos as $produto){
                if($produto != "") {
                    $this->_orcamentoProduto->create([
                        'CD_ORCAMENTO' => $orcamento->getCodigo(),
                        'CD_PRODUTO' => $produto,
                    ]);
                }
            }
            foreach($servicos as $servico){
                if($servico != "") {
                    $this->_orcamentoServico->create([
                        'CD_ORCAMENTO' => $orcamento->getCodigo(),
                        'CD_SERVICO' => $servico,
                    ]);
                }
            }
            $this->views('atendimento', [
                'title' => 'Cadastrar Orçamento',
                'pag' => 'finalizar',
                'imagem' => '/images/Create-amico.png',
                'mensagem' => 'O orçamento foi cadastrado com sucesso!',
                'link' => '/cadastro/orcamento',
            ]);
        } else {
            echo "não foi cadastrado";
        }
    }

    private function precificarOrcamento(array $produtos, array $servicos) : float 
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

    public function buscarOrcamento(string $key, mixed $data) : Orcamento
    {
        $this->_filters->where($key, '=', $data);
        $this->_orcamento->setfilters($this->_filters);
        $orcamento = $this->_orcamento->fetchAll();
        $this->_filters->clear();
        return $orcamento[0];
    }

    public function buscarOrcamentos(string $key, mixed $data) : array|bool
    {
        $this->_filters->where($key, '=', $data);
        $this->_orcamento->setfilters($this->_filters);
        $orcamentos = $this->_orcamento->fetchAll();
        $this->_filters->clear();
        return $orcamentos ?? false;
    }

    public function buscarUltimoRegistro() : Orcamento 
    {
        $this->_filters->orderBy('CD_ORCAMENTO', 'DESC');
        $this->_filters->limit(1);

        $this->_orcamento->setfilters($this->_filters);
        $orcamento = $this->_orcamento->fetchAll();
        $this->_filters->clear();
        return $orcamento[0];
    }

    public function buscarServicosAcossiados(string $key, mixed $data) : array|bool
    {
        $servicos = [];
        $this->_filters->where($key, '=', $data);
        $this->_orcamentoServico->setfilters($this->_filters);
        $servicosAssociados = $this->_orcamentoServico->fetchAll();
        $this->_filters->clear();
        foreach($servicosAssociados as $s) {
            $servicos [] = $this->controllerServico->buscarServico('CD_SERVICO', $s->getServico());
        }
        return $servicos != [] ? $servicos : false;
    }

    public function buscarProdutosAcossiados(string $key, mixed $data) : array|bool
    {
        $produtos = [];
        $this->_filters->where($key, '=', $data);
        $this->_orcamentoProduto->setfilters($this->_filters);
        $produtosAssociados  = $this->_orcamentoProduto->fetchAll();
        $this->_filters->clear();
        foreach($produtosAssociados as $p){
            $produtos [] = $this->controllerProduto->buscarProduto('CD_PRODUTO', $p->getProduto());
        }
        return $produtos != [] ? $produtos : false;
    }
}
