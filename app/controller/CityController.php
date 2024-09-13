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

    public function __construct()
    {
        $this->conn = MySql::connect();
    }

    public function create(): void
    {
        $data = Request::only(['name', 'estado']);
        $cidade = new Cidade($data['name'], $data['estado']);
        $query = Querys::insert('tb_cidade',["NM_CIDADE", "DS_ESTADO_CIDADE"],[":n",":e"]);
        dd($query);
        $execute = $this->conn->prepare($query);
        $execute->bindValue(":n", $cidade->getNome());
        $execute->bindValue(":e", $cidade->getEstado());
        $execute->execute();
    }

    public function delete(): void
    {

    }
}
