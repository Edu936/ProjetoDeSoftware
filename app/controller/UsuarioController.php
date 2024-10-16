<?php

namespace app\controller;

use app\database\Filters;
use app\models\Cidade;
use app\models\EmailUsuario;
use app\models\TelefoneUsuario;
use app\models\Usuario;
use app\static\Request;
use UnderflowException;

class UsuarioController extends Controller
{
    public function paginaDeControle($codigo): void
    {
        $dataUsuario = $this->buscarUsuario('CD_USUARIO', (int)$codigo[0]);
        $emailUsuario = $this->buscarEmailsUsuario('CD_USUARIO', $dataUsuario->getCodigo());
        $cidadeUsuario = $this->buscarCidadeUsuario('CD_CIDADE', $dataUsuario->getCidade());
        $telefoneUsuario = $this->buscarTelefonesUsuario('CD_USUARIO', $dataUsuario->getCodigo());
        $this->views('configuracao', [
            'pag' => "detalhe",
            'usuario' => $dataUsuario,
            'emails' => $emailUsuario,
            'cidade' => $cidadeUsuario,
            'title' => 'Detalhes Usuario',
            'telefones' => $telefoneUsuario,
        ]);
    }

    public function paginaDeEdicao($codigo): void
    {
        $cidadeController = new CidadeController();
        $usuario = $this->buscarUsuario('CD_USUARIO', $codigo[0]);
        $cidades = $cidadeController->buscarTodos();
        $this->views('configuracao', [
            'pag' => "edicao",
            'title' => 'Editar Usuario',
            'usuario' => $usuario,
            'cidades' => $cidades,
        ]);
    }

    public function paginaDeExclusao(): void
    {
        $this->views('configuracao', [
            'pag' => "exclusao",
            'title' => 'Excluir Perfil',
        ]);
    }

    public function cadastroTelefone(): void
    {
        $this->views('configuracao', [
            'pag' => "telefone",
            'title' => 'Adcionar Telefone',
        ]);
    }

    public function cadastroEmail(): void
    {
        $this->views('configuracao', [
            'pag' => "email",
            'title' => 'Adcionar Email',
        ]);
    }

    public function filtrarUsuario($key, $data): bool
    {
        $user = new Usuario();
        $user = $user->findby($key, $data);
        return $user ? true : false;
    }

    public function relatorio(): void
    {
        dd('Atendente');
    }

    public function salvarTelefone($codigo , $arrayTelefones=[]): mixed
    {
        $telefones = Request::input('DS_FONE_USUARIO');
        $telefone = new TelefoneUsuario;
        if ($arrayTelefones == []) {
            foreach ($telefones as $tel) {
                $fone = $this->buscarTelefonesUsuario('DS_FONE_USUARIO', $tel);
                if ($fone == []) { 
                    $result = $telefone->create([
                        'CD_USUARIO' => $codigo[0],
                        'DS_FONE_USUARIO' => $tel
                    ]);
                    if($result == null){
                        return $this->views('configuracao', [
                            'title' => "cadastro de usuario",
                            'pag' => "finalizar",
                            'imagem' => "/images/Forgot password-bro.png",
                            'mensagem' => "Não foi possivel cadastrar esses telefones!",
                            'link' => '/usuario/controle/' . $_SESSION['id'],
                        ]);
                    }
                }
            }
            return $this->views('configuracao', [
                'title' => "Cadastro de telefones",
                'pag' => "finalizar",
                'imagem' => "/images/Create-amico.png",
                'mensagem' => "Os telefones foram cadastrados!",
                'link' => '/usuario/controle/' . $_SESSION['id'],
            ]);
            
        } else {
            $fone = $this->buscarTelefonesUsuario('DS_FONE_Usuario', $arrayTelefones[0]);
            if($fone){
                dd("foi");
                return false;
            } else {
                return $telefone->create([
                    'CD_USUARIO' => $codigo,
                    'DS_FONE_USUARIO' => $arrayTelefones[0],
                ]);
            }
        }
    }

    public function salvarEmail($codigo, $arrayEmails = []): mixed
    {
        $email = new EmailUsuario();
        $emails = Request::input('DS_EMAIL_USUARIO');
        if ($arrayEmails == []) {
            foreach ($emails as $e) {
                $mail = $this->buscarEmailsUsuario('DS_EMAIL_USUARIO', $e);
                if ($mail != $e) {
                    $result = $email->create([
                        'CD_USUARIO' => $codigo[0],
                        'DS_EMAIL_USUARIO' => $e
                    ]);
                    if (!$result) {
                        return $this->views('configuracao', [
                            'title' => "Cadastro de Emails",
                            'pag' => "finalizar",
                            'imagem' => "/images/Forgot password-bro.png",
                            'mensagem' => "Não foi possivel cadastrar esses telefones!",
                            'link' => '/usuario/controle/' . $_SESSION['id'],
                        ]);
                    }
                }
            }
            return $this->views('configuracao', [
                'title' => "Cadastro de Emails",
                'pag' => "finalizar",
                'imagem' => "/images/Create-amico.png",
                'mensagem' => "Os emails foram cadastrados!",
                'link' => '/usuario/controle/' . $_SESSION['id'],
            ]);
        } else {
            $fone = $this->buscarEmailsUsuario('DS_EMAIL_Usuario', $arrayEmails[0]);
            if($fone){
                dd("foi");
                return false;
            } else {
                return $email->create([
                    'CD_USUARIO' => $codigo,
                    'DS_EMAIL_USUARIO' => $arrayEmails[0],
                ]);
            }
        }
    }

    public function excluir($codigo): void
    {
        $filtro = $this->buscarUsuario('CD_USUARIO', $codigo[0]);
        $request = Request::all();
        if ($request['DS_USUARIO_SENHA'] == $filtro->getSenha()) {
            $usuario = new Usuario();
            $usuario = $usuario->delete('CD_USUARIO', $codigo[0]);
            if (!$usuario) {
                $this->views('login', [
                    'title' => "Login",
                ]);
            } else {
                $this->views('login', [
                    'title' => "Login",
                ]);
            }
        } else {
            $this->views('configuracao', [
                'title' => "Exclusao de Usuario",
                'pag' => "finalizar",
                'imagem' => "/images/Forgot password-bro.png",
                'mensagem' => "A senha esta incorreta!",
                'link' => '/usuario/controle/' . $_SESSION['id'],
            ]);
        }
    }

    public function atualizar($codigo): void
    {
        $dadosContato = Request::exception(['DS_FONE_USUARIO', 'DS_EMAIL_USUARIO']);

        $filtro = $this->buscarUsuario('CD_USUARIO', $codigo[0]);

        if ($filtro) {
            $usuario = new Usuario();
            $result = $usuario->update($dadosContato, 'CD_USUARIO', $codigo[0]);
            if (!$result) {
                $this->views('configuracao', [
                    'title' => "Estética Automotiva",
                    'pag' => "finalizar",
                    'imagem' => "/images/Forgot password-bro.png",
                    'mensagem' => "Não foi possivel atualizar os dados do cliente!",
                    'link' => '/usuario/controle/' . $_SESSION['id'],
                ]);
            } else {
                $this->views('configuracao', [
                    'title' => "Estética Automotiva",
                    'pag' => "finalizar",
                    'imagem' => "/images/Create-amico.png",
                    'mensagem' => "O cliente foi atualizado com sucesso!",
                    'link' => '/usuario/controle/' . $_SESSION['id'],
                ]);
            }
        } else {
            $this->views('configuracao', [
                'title' => "Estética Automotiva",
                'pag' => "finalizar",
                'imagem' => "/images/Forgot password-bro.png",
                'mensagem' => "O usuario não existe em nossa base de dados!",
                'link' => '/usuario/controle/' . $_SESSION['id'],
            ]);
        }
    }

    public function salvar(): void
    {
        // Recebendo os Dados do Formulario
        $contatos = Request::only(['DS_FONE_USUARIO', 'DS_EMAIL_USUARIO']);
        $dadosUsuario = Request::exception(['DS_FONE_USUARIO', 'DS_EMAIL_USUARIO']);
        // Fazendo uma filtragem de cliente para que não haja clientes duplicados
        $filtro = $this->buscarUsuario('DS_CPF_USUARIO', $dadosUsuario['DS_CPF_USUARIO']);
        // Condicionar de cadastro
        if (!($filtro)) {
            $usuario = new Usuario();
            $usuario = $usuario->create($dadosUsuario);
            if (!$usuario) {
                $this->views('sucesso', [
                    'title' => "Cadastro Usuario",
                    'imagem' => "/images/Forgot password-bro.png",
                    'messagem' => "Não foi possivel cadastrar o usuario {$dadosUsuario['NM_USUARIO']}!",
                    'link' => '/',
                ]);
            } else {
                $usuario = $this->buscarUsuario('DS_CPF_USUARIO', $dadosUsuario['DS_CPF_USUARIO']);
                $telefone = $this->salvarTelefone($usuario->getCodigo(), $contatos['DS_FONE_USUARIO']);
                $email = $this->salvarEmail($usuario->getCodigo(), $contatos['DS_EMAIL_USUARIO']);
                if (!($email && $telefone)) {
                    $this->views('sucesso', [
                        'title' => "Cadastro Usuario",
                        'imagem' => "/images/Forgot password-bro.png",
                        'messagem' => "O Usuario {$dadosUsuario['NM_USUARIO']} foi cadastrado com sucesso! porem seus contato não foram salvos",
                        'link' => '/',
                    ]);
                } else {
                    $this->views('sucesso', [
                        'title' => "Cadastro Usuario",
                        'imagem' => "/images/Create-amico.png",
                        'messagem' => "O Usuario {$dadosUsuario['NM_USUARIO']} e seus contatos foram cadastrado com sucesso!",
                        'link' => '/',
                    ]);
                }
            }
        }
        // Caso já exista um Usuario com o mesmo CPF o sistema deve emitir um mensagem de erro
        else {
            $this->views('sucesso', [
                'title' => "Cadastro Usuario",
                'imagem' => "/images/Forgot password-bro.png",
                'messagem' => "O Usuario {$dadosUsuario['NM_USUARIO']} já foi cadastrado!",
                'link' => '/',
            ]);
        }
    }

    // Metodos de Busca
    public function buscarUsuario(string $key, mixed $data): Usuario | bool
    {
        $filters = new Filters();
        $usuario = new Usuario();

        $filters->where($key, '=', $data);

        $usuario->setfilters($filters);
        $usuario = $usuario->fetchAll();
        return $usuario[0] ?? false;
    }

    private function buscarCidadeUsuario(string $key, int $data): Cidade | bool
    {
        $filters = new Filters();
        $cidade = new Cidade();

        $filters->where($key, '=', $data);

        $cidade->setfilters($filters);
        $cidade = $cidade->fetchAll($filters);

        return $cidade[0] ?? false;
    }

    private function buscarTelefonesUsuario(string $key, mixed $data): array | bool
    {
        $filters = new Filters();
        $tefoneUsuario = new TelefoneUsuario();

        $filters->where($key, '=', $data);

        $tefoneUsuario->setfilters($filters);
        $tefoneUsuario = $tefoneUsuario->fetchAll();

        return $tefoneUsuario ?? false;
    }

    private function buscarEmailsUsuario(string $key, mixed $data): array | bool
    {
        $filters = new Filters();
        $emailUsuario = new EmailUsuario();

        $filters->where($key, '=', $data);

        $emailUsuario->setfilters($filters);
        $emailUsuario = $emailUsuario->fetchAll();

        return $emailUsuario ?? false;
    }
}
