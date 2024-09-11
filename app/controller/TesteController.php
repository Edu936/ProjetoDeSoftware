<?php

namespace app\controller;

class TesteController extends Controller
{
    public function index()
    {
        $this->views('teste', [
            'title' => "Pagina de Teste",
        ]);
    }
}
