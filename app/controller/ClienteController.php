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
    public function paginaDeCadastro() : void
    {
        $cidade = new Cidade();
        $cidades = $cidade->fetchAll();
        echo $this->views('cadastro', [
            'title' => "Estética Automotiva",
            'pag' => "cliente",
            'cidades' => $cidades,
        ]);
    }

    public function paginaDeControle() : void
    {
        $clientes = $this->buscarTodos();
        echo $this->views('controle', [
            'title' => "Estética Automotiva",
            'pag' => "cliente",
            'clientes' => $clientes,
        ]);
    }

    public function paginaDeEdicao($codigo) : void
    {

    }

    public function paginaDeDetalhe($codigo) : void
    {

    }

    // Metodos de Busca
    public function buscarTodos() : array
    {
        $cliente = new Cliente();

        $clientes = $cliente->fetchAll();

        return $clientes;
    }

    public function buscarCliente(string $key, mixed $data) : Cliente | bool
    {
        $filters = new Filters();
        $cliente = new Cliente();

        $filters->where($key, '=', $data);

        $cliente->setfilters($filters);
        $cliente = $cliente->fetchAll();

        return $cliente[0] ?? false;
    }

    private function buscarCidadeCliente(string $key, int $data) : Cidade | bool
    {
        $filters = new Filters();
        $cidade = new Cidade();

        $filters->where($key, '=', $data);

        $cidade->setfilters($filters);
        $cidade = $cidade->fetchAll($filters);

        return $cidade[0] ?? false;
    }

    private function buscarTelefonesCliente(string $key, int $data): array | bool
    {
        $filters = new Filters();
        $telefoneCliente = new TelefoneCliente();

        $filters->where($key, '=', $data);

        $telefoneCliente->setfilters($filters);
        $telefoneCliente = $telefoneCliente->fetchAll();

        return $telefoneCliente ?? false;
    }

    private function buscarEmailsCliente(string $key, int $data): array | bool
    {
        $filters = new Filters();
        $emailCliente= new EmailCliente();

        $filters->where($key, '=', $data);

        $emailCliente->setfilters($filters);
        $emailCliente = $emailCliente->fetchAll();

        return $emailCliente ?? false;
    }

    public function buscarVeiculosCliente(string $key, int $data) : array | bool
    {
        $filters = new Filters();
        $veiculos = new Veiculo();

        $filters->where($key, '=', $data);

        $veiculos->setfilters($filters);
        $veiculos = $veiculos->fetchAll();

        return $veiculos ?? false;
    }

    private function buscarOrcamentosCliente(string $key, int $data) : array | bool
    {
        $filters = new Filters();
        $orcamentos = new Orcamento();

        $filters->where($key, '=', $data);

        $orcamentos->setfilters($filters);
        $orcamentos = $orcamentos->fetchAll();

        return $orcamentos ?? false;
    }

    private function buscarPedidosCliente(string $key, int $data) : array | bool
    {
        $filters = new Filters();
        $pedidos = new Pedido();

        $filters->where($key, '=', $data);

        $pedidos->setfilters($filters);
        $pedidos = $pedidos->fetchAll();

        return $pedidos ?? false;
    }

    // excluir
    public function excluir($codigo) : void 
    {
        $cliente = new Cliente();
        $filtro = $this->buscarPedidosCliente('CD_CLIENTE', $codigo[0]);
        if($filtro == []){
            $result = $cliente->delete('CD_CLIENTE', $codigo[0]);
            if($result){
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

    // atulaizar
    public function atualizar($codigo) : void 
    {
        
    }

    // salvar
    public function salvar()
    {
        $request = Request::exception(['DS_EMAIL_CLIENTE','DS_FONE_CLIENTE']);
        $filtro = $this->buscarCliente('DS_CPF_CLIENTE',$request['DS_CPF_CLIENTE']);
        if(!$filtro){
            dd("teste");
        } else {
            $this->views('cadastro', [
                'title' => "Estética Automotiva",
                'pag' => "finalizar",
                'imagem' => "/images/Forgot password-bro.png",
                'mensagem' => "Esse cliente já foi cadastrado!",
                'link' => '/cadastro/cliente',
            ]);
        }
        // $cliente = new Cliente();
        // if ($filtro->getCPF() != $request['DS_CPF_CLIENTE']) {
        //     $result = $cliente->create($request);
        //     if (!$result) {
        //         $this->views('cadastro', [
        //             'title' => "Estética Automotiva",
        //             'pag' => "finalizar",
        //             'imagem' => "/images/Forgot password-bro.png",
        //             'mensagem' => "Não foi possivel cadastrar o cliente {$request['NM_CLIENTE']}!",
        //             'link' => '/cadastro/cliente',
        //         ]);
        //     } else {
        //         $cliente = $this->buscarPorCPF($request['DS_CPF_CLIENTE']);
        //         $contatoEmail = new EmailCliente();
        //         $contatoFone = new TelefoneCliente();
        //         $result1 = $contatoEmail->create(['CD_CLIENTE'=>$cliente->getCodigo(),'DS_EMAIL_CLIENTE'=> Request::input('DS_EMAIL_CLIENTE')]);
        //         $result2 = $contatoFone->create(['CD_CLIENTE'=>$cliente->getCodigo(), 'DS_FONE_CLIENTE'=>Request::input('DS_FONE_CLIENTE')]);
        //         if(!($result1 && $result2)){
        //             $this->views('cadastro', [
        //                 'title' => "Estética Automotiva",
        //                 'pag' => "finalizar",
        //                 'imagem' => "/images/Create-amico.png",
        //                 'mensagem' => "O cliente {$request['NM_CLIENTE']} foi cadastrado, porem seus contato não foram cadastrados!",
        //                 'link' => '/cadastro/cliente',
        //             ]);
        //         }
        //         else {
        //             $this->views('cadastro', [
        //                 'title' => "Estética Automotiva",
        //                 'pag' => "finalizar",
        //                 'imagem' => "/images/Create-amico.png",
        //                 'mensagem' => "O cliente {$request['NM_CLIENTE']} foi cadastrado!",
        //                 'link' => '/cadastro/cliente',
        //             ]);
        //         }
        //     }
        // } else {
        //     $this->views('cadastro', [
        //         'title' => "Estética Automotiva",
        //         'pag' => "finalizar",
        //         'imagem' => "/images/Forgot password-bro.png",
        //         'mensagem' => "Esse cliente já foi cadastrado!",
        //         'link' => '/cadastro/cliente',
        //     ]);
        // }
    }
}
