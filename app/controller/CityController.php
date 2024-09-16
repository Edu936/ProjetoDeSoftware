<?php

namespace app\controller;

use app\database\Querys;
use app\database\MySql;
use app\models\Cidade;
use app\static\Request;
use PDO;

class CityController extends Controller
{
    private $conn;
    private $query;
    private string $tabela = "tb_cidade";
    private array $colunas = ["NM_CIDADE", "DS_ESTADO_CIDADE"];
    private array $indices = [":n", ":e"];

    public function __construct()
    {
        $this->conn = MySql::connect();
        $this->query = new Querys();
    }

    public function salvar() : void
    {
        $data = Request::only(['name','estado']);
        $cidade = new Cidade($data['name'],$data['estado']);
        $script = $this->query->insert($this->tabela,$this->colunas,$this->indices);
        
        // $execute = $this->conn->prepare($script);
        // $execute -> bindValue(":n", $cidade->getNome());
        // $execute -> bindValue(":e", $cidade->getEstado());
        // $execute -> execute();
    }

    public function atulizar() : void
    {

    }

    public function excluir() : void
    {

    }

    public function buscarPorNome() : void
    {

    }

    public function buscarTodos() : void
    {

    }
}
