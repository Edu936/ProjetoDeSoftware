<?php

namespace app\controller;

use app\models\Cidade;
use app\static\Request;
use app\database\Filters;

class CidadeController extends Controller
{
    private $_cidade;
    private $_filters;

    function __construct()
    {
        $this->_cidade = new Cidade();
        $this->_filters = new Filters;
    }

    public function paginaDeCadastro(): void
    {
        $this->views('cadastro', [
            'title' => "Cadastro de cidade",
            'pag' => "cidade",
        ]);
    }

    public function paginaDeControle(): void
    {
        $cidades = $this->buscarTodos();
        $this->views('controle', [
            'title' => "Controle de cidade",
            'pag' => "cidade",
            'cidades' => $cidades,
        ]);
    }

    public function paginaDeEdicao($codigo): void
    {
        $cidade = $this->_cidade->findby("CD_CIDADE", $codigo[0]);
        $this->views('atualizar', [
            'title' => "Edição de cidade",
            'pag' => "cidade",
            'cidade' => $cidade,
            'link' => '/controle/cidade',
        ]);
    }

    public function salvar(): void
    {
        $request = Request::all();
        $filtro = $this->buscarCidade('NM_CIDADE', $request['NM_CIDADE']);
        if (!$filtro) {
            $result = $this->_cidade->create($request);
            if (!$result) {
                $this->views('cadastro', [
                    'title' => "Cadastro Cidade",
                    'pag' => "finalizar",
                    'imagem' => "/images/Forgot password-bro.png",
                    'mensagem' => "Ocorreu um erro no cadastro!",
                    'link' => '/cadastro/cidade',
                ]);
            } else {
                $this->views('cadastro', [
                    'title' => "Cadastro Cidade",
                    'pag' => "finalizar",
                    'imagem' => "/images/Create-amico.png",
                    'mensagem' => "A Cidade {$request['NM_CIDADE']} foi Cadastrada Com Sucesso!",
                    'link' => '/cadastro/cidade',
                ]);
            }
        } else {
            $this->views('cadastro', [
                'title' => "Cadastro Cidade",
                'pag' => "finalizar",
                'imagem' => "/images/Forgot password-bro.png",
                'mensagem' => "Essa Cidade Já foi Cadastrada!",
                'link' => '/cadastro/cidade',
            ]);
        }
    }

    public function atualizar($codigo): void
    {
        $request = Request::all();
        $filtro = $this->buscarCidade('NM_CIDADE', $codigo[0]);
        if (!$filtro) {
            $result = $this->_cidade->update($request, "CD_CIDADE", $codigo[0]);
            if (!$result) {
                $this->views('cadastro', [
                    'title' => "Atualizar Cidade",
                    'pag' => "finalizar",
                    'imagem' => "/images/Forgot password-bro.png",
                    'mensagem' => "Ocorreu um erro ao Atualizar Cidade!",
                    'link' => '/controle/cidade',
                ]);
            } 
            else {
                $this->views('cadastro', [
                    'title' => "Atualizar Cidade",
                    'pag' => "finalizar",
                    'imagem' => "/images/Create-amico.png",
                    'mensagem' => "A Cidade {$request['NM_CIDADE']} foi atualizada Com Sucesso!",
                    'link' => '/controle/cidade',
                ]);
            }
        } 
        else {
            $this->views('cadastro', [
                'title' => "Estética Automotiva",
                'pag' => "finalizar",
                'imagem' => "/images/Forgot password-bro.png",
                'mensagem' => "Essa cidade não esta cadastrado em nosa base de dados!",
                'link' => '/controle/cidade',
            ]);
        }
    }

    public function excluir($codigo): void
    {
        $cidade = $this->_cidade->delete('CD_CIDADE', $codigo[0]);
        if (!$cidade) {
            $this->views('cadastro', [
                'title' => "Atualizar Cidade",
                'pag' => "finalizar",
                'imagem' => "/images/Inbox cleanup-rafiki.png",
                'mensagem' => "A cidade foi apagada com sucesso!",
                'link' => '/controle/cidade',
            ]);
        } else {
            $this->views('cadastro', [
                'title' => "Atualizar Cidade",
                'pag' => "finalizar",
                'imagem' => "/images/Forgot password-bro.png",
                'mensagem' => "A cidade não foi apagada!",
                'link' => '/controle/cidade',
            ]);
        }
    }

    public function buscarTodos(): array
    {
        $cidades = $this->_cidade->fetchAll();
        return $cidades;
    }

    public function buscarCidade(string $key, mixed $data): Cidade | bool
    {
        $this->_filters->where($key, '=', $data);
        $this->_cidade->setfilters($this->_filters);
        $cidade = $this->_cidade->fetchAll();
        return $cidade[0] ?? false;
    }
}