<?php

namespace app\models;

use PDO;
use PDOException;
use app\database\MySql;
use app\database\Filters;

abstract class Model 
{
    protected string $table;
    private string $fields = '*';
    private string $filters = '';

    public function setFields($fields)
    {
        $this->fields = $fields;
    }

    public function setfilters(Filters $filters)
    {
        $this->filters = $filters->dump();
    }

    public function fetchAll()
    {
        try {
            $sql = "SELECT {$this->fields} FROM {$this->table} {$this->filters}";
            $connection = MySql::connect();
            $query = $connection->query($sql);
            return $query->fetchAll(PDO::FETCH_CLASS, get_called_class());
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function findby(string $field, string $value)
    {
        try {
            $sql = "SELECT {$this->fields} from {$this->table} where {$field} = :{$field}";
            $connection = MySql::connect();
            $prepare = $connection->prepare($sql);
            $prepare -> execute([$field => $value]);
            return $prepare -> fetchObject(get_called_class());
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete(string $field, string|int $value)
    {
        try {
            $sql = "DELETE FROM {$this->table} where {$field} = :{$field}";
            $connection = MySql::connect();
            $prepare = $connection->prepare($sql);
            $prepare -> execute([$field => $value]);
            return $prepare -> fetchObject(get_called_class());
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function create(array $data)
    {
        try {
            $sql = "INSERT INTO {$this->table} ( "; 
            $sql.= implode(', ',array_keys($data))." ) VALUES ( :";
            $sql.= implode(', :',array_keys($data)).")";
            $connection = MySql::connect();
            $prepare = $connection->prepare($sql);
            return $prepare->execute($data);
        } catch (PDOException $e) {
            
        }
    }

    public function update(array $data, string $field, string|int $value)
    {
        try {
            $sql = "UPDATE {$this->table} SET "; 
            foreach($data as $index => $values){
                $sql.= " {$index} = :{$index},";
            }
            $sql = rtrim($sql, ',');
            $sql.= " WHERE {$field} = :{$field} ";

            $connection = MySql::connect();

            $prepare = $connection->prepare($sql);
            foreach ($data as $index => $values){
                $prepare -> bindValue(":".$index, $values);
            }

            $prepare -> bindValue(":".$field, $value);
            return $prepare->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}