<?php

namespace app\database;

class Querys {

    private array $filters = [];

    private function colunas(array $colunas) : string
    {
        $colum = "";
        $length = count($colunas);
        foreach($colunas as $value){
            if($value == $colunas[$length-1]){
                $colum .= $value;
            } else {
                $colum .= $value . ", ";
            }
        }
        return $colum;
    }
    
    private function valores (array $valores): string
    {
        $value = "";
        $length = count($valores);
        foreach($valores as $index){
            if($index == $valores[$length-1]){
                $value .= $index;
            } else {
                $value .= $index . ", ";
            }
        }
        return $value;
    }
    
    public function insert(string $nomeTabela, array $campos, array $valores)
    {
        $colunas = $this->colunas($campos);
        $values = $this->valores($valores);
        
        $query = "INSERT INTO ".$nomeTabela." ( ".$colunas." ) VALUES ( ".$values." )";
        
        return $query;
    }
    
    public function update(string $nomeTabela, string $coluna, string $value, string $where){
        return $query = "UPDATE ".$nomeTabela." SET ".$coluna." = ".$value." WHERE ".$where;
    }
    
    public function delete($nomeTabela, $where)
    {
        return $query = "DELETE FROM ".$nomeTabela." WHERE ".$where;
    }
    
    public function select($campos){

        return $query = "SELECT ";
    }

    public function where (string $field, string $operator, mixed $value, string $logic ='')
    {
        $formatter = '';
        if(is_array($value)){
            $formatter = "('".implode("','".$value."')");
        } else if(is_string($value)) {
            $formatter = "'{$value}'";
        } else if(is_bool($value)){
            $formatter = $value ? 1 : 0;
        } else {
            $formatter = $value;
        }

        $value = strip_tags($formatter);
        $this->filters ['where'] [] = "{$field} {$operator} {$value} {$logic} "; 
    }
}