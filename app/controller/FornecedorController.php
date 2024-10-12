<?php

namespace app\controller;

use app\database\Filters;
use app\models\EmailFornecedor;
use app\models\Fornecedor;
use app\models\TelefoneFornecedor;
use app\static\Request;

class FornecedorController extends Controller
{
    private $_filters;
    private $_fornecedor;

    public function __construct()
    {   
        $this->_filters = new Filters();
        $this->_fornecedor = new Fornecedor();
    }

    public function paginaDeCadastro() : void
    {
        $card = "Cadastro De Fornecedor";
        $route = '/fornecedor/salvar';
        $fornecedor = new Fornecedor();
        $fornecedor->setNome("");
        $fornecedor->setCNPJ("");
        $cidade = new CidadeController();
        $cidades = $cidade->buscarTodos();
        $this->views('cadastro', [
            'title' => "Estetica De Automotiva",
            'pag' => "fornecedor",
            'card' => $card,
            'route' => $route,
            'fornecedor' => $fornecedor,
            'cidades' => $cidades,
        ]);
    }

    public function paginaDeControle() : void
    {
        $filter = new Filters();
        $filter->join("TB_FONE_FORNECEDOR", "TB_FONE_FORNECEDOR.CD_FORNECEDOR", "=", "TB_FORNECEDOR.CD_FORNECEDOR", "LEFT JOIN");
        $filter->join("TB_EMAIL_FORNECEDOR", "TB_EMAIL_FORNECEDOR.CD_FORNECEDOR", "=", "TB_FORNECEDOR.CD_FORNECEDOR", "LEFT JOIN");
        $filter->join("TB_CIDADE", "TB_CIDADE.CD_CIDADE", "=", "TB_FORNECEDOR.CD_CIDADE", "LEFT JOIN");
        $fornecedor = new Fornecedor();
        $fornecedor->setFields("TB_FORNECEDOR.CD_FORNECEDOR, NM_FORNECEDOR, DS_CNPJ_FORNECEDOR, DS_NUMERO, DS_RUA, DS_BAIRRO, DS_CEP, NM_CIDADE, DS_ESTADO_CIDADE, DS_FONE_FORNECEDOR, DS_EMAIL_FORNECEDOR");
        $fornecedor->setfilters($filter);
        $fornecedores = $fornecedor->fetchAll();
        $this->views('controle', [
            'title' => "Estetica De Automotiva",
            'pag' => "fornecedor",
            'fornecedores' => $fornecedores,
        ]);
    }

    public function paginaDeEdicao($codigo) : void
    {

    }

    public function buscar($key, $value)
    {
        $fornecedor = new Fornecedor();
        $fornecedor = $fornecedor->findby($key, $value);
        return $fornecedor ? $fornecedor : false;
    }

    public function salvar()
    {
        $request = Request::exception(['DS_FONE_FORNECEDOR', 'DS_EMAIL_FORNECEDOR']);
        $filtro1 = $this->buscar("NM_FORNECEDOR", $request['NM_FORNECEDOR']);
        $filtro2 = $this->buscar("DS_CNPJ_FORNECEDOR", $request['DS_CNPJ_FORNECEDOR']);
        $fornecedor = new Fornecedor();
        if (!($filtro1 && $filtro2)) {
            $result = $fornecedor->create($request);
            if (!$result) {
                $this->views('cadastro', [
                    'title' => "Estética Automotiva",
                    'pag' => "finalizar",
                    'imagem' => "/images/Forgot password-bro.png",
                    'mensagem' => "Não foi possivel cadastrar o fornecedor {$request['NM_FORNECEDOR']}!",
                    'link' => '/cadastro/fornecedor',
                ]);
            } else {
                $fornecedor = $this->buscar('DS_CNPJ_FORNECEDOR', $request['DS_CNPJ_FORNECEDOR']);
                $contatoEmail = new EmailFornecedor();
                $contatoFone = new TelefoneFornecedor();
                $result1 = $contatoEmail->create(['CD_FORNECEDOR' => $fornecedor->getCodigo(), 'DS_EMAIL_FORNECEDOR' => Request::input('DS_EMAIL_FORNECEDOR')]);
                $result2 = $contatoFone->create(['CD_FORNECEDOR' => $fornecedor->getCodigo(), 'DS_FONE_FORNECEDOR' => Request::input('DS_FONE_FORNECEDOR')]);
                if (!($result1 && $result2)) {
                    $this->views('cadastro', [
                        'title' => "Estética Automotiva",
                        'pag' => "finalizar",
                        'imagem' => "/images/Create-amico.png",
                        'mensagem' => "O fornecedor {$request['NM_FORNECEDOR']} foi cadastrado, porem seus contato não foram cadastrados!",
                        'link' => '/cadastro/fornecedor',
                    ]);
                } else {
                    $this->views('cadastro', [
                        'title' => "Estética Automotiva",
                        'pag' => "finalizar",
                        'imagem' => "/images/Create-amico.png",
                        'mensagem' => "O fornecedor {$request['NM_FORNECEDOR']} foi cadastrado!",
                        'link' => '/cadastro/fornecedor',
                    ]);
                }
            }
        } else {
            $this->views('cadastro', [
                'title' => "Cadastro Fornecedor",
                'pag' => "finalizar",
                'imagem' => "/images/Forgot password-bro.png",
                'mensagem' => "Esse fornededor já foi cadastrado!",
                'link' => '/cadastro/fornecedor',
            ]);
        }
    }

    public function buscarTodos(): array
    {
        $fornecedor = new Fornecedor();
        return $fornecedor->fetchAll();
    }

    public function buscarFornecedor(string $key, mixed $data) : Fornecedor|bool
    {
        $this->_filters->where($key, '=', $data);
        $this->_fornecedor->setfilters($this->_filters);
        $fornecedor = $this->_fornecedor->fetchAll();
        return $fornecedor[0] ?? false;
    }
}
