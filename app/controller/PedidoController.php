<?php

namespace app\controller;

use app\database\Filters;
use app\models\OrcamentoProduto;
use app\models\Parcela;
use app\models\Pedido;
use app\models\PedidoProduto;
use app\models\PedidoServico;
use app\static\Request;
use League\Plates\Template\Functions;

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

    public function paginaDeControle() : void
    {
        $pedidos = $this->buscarTodos();
        $this->views('controle', [
            'title' => 'Controle de Pedido',
            'pag' => 'pedido',
            'pedidos' => $pedidos
        ]);
    }

    public function paginaDeDetalhes($codigo) : void
    {
        $produtos = $this->buscarProdutosAcossiados($codigo[0]);
        $servicos = $this->buscarServicoAcossiados($codigo[0]);
        $pedido = $this->buscarPedido("CD_PEDIDO", $codigo[0]);
        $cliente = $this->controllerCliente->buscarCliente("CD_CLIENTE", $pedido->getCliente());
        $this->views('controle', [
            'title' => 'Descrição do Pedido',
            'pag' => 'detalhe pedido',
            'pedido' => $pedido,
            'produtos' => $produtos,
            'servicos' => $servicos,
            'cliente' => $cliente,
            'link' => '/controle/pedido',
        ]);
    }

    /**
     * Metodos para o cadastro de um novo pedido
     */
    public function primeiraEtapa(): void
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

    public function segundaEtapa($codigo): void
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

    public function terceiraEtapa($codigo): void
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

    public function quartaEtapa($codigo): void
    {
        $_orcamentoProduto = new OrcamentoProduto();
        $orcamento = $this->controllerOrcamento->buscarOrcamento('CD_ORCAMENTO', $codigo[0]);
        $cliente = $this->controllerCliente->buscarCliente('CD_CLIENTE', $orcamento->getCliente());
        $servicos = $this->controllerOrcamento->buscarServicosAcossiados('CD_ORCAMENTO', $codigo[0]);
        $produtos = $this->controllerOrcamento->buscarProdutosAcossiados('CD_ORCAMENTO', $codigo[0]);
        $this->_filters->where('CD_ORCAMENTO', '=', $codigo[0]);
        $_orcamentoProduto->setfilters($this->_filters);
        $produtosAssociados  = $_orcamentoProduto->fetchAll();
        $this->views('controle', [
            'title' => "Estética Automotiva",
            'pag' => "detalhe orcamento",
            'cliente' => $cliente,
            'orcamento' => $orcamento,
            'servicos' => $servicos,
            'produtos' => $produtos,
            'quantidade' => $produtosAssociados[0]->QTD_PRODUTO,
            'link' => "/pedido/orcamentos/cliente/{$cliente->getCodigo()}",
        ]);
    }

    public function quintaEtapa($codigo): void
    {
        $clientes = $this->controllerCliente->buscarTodos();
        $produtos = $this->controllerProduto->buscarTodos();
        $servicos = $this->controllerServico->buscarTodos();
        $orcamento = $this->controllerOrcamento->buscarOrcamento('CD_ORCAMENTO', $codigo[0]);
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

    public function sextaEtapa($codigo)
    {
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

    public function setimaEtapa($codigo): void
    {
        $orcamento = Request::input('CD_ORCAMENTO');
        $servicos = $this->trazerServicos(Request::input('CD_SERVICO'));
        $produtos = $this->trazerProdutos(Request::input('CD_PRODUTO'));
        $quantidade = Request::input('QTD_PRODUTO');
        if ($servicos != [] || $produtos != []) {
            $veiculo = Request::input('CD_VEICULO');
            $r = true;
            if ($produtos != []) {
                $r = $this->controllerProduto->descontaProduto($produtos,$quantidade);
            }
            if ($r) {
                if ($veiculo != "" ? true : $veiculo == "" && ($produtos != [] && $servicos == [])) {
                    $cliente = $this->controllerCliente->buscarCliente('CD_CLIENTE', $codigo[0]);
                    $usuario = $this->controllerUsuario->buscarUsuario('CD_USUARIO', $_SESSION['id']);
                    $valor = $this->precificarPedido(Request::input('CD_PRODUTO'),Request::input('QTD_PRODUTO'), Request::input('CD_SERVICO'));
                    $veiculo != "" ? $veiculo = $this->controllerVeiculo->buscarVeiculo('CD_VEICULO', $veiculo): $veiculo = false;
                    $orcamento != "Não possui orçamento" ? $orcamento = $this->controllerOrcamento->buscarOrcamento('CD_ORCAMENTO', $orcamento) : $orcamento = false;
    
                    $veiculo ?$this->_pedido->setVeiculo($veiculo) : '';
                    $orcamento ? $this->_pedido->setOrcamento($orcamento) : "";
    
                    $this->_pedido->setCliente($cliente);
                    $this->_pedido->setData(date('Y-m-d'));
                    $this->_pedido->setUsuario($usuario);
                    $this->_pedido->setValor($valor);
    
                    $data = [
                        'DT_PEDIDO' => date('Y-m-d'),
                        'DS_STATUS' => "Aguardando Inicio",
                        'VL_TOTAL' => $this->_pedido->getValor(),
                        'VL_DESCONTO' => 00,
                        'VL_LIQUIDO' => 00,
                        'NU_PARCELAS' => 00,
                        'DS_TIPO' => "",
                        'CD_USUARIO' => $this->_pedido->getUsuario(),
                        'CD_CLIENTE' => $this->_pedido->getCliente(),
                        'CD_VEICULO' => $veiculo ?$this->_pedido->getVeiculo() : null,
                        'CD_ORCAMENTO' => $orcamento ? $this->_pedido->getOrcamento() : null,
                    ];
    
                    $result = $this->_pedido->create($data);
                    if ($result) {
                        $pedido = $this->buscarUltimoRegistro();
                        $this->salvarProdudoPedido($pedido->getCodigo(), $produtos, $quantidade);
                        $this->salvarServicoPedido($pedido->getCodigo(), $servicos);
                        $this->views('atendimento', [
                            'title' => 'Cadastro de Pedido',
                            'pag' => 'pedido',
                            'etapa' => 'setima',
                            'usuario' => $usuario,
                            'cliente' => $cliente,
                            'pedido' => $pedido,
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
                    'mensagem' => 'Você inseriu um produto que não temos no Estoque!',
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

    public function buscarProdutosAcossiados($codigo) : array
    {
        $produtos = [];
        $this->_filters->where('CD_PEDIDO', '=', $codigo);
        $this->_pedidoProduto->setfilters($this->_filters);
        $produtosA = $this->_pedidoProduto->fetchAll();
        $this->_filters->clear();
        foreach($produtosA as $x => $p){
            $produtos [] = $this->controllerProduto->buscarProduto('CD_PRODUTO', $p->getProduto());
            $produtos [$x]->setQuantidadeAcossiada($p->QTD_PRODUTO);
        }
        return $produtos;
    }

    public function buscarServicoAcossiados($codigo) : array
    {
        $servicos = [];
        $this->_filters->where('CD_PEDIDO', '=', $codigo);
        $this->_pedidoServico->setfilters($this->_filters);
        $servicosA = $this->_pedidoServico->fetchAll();
        $this->_filters->clear();
        foreach($servicosA as $s){
            $servicos [] = $this->controllerServico->buscarServico('CD_SERVICO', $s->getServico());
        }
        return $servicos;
    }

    private function precificarPedido(array $produtos, array $quantidade, array $servicos): float
    {
        $valor = 0;
        foreach ($produtos as $x => $produto) {
            if ($produto != "") {
                $p = $this->controllerProduto->buscarProduto('CD_PRODUTO', (int)$produto);
                
                $valor += ($p->getValor()*$quantidade[$x]);
            }
        }
        foreach ($servicos as $servico) {
            if ($servico != "") {
                $s = $this->controllerServico->buscarServico('CD_SERVICO', (int)$servico);
                $valor += $s->getValor();
            }
        }
        return $valor;
    }

    private function trazerServicos(array $servicos): array
    {
        $s = [];
        foreach ($servicos as $servico) {
            if ($servico != "") {
                $s[] = $this->controllerServico->buscarServico('CD_SERVICO', $servico);
            }
        }
        return $s;
    }

    private function trazerProdutos(array $produtos): array
    {
        $p = [];
        foreach ($produtos as $produto) {
            if ($produto != "") {
                $p[] = $this->controllerProduto->buscarProduto('CD_PRODUTO', $produto);
            }
        }
        return $p;
    }

    function moedaParaFloat($valor) {
        $valor = str_replace(['R$', ' ', '.'], '', $valor);
        $valor = str_replace(',', '.', $valor);
        return (float) $valor;
    }

    public function buscarUltimoRegistro(): Pedido
    {
        $this->_filters->orderBy('CD_PEDIDO', 'DESC');
        $this->_filters->limit(1);

        $this->_pedido->setfilters($this->_filters);
        $pedido = $this->_pedido->fetchAll();
        $this->_filters->clear();
        return $pedido[0];
    }

    public function buscarPedido(string $key, mixed $data) : Pedido | bool
    {
        $this->_filters->where($key, '=', $data);
        $this->_pedido->setfilters($this->_filters);
        $pedido = $this->_pedido->fetchAll();
        $this->_filters->clear();
        return $pedido[0] ?? false;
    }

    public function buscarTodos() : array
    {
        $this->_filters->where('DS_TIPO', '!=' , '');
        $this->_filters->join('tb_cliente', 'tb_cliente.CD_CLIENTE', '=', 'tb_pedido.CD_CLIENTE');
        $this->_filters->orderBy('CD_PEDIDO');
        $this->_pedido->setfilters($this->_filters);
        $pedidos = $this->_pedido->fetchAll();
        $this->_filters->clear();
        return $pedidos;
    }

    public function salvarServicoPedido(int $pedido, array $servicos)
    {
        foreach ($servicos as $s) {
            $this->_pedidoServico->create([
                'CD_PEDIDO' => $pedido,
                'CD_SERVICO' => $s->getCodigo(),
                'DS_STATUS' => 'aguardando Inicio'
            ]);
        }
    }

    public function salvarProdudoPedido(int $pedido, array $produtos, array $quantidade)
    {
        foreach ($produtos as $x=>$p) {
            $this->_pedidoProduto->create([
                'CD_PEDIDO' => $pedido,
                'CD_PRODUTO' => $p->getCodigo(),
                'DS_STATUS' => 'não entregue',
                'QTD_PRODUTO' => $quantidade[$x],
            ]);
        }
    }

    public function salvar($codigo)
    {
        $resquest = Request::all();
        $pedido = $this->buscarPedido('CD_PEDIDO', $codigo[0]);
        $pedido->setDesconto($this->moedaParaFloat($resquest['desconto']));
        $pedido->setValorLiquido($pedido->getValor()-$pedido->getDesconto());
        $pedido->setTipoPagamento($resquest['pagamento']);
        $pedido->setParcelas((int)$resquest['parcelas']);
        $data = [
            'VL_DESCONTO' => $pedido->getDesconto(),
            'VL_LIQUIDO' => $pedido->getValorLiquido(),
            'NU_PARCELAS' => $pedido->getParcelas(),
            'DS_TIPO' => $pedido->getTipoPagamento(),
        ];
        $result = $this->_pedido->update($data, 'CD_PEDIDO', $codigo[0]);
        $pagamento = new PagamentoController;
        $pagamento->salvar($codigo[0]);
        if($result){
            $this->views('atendimento', [
                'title' => "Cadastros Pedido",
                'pag' => "finalizar",
                'imagem' => "/images/Create-amico.png",
                'mensagem' => "O pedido foi cadastrado com sucesso!",
                'link' => '/cadastro/pedido',
            ]);
        } else {
            $this->views('atendimento', [
                'title' => "Cadastros Pedido",
                'pag' => "finalizar",
                'imagem' => "/images/Forgot password-bro.png",
                'mensagem' => "O pedido pode ser concluido com sucesso!",
                'link' => '/cadastro/pedido',
            ]);
        }
    }
    
    public function relatorio($codigo) {
        $pedido = $this->buscarPedido('CD_PEDIDO', $codigo[0]);
        $servicos = $this->buscarServicoAcossiados($codigo[0]);
        $produtos = $this->buscarProdutosAcossiados($codigo[0]);
        $parcelas = $this->buscarPagamentoAssociados($codigo[0]);
        $cliente = $this->controllerCliente->buscarCliente('CD_CLIENTE', $pedido->getCliente());
        $veiculo = $this->controllerVeiculo->buscarVeiculo('CD_VEICULO', $pedido->getCliente());
        $email = $this->controllerCliente->buscarEmailsCliente('CD_CLIENTE', $cliente->getCodigo());
        $telefone = $this->controllerCliente->buscarTelefonesCliente('CD_CLIENTE', $cliente->getCodigo());
        $cidade = $this->controllerCliente->buscarCidadeCliente('CD_CIDADE',$cliente->getCidade());
        $this->views('relatorio', [
            'email' => $email,
            'cidade' => $cidade,
            'pedido' => $pedido,
            'pag' => 'relatorio',
            'cliente' => $cliente,
            'veiculo' => $veiculo,
            'telefone' => $telefone,
            'produtos' => $produtos,
            'servicos' => $servicos,
            'parcelas' => $parcelas,
            'title' => 'Relatorio Pedido',
            'link' => '/pedido/detalhe/'.$pedido->getCodigo(),
        ]);
    }

    private function buscarPagamentoAssociados($codigo) {
        $parcelas = new Parcela();
        $this->_filters->where('CD_PEDIDO', '=', $codigo);
        $parcelas->setfilters($this->_filters);
        $parcelas = $parcelas->fetchAll();
        $this->_filters->clear();
        return $parcelas;
    }

    public function alterarStatus($codigo) {
        $pedido = $this->buscarPedido('CD_PEDIDO', $codigo[0]);
        if($pedido->getStatus() == "Aguardando Inicio") {
            $result = $this->_pedido->update(['DS_STATUS' => 'Em Andamento'],'CD_PEDIDO', $codigo[0]);
            if($result){
                $this->views('controle', [
                    'title' => "Cadastros Pedido",
                    'pag' => "finalizar",
                    'imagem' => "/images/Create-amico.png",
                    'mensagem' => "O status do pedido foi atualizado com sucesso!",
                    'link' => '/controle/pedido',
                ]);
            }else {
                $this->views('controle', [
                    'title' => "Edição Pedido",
                    'pag' => "finalizar",
                    'imagem' => "/images/Forgot password-bro.png",
                    'mensagem' => "Não foi possivel alterar o status do pedido!",
                    'link' => '/controle/pedido',
                ]);
            }
        }
        else if($pedido->getStatus() == "Em Andamento") {
            $result = $this->_pedido->update(['DS_STATUS' => 'Finalizado'],'CD_PEDIDO', $codigo[0]);
            if($result){
                $this->views('controle', [
                    'title' => "Cadastros Pedido",
                    'pag' => "finalizar",
                    'imagem' => "/images/Create-amico.png",
                    'mensagem' => "O status do pedido foi atualizado com sucesso!",
                    'link' => '/controle/pedido',
                ]);
            }else {
                $this->views('controle', [
                    'title' => "Edição Pedido",
                    'pag' => "finalizar",
                    'imagem' => "/images/Forgot password-bro.png",
                    'mensagem' => "Não foi possivel alterar o status do pedido!",
                    'link' => '/controle/pedido',
                ]);
            }
        }
        else {
            $this->views('controle', [
                'title' => "Edição Pedido",
                'pag' => "finalizar",
                'imagem' => "/images/Forgot password-bro.png",
                'mensagem' => "O pedido Não pode ter mais o status alterado!",
                'link' => '/controle/pedido',
            ]);
        }
    }

    public function excluir($codigo): void {}

    public function atualizar($codigo): void {}
}
