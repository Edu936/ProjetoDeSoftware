<?php

namespace app\controller;

use app\models\Cliente;

class PedidoController extends Controller
{
    public function paginaDeCadastro() : void 
    {
        // $cliente = new Cliente();
        // $clientes = $cliente->fetchAll();
        $this->views('atendimento', [
            'title' => "Estética Automotiva",
            'pag' => "pedido",
        ]);   
    }
}
