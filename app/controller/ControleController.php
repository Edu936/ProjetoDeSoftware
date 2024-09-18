<?php

namespace app\controller;

class ControleController extends Controller
{
    public function index()
    {
        echo $this->views('controle', [
            'title' => "Estetica Automotiva",
            'pag' => "index",
        ]);
    }

    public function cidade()
    {
        echo $this->views('controle', [
            'title' => "Estetica Automotiva",
            'pag' => "cidade",

        ]);
    }
}
