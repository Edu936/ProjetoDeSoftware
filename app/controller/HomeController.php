<?php
namespace app\controller;

use app\controller\Controller;
use app\models\Usuario;

class HomeController extends Controller{
    public function index() 
    {
        $this->views('home', ['name' => $_POST['user']]);
    }

    public function x(){
      $usuario = new Usuario("Eduardo","Ageu",3112, 32, "canaa", 11957244,"edu.vieira","edu.", "atendente","Ipatinga");
      $usuario->con();
    }
}