<?php

namespace app\controller;

use League\Plates\Engine;

class UserController
{
    public function index(){
        $templetes = new Engine('../app/views/');

        echo $templetes->render('user',[]);
    }

    public function user($x) 
    {
        return $x;
    }

    public function cad($x)  
    {
       return $x;
    }
}
