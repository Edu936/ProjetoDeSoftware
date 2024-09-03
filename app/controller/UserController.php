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

    public function user($x) 
    {
        return $x;
    }

    public function cad($x)  
    {
       return $x;
    }
}
