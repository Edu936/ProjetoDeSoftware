<?php

namespace app\controller;

use app\controller\Controller;

class HomeController extends Controller
{

  public function login()
  {
    $this->views('login', [
      'title' => "Entre",
    ]);
  }

  public function home()
  {
    $this->views('home', [
      'title' => "Estética Automotiva",
    ]);
  }

  public function atendimento(): void
  {
    $this->views('atendimento', [
      'title' => "Estética Automotiva",
      'pag' => "index",
    ]);
  }

  public function controle()
  {
    echo $this->views('controle', [
      'title' => "Estética Automotiva",
      'pag' => "index",
    ]);
  }

  public function cadastro()
  {
    echo $this->views('cadastro', [
      'title' => "Estética Automotiva",
      'pag' => "index",
    ]);
  }

  public function estatistica()
  {
    echo $this->views('estatistica', [
      'title' => "Estética Automotiva",
      'pag' => "index",
    ]);
  }

  public function configuracao()
  {
    $this->views('configuracao', [
      'title' => "Estética Automotiva",
      'pag' => "index",
    ]);
  }
}
