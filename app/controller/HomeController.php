<?php

namespace app\controller;

use app\models\Usuario;
use app\static\Request;
use app\controller\Controller;

class HomeController extends Controller
{

  public function login() : void
  {
    $_SESSION['user'] = null;
    $_SESSION['cargo'] = null;
    $this->views('login', [
      'title' => "Login",
    ]);
  }

  public function signIn() : void 
  {
    $controller = new CidadeController();
    $cidades = $controller->buscarTodos();
    $this->views('sign-in', [
        'title' => "Sing-In",
        'cidades' => $cidades,
        'route' => '/',
    ]);
  }

  public function home() : void
  {
    $user = new UsuarioController();
    $filtro1 = $user->filtrarUsuario('DS_USUARIO_USER', Request::input('DS_USUARIO_USER'));
    $filtro2 = $user->filtrarUsuario('DS_USUARIO_SENHA', Request::input('DS_USUARIO_SENHA'));
    if($filtro1 && $filtro2) {
      $usuario = new Usuario;
      $usuario = $user->buscarUsuario('DS_USUARIO_USER',Request::input('DS_USUARIO_USER'));
      session_regenerate_id();
      $_SESSION['id'] = $usuario->getCodigo();
      $_SESSION['user'] = $usuario->getNome();
      $_SESSION['cargo'] = $usuario->getCargo();
      $this->views('home', [
        'title' => "Home",
      ]);
    } else {
      echo "<script> window.alert(\"Usuario ou Senha estão erradas!\"); window.location = `/`; </script>";
    }
  }

  public function atendimento(): void
  {
    $this->views('atendimento', [
      'title' => "Atendimentos",
      'pag' => "index",
    ]);
  }

  public function controle() : void
  {
    echo $this->views('controle', [
      'title' => "Controles",
      'pag' => "index",
    ]);
  }

  public function cadastro() : void
  {
    echo $this->views('cadastro', [
      'title' => "Cadastros",
      'pag' => "index",
    ]);
  }

  public function estatistica() : void
  {
    echo $this->views('estatistica', [
      'title' => "Estatística",
      'pag' => "index",
    ]);
  }

  public function configuracao() : void
  {
    $this->views('configuracao', [
      'title' => "Configurações",
      'pag' => "index",
    ]);
  }
}
