<?php 

namespace app\controller;

class CadastroController extends Controller {
    public function index() {
        echo $this->views('cadastro');
    } 
}