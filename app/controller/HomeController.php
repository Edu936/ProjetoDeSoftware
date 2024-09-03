<?php
namespace app\controller;

use app\controller\Controller;
use League\Plates\Engine;

class HomeController extends Controller{
    public function index() 
    {
        $this->views('home', ['name' => 'Eduardo']);
    }
}