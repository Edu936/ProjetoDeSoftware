<?php

namespace app\controller;

use app\models\Cidade;
use app\models\Usuario;
use app\static\Request;

class UsuarioController extends Controller
{
    public function paginaDeCadastro() {
        $cidade = new Cidade();
        $cidades = $cidade->fetchAll();
        $this->views('sign-in', [
            'title' => "Cadastra-se",
            'cidades' => $cidades,
        ]);
    }


    public function filtrarUsuario($key, $data) : bool
    {
        $user = new Usuario();
        $user = $user->findby($key, $data);
        return $user? true : false;
    }

    public function salvar() : void 
    {
        $request = Request::all();
        $filtro1 = $this->filtrarUsuario('DS_USUARIO_USER',$request['DS_USUARIO_USER']);
        $filtro2 = $this->filtrarUsuario('DS_CPF_USUARIO',$request['DS_CPF_USUARIO']);
        $newUsuario = new Usuario();
        if(!$filtro1 && !$filtro2) {
            $result = $newUsuario->create($request);
            if(!$result) {
                $this->views('sucesso', [
                    'title' => "Cadastra-se",
                    'imagem' => "/images/Forgot password-bro.png",
                    'messagem' => "Não foi possivel cadastrar o usuario",
                    'link' => '/',
                ]);
            } else {     
                $this->views('sucesso', [
                    'title' => "Cadastra-se",
                    'imagem' => "/images/Create-amico.png",
                    'messagem' => "O Usuario {$request['NM_USUARIO']} foi cadastrado com Sucesso!",
                    'link' => '/',
                ]);     
            }
        } else {
            $this->views('sucesso', [
                'title' => "Cadastra-se",
                'imagem' => "/images/Forgot password-bro.png",
                'messagem' => "O Usuario {$request['NM_USUARIO']} já foi cadastrado!",
                'link' => '/',
            ]);
        }
    }
}