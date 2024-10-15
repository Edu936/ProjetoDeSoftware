<?php

namespace app\controller;

use app\database\Filters;
use app\models\Pedido;
use app\models\PedidoProduto;
use app\models\PedidoServico;
use app\static\Request;

class PedidoController extends Controller
{
    private $_pedido;
    private $_filters;
    private $_pedidoProduto;
    private $_pedidoServico;
    private $controllerCliente;
    private $controllerServico;
    private $controllerProduto;
    private $controllerVeiculo;
    private $controllerUsuario;
    private $controllerOrcamento;

    public function __construct()
    {
        $this->_pedido = new Pedido();
        $this->_filters = new Filters();
        $this->_pedidoProduto = new PedidoProduto();
        $this->_pedidoServico = new PedidoServico();
        $this->controllerCliente = new ClienteController();
        $this->controllerServico = new ServicoController();
        $this->controllerProduto = new ProdutoController();
        $this->controllerVeiculo = new VeiculoController();
        $this->controllerUsuario = new UsuarioController();
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
        $clientes = $this->controllerCliente->buscarTodos();
        $produtos = $this->controllerProduto->buscarTodos();
        $servicos = $this->controllerServico->buscarTodos();
        $orcamento = $this->controllerOrcamento->buscarOrcamento('CD_ORCAMENTO',$codigo[0]);
        $cliente = $this->controllerCliente->buscarCliente('CD_CLIENTE', $orcamento->getCliente());
        $veiculos = $this->controllerVeiculo->buscarVeiculoDoCliente('CD_CLIENTE', $cliente->getCodigo());
        $servicosSelecionados = $this->controllerOrcamento->buscarServicosAcossiados('CD_ORCAMENTO', $codigo[0]);
        $produtosSelecionados = $this->controllerOrcamento->buscarProdutosAcossiados('CD_ORCAMENTO', $codigo[0]);
        $this->views('atendimento', [
            'pag' => "pedido",
            'etapa' => "quinta",
            'cliente' => $clientes,
            'veiculos' => $veiculos,
            'produtos' => $produtos,
            'servicos' => $servicos,
            'orcamento' => $orcamento,
            'title' => "Cadastro de Pedido",
            'clienteSelecionado' => $cliente,
            'servicosSelect' => $servicosSelecionados,
            'produtosSelect' => $produtosSelecionados,
            'link' => "/pedido/buscar/cliente/{$cliente->getCodigo()}",
        ]);
        
    }

    public function sextaEtapa($codigo) {
        $clientes = $this->controllerCliente->buscarTodos();
        $servicos = $this->controllerServico->buscarTodos();
        $produtos = $this->controllerProduto->buscarTodos();
        $cliente = $this->controllerCliente->buscarCliente('CD_CLIENTE', $codigo[0]);
        $veiculos = $this->controllerVeiculo->buscarVeiculoDoCliente('CD_CLIENTE', $codigo[0]);
        $this->views('atendimento', [
            'pag' => "pedido",
            'etapa' => "sexta",
            'cliente' => $clientes,
            'veiculos' => $veiculos,
            'produtos' => $produtos,
            'servicos' => $servicos,
            'title' => "Cadastro de Pedido",
            'clienteSelecionado' => $cliente,
            'link' => "/pedido/buscar/cliente/{$cliente->getCodigo()}",
        ]);
    }

    public function salvar() {

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

    public function setimaEtapa($codigo) : void 
    {
        $orcamento = Request::input('CD_ORCAMENTO');
        $servicos = $this->trazerServicos(Request::input('CD_SERVICO'));
        $produtos = $this->trazerProdutos(Request::input('CD_PRODUTO'));
        if($servicos != [] || $produtos != []){
            $veiculo = Request::input('CD_VEICULO');
             if($veiculo != ""? true : $veiculo == "" && ($produtos != [] && $servicos == [])){

                $veiculo = $this->controllerVeiculo->buscarVeiculo('CD_VEICULO', $veiculo);
                $cliente = $this->controllerCliente->buscarCliente('CD_CLIENTE', $codigo[0]);
                $usuario = $this->controllerUsuario->buscarUsuario('CD_USUARIO', $_SESSION['id']);
                $valor = $this->precificarPedido(Request::input('CD_PRODUTO'),Request::input('CD_SERVICO'));
                $orcamento != "Não possui orçamento" ? $orcamento = $this->controllerOrcamento->buscarOrcamento('CD_ORCAMENTO', $orcamento) : $orcamento = false;
                
                $orcamento ? $this->_pedido->setOrcamento($orcamento) : "";

                $this->_pedido->setCliente($cliente);
                $this->_pedido->setData(date('Y-m-d'));
                $this->_pedido->setUsuario($usuario);
                $this->_pedido->setVeiculo($veiculo);
                $this->_pedido->setValor($valor);

                $data = [
                    'DT_PEDIDO' => $this->_pedido->getData(),
                    'DS_STATUS' => "Aguardando Inicio",
                    'VL_TOTAL' => $this->_pedido->getValor(),
                    'VL_DESCONTO' => 00,   
                    'VL_LIQUIDO' => 00,
                    'NU_PARCELAS' => 00,
                    'DS_TIPO' => "",
                    'CD_USUARIO' => $this->_pedido->getUsuario(),
                    'CD_CLIENTE' => $this->_pedido->getCliente(),
                    'CD_VEICULO' => $this->_pedido->getVeiculo(),
                    'CD_ORCAMENTO' => $orcamento ? $this->_pedido->getOrcamento() : null,
                ];

                $result = $this->_pedido->create($data);

                if($result){
                    $pedido = $this->buscarUltimoRegistro();
                    $this->salvarProdudoPedido($pedido->getCodigo(), $produtos);
                    $this->salvarServicoPedido($pedido->getCodigo(), $servicos);
                    $this->views('atendimento', [
                        'title' => 'Cadastro de Pedido',
                        'pag' => 'pedido',
                        'etapa' => 'setima',
                        'produtos' => $produtos,
                        'servicos' => $servicos,
                        'usuario' => $usuario,
                        'cliente' => $cliente,
                        'pedido' => $this->_pedido,
                        'link' => '/cadastro/pedido',
                    ]);
                } else {
                    $this->views('atendimento', [
                        'title' => 'Cadastrar Pedido',
                        'pag' => 'finalizar',
                        'imagem' => '/images/Forgot password-bro.png',
                        'mensagem' => 'Não será possivel continuar o cadastro',
                        'link' => '/cadastro/pedido',
                    ]);
                }
            } else {
                $this->views('atendimento', [
                    'title' => 'Cadastrar Pedido',
                    'pag' => 'finalizar',
                    'imagem' => '/images/Forgot password-bro.png',
                    'mensagem' => 'Você selecionou nenhum veiculo, mas associou ao pedido um serviço!',
                    'link' => '/cadastro/pedido',
                ]);
            }
        } else {
            $this->views('atendimento', [
                'title' => 'Cadastrar Pedido',
                'pag' => 'finalizar',
                'imagem' => '/images/Forgot password-bro.png',
                'mensagem' => 'Você não inseriu nenhum produto ou servico em seu pedido!',
                'link' => '/cadastro/pedido',
            ]);
        }
    }

    public function buscarUltimoRegistro() : Pedido 
    {
        $this->_filters->orderBy('CD_ORCAMENTO', 'DESC');
        $this->_filters->limit(1);

        $this->_pedido->setfilters($this->_filters);
        $pedido = $this->_pedido->fetchAll();
        $this->_filters->clear();
        return $pedido[0];
    }

    private function trazerServicos(array $servicos): array
    {
        $s = [];
        foreach ($servicos as $servico) {
            if($servico != ""){
                $s [] = $this->controllerServico->buscarServico('CD_SERVICO', $servico);
            }
        }
        return $s;
    }

    private function trazerProdutos(array $produtos) : array 
    {
        $p = [];
        foreach ($produtos as $produto) {
            if($produto != ""){
                $p [] = $this->controllerProduto->buscarProduto('CD_PRODUTO', $produto);
            }
        }
        return $p;
    }

    public function salvarServicoPedido(int $pedido, array $servicos)
    {   
        foreach($servicos as $s) {
            $this->_pedidoServico->create([
                'CD_PEDIDO' => $pedido,
                'CD_SERVICO' => $s->getCodigo(),
                'DS_STATUS' => 'aguardando Inicio'
            ]);
        }
        
    }

    public function salvarProdudoPedido(int $pedido, array $produtos)
    {
        foreach($produtos as $p) {
            $this->_pedidoProduto->create([
                'CD_PEDIDO' => $pedido,
                'CD_PRODUTO' => $p->getCodigo(),
                'DS_STATUS' => 'não entregue'
            ]);
        }
    }

    public function excluir($codigo) : void
    {

    }

    public function atualizar($codigo) : void {

    }


}
