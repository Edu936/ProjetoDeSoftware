<?php

namespace app\static;

use Exception;

abstract class Request 
{
    public static function input (string $campo) 
    {
        if(isset($_POST[$campo])){
            return $_POST[$campo];
        } else {
            throw new Exception("O campo que deseja pegar não existe");
        }
    }

    public static function all()
    {
        return $_POST;
    }

    public static function only(array $only)
    {
        $form = self::all();
        $return = [];
        foreach($form as $indexs => $values){
            foreach($only as $ind => $val){
                if($indexs == $val){
                    $return [$indexs] = $values;
                }
            }
        }
        return $return;
    }

    public static function exception(array $exception){
        $form = self::all();
        $return = [];
        foreach($form as $indexs => $values){
            foreach($exception as $ind => $val){
                if($indexs != $val){
                    $return [$indexs] = $values;
                }
            }
        }
        return $return;
    }

    public static function query (string $name)
    {
        if(!isset($_GET[$name]))
        {
            throw new Exception("Não foi possivel encontrar tal campo");
        }
        return $_GET[$name];
    }

    public static function toJson($array)
    {
        return json_encode($array);    
    }

    public static function toArray($data)
    {
        if(isJson($data)){
            return json_decode($data);
        }
    }
}