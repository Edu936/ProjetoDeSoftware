<?php

namespace app\controller;

use app\models\Cidade;
use app\static\Request;
use app\database\Filters;

class CidadeController extends Controller
{

    /**
     * Este metodo será responsavel por exibir as telas de cadastro
     */
    public function paginaDeCadastro() : void
    {
        echo $this->views('cadastro', [
            'title' => "Estética Automotiva",
            'pag' => "cidade",
        ]);
    }

    /**
     * Este metodo será responsavel por exibir a telas de controle das cidades cadastradas
     */
    public function paginaDeControle() : void
    {
        $cidades = $this->buscarTodos();
        echo $this->views('controle', [
            'title' => "Estética Automotiva",
            'pag' => "cidade",
            'cidades' => $cidades,
        ]);
    }

    public function buscar($value) {
        dd($value);
    }

    /**
     * Este metodo tem como função buscar pelo nome uma cidade
     */
    public function buscarPorNome(string $name) : Cidade
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
        $filtro = $this->buscarPorNome($request['name']);
        $cidade = new Cidade();
        if ($filtro->getNome() != $request['name'] && $filtro->getEstado() != $request['estado']) {
            $result = $cidade->create([
                "NM_CIDADE" => $request['name'],
                "DS_ESTADO_CIDADE" => $request['estado']
            ]);
            if (!$result) {
                $this->views('cadastro', [
                    'title' => "Estética Automotiva",
                    'pag' => "cadastro realizado",
                    'resposta' => "Ocorreu um erro no cadastro!",
                ]);
            } else {
                $this->views('cadastro', [
                    'title' => "Estética Automotiva",
                    'pag' => "cadastro realizado",
                    'resposta' => "A Cidade {$request['name']} foi Cadastrada Com Sucesso!",
                ]);
            }
        } else {
            $this->views('cadastro', [
                'title' => "Estética Automotiva",
                'pag' => "cadastro realizado",
                'resposta' => "Essa Cidade Já foi Cadastrada!",
            ]);
        }
    }


    /**
     * Esse metodo tem como função atualizar os dados de uma cidade
     */
    public function atulizar(): void
    {
        $cidade = new Cidade();
        $result = $cidade->update([
            "NM_CIDADE" => "Rio de Janeiro",
            "DS_ESTADO_CIDADE" => "Rio de Janeiro",
        ], "CD_CIDADE", 11);
        if (!$result) {
            echo "Não foi atualizado essa cidade!";
        } else {
            echo "Foi atualizado a cidade";
        }
    }

    /**
     * Essa função tem como finalidade excluir uma cidade já cadastrada
     */
    public function excluir($codigo): void
    {
        $cidade = new Cidade();
        $cidade = $cidade->delete('NM_CIDADE', $codigo);
        if (!$cidade) {
            echo "Cidade não foi apagada!";
        } else {
            echo "A cidade foi apagada!";
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
