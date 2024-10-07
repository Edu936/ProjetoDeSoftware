<?php

namespace app\controller;

use app\models\Cliente;

class PedidoController extends Controller
{
    public function paginaDeCadastro() : void 
    {
        $controller = new ClienteController();
        $clientes = $controller->buscarTodos();
        $this->views('atendimento', [
            'title' => "Estética Automotiva",
            'pag' => "pedido",
        ]);   
    }
}
