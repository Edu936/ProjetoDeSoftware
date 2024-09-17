<?php

namespace app\controller;

class CadastroController extends Controller
{
    public function index()
    {
        echo $this->views('cadastro', [
            'title' => "Estetica Automotiva",
            'pag' => "index",
        ]);
    }

    public function cidade()
    {
        echo $this-> views('cadastro', [
            'title' => "Estetica Automotiva",
            'pag' => "cidade",
        ]);
    }
}
