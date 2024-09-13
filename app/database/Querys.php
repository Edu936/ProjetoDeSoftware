<?php

namespace app\database;

class Querys {
    private static function tables() : array
    {
        return [
            'create_cidade' => "INSERT INTO tb_cidade (NM_CIDADE, DS_ESTADO_CIDADE) VALUES (:n,:e)",
            'reader_cidade' => "",
            'update_cidade' => "",
            'delete_cidade' => "DELETE FROM tb_cidade WHERE CD_CIDADE = :id",
            

        ];
    }

    public static function getQuery($nomeTable)
    {
        $query = "";
        $tables = self::tables();
        foreach($tables as $nmTable => $script){
            if($nomeTable == $nmTable) {
                $query = $script;
            }
        }
        return $query;
    }
}