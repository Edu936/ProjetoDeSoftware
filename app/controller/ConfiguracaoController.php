<?php

namespace app\controller;

class ConfiguracaoController extends Controller
{
    public function index()
    {
        $this->views('configuracao', [
            'title' => "Estetica Automotiva",
            'pag' => "index",
        ]);
    }
}
