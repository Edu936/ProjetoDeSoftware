<?php

namespace app\controller;

class PedidoController extends Controller
{
    public function paginaDeCadastro() : void 
    {
        $this->views('atendimento', [
            'title' => "Estética Automotiva",
            'pag' => "pedido",
        ]);   
    }
}
