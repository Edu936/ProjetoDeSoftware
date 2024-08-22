<?php

namespace app\core;

use app\static\RequestType;
use app\routes\Routes;
use app\static\Uri;

class ControllerParams
{
    private string $type;
    private string $uri;
    private array $rotes;

    function __construct()
    {
        $this->type = RequestType::get();
        $this->uri = Uri::get();
        $this->rotes = Routes::get();
    }

    public function encontrarParametros($root)
    {
        $indice = array_search($root,$this->rotes[$this->type]);
        $arrayUri = explode('/',$this->uri);
        $arrayIndice = explode('/',$indice);
        $parametros = [];
        $i=0;
        foreach($arrayIndice as $indice => $value){
            if($value != $arrayUri[$indice]){
                $parametros[$i] = $arrayUri[$indice];
                $i++;
            }
        }
        if($parametros != []){
            return $parametros;
        }
        return ;
    }
}
