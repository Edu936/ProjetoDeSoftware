<?php

namespace app\models;

class ProdutoFornecedor extends Model
{
    private int $codigoProduto;
    private int $codigoFornecedor;

    public function __construct()
    {
        $this->table = "tb_fornecedor_produto";   
    }

    public function setProduto($codigo) : void
    {
        $this->codigoProduto = $codigo;
    }

    public function setFornecedor($codigo) : void
    {
        $this->codigoFornecedor = $codigo;
    }

    public function getProduto() : int 
    {
        return $this->codigoProduto;    
    }

    public function getFornecedor() : int 
    {
        return $this->codigoFornecedor;    
    }
}
