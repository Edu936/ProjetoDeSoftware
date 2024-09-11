<?php

namespace app\controller;

class ControleController extends Controller
{
    public function index()
    {
        echo $this->views('controle', [
            'title' => "Estetica Automotiva",
        ]);
    }
}
