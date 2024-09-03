<?php
namespace app\controller;

use League\Plates\Engine;

class HomeController {
    public function index() 
    {
        $templetes = new Engine('../app/views/');

        echo $templetes->render('home', ['name' => 'Eduardo']);
    }
}