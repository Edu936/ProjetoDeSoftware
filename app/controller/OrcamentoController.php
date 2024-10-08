<?php

namespace app\controller;

class OrcamentoController extends Controller
{
    public function paginaDeCadastro() : void 
    {
        $this->views('atendimento', [
            'title' => "Estética Automotiva",
            'pag' => "orcamento",
        ]);
    }

    public function paginaDeControle() : void
    {
        $this->views('controle', [
            'title' => "Estética Automotiva",
            'pag' => "orcamento",
        ]);
    }
}
