<?php

namespace app\models;

use app\database\Filter;
use PDOException;

abstract class Model 
{
    protected string $table;
    private string $fields = '*';
    private string $filters = '';

    public function setFields($fields)
    {
        $this->fields = $fields;
    }

    public function setFilters(Filter $filters)
    {
        $this->filters = $filters;
    }

    public function fetchAll($filds = '*')
    {
        try {
            $sql = "select {$this->fields} from {$this->table} {$this->filters}";
            dd($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
}