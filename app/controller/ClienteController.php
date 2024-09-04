<?php

namespace app\controller;

use app\controller\Controller;

class ClienteController extends Controller {
    public function index() 
    {
        $this->views('cliente', ['name' => 'Eduardo']);
    }

    public function cadastrar ($params) {

    }

    public function atualizar ($params) {

    }

    public function excluir ($params) {

    }

    public function buscar ($params) {

    }
}