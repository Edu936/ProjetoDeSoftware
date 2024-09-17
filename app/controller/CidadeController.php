<?php

namespace app\controller;

use app\database\Filters;
use app\models\Cidade;
use app\static\Request;

class CidadeController extends Controller
{

    public function salvar() : void
    {
        $cidade = new Cidade();
        $result =  $cidade->create([
            "NM_CIDADE" => "Uberlandia",
            "DS_ESTADO_CIDADE" => "Minas Gerais"
        ]);

        if(!$result) {
            echo"Não foi cadastrado essa cidade!";
        } else {
            echo "Foi cadastrado a cidade";
        }
    }

    public function atulizar() : void
    {
        $cidade = new Cidade();
        $result = $cidade->update([
            "NM_CIDADE" => "Rio de Janeiro",
            "DS_ESTADO_CIDADE" => "Rio de Janeiro",
        ],"CD_CIDADE",11);
        if(!$result) {
            echo"Não foi atualizado essa cidade!";
        } else {
            echo "Foi atualizado a cidade";
        }
    }

    public function excluir() : void
    {
        $request =  "afdb";//Request::input('CD_CIDADE');
        $cidade = new Cidade();
        $cidade = $cidade->delete('NM_CIDADE', $request);
        if(!$cidade){
            echo "Cidade não foi apagada!";
        } else {
            echo "A cidade foi apagada!";
        }
    }

    public function buscarPorNome() : Cidade
    {
        $request = Request::input('name');
        $cidade = new Cidade();
        $cidade = $cidade->findby('NM_CIDADE',$request);
        return $cidade;
    }

    public function buscarTodos() : array
    {
        $fielters = new Filters;
        $cidade = new Cidade();
        $cidade->setfilters($fielters);
        $cidades = $cidade->fetchAll();
        return dd($cidades);
    }
}
