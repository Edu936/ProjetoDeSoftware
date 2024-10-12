<?php

namespace app\models;

class ProdutoServico extends Model
{
    private int $CD_PRODUTO;
    private int $CD_SERVICO;

    public function __construct()
    {
        $this->table = "tb_servico_produto";   
    }

    public function setProduto($codigo) : void
    {
        $this->CD_PRODUTO = $codigo;
    }

    public function setServico($codigo) : void
    {
        $this->CD_SERVICO = $codigo;
    }

    public function getProduto() : int 
    {
        return $this->CD_PRODUTO;
    }

    public function getServico() : int 
    {
        return $this->CD_SERVICO;    
    }
}
