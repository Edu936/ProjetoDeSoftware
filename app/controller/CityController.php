<?php

namespace app\controller;

use app\database\Filter;
use app\database\MySql;
use app\models\Cidade;
use app\static\Request;
use mysqli;
use PDOException;

class CityController {
    private $conn;
    private string $query;
    private array $request;

    public function __construct()
    {
        $this->request = Request::only(['name','estado']);
        $this->conn = MySql::connect();
    }

    public function create() : Cidade
    {
        $cidade = new Cidade($this->request['name'],$this->request['estado']);
        $fil = new Filter();
        $fil->where('nm_Usuario','like','%eduardo%', 'and');
        $fil->dump();
        return $cidade;
    }
}