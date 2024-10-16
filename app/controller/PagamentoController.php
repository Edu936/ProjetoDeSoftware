<?php

namespace app\controller;

use app\models\Parcela;

class PagamentoController extends Controller
{
    private $_parcela;
    private $controllerPedido;

    function __construct()
    {
        $this->_parcela = new Parcela();
        $this->controllerPedido = new PedidoController();
    }
    public function salvar($codigo) : void 
    {
        $pedido = $this->controllerPedido->buscarPedido('CD_PEDIDO', $codigo[0]);
        $meses = 12;
        for($i = 0; $i < $meses; $i++) {
            $x = $i +1 ;
            $date = date('Y-m-d', strtotime( "+1month"));
            echo $date ."<br/>";
        }
    }
}
