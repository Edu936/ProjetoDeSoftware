<?php

namespace app\controller;

use app\models\Cidade;
use app\models\Pedido;
use app\models\Cliente;
use app\models\Veiculo;
use app\static\Request;
use app\database\Filters;
use app\models\Orcamento;
use app\models\EmailCliente;
use app\models\TelefoneCliente;

class ClienteController extends Controller
{
    private $_pedido;
    private $_cliente;
    private $_veiculo;
    private $_filters;
    private $_orcamento;
    private $_emailCliente;
    private $_telefoneCliente;
    private $controllerCidade;

    public function __construct()
    {
        $this->_pedido = new Pedido();
        $this->_cliente = new Cliente();
        $this->_veiculo = new Veiculo();
        $this->_filters = new Filters();
        $this->_orcamento =  new Orcamento();
        $this->_emailCliente = new EmailCliente();
        $this->_telefoneCliente = new TelefoneCliente();
        $this->controllerCidade = new CidadeController();
    }

    public function paginaDeCadastro(): void
    {
        $cidades = $this->controllerCidade->buscarTodos();
        $this->views('cadastro', [
            'title' => "Estética Automotiva",
            'pag' => "cliente",
            'cidades' => $cidades,
        ]);
    }

    public function paginaDeControle(): void
    {
        $clientes = $this->buscarTodos();
        $this->views('controle', [
            'title' => "Estética Automotiva",
            'pag' => "cliente",
            'clientes' => $clientes,
        ]);
    }

    public function paginaDeEdicao($codigo): void 
    {
        $cidades = $this->controllerCidade->buscarTodos();
        $cliente = $this->buscarCliente('CD_CLIENTE', $codigo[0]);
        $this->views('atualizar', [
            'title' => "Atualizar Cliente",
            'pag' => "cliente",
            'cliente' => $cliente,
            'cidades' => $cidades,
            'link' => '/controle/cliente',
        ]);
    }

    public function paginaDeDetalhe($codigo): void {}

    public function buscarTodos(): array
    {
        $clientes = $this->_cliente->fetchAll();
        return $clientes;
    }

    public function buscarCliente(string $key, mixed $data): Cliente | bool
    {
        $this->_filters->where($key, '=', $data);
        $this->_cliente->setfilters($this->_filters);
        $cliente = $this->_cliente->fetchAll();
        $this->_filters->clear();
        return $cliente[0] ?? false;
    }

    public function buscarCidadeCliente(string $key, int $data): Cidade | bool
    {
        return $this->controllerCidade->buscarCidade($key, $data);
    }

    public function buscarTelefonesCliente(string $key, mixed $data): array | bool
    {
        $this->_filters->where($key, '=', $data);
        $this->_telefoneCliente->setfilters($this->_filters);
        $telefonesCliente = $this->_telefoneCliente->fetchAll();
        $this->_filters->clear();
        return $telefonesCliente ?? false;
    }

    public function buscarEmailsCliente(string $key, mixed $data): array | bool
    {
        $this->_filters->where($key, '=', $data);
        $this->_emailCliente->setfilters($this->_filters);
        $emailsCliente = $this->_emailCliente->fetchAll();
        $this->_filters->clear();
        return $emailsCliente ?? false;
    }

    public function buscarVeiculosCliente(string $key, int $data): array | bool
    {
        $this->_filters->where($key, '=', $data);
        $this->_veiculo->setfilters($this->_filters);
        $veiculos = $this->_veiculo->fetchAll();
        $this->_filters->clear();
        return $veiculos ?? false;
    }

    public function buscarOrcamentosCliente(string $key, int $data): array | bool
    {
        $this->_filters->where($key, '=', $data);
        $this->_orcamento->setfilters($this->_filters);
        $orcamentos = $this->_orcamento->fetchAll();
        $this->_filters->clear();
        return $orcamentos ?? false;
    }

    public function buscarPedidosCliente(string $key, int $data): array | bool
    {
        $this->_filters->where($key, '=', $data);
        $this->_pedido->setfilters($this->_filters);
        $pedidos = $this->_pedido->fetchAll();
        $this->_filters->clear();
        return $pedidos ?? false;
    }

    public function excluir($codigo): void
    {
        $filtro = $this->buscarPedidosCliente('CD_CLIENTE', $codigo[0]);
        if ($filtro == []) {
            $result = $this->_cliente->delete('CD_CLIENTE', $codigo[0]);
            if ($result) {
                $this->views('configuracao', [
                    'title' => "Exclusao de cliente",
                    'pag' => "finalizar",
                    'imagem' => "/images/Forgot password-bro.png",
                    'mensagem' => "Não foi possivel excluir o cliente!",
                    'link' => '/controle/cliente',
                ]);
            } else {
                $this->views('configuracao', [
                    'title' => "Exclusao de cliente",
                    'pag' => "finalizar",
                    'imagem' => "/images/Create-amico.png",
                    'mensagem' => "O cliente foi apagado com sucesso!",
                    'link' => '/controle/cliente',
                ]);
            }
        } else {
            $cliente = $this->buscarCliente('CD_CLIENTE', $codigo[0]);
            $this->views('configuracao', [
                'title' => "Exclusao de cliente",
                'pag' => "finalizar",
                'imagem' => "/images/Forgot password-bro.png",
                'mensagem' => "O cliente {$cliente->getNome()} tem pedidos cadastrados em seu nome!",
                'link' => '/controle/cliente',
            ]);
        }
    }

    public function atualizar($codigo): void 
    {
        $request = Request::all();
        $result =$this->_cliente->update($request, 'CD_CLIENTE', $codigo[0]);
        if($result){
            $this->views('controle', [
                'title' => "Atualização de Cliente",
                'pag' => "finalizar",
                'imagem' => "/images/Create-amico.png",
                'mensagem' => "O cliente {$request['NM_CLIENTE']} foi atualizado com sucesso!",
                'link' => '/controle/cliente',
            ]);
        } else {
            $this->views('controle', [
                'title' => "Atualização de Cliente",
                'pag' => "finalizar",
                'imagem' => "/images/Forgot password-bro.png",
                'mensagem' => "Não foi possivel atualizar o cliente {$request['NM_CLIENTE']}!",
                'link' => '/controle/cliente',
            ]);
        }
    }

    public function salvarTelefone($codigo, $arrayTelefones = []) 
    {
        $telefones = Request::input('DS_FONE_CLIENTE');
        $telefone = new TelefoneCliente;
        if ($arrayTelefones == []) {
            foreach ($telefones as $tel) {
                $fone = $this->buscarTelefonesCliente('DS_FONE_USUARIO', $tel);
                if ($fone == []) {
                    $result = $telefone->create([
                        'CD_CLIENTE' => $codigo[0],
                        'DS_FONE_CLIENTE' => $tel
                    ]);
                    if ($result == null) {
                        return $this->views('configuracao', [
                            'title' => "cadastro de usuario",
                            'pag' => "finalizar",
                            'imagem' => "/images/Forgot password-bro.png",
                            'mensagem' => "Não foi possivel cadastrar esses telefones!",
                            'link' => '/cliente/controle/',
                        ]);
                    }
                }
            }
            return $this->views('configuracao', [
                'title' => "Cadastro de telefones",
                'pag' => "finalizar",
                'imagem' => "/images/Create-amico.png",
                'mensagem' => "Os telefones foram cadastrados!",
                'link' => '/cliente/controle/',
            ]);
        } else {
            $fone = $this->buscarTelefonesCliente('DS_FONE_CLIENTE', $arrayTelefones);
            if($fone){
                dd("foi");
                return false;
            } else {
                return $this->_telefoneCliente->create([
                    'CD_CLIENTE' => $codigo,
                    'DS_FONE_CLIENTE' => $arrayTelefones,
                ]);
            }
        }
    }

    public function salvarEmail($codigo, $arrayEmails = [])
    {
        $email = new EmailCliente();
        $emails = Request::input('DS_EMAIL_CLIENTE');
        if ($arrayEmails == []) {
            foreach ($emails as $e) {
                $mail = $this->buscarEmailsCliente('DS_EMAIL_CLIENTE', $e);
                if ($mail != $e) {
                    $result = $email->create([
                        'CD_CLIENTE' => $codigo[0],
                        'DS_EMAIL_CLIENTE' => $e
                    ]);
                    if (!$result) {
                        return $this->views('configuracao', [
                            'title' => "Cadastro de Emails",
                            'pag' => "finalizar",
                            'imagem' => "/images/Forgot password-bro.png",
                            'mensagem' => "Não foi possivel cadastrar esses Emails!",
                            'link' => '/cliente/controle/',
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
            $mail = $this->buscarEmailsCliente('DS_EMAIL_CLIENTE', $arrayEmails);
            if($mail){
                return false;
            } else {
                return $this->_emailCliente->create([
                    'CD_CLIENTE' => $codigo,
                    'DS_EMAIL_CLIENTE' => $arrayEmails,
                ]);
            }
        }
    }

    // salvar
    public function salvar()
    {
        $request = Request::exception(['DS_EMAIL_CLIENTE', 'DS_FONE_CLIENTE']);
        $filtro = $this->buscarCliente('DS_CPF_CLIENTE', $request['DS_CPF_CLIENTE']);
        if (!$filtro) {
            $resutl = $this->_cliente->create($request);
            if (!$resutl) {
                $this->views('cadastro', [
                    'title' => "Estética Automotiva",
                    'pag' => "finalizar",
                    'imagem' => "/images/Forgot password-bro.png",
                    'mensagem' => "Não foi possivel cadastrar este cliente!",
                    'link' => '/cadastro/cliente',
                ]);
            } else {
                $cliente = $this->buscarCliente('DS_CPF_CLIENTE', $request['DS_CPF_CLIENTE']);
                $contatoFone = $this->salvarTelefone($cliente->getCodigo(), Request::input('DS_FONE_CLIENTE'));
                $contatoEmail = $this->salvarEmail($cliente->getCodigo(), Request::input('DS_EMAIL_CLIENTE'));
                if (!($contatoFone && $contatoEmail)) {
                    $this->views('cadastro', [
                        'title' => "Estética Automotiva",
                        'pag' => "finalizar",
                        'imagem' => "/images/Create-amico.png",
                        'mensagem' => "O cliente {$request['NM_CLIENTE']} foi cadastrado, porem seus contato não foram cadastrados!",
                        'link' => '/cadastro/cliente',
                    ]);
                } else {
                    $this->views('cadastro', [
                        'title' => "Estética Automotiva",
                        'pag' => "finalizar",
                        'imagem' => "/images/Create-amico.png",
                        'mensagem' => "O cliente {$request['NM_CLIENTE']} foi cadastrado!",
                        'link' => '/cadastro/cliente',
                    ]);
                }
            }
        } else {
            $this->views('cadastro', [
                'title' => "Estética Automotiva",
                'pag' => "finalizar",
                'imagem' => "/images/Forgot password-bro.png",
                'mensagem' => "Esse cliente já foi cadastrado!",
                'link' => '/cadastro/cliente',
            ]);
        }
    }
}
