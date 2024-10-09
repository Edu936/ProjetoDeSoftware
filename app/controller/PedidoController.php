<?php

namespace app\controller;

use app\models\Cliente;
use app\static\Request;

class PedidoController extends Controller
{
    public function paginaDeCadastro() : void 
    {
        $controller = new ClienteController();
        $clientes = $controller->buscarTodos();
        $this->views('atendimento', [
            'title' => "Estética Automotiva",
            'pag' => "pedido",
            'clientes' => $clientes,
        ]);   
    }

    public function paginaDeControle() : void
    {
        $this->views('controle', [
            'title' => "Estética Automotiva",
            'pag' => "pedido",
        ]);
    }


    public function salvar() {
        dd(Request::all());
    }
}
