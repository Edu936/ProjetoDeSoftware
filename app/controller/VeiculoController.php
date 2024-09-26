<?php

namespace app\controller;

class VeiculoController extends Controller
{
    public function paginaDeCadastro() : void 
    {
        $this->views('atendimento', [
            'title' => "Estética Automotiva",
            'pag' => "veiculo",
        ]);    
    }
}
