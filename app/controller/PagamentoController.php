<?php

namespace app\controller;

use app\database\Filters;
use app\models\Parcela;

class PagamentoController extends Controller
{
    private $_parcela;
    private $_filters;
    private $controllerPedido;

    function __construct()
    {
        $this->_parcela = new Parcela();
        $this->_filters = new Filters();
        $this->controllerPedido = new PedidoController();
    }
    public function salvar($codigo) : void 
    {
        $pedido = $this->controllerPedido->buscarPedido('CD_PEDIDO', $codigo);
        $meses = $pedido->getParcelas();
        $valorParcela = $pedido->getValorLiquido()/$meses;
        for($i = 0; $i < $meses; $i++) {
            $x = $i +1 ;
            $data = date('Y-m-d', strtotime( "+{$x}month"));
            $this->_parcela->create([
                'DT_VENCIMENTO' => $data,
                'DS_STATUS_PAGAMENTO' => 'pendente',
                'VL_PARCELA' => $valorParcela,
                'CD_PEDIDO' => $pedido->getCodigo()
            ]);
        }
    }

    public function buscarUltimoRegistro(){
        $this->_filters->orderBy('CD_PAGAMENTO', 'DESC');
        $this->_filters->limit(1);

        $this->_parcela->setfilters($this->_filters);
        $parcela = $this->_parcela->fetchAll();
        $this->_filters->clear();
        return $parcela[0];
    }

    public function pagarParcela($codigo) {
        $parcela = $this->buscar('CD_PAGAMENTO',$codigo[0]);
        $result = $this->_parcela->update([
            'DS_STATUS_PAGAMENTO' => 'Confirmado',
            'DT_PAGAMENTO' => date('Y-m-d')
        ],'CD_PAGAMENTO', $codigo[0]);
        if($result){
            $this->views('controle', [
                'title' => "Pagamento Pedido",
                'pag' => "finalizar",
                'imagem' => "/images/Create-amico.png",
                'mensagem' => "A parcela foi marcada como paga sucesso!",
                'link' => '/pedido/pagamento/'.$parcela->CD_PEDIDO,
            ]);
        } else {
            $this->views('controle', [
                'title' => "Pagamento Pedido",
                'pag' => "finalizar",
                'imagem' => "/images/Forgot password-bro.png",
                'mensagem' => "Erro ao tentar pagar parcela!",
                'link' => '/pedido/pagamento/'.$parcela->CD_PEDIDO,
            ]);
        }
    }

    public function buscarParcelas($codigo) {
        $this->_filters->where('CD_PEDIDO', '=', $codigo[0]);
        $this->_parcela->setfilters($this->_filters);
        $parcelas = $this->_parcela->fetchAll();
        $this->views('controle', [
            'title' => 'Descrição do Pedido',
            'pag' => 'detalhe parcelas',
            'parcelas' => $parcelas,
            'link' => '/pedido/detalhe/'.$codigo[0],
        ]);
    }

    public function buscar($key, $data) {
        $this->_filters->where($key, '=', $data);
        $this->_parcela->setfilters($this->_filters);
        $parcela = $this->_parcela->fetchAll();
        return $parcela[0];
    }
}
