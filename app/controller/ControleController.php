<?php

namespace app\controller;

class ControleController extends Controller
{
    public function index()
    {
        echo $this->views('controle', [
            'title' => "Estética Automotiva",
            'pag' => "index",
        ]);
    }

    public function cidade()
    {
        echo $this->views('controle', [
            'title' => "Estética Automotiva",
            'pag' => "cidade",

        ]);
    }
}
