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

    }

    public function buscarParcelas($codigo) {
        $this->_filters->where('CD_PEDIDO', '=', $codigo[0]);
        $this->_parcela->setfilters($this->_filters);
        $parcelas = $this->_parcela->fetchAll();
        dd($parcelas);
    }
}
