<?php
namespace app\controller;

use app\controller\Controller;
use app\models\Usuario;
use app\static\Request;

class HomeController extends Controller{
    public function index() 
    {
      $this->views('home', ['title' => "Estetica Automotiva"] );
    }

    public function x(){
      $usuario = new Usuario("Eduardo","Ageu",3112, 32, "canaa", 11957244,"edu.vieira","edu.", "atendente","Ipatinga");
      $usuario->con();
    }
}