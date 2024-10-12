<?php

namespace app\models;

class OrcamentoProduto extends Model
{
    private int $CD_ORCAMENTO;
    private int $CD_PRODUTO;

    public function __construct()
    {
        $this->table = "tb_orcamento_produto";
    }

    public function getOrcamento() : int
    {
        return $this->CD_ORCAMENTO;
    }

    public function getProduto() : int 
    {
        return $this->CD_PRODUTO;
    }

    public function setOrcamento($codigo) : void 
    {
        $this->CD_ORCAMENTO = $codigo;
    }

    public function setProduto($codigo) : void 
    {
        $this->CD_PRODUTO = $codigo;
    }
}
