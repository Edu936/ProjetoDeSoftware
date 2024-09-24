<?php

namespace app\controller;

class ClienteController extends Controller
{
    public function cadastro()
    {
        echo $this-> views('cadastro', [
            'title' => "Estética Automotiva",
            'pag' => "cidade",
        ]);
    }
}