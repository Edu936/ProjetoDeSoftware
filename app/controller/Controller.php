<?php

namespace app\controller;

use League\Plates\Engine;
use Exception;

abstract class Controller
{
    protected function views(string $view, array $data = [])
    {
        $viewPath = "../app/views/".$view.'.php';
        if(!file_exists($viewPath)){
            throw new Exception("Essa Tela não existe no sistema!");
        } else {
            $templetes = new Engine('../app/views/');
            echo $templetes->render($view, $data);
        }
    }

    protected function component(string $view, array $data = [])
    {
        $viewPath = "../app/views/components/".$view.'.php';
        if(!file_exists($viewPath)){
            throw new Exception("Essa Tela não existe no sistema!");
        } else {
            $templetes = new Engine('../app/views/components/');
            echo $templetes->render($view, $data);
        }
    }
}
