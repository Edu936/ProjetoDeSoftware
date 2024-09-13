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
        $script = Querys::getQuery('tb_cidade');
        $cidade = new Cidade($data['name'], $data['estado']);

        $query = $this->conn->prepare($script);
        $query->bindValue(":n", $cidade->getNome());
        $query->bindValue(":e", $cidade->getEstado());
        $query->execute();
                
        echo $this-> views('cadastro', [
            'title' => "Estetica Automotiva",
            'pag' => "city",
        ]);
    }

    public function delete(): void
    {

    }
}
