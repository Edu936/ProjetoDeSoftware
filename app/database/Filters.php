<?php

namespace app\database;

class Filters 
{
    private array $filters = [];

    public function clear()
    {
        $this->filters = [];
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
        $this->filters ['WHERE'] [] = " {$field} {$operator} {$value} {$logic}"; 
    }
    
    public function limit(int $limit)
    {
        $this->filters['LIMIT'] = "limit {$limit}";
    }

    public function orderBy(string $field, string $order = "ASC")
    {
        $this->filters['ORDER'] = "ORDER BY {$field} {$order}";
    }

    public function join(string $foreingtable, string $joinTable1, string $operator, string $joinTable2, string $joinType="INNER JOIN") 
    {
        $this->filters['JOIN'] [] = "{$joinType} {$foreingtable} on {$joinTable1} {$operator} {$joinTable2} ";   
    }

    public function dump()
    {
        $filter = !empty($this->filters['JOIN'])? implode ('',$this->filters['JOIN']):'';
        $filter .= !empty($this->filters['WHERE'])? 'WHERE'.implode ('',$this->filters['WHERE']):'';
        $filter .= $this->filters['ORDER'] ?? '';
        $filter .= $this->filters['limit'] ?? '';
        return $filter;
    }

}