<?php

namespace app\controller;

class EstatisticaController extends Controller
{
    public function index()
    {
        echo $this->views('estatistica', [
            'title' => "Estética Automotiva",
            'pag' => "index",
        ]);
    }
}
