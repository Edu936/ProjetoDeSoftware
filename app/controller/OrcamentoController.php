<?php

namespace app\controller;

use app\database\Filters;
use app\models\Orcamento;
use app\models\OrcamentoProduto;
use app\models\OrcamentoServico;
use app\models\Servico;
use app\static\Request;

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
        $this->views('controle', [
            'title' => "Estética Automotiva",
            'pag' => "orcamento",
        ]);
    }

    public function paginaDeEdicao($codigo) : void 
    {
            
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

    private function buscarUltimoRegistro() : Orcamento 
    {
        $this->_filters->orderBy('CD_ORCAMENTO', 'DESC');
        $this->_filters->limit(1);

        $this->_orcamento->setfilters($this->_filters);
        $orcamento = $this->_orcamento->fetchAll();

        return $orcamento[0];
    }
}
