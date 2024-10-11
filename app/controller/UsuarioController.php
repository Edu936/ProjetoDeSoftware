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
        $dataUsuario = $this->buscarUsuario('CD_USUARIO', $codigo[0]);
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

    public function salvarTelefone($codigo): bool
    {
        $telefones = Request::input('DS_FONE_USUARIO');
        $telefone = new TelefoneUsuario;
        if (is_array($telefones)) {
            foreach ($telefones as $tel) {
                $fone = $this->buscarTelefonesUsuario('DS_FONE_USUARIO', $tel);
                if ($fone == []) { 
                    $result = $telefone->create([
                        'CD_USUARIO' => $codigo,
                        'DS_FONE_USUARIO' => $tel]);
                    if ($result) {
                        dd("foi cadastrado");
                        return true;
                    } else {
                        dd("não foi cadastrado");
                        return false;
                    }
                } else {
                    dd("Já foi cadastrado");
                    return false;
                }
            }
        } else {
            $fone = $this->buscarTelefonesUsuario('DS_FONE_USUARIO', $telefones);
            if ($fone != $telefones) {
                $result = $telefone->create([
                    'CD_USUARIO' => $codigo,
                    'DS_FONE_USUARIO' => $telefones
                ]);
                if ($result) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    public function salvarEmail($codigo, $emails): mixed
    {
        $email = new EmailUsuario();
        if (is_array($emails)) {
            foreach ($emails as $e) {
                $mail = $this->buscarEmailsUsuario('DS_EMAIL_USUARIO', $e);
                if ($mail != $e) {
                    $result = $email->create([
                        'CD_USUARIO' => $codigo,
                        'DS_EMAIL_USUARIO' => $e
                    ]);
                    if ($result) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        } else {
            $mail = $this->buscarEmailsUsuario('DS_EMAIL_USUARIO', $emails);
            if ($mail != $emails) {
                $result = $email->create([
                    'CD_USUARIO' => $codigo,
                    'DS_EMAIL_USUARIO' => $emails
                ]);
                if ($result) {
                    return true;
                } else {
                    return false;
                }
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

    public function buscarUsuario($key, $data): Usuario | bool
    {
        $filters = new Filters();
        $usuario = new Usuario();

        $filters->where($key, '=', $data);

        $usuario->setfilters($filters);
        $usuario = $usuario->fetchAll();

        return $usuario[0] ?? false;
    }

    private function buscarCidadeUsuario($key, $data): Cidade | bool
    {
        $filters = new Filters();
        $cidade = new Cidade();

        $filters->where($key, '=', (int)$data);

        $cidade->setfilters($filters);
        $cidade = $cidade->fetchAll($filters);

        return $cidade[0] ?? false;
    }

    private function buscarTelefonesUsuario($key, $data): array | bool
    {
        $filters = new Filters();
        $tefoneUsuario = new TelefoneUsuario();

        $filters->where($key, '=', $data);

        $tefoneUsuario->setfilters($filters);
        $tefoneUsuario = $tefoneUsuario->fetchAll();

        return $tefoneUsuario ?? false;
    }

    private function buscarEmailsUsuario($key, $data): array | bool
    {
        $filters = new Filters();
        $emailTelefone = new EmailUsuario();

        $filters->where($key, '=', $data);

        $emailTelefone->setfilters($filters);
        $emailTelefone = $emailTelefone->fetchAll();

        return $emailTelefone ?? false;
    }
}
