<?php

namespace app\controller;

class PagamentoController extends Controller
{
    public function paginaDeControle(): void
    {
        $this->views('controle', [
            'title' => "Estética Automotiva",
            'pag' => "pagamento",
        ]);
    }
}
