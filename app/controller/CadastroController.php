<?php

namespace app\controller;

class CadastroController extends Controller
{
    public function index()
    {
        echo $this->views('cadastro', [
            'title' => "Estética Automotiva",
            'pag' => "index",
        ]);
    }

    public function cidade()
    {
        echo $this-> views('cadastro', [
            'title' => "Estética Automotiva",
            'pag' => "cidade",
        ]);
    }

    public function servico()
    {
        echo $this-> views('cadastro', [
            'title' => "Estética Automotiva",
            'pag' => "servico",
        ]);
    }

    public function produto()
    {
        echo $this-> views('cadastro', [
            'title' => "Estética Automotiva",
            'pag' => "produto",
        ]);
    }

    public function fornecedor()
    {
        echo $this-> views('cadastro', [
            'title' => "Estética Automotiva",
            'pag' => "fornecedor",
        ]);
    }

    public function atendente()
    {
        echo $this-> views('cadastro', [
            'title' => "Estética Automotiva",
            'pag' => "atendente",
        ]);
    }



}
