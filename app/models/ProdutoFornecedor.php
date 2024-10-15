<?php

namespace app\models;

class ProdutoFornecedor extends Model
{
    private int $CD_PRODUTO;
    private int $CD_FORNECEDOR;

    public function __construct()
    {
        $this->table = "tb_fornecedor_produto";   
    }

    public function setProduto($codigo) : void
    {
        $this->CD_PRODUTO = $codigo;
    }

    public function setFornecedor($codigo) : void
    {
        $this->CD_FORNECEDOR = $codigo;
    }

    public function getProduto() : int 
    {
        return $this->CD_PRODUTO;
    }

    public function getFornecedor() : int 
    {
        return $this->CD_FORNECEDOR;    
    }
}
