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
}
