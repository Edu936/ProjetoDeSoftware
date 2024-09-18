<?php

namespace app\models;

class Produto extends Model 
{
    private int $CD_PRODUTO;
    private string $NM_PRODUTO;
    private float $VL_PRODUTO;
    private int $QTD_PRODUTO;  

    public function __construct()
    {
        $this->table = 'tb_produto';
    }

    public function getCodigo() : int 
    {
        return $this->CD_PRODUTO;
    }

    public function setCodigo($codigo) : void 
    {
        $this->CD_PRODUTO=$codigo;
    }

    public function getNome() : string 
    {
        return $this->NM_PRODUTO;
    }

    public function setNome($nome) : void 
    {
        $this->NM_PRODUTO=$nome;
    }

    public function getValor() : float 
    {
        return $this->VL_PRODUTO;
    } 
    
    public function setValor($valor) : void 
    {
        $this->VL_PRODUTO=$valor;
    }

    public function getQuantidade() : int 
    {
        return $this->QTD_PRODUTO;
    } 
    
    public function setQuantidade($quantidade) : void 
    {
        $this->QTD_PRODUTO=$quantidade;
    }
}