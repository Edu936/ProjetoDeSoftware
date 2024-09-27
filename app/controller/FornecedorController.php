<?php

namespace app\controller;

class FornecedorController extends Controller
{
    public function paginaDeCadastro() : void 
    {
        $this->views('cadastro', [
            'title' => "Estetica De Automotiva",
            'pag' => "fornecedor",
        ]);
    }
}
