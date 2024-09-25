<?php

namespace app\controller;

class UsuarioController extends Controller
{
    public function paginaDeCadastro() {
        $this->views('sign-in', ['title' => "Novo Usuario"]);
    }
}