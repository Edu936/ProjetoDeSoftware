<?php

namespace app\controller;

use app\models\Cidade;
use app\static\Request;
use app\database\Filters;

class CidadeController extends Controller
{

    /**
     * Este metodo será responsavel por exibir a tela de cadastro de cidade
     */
    public function paginaDeCadastro(): void
    {
        $cidade = new Cidade();
        $cidade->setNome("");
        $cidade->setEstado("");
        $route = "/cidade/salvar";
        $card = "Cadastro De Cidade";
        echo $this->views('cadastro', [
            'card' => $card,
            'route' => $route,
            'pag' => "cidade",
            'cidade' => $cidade,
            'title' => "Cadastro de cidade",
        ]);
    }

    /**
     * Este metodo será responsavel por exibir uma tela que apresentará todas as cidades cadastradas no sistema
     */
    public function paginaDeControle(): void
    {
        $cidades = $this->buscarTodos();
        echo $this->views('controle', [
            'pag' => "cidade",
            'cidades' => $cidades,
            'title' => "Controle de cidade",
        ]);
    }

    public function paginaDeEdicao($codigo): void
    {
        $cidade = new Cidade();
        $cidade = $cidade->findby("CD_CIDADE", $codigo[0]);
        $route = "/cidade/atualizar/{$codigo[0]}";
        $card = "Atualização De Cidade";
        echo $this->views('cadastro', [
            'card' => $card,
            'pag' => "cidade",
            'route' => $route,
            'cidade' => $cidade,
            'title' => "Edição de cidade",
        ]);
    }

    public function paginaDeDetalhes($codigo):void
    {

    }

    public function buscar($value) :void 
     {
        $dados = $this->buscarPorNome($value[0]);
        $cidades = $this->buscarTodos();
        $this->views('controle', [
            'title' => "Estética Automotiva",
            'pag' => "cidade",
            'cidades' => $cidades,
            'dados' => $dados
        ]);
    }

    /**
     * Este metodo tem como função buscar pelo nome uma cidade
     */
    public function buscarPorNome(string $name): Cidade
    {
        $city = new Cidade();
        $city->setNome("");
        $city->setCodigo(0);
        $city->setEstado("");

        $cidade = new Cidade();

        $cidade = $cidade->findby('NM_CIDADE', $name);

        return $cidade ? $cidade : $city;
    }

    /**
     * Esse metodo tem como função filtrar ha existencia de uma cidade já cadastrada e salvar caso necessario
     */
    public function salvar(): void
    {
        $request = Request::all();
        $filtro = $this->buscarPorNome($request['NM_CIDADE']);
        $cidade = new Cidade();
        if ($filtro->getNome() != $request['NM_CIDADE'] && $filtro->getEstado() != $request['DS_ESTADO_CIDADE']) {
            $result = $cidade->create($request);
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

    /**
     * Esse metodo tem como função atualizar os dados de uma cidade
     */
    public function atualizar($codigo): void
    {
        $request = Request::all();
        $filtro = $this->buscarPorNome($request['NM_CIDADE']);
        $cidade = new Cidade();
        if ($filtro->getNome() != $request['NM_CIDADE'] && $filtro->getEstado() != $request['DS_ESTADO_CIDADE']) {
            $result = $cidade->update($request, "CD_CIDADE", $codigo[0]);
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
                'mensagem' => "Você não alterou!",
                'link' => '/controle/cidade',
            ]);
        }
    }

    /**
     * Essa função tem como finalidade excluir uma cidade já cadastrada
     */
    public function excluir($codigo): void
    {
        $cidade = new Cidade();
        $cidade = $cidade->delete('CD_CIDADE', $codigo[0]);
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

    /**
     * Esse metodo tem como função buscar todas as cidade já cadastradas
     */
    public function buscarTodos(): array
    {
        $fielters = new Filters;
        $cidade = new Cidade();
        $cidade->setfilters($fielters);
        $cidades = $cidade->fetchAll();
        return $cidades;
    }
}
