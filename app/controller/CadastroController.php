<?php 

namespace app\controller;

class CadastroController extends Controller {
    public function usuario() {
        echo $this->views('cadastro');
    } 
}