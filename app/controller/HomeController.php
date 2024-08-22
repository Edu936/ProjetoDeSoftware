<?php
namespace app\controller;

class HomeController {
    public function index() 
    {
        return [
            'path'=> '../app/views/home.php',
            'data'=> [
                'name'=>'Eduardo'
            ]
        ];
    }
}