<?php

namespace app\controller;

use app\controller\Controller;
use League\Plates\Engine;

class UserController extends Controller
{
    public function index(){
        $templetes = new Engine('../app/views/');
        echo $templetes->render('user',[]);
    }

    public function cadastrar ($params) {
        echo "Foi";
    }

    public function atualizar ($params) {
        echo $params[0];
        $nome = $_POST["name"];
        echo $nome;
    }

    public function excluir ($params) {

    }

    public function buscar ($params) {

    }
}
