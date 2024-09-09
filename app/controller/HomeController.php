<?php

namespace app\controller;

use app\controller\Controller;

class HomeController extends Controller
{
  public function index()
  {
    $this->views('home', ['title' => "Estetica Automotiva"]);
  }
}