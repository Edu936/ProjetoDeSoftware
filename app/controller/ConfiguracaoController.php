<?php

namespace app\controller;

class ConfiguracaoController extends Controller
{
    public function index()
    {
        $this->views('configuracao', [
            'title' => "Estética Automotiva",
            'pag' => "index",
        ]);
    }
}
