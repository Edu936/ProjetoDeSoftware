<?php

namespace app\controller;

use app\database\Filters;
use app\models\Cidade;
use app\static\Request;

class CidadeController extends Controller
{

    public function paginaDeCadastro()
    {
        echo $this->views(
            'cadastro', 
            [
                'title' => "Estética Automotiva",
                'pag' => "cidade",
            ]
        );
    }

    public function paginaDeControle()
    {
        $cidades = $this->buscarTodos();
        echo $this->views(
            'controle',
            [
                'title' => "Estética Automotiva",   
                'pag' => "cidade",
                'cidades' => $cidades,
            ]
        );
    }

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

    public function excluir(): void
    {
        $request = Request::input('CD_CIDADE');
        $cidade = new Cidade();
        $cidade = $cidade->delete('NM_CIDADE', $request);
        if (!$cidade) {
            echo "Cidade não foi apagada!";
        } else {
            echo "A cidade foi apagada!";
        }
    }


    public function buscarTodos(): array
    {
        $fielters = new Filters;
        $cidade = new Cidade();
        $cidade->setfilters($fielters);
        $cidades = $cidade->fetchAll();
        // echo $cidades[1]->getNome();
        return $cidades;
    }
}
