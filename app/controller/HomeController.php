<?php

namespace app\controller;

use app\controller\Controller;
use app\models\Usuario;
use app\static\Request;

class HomeController extends Controller
{

  public function login()
  {
    $_SESSION['user'] = null;
    $_SESSION['cargo'] = null;
    $this->views('login', [
      'title' => "Entre",
    ]);
  }

  public function home()
  {
    $user = new UsuarioController();
    $filtro1 = $user->filtrarUsuario('DS_USUARIO_USER', Request::input('DS_USUARIO_USER'));
    $filtro2 = $user->filtrarUsuario('DS_USUARIO_SENHA', Request::input('DS_USUARIO_SENHA'));
    if($filtro1 && $filtro2) {
      $usuario = new Usuario;
      $usuario = $user->buscar('DS_USUARIO_USER',Request::input('DS_USUARIO_USER'));
      session_regenerate_id();
      $_SESSION['user'] = $usuario->getNome();
      $_SESSION['cargo'] = $usuario->getCargo();
      $this->views('home', [
        'title' => "Estética Automotiva",
      ]);
    } else {
      echo "<script> window.alert(\"Usuario ou Senha estão erradas!\"); window.location = `/`; </script>";
    }
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
