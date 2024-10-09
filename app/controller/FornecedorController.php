<?php

namespace app\controller;

class FornecedorController extends Controller
{
    public function cadastro()
    {
        echo $this-> views('cadastro', [
            'title' => "Estética Automotiva",
            'pag' => "fornecedor",
        ]);
    }
}