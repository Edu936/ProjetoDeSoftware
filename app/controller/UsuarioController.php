<?php

namespace app\controller;

use app\database\Filters;
use app\models\Cidade;
use app\models\EmailUsuario;
use app\models\TelefoneUsuario;
use app\models\Usuario;
use app\static\Request;

class UsuarioController extends Controller
{
    public function paginaDeCadastro() : void 
    {
        
    }

    public function paginaDeControle() : void 
    {

    }

    public function paginaDeEdicao($codigo) : void 
    {
        $dataUsuario = $this->buscarUsuario('CD_USUARIO', $codigo[0]);
        $emailUsuario = $this->buscarEmailUsuario('CD_USUARIO', $dataUsuario->getCodigo()); 
        $cidadeUsuario = $this->buscarCidadeUsuario('CD_CIDADE', $dataUsuario->getCidade());
        $telefoneUsuario = $this->buscarTelefoneUsuario('CD_USUARIO', $dataUsuario->getCodigo());
        $this->views('configuracao', [
            'pag' => "detalhe",
            'usuario' => $dataUsuario,
            'emails' => $emailUsuario,
            'cidade' => $cidadeUsuario,
            'title' => 'Detalhes Usuario',
            'telefones' => $telefoneUsuario,
        ]);
    }

    public function filtrarUsuario($key, $data) : bool
    {
        $user = new Usuario();
        $user = $user->findby($key, $data);
        return $user? true : false;
    }

    public function relatorio() : void {
        dd('Atendente');
    }

    

    public function salvar() : void 
    {
        $request = Request::exception(['DS_FONE_USUARIO', 'DS_EMAIL_USUARIO']);
        $filtro1 = $this->filtrarUsuario('DS_USUARIO_USER',$request['DS_USUARIO_USER']);
        $filtro2 = $this->filtrarUsuario('DS_CPF_USUARIO',$request['DS_CPF_USUARIO']);
        $newUsuario = new Usuario();
        if(!$filtro1 && !$filtro2) {
            $result = $newUsuario->create($request);
            if(!($result)) {
                $this->views('sucesso', [
                    'title' => "Cadastra-se",
                    'imagem' => "/images/Forgot password-bro.png",
                    'messagem' => "Não foi possivel cadastrar o usuario",
                    'link' => '/',
                ]);
            } else {     
                $usuario = $this->buscarUsuario('DS_CPF_USUARIO', $request['DS_CPF_USUARIO']);
                $contato1 = new TelefoneUsuario();
                $contato2 = new EmailUsuario();
                $result1 = $contato1->create(['CD_USUARIO' => $usuario->getCodigo(), 'DS_EMAIL_USUARIO' => Request::input('DS_EMAIL_USUARIO')]);
                $result2 = $contato2->create(['CD_USUARIO' => $usuario->getCodigo(), 'DS_FONE_USUARIO' => Request::input('DS_FONE_USUARIO')]);
                if (!($result1 && $result2)) {
                    $this->views('sucesso', [
                        'title' => "Cadastra-se",
                        'imagem' => "/images/Create-amico.png",
                        'mensagem' => "O usuario {$request['NM_FORNECEDOR']} foi cadastrado, porem seus contato não foram cadastrados!",
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

    public function buscarUsuario($key, $data) : Usuario 
    {
        $filters = new Filters();
        $usuario = new Usuario();
        
        $filters->where($key, '=', $data);
        
        $usuario->setfilters($filters);
        $usuario = $usuario->fetchAll();

        return $usuario[0];
    }

    private function buscarCidadeUsuario($key, $data) : Cidade 
    {
        $filters = new Filters();
        $cidade = new Cidade();

        $filters->where($key, '=', (int)$data);

        $cidade->setfilters($filters);
        $cidade = $cidade->fetchAll($filters);

        return $cidade[0] ?? false;
    }

    private function buscarTelefoneUsuario($key, $data) : array
    {
        $filters = new Filters();
        $tefoneUsuario = new TelefoneUsuario();

        $filters->where($key, '=', $data);

        $tefoneUsuario->setfilters($filters);
        $tefoneUsuario = $tefoneUsuario->fetchAll();

        return $tefoneUsuario ?? false;
    }

    private function buscarEmailUsuario($key, $data) : array
    {
        $filters = new Filters();
        $emailTelefone = new EmailUsuario();

        $filters->where($key, '=', $data);

        $emailTelefone->setfilters($filters);
        $emailTelefone = $emailTelefone->fetchAll();

        return $emailTelefone ?? false;
    }
}