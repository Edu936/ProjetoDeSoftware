<?php

namespace app\controller;

class EstatisticaController extends Controller
{
    public function index()
    {
        echo $this->views('estatistica', [
            'title' => "Estetica Automotiva",
        ]);
    }
}
