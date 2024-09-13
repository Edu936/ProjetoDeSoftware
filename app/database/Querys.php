<?php

namespace app\database;

abstract class Querys {

    private static function colunas(array $colunas) : string
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

    private static function valores (array $valores): string
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

    public static function insert(string $nomeTabela, array $campos, array $valores)
    {
        $colunas = self::colunas($campos);
        $values = self::valores($valores);

        $query ="INSERT INTO ".$nomeTabela." ( ".$colunas." ) VALUES ( ".$values." )";

        return $query;
    }

}